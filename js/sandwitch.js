function tranSandwitch(sand) {
    sand.classList.toggle("change");
  }


  
function openNav() {
    document.getElementById("navSide").style.width = "400px";
    /*document.getElementById("body").style.marginRight = "250px"; 
    document.getElementById("hambi").style.display = "none";*/
  }
  
function closeNav() {
    document.getElementById("navSide").style.width = "0";
    /*document.getElementById("body").style.marginRight= "0";*/
  }

  function dropSide() {
  let sideconts = document.getElementsByClassName("sidecont");

   
     if (sideconts[0].style.display === "block") {
      sideconts[0].style.display = "none";
      
    } else {
      sideconts[0].style.display = "block";
    }
 
}

function dropSide2() {
  let sidecont2s = document.getElementsByClassName("sidecont2");

   
     if (sidecont2s[0].style.display === "block") {
      sidecont2s[0].style.display = "none";
      
    } else {
      sidecont2s[0].style.display = "block";
    }
 
}