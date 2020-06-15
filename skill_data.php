<?php

session_start();


require_once ("connection_sql.php");

header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');
 

if ($_GET["Command"] == "save") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from skill where   skill_name  = '" . $_GET['skill_name'] . "' and status='Active' and cancel='0' ";
        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {
            exit("Already Saved Skill...!!!");
        }
 
        $sql = "insert into skill(skill_name, status,datetime,user) values
                ('" . $_GET ['skill_name'] . "','active','" . date("Y-m-d H:i:s") . "','" . $_SESSION["CURRENT_USER"] . "')";

        $result = $conn->query($sql);
 
        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

 

if ($_GET["Command"] == "pass_data") {

    $_SESSION["custno"] = $_GET['custno'];

    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    $ResponseXML .= "<sales_table><![CDATA[ <table class=\"table\"> ";
    $cuscode = $_GET["custno"];

    $sql = "SELECT * from skill where  status='Active' and cancel='0' order by id desc";

    $i = 1;
    foreach ($conn->query($sql) as $row) {
        $ResponseXML .= "<tr>
                              <td width=\"500px;\">" . $row['skill_name'] . "</a></td>  
                              <td width=\"500px;\"><a id=" . $row['id'] . "  name=" . $row['skill_name'] . " class=\"btn btn-danger btn-xs\"  onClick=\"del_item('" . $row['id'] . "');\"><span  >Remove</a></td>    
                  </tr>"; 
    }
    $ResponseXML .= "   </table>]]></sales_table>";
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}

 
 

if ($_GET["Command"] == "del_item") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sqlinv = "select * from Skill where id='" . $_GET["id"] . "' ";
        $resultinv = $conn->query($sqlinv);
        if ($rowinv = $resultinv->fetch()) {
 
            $sql = "UPDATE Skill set cancel='1' where id='" . $_GET['id'] . "'";
            $result = $conn->query($sql);
 
            $conn->commit();
            echo "Cancel";
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}
?>