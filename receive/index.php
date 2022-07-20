<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../phplibs/phpmailer/src/Exception.php';
require '../../phplibs/phpmailer/src/PHPMailer.php';
require '../../phplibs/phpmailer/src/SMTP.php';

$secret_key = 'jTC8NirLvH552ROGU5R6OYEK';

$sha1 = sha1($_POST['notification_type'] . '&' . $_POST['operation_id'] . '&' . $_POST['amount'] . '&643&' . $_POST['datetime'] . '&' . $_POST['sender'] . '&' . $_POST['codepro'] . '&' . $secret_key . '&' . $_POST['label']);

if ($sha1 != $_POST['sha1_hash']) {

    exit();
}

// $_POST['operation_id'] - номер операция
// $_POST['amount'] - количество денег, которые поступят на счет получателя
// $_POST['withdraw_amount'] - количество денег, которые будут списаны со счета покупателя
// $_POST['datetime'] - тут понятно, дата и время оплаты
// $_POST['sender'] - если оплата производится через Яндекс Деньги, то этот параметр содержит номер кошелька покупателя
// $_POST['label'] - лейбл, который мы указывали в форме оплаты
// $_POST['email'] - email покупателя (доступен только при использовании https://)

$email = $_POST['email'];
$phone = $_POST['phone'];

$mail = new PHPMailer(true);

try {
    $mail->CharSet = 'utf-8';
    $mail->isSMTP();
    $mail->Host = 'ssl://smtp.yandex.ru';
    $mail->SMTPAuth = true;
    $mail->Username = 'yodiz.school@yandex.ru';
    $mail->Password = 'rjxwkyyfjnhctszy';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 465;

    $mail->setFrom('yodiz.school@yandex.ru', 'Yodiz School');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Ваша ссылка на марафон';
    $mail->Body = '';
    if ($email) {
        $mail->Body .= "<p>Как и обещали, ссылка на марафон: https://lk.yodizschool.ru/marafon_before/</p>";
    }

    var_dump($mail->send());

    echo "Done!";
} catch (Exception $e) {
    echo 'Произошла ошибка. Error: ', $mail->ErrorInfo;
}

try {
    $mail->CharSet = 'utf-8';
    $mail->isSMTP();
    $mail->Host = 'ssl://smtp.yandex.ru';
    $mail->SMTPAuth = true;
    $mail->Username = 'yodiz.school@yandex.ru';
    $mail->Password = 'rjxwkyyfjnhctszy';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 465;

    $mail->setFrom('yodiz.school@yandex.ru', 'Yodiz School');
    $mail->addAddress('kmarx5959@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Успешная оплата марафона';
    $mail->Body = '';
    if ($_POST['email']) {
        $mail->Body .= "<p>Успешная оплата марафона.</p><p>Email: $email</p><p>Телефон: $phone</p>";
    }

    var_dump($mail->send());

    echo "Done!";
} catch (Exception $e) {
    echo 'Произошла ошибка. Error: ', $mail->ErrorInfo;
}

exit();
