<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Academy of arts</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <header class="header">
        <div class="header__content">
            <a href="?id=0">
                <img class="header__logo" src="img/header/logo.png" />
            </a>
            <nav class="header__menu">
                <ul class="header__list">
                    <?php 
                        if(!isset($_GET['id'])) 
                $_GET['id'] = 0;
            $pages = getNav();
                        foreach ($pages as $page): ?> 
                        <li class="header__item">
                            <a class="header__link" href="?id=<?php echo $page["id_articles"] ?>">
                                <?php echo $page["title_articles"]; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <?php $data = getPage($_GET['id']); ?>
        <section class="main__start content">
            <h1 class="start__title"><?php echo $data["title_articles"] ?></h1>
            <div class="start__content">
                <div class="start__paragraphs">
                    <p class="start__text"> 
                        <?php echo $data["text_articles"] ?>
                    </p>
                </div>
                <img class="start__pic" src="<?php echo $data["img_articles"] ?>" />
            </div>
        </section>

        <?php if($_GET['id'] == 2): ?>
            <div class="main__form">
                <form class="form" action="form.php" method="post">
                    <input class="form__field" type="text" name="theme" placeholder="Тема сообщения">
                    <input class="form__field" type="text" name="email" placeholder="Обратный e-mail">
                    <textarea class="form__field message" name="message" placeholder="Введите ваше сообщение"></textarea>
                    <input  class="submit-button" type="submit" value="Отправить сообщение">
                </form>
            </div>
        <?php endif; ?>
    </main>

    <footer class="footer">
        <img class="footer__pic" src="img/header/logo.png" />
    </footer>

    <div class="scrollup">
        <img class="scrollup__pic" src="img/content/toUp.jpg" onclick="">
    </div>

    <script type="text/javascript" src="script.js"></script>

</body>
</html>
