<!DOCTYPE html>
<html>
	<head>
		<title> PNTDFRND Shelliinian </title>
		<style>
			body {
			margin: 0px;
			}
			.site {
				display: block;
			}
			.site-left {
				flex: 1;
			}
		.site-body {
			display: block;
			width: 1024px;
			border: 1px solid blue;
			margin: 0 auto;
			height: auto;
			background: white;
		}
		.site-right {
			flex: 1;
		}
		nav {
			float: right;
			width: 20%;
			display: grid;
			grid-template-columns: 1fr;
			grid-template-columns: 1fr;
			grid-template-columns: 1fr;
		}
		.numbers {
			text-align: right;
			flex: 1;
			padding: 15px;
		}
		.nav-a {
			text-align: center;
			border: 1px solid blue;
		}
		.nav-a:hover {
			background: blue;
			cursor: pointer;
		}
		a:visited {
			color: red;
		}
		a:hover {
			color: #800080;
		}
		header {
			display: block;
			height: 80px;
			background: linear-gradient(to top, #ffffff, #a431de);
		}
		footer {
			display: block;
			height: 60px;
			background: linear-gradient(to bottom, #ffffff, #a431de);
			text-align: center;
			margin-bottom: 0px;
		}
		a {
			text-decoration: none;
		}
		.img-text {
			width: 150px;
			height: 120px;
			border: 1px solid black;
			padding: 5px transparent;
			float: right;
			background-size: contain;
			background-image: url("<?php echo $data['img_articles'];?>");
		}
		.logo {
			float: left;
			width: 70px;
			height: 70px;
		}
		#gallery{
			width: 300px;
			margin: 0 auto;
			text-align: center;
		}
		#gallery .photos{
			position: relative;
			height: 300px;
		}
		#gallery .photos img{
			width: 100%;
			position: absolute;
			left: 0;
			opacity: 0;
		}
		#gallery .photos img.showed{
			opacity: 1;
		}
		.dropbtn {
			display:none;
		}
		</style>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	
	<body>
	
	<header>
		<div class="site-body">
		<a href="http://paintedfriend.life">
		<img src="https://upload.wikimedia.org/wikipedia/commons/f/f2/Paintedfriend.png" class="logo"> </a>
		<div class="numbers">
		<br>
		Телефон: +7(950)815-58-14, +7(912)750-60-15
		</div>
		</div>
	</header>
	
	<div class="site">
		<div class="site-left"></div>
		<div class="site-body">
		<div class="dropdown">
			<button onclick="myFunction()" class="dropbtn">Меню</button>
			<nav id="myDropdown" class="dropdown-content">
				<div class="nav-a">
					<a href="">Меню 1</a>
				</div>
				<div class="nav-a">
					<a href="">Меню 2</a>
				</div>
				<div class="nav-a">
					<a href="">Меню 3</a>
				</div>
			</nav>
		</div>
		<script>
			function myFunction() {
				document.getElementById("myDropdown").classList.toggle("show");
			}

			window.onclick = function(event) {
				if (!event.target.matches('.dropbtn')) {
					var dropdowns = document.getElementsByClassName("dropdown-content");
					var i;
					for (i = 0; i < dropdowns.length; i++) {
						var openDropdown = dropdowns[i];
						if (openDropdown.classList.contains('show')) {
							openDropdown.classList.remove('show');
						}
					}
				}
			}
		</script>	
		
			
		<section>
			<div class="soderzh">
				<h1 align="center"><?php echo $data['title_articles'];?></h1>
				<img class="img-text">
				<?php echo $data['text_articles'];?>
			</div>
		</section>
				
		<footer>
			"Искусство - это попытка создать рядом с реальным миром другой, более человечный мир."
			- Андре Моруа
			<br>
			<?php echo $string; ?>
		</footer>
			
		<div class="site-right">
		</div>
		
	</body>
	 
</html>