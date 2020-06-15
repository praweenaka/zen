<?php

session_start();
date_default_timezone_set('Asia/Colombo');
$Command = "";

if (isset($_GET['Command'])) {

    $Command = $_GET["Command"];
    include './connection_sql.php';
}


if ($Command == "CheckUsers") {

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    $UserName = $_GET["UserName"];
    $Password = $_GET["txtPasswords"];
//    $ResponseXML .= "<action><![CDATA[" . $_GET['action'] . "]]></action>";
//    $ResponseXML .= "<form><![CDATA[" . $_GET['form'] . "]]></form>";
    $sql = "SELECT * FROM user_mast WHERE email =  '" . $UserName . "' and password =  '" . md5($Password) . "' ";   
    $result = $conn->query($sql);

    if ($row = $result->fetch()) {
//        if (true) {

        $sessionId = session_id();
        $_SESSION['sessionId'] = session_id();
        session_regenerate_id();
        $ip = $_SERVER['REMOTE_ADDR'];
        $_SESSION['UserName'] = $row['user_name']; 
        $_SESSION['User_Type'] = $row['user_type'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['CURRENT_USER'] = $UserName;
    

        $action = "ok";
        $cookie_name = "user";
        $cookie_value = $UserName;
        //setcookie($cookie_name, $cookie_value, time() + (43200)); // 86400 = 1 day

        $token = substr(hash('sha512', mt_rand() . microtime()), 0, 50);
        $extime = time() + 43200;


        $domain = $_SERVER['HTTP_HOST'];

// set cookie

        setcookie('user', $cookie_value, $extime, "/", $domain);


        $ResponseXML .= "<stat><![CDATA[" . $action . "]]></stat>";
        echo $action;


        $time = mktime(date('h'), date('i'), date('s'));
        $time = date("g.i a");
        $today = date('Y-m-d');
    } else {
        $action = "not";
        $ResponseXML .= "<stat><![CDATA[" . $action . "]]></stat>";
        $ResponseXML .= "</salesdetails>";
        echo $ResponseXML;
    }
}



if ($_GET["Command"] == "save_inv") {
    try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->beginTransaction();
     
            $sql = "select * from user_mast where email='" . $_GET["email"] . "'";
            $result = $conn->query($sql);
            if ($row1 = $result->fetch()) {
                echo "User Found !!!";
            } else {
                $sql = "insert into user_mast(user_name,email,password,tel,user_type,address,location,postalcode,skill) values ('" . $_GET["name"] . "', '" . $_GET["email"] . "', '" . md5($_GET["pass"]) . "', '" . $_GET["phone"] . "', '" . $_GET["acctype"] . "', '" . $_GET["address"] . "', '" . $_GET["location"] . "', '" . $_GET["postcode"] . "', '" . $_GET["skill"] . "')";
                $result = $conn->query($sql);

                $sql2 = "SELECT * from  doc where  auto='auto'"; 
                foreach ($conn->query($sql2) as $row2) {
                     $sql3 = "insert into userpermission(username, grp, docid, doc_view) values  ('" . $_GET["email"] . "', '" . $row2["grp"] . "', " . $row2["docid"] . ", '1')";
                     $result3 = $conn->query($sql3);
                }
                $conn->commit();
                echo "Saved";
            }
         } catch (Exception $e) {
            $conn->rollBack();
            echo $e;
         } 
}

if ($Command == "logout") {

    $today = date('Y-m-d');
    $domain = $_SERVER['HTTP_HOST'];
    setcookie('user', "", 1, "/", $domain);



    session_unset();
    session_destroy();
}

 
?>
