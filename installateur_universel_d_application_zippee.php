<?php
/**
 * Permet de télécharger (via curl) et installer n'importe qu'elle application PHP
 * sur son hébergement. Du moment qu'elle est distribuée en .zip.
 *
 * Permet d'installer rapidement une application sans utiliser FTP, ni SSH.
 *
 * Utilisation :
 *      copier le script à la racine où vous voulez installer l'application
 *      éditer la variable $url pour poitner le .zip à installer
 *      appeler l'url https://monsite.toto/installateur_universel_d_application_zippee.php
 *      supprimer installateur_universel_d_application_zippee.php après l'installation
 *
 */
$url = "https://github.com/MaSuperApplication/releases/download/v0.12.1/masuperApplication-v0.12.1-full.zip";
$to = 's.zip';
// -------------------------------
set_time_limit(0);
// File to save the contents to
$fp = fopen($to, 'w+');
$ch = curl_init(str_replace(" ", "%20", $url));
curl_setopt($ch, CURLOPT_TIMEOUT, 50);
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$data = curl_exec($ch);//get curl response
curl_close($ch);
// extraction
$zip = new ZipArchive;
$file = $to;
$path = pathinfo(realpath($file), PATHINFO_DIRNAME);
$res = $zip->open($to);
if ($res === true) {
    // extract it to the path we determined above
    $zip->extractTo($path);
    $zip->close();
    echo "Nickel ! $file installation OK $path";
}
else {
    echo "Oups ! impossible d'ouvrir : $file";
}