function tranSandwitch(sand) {
    sand.classList.toggle("change");
  }


  
function openNav() {
    document.getElementById("navSide").style.width = "250px";
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