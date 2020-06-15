<?php

session_start();


require_once ("connection_sql.php");

header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');
 
if ($_GET["Command"] == "save") {
 
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
 
        $sql = "SELECT * from orders where   id  = '" . $_GET['cid'] . "'"; 
        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {
            exit("Already Saved Order...!!!");
        }
        $sql1 = "SELECT * from  user_mast where  email='".$_GET['cid']."'"; 
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch();
 

        $sql = "insert into orders(des,cid,spid,skid,sdate) values
                ('" . $_GET ['des'] . "','" . $row1['id'] . "','" . $_GET ['spid'] . "','" . $_GET ['skid'] . "','" . $_GET ['sdate'] . "')";
 
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
    $ResponseXML .= "<sales_table><![CDATA[ <table class=\"table\"> 
     <tr class=\"headings\" style=\"background-color: #405467;color: white\">
                                    <th width=\"500PX;\">Customer</th>
                                    <th width=\"500PX;\">Choese Date</th> 
                                    <th width=\"500PX;\">Skill</th>
                                    <th width=\"500PX;\">Service Provide</th> 
                                    <th width=\"500PX;\">Status</th>
                                </tr>";
     if($_SESSION['User_Type']=="SERVICE PROVIDER"){
        if($_GET["selectStatus"]!="All"){
             $sql = "SELECT * from orders where  status='".$_GET["selectStatus"]."' and spid='".$_SESSION['id']."'";
        }else{
            $sql = "SELECT * from orders where spid='".$_SESSION['id']."'";
        }
     }else  if($_SESSION['User_Type']=="CUSTOMER"){
        if($_GET["selectStatus"]!="All"){
             $sql = "SELECT * from orders where  status='".$_GET["selectStatus"]."' and cid='".$_SESSION['id']."'";
        }else{
            $sql = "SELECT * from orders where cid='".$_SESSION['id']."'";
        }
     }else if($_SESSION['User_Type']=="ADMIN"){
        if($_GET["selectStatus"]!="All"){
             $sql = "SELECT * from orders where  status='".$_GET["selectStatus"]."'";
        }else{
            $sql = "SELECT * from orders ";
        }
     }
   

    $sql.=   "order by id desc"; 
    $i = 1;
 
    foreach ($conn->query($sql) as $row) {
        $sql1 = "SELECT * from  user_mast where  id ='".$row['cid']."' and user_type='CUSTOMER' "; 
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch();

        $sql2 = "SELECT * from  skill  where id='".$row['skid']."'";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch();

        $sql3 = "SELECT * from  user_mast where id ='".$row['spid']." 'and user_type='SERVICE PROVIDER'";
        $result3 = $conn->query($sql3);
        $row3 = $result3->fetch();

        $ResponseXML .= "<tr>
                              <td style=\"color: #405467;padding-top:20px\" width=\"500px;\">" . $row1['email'] . "</a></td>
                              <td style=\"color: #405467;padding-top:20px\" width=\"500px;\">" . $row['sdate'] . "</a></td> 
                              <td style=\"color: #405467;padding-top:20px\" width=\"500px;\">" . $row2['skill_name'] . "</a></td> 
                              <td style=\"color: #405467;padding-top:20px\" width=\"500px;\">" . $row3['email'] . "</a></td>   ";
                              if($_SESSION['User_Type']=="CUSTOMER"){
                                if($_GET["selectStatus"]=="Approval"){
                                   $ResponseXML .= "<td style=\"color: #405467;\" width=\"500px;\">Approval</td> 
                                                     "; 
                                }else if($_GET["selectStatus"]=="Pending"){
                                  $ResponseXML .= "<td style=\"color: #405467;\" width=\"500px;\">Pending</td> 
                                 ";  
                                }else if($_GET["selectStatus"]=="Reject"){
                                  $ResponseXML .= "<td style=\"color: #405467;\" width=\"500px;\">Reject</td> 
                                 ";  
                                     
                                }else{
                                   $ResponseXML .= "<td style=\"color: #405467;\" width=\"500px;\"></td>";
                                }
                              }else{
                                if($_GET["selectStatus"]=="Approval"){
                                   $ResponseXML .= "<td width=\"500px;\"><a id=" . $row['id'] . " style=\"width:100%\" class=\"btn btn-danger btn-xs\"  onClick=\"reject('" . $row['id'] . "');\"><span  >Reject</a></td> 
                                                     "; 
                                }else if($_GET["selectStatus"]=="Pending"){
                                  $ResponseXML .= "<td width=\"500px;\"><a id=" . $row['id'] . " style=\"width:100%\" class=\"btn btn-primary btn-xs\"  onClick=\"approve('" . $row['id'] . "');\"><span  >Approval</a><br><a id=" . $row['id'] . " style=\"width:100%\" class=\"btn btn-danger btn-xs\"  onClick=\"reject('" . $row['id'] . "');\"><span  >Reject</a></td> 
                                 "; 
                                  
                                   
                                }else{
                                   $ResponseXML .= "<td style=\"color: #405467;\" width=\"500px;\">" . $row['status'] . "</a></td>";
                                }
                              }
        $ResponseXML .= "</tr>";

        /////////////////////////////////////////////////////////////////////////////
    }

     if($_SESSION['User_Type']=="SERVICE PROVIDER"){ 
        if($_GET["selectStatus"]!="All"){
             $sql5 = "SELECT * from orders where  status='".$_GET["selectStatus"]."' and spid='NO'";
        }else{
            $sql5 = "SELECT * from  orders where  spid='NO'";
        }
        
  
    foreach ($conn->query($sql5) as $row5) { 
        $sql4 = "Select * from user_mast  where user_type ='SERVICE PROVIDER'  and status='Approval' and id='".$_SESSION['id']."' order by ordercount asc LIMIT 3 ";
        foreach ($conn->query($sql4) as $row4) {
          $sql2 = "SELECT * from  skill  where id='".$row5['skid']."'";
          $result2 = $conn->query($sql2);
          $row2 = $result2->fetch();

          $sql6 = "SELECT * from  user_mast where  id ='".$row5['cid']."'";
          $result6 = $conn->query($sql6);
          $row6 = $result6->fetch();
  
            $ResponseXML .= "<tr>
                                  <td style=\"color: #b59d1b;padding-top:20px\" width=\"500px;\">" . $row6['email'] . "</a></td>
                                  <td style=\"color: #b59d1b;padding-top:20px\" width=\"500px;\">" . $row5['sdate'] . "</a></td> 
                                  <td style=\"color: #b59d1b;padding-top:20px\" width=\"500px;\">" . $row2['skill_name'] . "</a></td> 
                                  <td style=\"color: #b59d1b;padding-top:20px\" width=\"500px;\">" . $row4['email'] . "</a></td>   ";
                                    if($_GET["selectStatus"]=="Approval"){
                                       $ResponseXML .= "<td width=\"500px;\"><a id=" . $row5['id'] . " style=\"width:100%\" class=\"btn btn-danger btn-xs\"  onClick=\"reject('" . $row5['id'] . "');\"><span  >Reject</a></td> 
                                                         "; 
                                    }else if($_GET["selectStatus"]=="Pending"){
                                      $ResponseXML .= "<td width=\"500px;\"><a id=" . $row5['id'] . " style=\"width:100%\" class=\"btn btn-primary btn-xs\"  onClick=\"approve('" . $row5['id'] . "');\"><span  >Approval</a><br><a id=" . $row5['id'] . " style=\"width:100%\" class=\"btn btn-danger btn-xs\"  onClick=\"reject('" . $row5['id'] . "');\"><span  >Reject</a></td> 
                                     "; 
                                      
                                       
                                    }else{
                                       $ResponseXML .= "<td style=\"color: #b59d1b;\" width=\"500px;\">" . $row5['status'] . "</a></td>";
                                    } 
            $ResponseXML .= "</tr>"; 
        }


    //     //////////////////////////
    }
  }
    $ResponseXML .= "   </table>]]></sales_table>";
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}

 
 

