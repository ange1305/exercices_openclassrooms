<?php
session_start(); //On démarre la session

//On ce connecte à la database
require_once('data_connect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta content="text/html" charset="utf-8">
		<title>English class</title>
		<link rel="stylesheet" href="style.css">
		<script type="text/javascript" src="javascript.js"></script>
	</head>
	<body>
		<div id="bloc_page">
			<header>
				<img src="images/font_entete.jpg" alt="font_entete" id="font_entete" />
				<?php
					if(empty($_SESSION['user']))
					{
						echo "<a id=\"connection\" onClick=\"afficher('div_conn', 'connection');\" >Login in</a>";
					}
					else
					{
						echo "<a id=\"connection\" href=\"deconnexion.php\" >Login out</a>";
					}
				?>
				<div id="entete">
					<div id="titre_principal">
						<h1>English Class</h1>
					</div>
					<div class="navigation">
						<div id="centrage">
							<nav class="menu" id="menu">
								<ul>
									<li><a href="/">HOME</a></li>
									<li class="dropdown">
										<a class="dropbtn">LESSONS</a>
										<div class="dropdown-content" id="content1">
											<?php
												$class = $conn->query('select * FROM english_class_classe order by classe'); //On va chercher les classes
												WHILE($class2 = $class->fetch())
												{
													$idclasse = strip_tags($class2['id']);
													$classe = strip_tags($class2['classe']);
													$classe = utf8_encode($classe);
													echo "<a href=\"/?page=lesson&class={$idclasse}\">{$classe}</a>";
												}
											?>
										</div>
									</li>
									<li class="dropdown">
										<a class="dropbtn">EVENTS</a>
										<div class="dropdown-content" id="content2">
											<?php
												$class = $conn->query('select * FROM english_class_classe order by classe'); //On va chercher les classes
												WHILE($class2 = $class->fetch())
												{
													$idclasse = strip_tags($class2['id']);
													$classe = strip_tags($class2['classe']);
													$classe = utf8_encode($classe);
													echo "<a href=\"/?page=event&class={$idclasse}\">{$classe}</a>";
												}
											?>
										</div>
									</li>
									<li class="dropdown">
										<a class="dropbtn">TOOLS</a>
										<div class="dropdown-content" id="content3">
											<?php
												$tool = $conn->query('select * FROM english_class_tool'); //On va chercher les autres sites
												WHILE($tool2 = $tool->fetch())
												{
													$nom_tool = strip_tags($tool2['nom']);
													$nom_tool = strtoupper($nom_tool);
													$adresse_tool = strip_tags($tool2['adresse']);
													echo "<a href=\"{$adresse_tool}\" target=\"_blank\">{$nom_tool}</a>";
												}
											?>
										</div>
									</li>
									<?php
										if(!empty($_SESSION['user']))
										{
											echo "<li><a href=\"/?page=admin\">ADMINISTRATION</a></li>";
										}
									?>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</header>
			<section>
				<?php
					if(!empty($_SESSION['user']))
					{
						echo "<p>Welcome <b>{$_SESSION['user']}</b>. You are loged in administrator.";
					}
					
					if(!empty($_GET['erreur']))
					{
						$erreur = strip_tags($_GET['erreur']);
						echo "<p class=\"erreur\">{$erreur}</p>";
					}
					
					if(!empty($_GET['message']))
					{
						$message = strip_tags($_GET['message']);
						echo "<p class=\"message\">{$message}</p>";
					}
				?>
				<div id="div_conn">
					<form method="POST" action="connection.php" >
						<p>
							<label for="user" >User name : <input type="text" name="user" id="user" autofocus /></label>
							<label for="pass" >User password : <input type="password" name="password" id="pass" /></label>
							<input type="submit" value="Submit" />
							<input type="reset" value="Cancel" onClick="cacher('div_conn', 'connection');" />
						</p>
					</form>
				</div>
				<?php
					//On charge le controleur
					require_once('control.php');
				?>
			</section>
			<footer>
				<p>Site conçu par Aristos & Ange</br>
				pour les cours d'anglais de Mme Krüger.</p>
			</footer>
		</div>
	</body>
</html>