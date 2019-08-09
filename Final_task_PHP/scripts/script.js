var modal = getElementByClassName("myModal");
var image = getElementByClassName("image");
var span = getElementByClassName("close")[0];

image.onclick = function{
	modal.style.display = "block";
}

span.onclick = function{
	modal.style.display = "none";
}

window.onclick = function{
	if(event.target == modal){
		modal.style.display = "none";
	}
}