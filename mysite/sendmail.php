<?php
  session_start();
  $mailResult = "";
  $conditionAdd = true;

  require_once( $_SERVER['DOCUMENT_ROOT'].'mysite/include/PHPMailer/src/PHPMailer.php' );
  require_once( $_SERVER['DOCUMENT_ROOT'].'mysite/include/PHPMailer/src/SMTP.php' );
  require_once( $_SERVER['DOCUMENT_ROOT'].'mysite/include/PHPMailer/src/Exception.php' );

  $conditionMain = isset($_POST['mailSubmit']);

  if ($conditionMain) {

    $conditionAdd = (md5($_POST['mailCaptcha']) === $_SESSION['randomNumber']);
    if ($conditionAdd) {
      $messageEmail = htmlentities($_POST['mailEmail']);
      $messageName = htmlentities($_POST['mailName']);
      $messageMessage = htmlentities($_POST['mailMessage']);

      $mail = new PHPMailer\PHPMailer\PHPMailer();
  
      $mail->IsSMTP();
      $mail->Host       = "smtp.gmail.com";
      $mail->SMTPAuth   = true;
      $mail->SMTPSecure = "ssl";
      $mail->Port   = 465;
      $mail->CharSet    = 'UTF-8';
  
      $mail->Username = 'lasyartsemy01';
      $mail->Password = '*************************';
      $mail->SetFrom('lasyartsemy01@gmail.com', 'Сайт про настольные игры');
      $mail->Subject  = "Настольня";
      $mail->MsgHTML($messageMessage);
  
      $mail->AddAddress($messageEmail, $messageName);
  
      if ($mail->Send()) {
        $mailResult = "Письмо отправлено";
      } 
      else {
        $mailResult = 'Ошибка';
      }
    }
  }