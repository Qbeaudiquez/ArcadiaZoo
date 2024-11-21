Créer un dossier pour accueillir l'application

A la racine du projet taper dans le terminal la commande git clone https://github.com/Qbeaudiquez/ArcadiaZoo

Installer serveur local comme Apache ainsi qu'une sgbd comme mysql

Transféré le contenue de la base de donné (fichier zoo_arcadia_new_backup.sql à la racine) dans votre base de donnée local

Transmetter les information de connexion a la base de donnée dans le fichier config/sql.php

Lancer l'application depuis le root : public/html/main/index.php