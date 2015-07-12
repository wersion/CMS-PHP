 //获取文章修改页面的栏目下拉菜单
 window.onload = function(){
  var c_id = document.getElementById('c_id').value;
  var option = document.getElementsByTagName('option');
  for(i=0;i<option.length;i++){
    if(option[i].value == c_id){
      option[i].setAttribute('selected','selected');
    }
  }
 }