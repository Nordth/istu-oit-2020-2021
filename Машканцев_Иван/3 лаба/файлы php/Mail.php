<?php
if (!empty($_POST['title'])) $name = substr(htmlspecialchars(trim($_POST['title'])), 0, 50);
if (!empty($_POST['phone'])) $phone = substr(htmlspecialchars(trim($_POST['phone'])), 0, 12);
if (!empty($_POST['email'])) $email = substr(htmlspecialchars(trim($_POST['email'])), 0, 100);
if (!empty($_POST['mess'])) $text = substr(htmlspecialchars(trim($_POST['mess'])), 0, 1000);
?>

<?php
$back = "<p><a href=\"javascript: history.back()\">��������� �����</a></p>";
if(isset($name,$phone,$email,$text)) {
  $subject = "����� �������� �����";
  $message = "���: ".$name."<br>�������: ".$phone."<br>�����: ".$text."<br>";
  $emailto = $email;
  $emailfrom = "ololovish@mail.ru";
  $chek = mail($emailto, $subject, $message, "Content-type:text/html;\r\nFrom:".$emailfrom."\r\n");
  if($chek) echo "���� ������ ������� ����������!<br>$back</br>";
  else echo "���� ������ �� ����������!<br>$back</br>";
}
else {
  echo "�� ��������� �� ��� ����!<br>$back</br>";
}
?>
