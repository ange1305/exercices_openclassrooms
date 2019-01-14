<?php
if(!empty($_GET['page']) and $_GET['page'] == "lesson" and !empty($_GET['class']))
{
	//On va chercher le fichier de la page des cours
	require_once('lesson.php');
}

if(!empty($_GET['page']) and $_GET['page'] == "cours" and !empty($_GET['idcours']))
{
	//On va chercher le fichier de la page des cours
	require_once('cours.php');
}

if(!empty($_GET['page']) and $_GET['page'] == "event" and !empty($_GET['class']))
{
	//On va chercher le fichier de la page des exercices
	require_once('event.php');
}

if(!empty($_GET['page']) and $_GET['page'] == "exo" and !empty($_GET['idevent']))
{
	//On va chercher le fichier de la page des exercices
	require_once('exo.php');
}

if(!empty($_SESSION['user']) and $_SESSION['lvl_adm'] >= 5 and !empty($_GET['page']) and $_GET['page'] == "admin")
{
	//On va chercher le fichier de la page admin
	require_once('admin.php');
}
elseif(empty($_SESSION['lvl_adm']) and !empty($_GET['page']) and $_GET['page'] == "admin")
{
	$erreur = "You are not allowed to access the admin page";
	header("Location: /?erreur={$erreur}"); //On renvoi vers la page d'acceuil
	exit;
}

if(empty($_GET['page']))
{
	?>
		<article>
			<p>Welcome to Mrs Krüger's website for storing English lessons.</br>
			You can view and download the courses that are stored on this website.</br>
			<span class="rouge">The lessons placed on this site are and must remain the intellectual property of their authors.<span></p>
		</article>
	<?php
}
?>