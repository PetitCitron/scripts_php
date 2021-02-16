<?php
/**
 * Script pour rapidement renommer les extensions de fichiers
 * d'un repertoire et des ses sous-repertoires.
 *
 *
 * Utilise la commande linux "find"
 *
 * Utilisation :
 *      copier changement_extension_fichier_en_masse.php dans le repertoire où renommer les fichiers
 *      éditer les variables $old et $new
 *      php7.4 changement_extension_fichier_en_masse.php
 */

$old = '.txt';
$new = '.md';
//--------------------------------------------------------------
$files = [];
exec('find ./ -name "*'. $old . '"', $files);
$root = $_SERVER['PWD'] . '/';
print "Starting renaming all $old into $new\n";
foreach ($files as $fctp) {
    $info = pathinfo($fctp);
    $src = $root . $fctp;
    $dest =  $root . $info['dirname'] . '/' . $info['filename'] . $new;
    print 'move : ' . $src . "\n";
    print 'to : ' . $dest . "\n";
    copy($src, $dest);
    if(file_exists($dest)) {
        print "move [OK] \n";
    } else {
        print "move [KO] \n";
    }
    unlink($src);
    if(file_exists($src)) {
        print "delete [KO] \n";
    } else {
        print "delete [OK] \n";
    }
}
