
<?php
if(isset($_POST['mailform'])) {
   if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message'])) {
      $header="MIME-Version: 1.0\r\n";
      $header.='From:"nom_d\'expediteur"<votre@mail.com>'."\n";
      $header.='Content-Type:text/html; charset="uft-8"'."\n";
      $header.='Content-Transfer-Encoding: 8bit';
      $message='
      <html>
         <body>
            <div align="center">
           
               <u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
               <u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
               <br />
               '.nl2br($_POST['message']).'
          
            </div>
         </body>
      </html>
      ';
      mail("alainmerucci@gmail.com", "Sujet du message", $message, $header);
      $msg="Votre message a bien été envoyé !";
   } else {
      $msg="Tous les champs doivent être complétés !";
   }
}
?>

<html>
   <head>
      <meta charset="utf-8" />
   </head>
   <body>
      <h2>Formulaire de contact !</h2>
      <form method="post" action="#contact">
<div class="fields">
<div class="field half">
<label for="name">Name</label>
<input type="text" name="name" id="name" />
</div>
<div class="field half">
<label for="email">Email</label>
<input type="email" name="email" id="email" />
</div>
<div class="field">
<label for="message">Message</label>
<textarea name="message" id="message" rows="4"></textarea>
</div>
</div>
<ul class="actions">
<li><input type="submit" value="Envoyer" class="button primary" /></li>
</ul>
<?php
if(isset($_POST['message'])){
$entete = 'MIME-Version: 1.0' . "\r\n";
$entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$entete .= 'From: ' . $_POST['email'] . "\r\n";

$message = '<h1>Message envoyé depuis la page Contact</h1>
<p><b>Nom : </b>' . $_POST['name'] . '<br>
<b>Email : </b>' . $_POST['email'] . '<br>
<b>Message : </b>' . $_POST['message'] . '</p>';

$retour = mail('nasser.39@hotmail.fr', 'Envoi depuis page Contact', $message, $entete);
if($retour) {
echo '<p>Votre message a bien été envoyé.</p>';
}
}
?>
</form>
</div>
      <?php if(isset($msg)) {
         echo $msg;
      }
      ?>
   </body>
</html>


