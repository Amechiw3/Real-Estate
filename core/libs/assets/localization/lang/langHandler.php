<?php
error_reporting(0);
session_start();
if($_SESSION) {
    if(isset($_SESSION["lang"]) AND $_SESSION["lang"] != "") {
        $lang = $_SESSION["lang"];
    } else {
        $lang = "en";
    }
} else {
    $lang = "es";
}

switch($lang) {
    case "en":
        if(is_file(include("views/lang/en.php"))) {
            include("views/lang/en.php");
        } else {
            include("views/lang/en.php");
        }
    break;
    default:
        if(is_file(include("views/lang/es.php"))) {
            include("views/lang/es.php");
        } else {
            include("views/lang/es.php");
        }
        
}
?>