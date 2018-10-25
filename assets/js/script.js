window.onload = function(){
	document.querySelector(".menu_mobile").addEventListener("click", function(){
		if(document.querySelector(".menu nav ul").style.display == 'flex'){
			document.querySelector(".menu nav ul").style.display = 'none';
		}else{
			document.querySelector(".menu nav ul").style.display = 'flex';
		}

	});
}

function prof(el, al) {
        var display = document.getElementById(el).style.display = 'block';
        var als = document.getElementById(al).style.display = 'none';
 	}
function al(el, al) {
	 var display = document.getElementById(el).style.display = 'block';
      var als = document.getElementById(al).style.display = 'none';
}