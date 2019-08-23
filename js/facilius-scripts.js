//home flotante
/**
 *   #homeflotante{
    color:black;
    position:fixed;
    top:10px;
    left:10px;
    background:blue;
    
  }
  .fade {
    -webkit-animation: fade 1s 1 0s;
    -moz-animation: fade 1s 1 0s;
    -ms-animation: fade 1s 1 0s;
    -o-animation: fade 1s 1 0s;
    animation: fade 1s 1 0s;
  }
  @keyframes fade {
    from {opacity: 0.4;}
    to {opacity: 1;}
    }
  }
 */

window.addEventListener("scroll", function(){
	var homeflotante = document.getElementById("homeflotante");
  if(window.pageYOffset > 50){
  	homeflotante.style.display = "block";
  }
  else{
  	homeflotante.style.display = "none";
  }
},false);