function show(){
    var p = document.getElementById('pwd');
    var b = document.getElementById('latar');
    p.setAttribute('type', 'text');
    b.style.backgroundColor = "#ee3333";
    b.style.color = "#fff";
}
function hide(){
    var p = document.getElementById('pwd');
    var b = document.getElementById('latar');
    p.setAttribute('type', 'password');
    b.style.backgroundColor = "#eee";
    b.style.color = "#555";
}
var pwShown = 0;
document.getElementById("show").addEventListener("click", function () {
    if (pwShown == 0){
        pwShown = 1;
        show();
    }else{
        pwShown = 0;
        hide();
    }
}, false);


function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
        }
      return true;
}