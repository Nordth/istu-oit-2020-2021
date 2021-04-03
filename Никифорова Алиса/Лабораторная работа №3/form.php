<?php
if (!empty($_POST['theme']) && !empty($_POST['email']) && !empty($_POST['message'])) {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $to = "mayink@gmail.com"; //почта адресата 
        $subject = "Тема сообщения: ".$_POST['theme']."<br>";//полученное из формы theme
        $email = "E-mail: ".$_POST['email']."<br>"; //полученное из формы email
        $text = "Сообщение: ".$_POST['message']."<br>"; //полученное из формы message
        $message = $email . $text;
    
        $mail = mail($to, $subject, $message);
    } else {
        echo "Адрес указан не правильно.";
        exit;
    }
    echo "Сообщение успешно отправлено";
} else {
    echo "Заполните все поля!";
}
?>

