<?php

session_start();


require_once ("connection_sql.php");

header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');
 
  

if ($_GET["Command"] == "pass_data") {

    $_SESSION["custno"] = $_GET['custno'];

    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
     $ResponseXML .= "<sales_table><![CDATA[ <table class=\"table\"> 
     <tr class=\"headings\" style=\"background-color: #405467;color: white\">
                                    <th width=\"500PX;\">Provider Name</th>
                                    <th width=\"500PX;\">Telephone Number</th> 
                                    <th width=\"500PX;\">Location</th> 
                                    <th width=\"500PX;\">Skill</th>
                                    <th width=\"500PX;\">Address</th> 
                                    <th width=\"500PX;\">Postal Code</th>
                                    <th width=\"500PX;\">Email</th> 
                                    <th width=\"500PX;\">Status</th>
                                </tr>";
     
    if($_GET["selectStatus"]!="All"){
        $sql = "SELECT * from user_mast where  status='".$_GET["selectStatus"]."' and user_type='SERVICE PROVIDER'";
    }else{
        $sql = "SELECT * from user_mast where   user_type='SERVICE PROVIDER'";
    }

    $sql.=   "order by id desc";
 
    $i = 1;
    foreach ($conn->query($sql) as $row) {
        $ResponseXML .= "<tr>
                              <td style=\"color: #405467;padding-top:20px\" width=\"500px;\">" . $row['user_name'] . "</a></td>
                              <td style=\"color: #405467;padding-top:20px\" width=\"500px;\">" . $row['tel'] . "</a></td> 
                              <td style=\"color: #405467;padding-top:20px\" width=\"500px;\">" . $row['location'] . "</a></td> 
                              <td style=\"color: #405467;padding-top:20px\" width=\"500px;\">" . $row['skill'] . "</a></td> 
                              <td style=\"color: #405467;padding-top:20px\" width=\"500px;\">" . $row['address'] . "</a></td> 
                              <td style=\"color: #405467;padding-top:20px\" width=\"500px;\">" . $row['postalcode'] . "</a></td> 
                              <td style=\"color: #405467;padding-top:20px\" width=\"500px;\">" . $row['email'] . "</a></td>";
                                  
                              if($_GET["selectStatus"]=="Approval"){
                                 $ResponseXML .= "<td width=\"500px;\"><a id=" . $row['id'] . " style=\"width:100%\" class=\"btn btn-danger btn-xs\"  onClick=\"reject('" . $row['id'] . "');\"><span  >Reject</a></td> 
                                                   "; 
                              }else if($_GET["selectStatus"]=="Pending"){
                                 $ResponseXML .= "<td width=\"500px;\"><a id=" . $row['id'] . " style=\"width:100%\" class=\"btn btn-primary btn-xs\"  onClick=\"approve('" . $row['id'] . "');\"><span  >Approval</a><br><a id=" . $row['id'] . " style=\"width:100%\" class=\"btn btn-danger btn-xs\"  onClick=\"reject('" . $row['id'] . "');\"><span  >Reject</a></td> 
                               ";  
                                 
                              }else{
                                 $ResponseXML .= "<td style=\"color: #405467;\" width=\"500px;\">" . $row['status'] . "</a></td>";
                              }
        $ResponseXML .= "</tr>";
    }
    $ResponseXML .= "   </table>]]></sales_table>";
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}

 
 

if ($_GET["Command"] == "approve") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sqlinv = "select * from user_mast where id='" . $_GET["id"] . "' ";
        $resultinv = $conn->query($sqlinv);
        if ($rowinv = $resultinv->fetch()) {
 
            $sql = "UPDATE user_mast set status='Approval' where id='" . $_GET['id'] . "'";
            $result = $conn->query($sql);
 
            $conn->commit();
            echo "Approve";
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "reject") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sqlinv = "select * from user_mast where id='" . $_GET["id"] . "' ";
        $resultinv = $conn->query($sqlinv);
        if ($rowinv = $resultinv->fetch()) {
 
            $sql = "UPDATE user_mast set status='Rejected' where id='" . $_GET['id'] . "'";
            $result = $conn->query($sql);
 
            $conn->commit();
            echo "Reject";
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}
?>