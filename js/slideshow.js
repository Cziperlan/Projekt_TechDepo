let S = 1;
let prev;
showSlide(S);

function Skip(n) {
    showSlide(S += n);
}

function NowShow(n) {
    showSlide(S = n);
}

function showSlide(n) {
    let i;
    let slidepics = document.getElementsByClassName("S");
    let dots = document.getElementsByClassName("dind");
    if (n > slidepics.length) { S = 1 }
    if (n < 1) { S = slidepics.length }
    for (i = 0; i < slidepics.length; i++) {
        slidepics[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" activus", "");
    }
    slidepics[S - 1].style.display = "block";
    dots[S - 1].className += " activus";

}
