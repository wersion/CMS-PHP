//获取并设置管理员修改页面的level下拉菜单
window.onload = function(){
  var level = document.getElementById('userlv').value;
  var option = document.getElementsByTagName('option');
  for(i=0;i<option.length;i++){
    if(option[i].value == level){
      option[i].setAttribute('selected','selected');
    }
  }
}