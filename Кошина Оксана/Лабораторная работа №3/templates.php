<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сайт молодого художника</title>
    <link rel="stylesheet" href="style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() != 0) {
                    $('#toTop').fadeIn();
                } else {
                    $('#toTop').fadeOut();
                }
            });
            $('#toTop').click(function () {
                $('body,html').animate({ scrollTop: 0 }, 800);
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <header>
            <div align="right">
                +7-912-440-97-23
            </div>
            <a href="http://localhost/lab3/index.php?page=0">
                <img src="img/logo.jpeg" width="100" height="100">
            </a>
        </header>

        <nav>
            <ul style="list-style-type: none; margin:0; padding: 0;">
               	<?php foreach($pages as $page): ?>
				<?php echo sprintf('<a class="site-menu-item" href="%s">%s</a><br>', 'index.php?page=' . $page['id_articles'], $page['title_articles']); ?>
				<?php endforeach; ?>
            </ul>
        </nav>

        <main>
        <?php $data = getPage($_GET['page']);?>
        <h1><?php echo $data["title_articles"];?></h1>
        <?php if ($_GET['page'] == 0): ?> 



            <h2 align="center" style="margin: 20px">Сайт молодого художника</h2>
            <div class="imgtop"><img src="<?php echo $data["img_articles"] ?>" /></div>
            <p>
                Этот сайт создан для того, чтобы посетители и прочие заинтересованные лица могли заказать работу @lord_dantalion.
            </p>
            <p>
                Ниже представлен прайс-лист с различными услугами.
            </p><p>
                Ознакомившись с расценкой и определившись с заказом, нажмите Заказать и заполните форму.
            </p>
            <table cellspacing="0" border="1" align="center" cellpadding="3">
                <caption>Пейзаж</caption>
                <tr>
                    <td>Материал</td>
                    <td>20х40</td>
                    <td>40х60</td>
                    <td>100х160</td>
                    <td>Другой размер</td>
                </tr>
                <tr>
                    <td>Масло</td>
                    <td>1200 руб.</td>
                    <td>3200 руб.</td>
                    <td>7500 руб.</td>
                    <td>Договорная цена</td>
                </tr>
                <tr>
                    <td>Акврель</td>
                    <td>600 руб.</td>
                    <td>2000 руб.</td>
                    <td>6800 руб.</td>
                    <td>Договорная цена</td>
                </tr>
                <tr>
                    <td>Графика</td>
                    <td>1000 руб.</td>
                    <td>2500 руб.</td>
                    <td>10000 руб.</td>
                    <td>Договорная цена</td>
                </tr>
                <tr>
                    <td>Смешанная техника</td>
                    <td>1600 руб.</td>
                    <td>4000 руб.</td>
                    <td>12000 руб.</td>
                    <td>Договорная цена</td>
                </tr>
            </table>
            <?php elseif ($_GET['page'] == 1): ?>
            <br>
            <ul>
                <li>Заказ выполняется от суток до месяца в зависимости от размера заказа</li>
                <li>Предоплата 50%</li>
                <li>Возможны корректировки в процессе выполнения работы</li>
            </ul>
            <br>
            <ol>
                <li>Выберите интересующую Вас услугу.</li>
                <li>Оформите заявку.</li>
                <li>Ожидайте ответ на отправленную заявку.</li>
            </ol>
            <br>
            <button id="show" style="position:relative; left:50%;">Заказать</button>
            <div id="fade" class="black-overlay"></div>
            <br>
            <div class="content-image">
                <img src="<?php echo $data["img_articles"] ?>" />
            </div>
            <br>
            <p>Можете связаться с автором с помощью следующих ресурсов:</p>
            <p>oksana.koshina666@gmail.com</p>
            <p><a href="https://vk.com/oksana_koshina">vk</a></p>
            <p><a href="https://www.instagram.com/lord_dantalion/">instagram</a></p>
			<br>
            <?php else: ?>
			<form class="form" action = "mail.php" method = "post" onSubmit="return checkForm(this)">
				<h2>Свяжитесь с нами!</h2>
				<div class = "left" >
					<p class="label">Тема</p>
					<input type = "text" name = "tema"></input>
					<p class="label">ФИО</p>
					<input type = "text" name = "name">
					<p class="label">Электронная почта</p>
					<input type = "text" name = "email"> 
					<p class="label">Ваш комментарий</p>
					<textarea name='comment' rows="10" cols="45"></textarea><br>
					<input type = "submit" value = "Отправить!"/> </div>
			</form>
            <?php endif; ?>
        </main>
        <footer>
            Coopyright 2020
        </footer>
    </div>
    <dialog>
        <p>
            <input type="text" name="name" placeholder="Имя" required /><br>
            <input type="email" name="name" placeholder="E-mail" required />
            <input type="tel" name="name" placeholder="Телефон" required /><br>
            <input type="text" name="name" placeholder="Описание заказа" required /><br>
        </p>
        <button id="send">Отправить</button>
        <button id="close">Закрыть</button>
    </dialog>
	
	
    <script type=text/javascript>
    var dialog = document.querySelector('dialog'); 
    document.querySelector('#show').onclick = function () { dialog.showModal(); }; 
    document.querySelector('#close').onclick = function () { dialog.close(); };</script>
    <DIV ID="toTop"> Наверх </DIV>

</body>
</html>
	
