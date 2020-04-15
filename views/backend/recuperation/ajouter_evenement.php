<?PHP
include "../../../entities/ev.php";
include "../../../core/Event_core.php";
include "../../../config.php";
include_once "../../../Nexmo/src/NexmoMessage.php" ;
require '../../../api/phpmailer/PHPMailerAutoload.php';
if (isset($_POST['id_ev']) and isset($_POST['nom_ev']) and isset($_POST['type']) and isset($_POST['validite']) and isset($_POST['validite1']) and isset($_POST['description_detaillee']) )
{  
	/*echo ($_POST['id']) ; 
	echo ($_POST['nom']) ;
	echo ($_POST['type']) ;
	echo ($_POST['validite']) ;
	echo ($_POST['validite2']) ;
	echo ($_POST['description_detaillee']);
	echo ($_POST['image_event']); */
	$lien="http://localhost/sbs/views/images/";
	$image_event=$lien.$_POST['image_event'];
	//echo $image_event;
	$evenement1 = new Evenement($_POST['id_ev'],$_POST['nom_ev'], $_POST['type'], $image_event,$_POST['validite'], $_POST['validite1'],$_POST['description_detaillee']);
	$evenement1_core = new Event_core();
	$evenement1_core->ajouter_evenement($evenement1);
	//$evenement1_core->afficher_evenement($evenement1);



	

/**
	 * To send a text message.
	 *
	 */

	// Step 1: Declare new NexmoMessage.
	$nexmo_sms = new NexmoMessage('23c6d6b1','rD3xKpujgm2qshJu');

	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	$info = $nexmo_sms->sendText( '21626022056', 'SBS informatique', 'Notre prochaine évènement '.$_POST['nom_ev'].', venez nombres' );
	var_dump($info);
	// Step 3: Display an overview of the message
	

	// Done!
	//nexmo




	//PhpMailer

$mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                 // Specify main and backup server
$mail->Port = 587;                                    // Set the SMTP port
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'adressesbs@gmail.com';                // SMTP username
$mail->Password = '23338836';                  // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->IsHTML(true);                                  // Set email format to HTML
$mail->AddEmbeddedImage($image_event, 'eventimage', $image_event);
$mail->AddAttachment( $image_event , 'event.jpeg' );
$mail->Subject = 'New Event';
$mail->Body    = "<strong>New Evens is added".$_POST['nom_ev']."</strong><br><img src=\"cid:eventimage\"><br><p>".$_POST['description_detaillee']."</p><br><p>Begins: ".$_POST['validite']." End: ".$_POST['validite1']."</p>";
$mail->AltBody = 'New Event';
$mail->From = 'no-reply@sbs.com';
$mail->FromName = 'sbs';
$clients=Event_core::getusers();
foreach ($clients as $client) {

	$mail->AddAddress($client['email']);  // Add a recipient

	if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
}

echo 'Message has been sent';

	header('Location: /sbs/views/backend/afficherevenement.php');
} else {
    echo "vérifier les champs";
}
	


header('Location: /SBS/views/backend/afficherevenement.php');


 ?>