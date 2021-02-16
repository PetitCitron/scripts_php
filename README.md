# Ensemble de petits script et utilitaires PHP

Les scripts appellents souvent des commandes linux.
Cela m'évites de coder en bash que j'aime pas et j'ai remplacé python par php pour tous mes usages donc aussi l'admin sys.

## OldSchool Brutal Dev

Pour le pro et les gros projets le code doit être propre, structuré et respecter les Bests Practices.

Pour le perso, l'utile :

* le moins de lib et dépendance possible
* le plus simple possible 
* les scripts sont brutaux, efficaces, autonomes à l'ancienne



## Scripts :

* [changement_extension_fichier_en_masse.php](https://github.com/PetitCitron/scripts_php/blob/main/changement_extension_fichier_en_masse.php) : Remplacer rapidement et de façon recursive toutes les extensions des fichiers d'un dossier et ses sous-dossiers.
* [test_de_mail.php](https://github.com/PetitCitron/scripts_php/blob/main/test_de_mail.php) : Tester rapidement l'envoi d'un mail depuis PHP.
* [installateur_universel_d_application_zippee.php](https://github.com/PetitCitron/scripts_php/blob/main/installateur_universel_d_application_zippee.php) : Permet d'installer n'importe qu'elle application PHP au format .zip sur son hébergement sans utiliser FTP, ni SSH.