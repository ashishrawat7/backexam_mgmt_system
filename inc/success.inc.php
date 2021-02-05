<?php
require_once("common/error.php");
require_once('class/class.inc.php');

$sqli_query = new SqlIQuery();
$sqli_query->isLogIn();
//$sqli_query->isAdmin();
$notifications = $sqli_query->getAllNotifications();

