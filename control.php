<?php
if(!empty($_GET['page']))
{
	switch($_GET['page'])
	{
		case "lesson" : //On va chercher le fichier de la page des cours
						require_once('lesson.php');
						break;
						
		case "cours" : //On va chercher le fichier de la page des cours
						require_once('cours.php');
						break;
						
		case "event" : //On va chercher le fichier de la page des cours
						require_once('event.php');
						break;
						
		case "exo" : //On va chercher le fichier de la page des cours
						require_once('exo.php');
						break;
						
		case "admin" : if(!empty($_SESSION['user']) and $_SESSION['lvl_adm'] >= 5)
						{
							//On va chercher le fichier de la page des cours
							require_once('admin.php');
						}
						elseif(empty($_SESSION['lvl_adm']) or $_SESSION['lvl_adm'] < 5)
						{
							$erreur = "You are not allowed to access the admin page";
							header("Location: /?erreur={$erreur}"); //On renvoi vers la page d'acceuil
							exit;
						}
						break;
	}
}
else
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