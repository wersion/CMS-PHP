(function(){
    var NS=function(){};
	var $ = window.MyAjaxTool = new NS();
	
	//表单序列化
    NS.prototype.serialize=function (form){
		var parts = [],
			field = null,
			i,
			len,
			j,
			optLen,
			option,
			optValue;
		
		for(i=0,len = form.elements.length; i<len;i++){
			field = form.elements[i];
			switch(field.type){
			case "slect-one":
			case "select-multiple":
			if(field.name.length){
				for(j=0, optLen=field.options.length; j<optLen; j++){
				option = field.options[j];
				if(option.selected){
					optValue ="";
					if(option.hasAttribute){
					optValue = (option.hasAttribute("value")?option.value : option.text);
					}else{
					optValue = (option.attributes["value"].specified?option.value :option.text);
					}
					parts.push(encodeURIComponent(field.name) + "+" +encodeURIComponent(optValue));
				}
				}
			}
			break;
			
			case undefined:
			case "file":
			case "submit":
			case "reset":
			case "burron":
			break;
			
			case "radio":
			case "checkbox":
				if(!field.checked){
				break;
				}
			
			default:
				if(field.name.length){
				parts.push(encodeURIComponent(field.name) + "=" + encodeURIComponent(field.value));
				}
			}
		}
		return parts.join("&");
	}
	
	//生成XHR对象,兼容各浏览器
	NS.prototype.createXHR = function(){
		if(typeof XMLHttpRequest!="undefined"){
			return new XMLHttpRequest();
		}else if(typeof ActiveXObject !="undefined"){
			if(typeof arguments.callee.avtiveXString != "string"){
				var versions = ["MSXML2.XMLHttp.6.0","XSML2.XMLHttp.3.0","MSXML2.XMLHttp"],
					i,len;
				for(i=0,len=versions.length;i<len;i++){
					try{
						new ActiveXObject(versions[i]);
						arguments.callee.activeXString = versions[i];
						break;
					}catch (ex){}
				}
			}
				return new ActiveXObject(arguments.callee.activeXstring);
			}else{
				throw new Error("No XHR object avalibale");
			}	
	}
	
	//POST请求
	NS.prototype.PostRequest = function(url,formID){
		var xhr = $.createXHR();
		xhr.onreadystatechange = function(){
			if(xhr.readyState == 4){
			if((xhr.status >=200 && xhr.status<300) || xhr.status ==304){
				console.log(xhr.responseText);
			} else{
				alert("Request was unsuccessful:"+ xhr.status);
				}
			}
		};
		xhr.open('POST',url,false);
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		var form = document.getElementById(formID);
		xhr.send($.serialize(form));	
	}
	
	//GET请求，参数fn处理responseText
	NS.prototype.GetRequest = function(url,fn){
		var xhr = $.createXHR();
		xhr.onreadystatechange = function(){
			if(xhr.readyState == 4){
			if((xhr.status >=200 && xhr.status<300) || xhr.status ==304){
				// 用传入的函数对responseText进行处理
				fn(xhr.responseText);
			} else{
				alert("Request was unsuccessful:"+ xhr.status);
				}
			}
		};
		xhr.open('GET',url,false);
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xhr.send();	
	}
	
	//解析JSON数据返回“[{},{}]”格式的数组(responText,resultKey)
	NS.prototype.parJSON = function(responText,resultKey){
		var data = eval('('+responText+')');
		var parData = [];
		for(var i=0, len=data.length;i<len;i++){
			parData[i]={};
			for(var j=0,klen=resultKey.length;j<klen;j++){
				var key=resultKey[j]
				parData[i][key]=data[i][key];
			}
		}
		return parData;
	}
    
})();