if ($_GET["Command"] == "approve") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sqlinv = "select * from orders where id='" . $_GET["id"] . "' ";
        $resultinv = $conn->query($sqlinv);
        if ($rowinv = $resultinv->fetch()) {
 
            $sql = "UPDATE orders set status='Approval' where id='" . $_GET['id'] . "'";
            $result = $conn->query($sql);

            $sqlinv1 = "select * from orders where id='" . $_GET["id"] . "' spid='NO'";
            $resultinv1 = $conn->query($sqlinv1);
            if ($rowinv1 = $resultinv1->fetch()) {
     
                $sql2 = "UPDATE orders set spid='".$_SESSION['id']."' where id='" . $_GET['id'] . "'";
                $result2 = $conn->query($sql2);
      
            }

            $sql = "UPDATE user_mast set ordercount=ordercount+1 where id='" . $_GET['id'] . "'";
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
        $sqlinv = "select * from orders where id='" . $_GET["id"] . "' ";
        $resultinv = $conn->query($sqlinv);
        if ($rowinv = $resultinv->fetch()) {
 
            $sql = "UPDATE orders set status='Rejected' where id='" . $_GET['id'] . "'";
            $result = $conn->query($sql);

            $sql = "UPDATE user_mast set ordercount=ordercount-1 where id='" . $_GET['id'] . "'";
            $result = $conn->query($sql);
 
            $conn->commit();
            echo "Reject";
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "selectserpro") {

     header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    $ResponseXML .= "<combo><![CDATA[ <select name=\"spid\" id=\"spid\"   class=\"form-control input-sm\"> ";
 
        $sqlinv = "select * from user_mast where user_type ='SERVICE PROVIDER' and skill='" . $_GET["skid"] . "' and status='Approval'";
        $resultinv = $conn->query($sqlinv); 
        if ($rowinv = $resultinv->fetch()) {
              $sql = "Select * from user_mast  where user_type ='SERVICE PROVIDER' and skill='" . $_GET["skid"] . "' and status='Approval'";
              foreach ($conn->query($sql) as $row) {
                     $ResponseXML .= "<option value='" . $row["id"] . "'>" . $row["user_name"] . "</option>";
              }

        }else{
         $ResponseXML .= "<option value='NO'>" . 'No Service Providers' . "</option>";
        }

    $ResponseXML .= "   </select>]]></combo>";
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;    
 }  
?>