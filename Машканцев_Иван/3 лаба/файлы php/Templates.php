<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Wild animals</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>

<body>
	<header>
			<div class="logo">
               <a href="#"> <img class="logo-img" src="logo.png"></li></a>
               <h1 class="logo-text">Дикие звери</h1>
            </div>
			<?php foreach($pages as $page): ?>
				<?php 
                echo sprintf('<a class="site-menu-item" href="%s">%s</a>', 'index.php?page=' . $page['id_articles'], $page['title_articles']); ?>
            <?php endforeach; ?>
	</header>

	<main class="main">
		<article>
			<?php 
            echo $data['text_articles'];?>
		</article>
	</main>

	<footer>
		<span>Copyright 2020.</span>
	</footer>


</body>
</html>
