<html>
<head>
    <meta charset="Windows-1251">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сайт молодого художника</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
	<?php
		$back = "<p><a href=\"javascript: history.back()\"><div style = '
		width: 100%;
		border: none;
		background: #FA8072;
		color: #fff;
		text-transform: uppercase;
		text-align: center;
		margin-top: 20px;
		'>Назад<div></a></p>";
		if(!empty($_POST['name']) and !empty($_POST['tema']) and !empty($_POST['email']) 
			and !empty($_POST['comment'])){
                $headers =  'From: myainsworth7@gmail.com'; 
                $tema = $_POST['tema'];
				$name = $_POST['name'];
				$mail = $_POST['email'];
				$message = $_POST['comment'];
				mail('oksana.koshina666@gmail.com', 'Сообщение с сайта', 'Тема: '.$tema.'<br />
					Отправитель: '.$name.'<br />Его почта: '.$mail.'<br />
					Его комментарий: '.$message, 'Content-type: text/html; charset=Windows-1251', $headers );
	 
				echo "<div style = '
					margin-top: 50px;text-align: center; background: 
					color: green;'><H3>Отправленно! Если письмо не пришло, ожидайте, пожайлуйста.</H3></div>$back";
				exit;
		}  
			else {
				echo "<div style = 'margin-top: 50px; text-align: center;
					color: red;'><H3>ЗАПОЛНИТЕ ВСЕ ПОЛЯ!</H3> $back</div>";
				exit;
			}
	?>
</body>
</body>
</html>
