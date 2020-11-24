function myFunction(imgs) {
var modal = document.getElementById('myModal');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
    modal.style.display = "block";
    modalImg.src = imgs.src;
    captionText.innerHTML = imgs.alt;
var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
  modal.style.display = "none";
}
}