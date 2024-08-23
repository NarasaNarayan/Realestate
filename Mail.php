<?php

//use PHPMailer\PHPMailer\PHPMailer;

// ini_set('display_errors',1);
// require_once 'PHPMailInclude.php';
header("Access-Control-Allow-Origin: *");
require_once 'db.php';
// $mail=new PHPMailer();
// include 'demo.html';
if (isset($_POST['submit']))
    {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message=$_POST['message'];
        $query = "INSERT INTO contact_details(customername,email,enquiry,information) VALUES 
      ('$name','$email','$subject', '$message');";

         $result= mysqli_query($conn,$query);
         print_r($result);
$html=  "<table border=1px>
<tr>
<th>Name</th>
<td>$name</td>
</tr>
<tr>
<th>Email</th>
<td>$email</td>
</tr>
<tr>
<th>Subject </th>
<td>$subject</td>
</tr>
<tr>
<th>Message</th>
<td>$message</td>
</tr>

</table> ";
include('smtp/PHPMailerAutoload.php');
include('smtp/class.phpmailer.php');
$mail=new PHPMailer(true);
$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->Port=587;
$mail->SMTPSecure="tls";
$mail->SMTPAuth=true;
$mail->Username="lakshminarayan202254@gmail.com";
$mail->Password="gxnu hmyl fyag bchz";
$mail->setFrom('lakshminarayan202254@gmail.com');
$mail->isHTML(true);
$mail->addAddress('kesaratgiarpita@gmail.com');
$mail->addAddress('Info@crescenttechnosofts.com');
$mail->Subject="Customer Information";
$mail->Body=$html;


// $mail->SMTPOptions=array('ssl'=>array(
//     'verify_peer'=>false,
//     'verify_peer_name'=>false,
//     'allow_self_signed'=>false
// ));              
            //$Sent=mail($to, "Contact Us", $Msg, $headers);

            if ($mail->send()) {
                echo "<script type='text/javascript'> alert('We Will Soon Contact You!')</script>";
                // echo "<script>location.href='https://crescenttechnosofts.com/Demos'; </script>";
                exit;
            } else {
                echo "<script type='text/javascript'> alert('Please Try Again Later!')</script>";
                echo "<script> location.href='index.html'; </script>";
                exit;
            }
        }
    
    