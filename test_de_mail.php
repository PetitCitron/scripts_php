<?php
/**
 * Tester rapidement la fonction mail de PHP
 *
 * Utilisation :
 *      éditer les variables $from et $to
 *      php7.4 test_de_mail.php
 */
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

$from = "de@example.com";
$to = "pour@example.com";
$subject = "TEST Mail via PHP";
$message = "CORPS DU MAIL";
$headers = "De :" . $from;
mail($to,$subject,$message, $headers);
print 'L\'email a été envoyé.';