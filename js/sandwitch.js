function tranSandwitch(sand) {
    sand.classList.toggle("change");
  }


  
function openNav() {
    document.getElementById("navSide").style.width = "250px";
    document.getElementById("body").style.marginRight = "250px";
  }
  
function closeNav() {
    document.getElementById("navSide").style.width = "0";
    document.getElementById("body").style.marginRight= "0";
  }

function dropSide() {
  document.getElementsByClassName("sidedrop")
    if (sidecont.style.display === "block") {
    sidecont.style.display = "none";
  } else {
    sidecont.style.display = "block";
  }
}