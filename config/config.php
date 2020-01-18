<?php
// ************************************************************************************//
// * User Control Panel ( UCP ) >> PDO Edition <<
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 1.1
// * 
// * Copyright (c) 2020 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: Creative Commons licenses
// ************************************************************************************//

// ************************************************************************************//
// * MySQL Database Connection
// ************************************************************************************//
define('MYSQL_USER', 'xxx');
define('MYSQL_PASSWORD', 'xxx');
define('MYSQL_HOST', 'localhost');
define('MYSQL_DATABASE', 'xxx');
 
// ************************************************************************************//
// * Default Language Section - Main 
// ************************************************************************************//
define("SITETITLE","DESTINY-LIFE | UCP");
define("PROJECTNAME","Destiny-Life");
define("DASHBOARD","Dashboard");
define("RULES","Regelwerk");
define("USERPROFILE","User Profil");
define("USERPROFILECHANGE","User Profil bearbeiten");

// ************************************************************************************//
// * Default Language Section - Footer
// ************************************************************************************//
define("DISCORD","https://discord.gg/cGf73tD");
define("TEAMSPEAK","ts3server://ts3.destiny-life.ml?port=9987");
define("IMPRINT","https://destiny-life.ml/impressum.html"); 

// ************************************************************************************//
// * PDO options / configuration details.
// ************************************************************************************// 
$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

// ************************************************************************************//
// * Connect to MySQL and instantiate the PDO object.
// ************************************************************************************//  
$pdo = new PDO(
    "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE, //DSN
    MYSQL_USER, //Username
    MYSQL_PASSWORD, //Password
    $pdoOptions //Options
);
?>
