<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "vendor/autoload.php";

function sendAttachedfile($to,$from,$subject,$body){

  $mail = new PHPMailer(true);
   $mail->SMTPDebug = 0;
  $mail->IsSMTP();

  $mail->Host = "ssl://smtp.ionos.com";

  $mail->SMTPAuth = true; 
  $mail->Username = "brightmailer@brightcodess.in"; // SMTP username
  $mail->Password = "Brightcode@123#"; // SMTP password 
  $mail->From="satyaki.bhattacharya@brightcodess.com";
  $mail->FromName="RAFIA's MAIL INTEGRATIONFILE";//$from;

  
  $mail->SMTPSecure = 'tls'; 
  $mail->Port = 465; //SMTP port
  $mail->addAddress('satyaki.bhattacharya@brightcodess.com', 'rafiapc');
  $mail->addAddress($to, $to);
  $mail->isHTML(true);
  $date=date("Y-m-d");
  $mail->Subject = $subject;
  $mail->Body =$body;
   try {
        $d=$mail->send();
        return true;
        }         
        catch (Exception $e) {
        return false;
     }
   }


if(isset($_POST['contact_sub'])){
    // echo "<pre>";
    // print_r($_POST);die;
    $fname = $_POST['rafia'];
    $lname = $_POST['lname'];
    // $mobile = $_POST['phone'];
    // $email = $_POST['email'];
    // $message1 = $_POST['message'];
    // $email = "afreennaqvi35@gmail.com";
    $to = "satyaki.bhattacharya@brightcodess.com"; 
    $subject = "Regarding Inquiry";
    $message = "rafia: ".$fname."<br>lname: ".$lname;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From:' .$email ."\r\n";
    if(sendAttachedfile($to,$email,$subject,$message)){
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Message send Succesfully');
            window.location.href='index.php';
            </script>");
        }
        else{
            echo ("<script LANGUAGE='JavaScript'>
    window.alert('Message not send ');
    window.location.href='index.php';
    </script>");
    }
}
?>