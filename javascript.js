function afficher(id, lien)
{
	document.getElementById(lien).setAttribute('onclick', "cacher('" + id + "', '" + lien + "');");
	document.getElementById(id).style.display = "block";
}
 
function cacher(id, lien)
{
	document.getElementById(lien).setAttribute('onclick', "afficher('" + id + "', '" + lien + "');");
	document.getElementById(id).style.display = "none";
}