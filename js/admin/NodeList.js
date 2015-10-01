(function(){
    var secondStage = document.getElementsByClassName("secondStage");
    for(var i=0;i<secondStage.length;i++){
        secondStage[i].addEventListener('click',showUL,false);
    }
    
    function showUL () {
        if(this.nextSibling.style.display=="none"){
            this.innerHTML = this.innerHTML.replace(/\+/,"-");
            this.nextSibling.style.display= "block";
        }else if(this.nextSibling.style.display=="block"){
            this.innerHTML = this.innerHTML.replace(/\-/,"+");
            this.nextSibling.style.display= "none";
        }
    }
})();