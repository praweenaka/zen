<?php

session_start();
date_default_timezone_set('Asia/Colombo');
require_once('connectioni.php');

if ($_GET["Command"] == "save") {

    $sql = "delete from user_mast where email = '" . $_GET['usn'] . "'";
    $results = mysqli_query($GLOBALS['dbinv'], $sql);

    $sql = "insert into user_mast(email,password,user_depart) values ('" . $_GET["usn"] . "', '" . md5($_GET["psw"]) . "', '" . $_GET["creditCombo"] . "')";
    echo $sql;
    $results = mysqli_query($GLOBALS['dbinv'], $sql);

    if (!$results) {
        echo "not saved";
    } else {
        $time_now = mktime(date('h') + 5, date('i') + 30, date('s'));
        $time = date('h:i:s', $time_now);
//    $today = date('Y-m-d');
//    setcookie("user", "", time(),"/");
// test
        $today = date('Y-m-d');
        $domain = $_SERVER['HTTP_HOST'];
        setcookie('user', "", 1, "/", $domain);

        session_unset();
        session_destroy();
        echo "saved";
    }
}
?>
