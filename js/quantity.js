function add(id)
{
	var quantityPrev = document.getElementById(id).parentNode.childNodes[3].textContent;
	document.getElementById(id).parentNode.childNodes[3].textContent = parseInt(quantityPrev) + 1;
}
function reduce(id)
{
	var quantityPrev = document.getElementById(id).parentNode.childNodes[3].textContent;
	if(quantityPrev > 0)
	{
		document.getElementById(id).parentNode.childNodes[3].textContent = parseInt(quantityPrev) - 1;
	}
}