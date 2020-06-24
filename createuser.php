<?php
// include './CheckCookie.php';
$cookie_name = "user";
// if (isset($_COOKIE[$cookie_name])) {

//     $mo = chk_cookie($_COOKIE[$cookie_name]);

//     if ($mo == "ok") {
//         header('Location: ' . "home.php");
//         exit();
//     }
// }
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login Page</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet'>
        <!-- Ionicons -->
        <link  href="css/login.css" rel="stylesheet">    

        <link rel="stylesheet" href="css/ionicons/css/ionicons.min.css">
        <link rel="icon" type="image/png" sizes="16x16" href="andpic.png">

        <!-- <script src="js/vuepkg.js" type="text/javascript"></script> -->
         <meta name="viewport" content="width=device-width, initial-scale=1.1">
        <script src="js/create_user.js"></script>
        
       
        
    </head>
    <body>
    <div class="form-group">&nbsp;</div>
   <div class="form-group">&nbsp;</div>
 
        <div class="form-group">
            <h1 style="color: #3c8dbc;font-family: Cookie;color: #004A3B;"id="topic"><center><b>Register Now</b></center></h1>
        </div>
                
        <form  name= "form1"  role="form" class="form-horizontal">

            <div class="box-body container">
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div id="msg_box"  class="span12 text-center"  ></div>
  
                <DIV class="container">
                    <div class="row">
                        <div class="col-md-3" > 
                        </div>
                        <div class="col-md-3" >
                            <label class="control-label" style="color: #55556D">NAME</label>
                            <input type="text"  id="name"  class="form-control input-sm well" >
                        </div>
                        <div class="col-md-3" >
                            <label class="control-label" style="color: #55556D">PHONE</label> 
                            <input type="text"  id="phone"  class="form-control input-sm well" >
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-3" > 
                        </div>
                        <div class="col-md-6" >
                            <label class="control-label" style="color: #55556D">EMAIL</label>
                             <input type="email"  id="email" required=""  class="form-control input-sm well" >
                        </div> 
                    </div>  
                    <div class="row">
                        <div class="col-md-3" > 
                        </div>
                        <div class="col-md-6" >
                            <label class="control-label" style="color: #55556D">ACCOUNT TYPE</label>
                             <select name="acctype" id="acctype"  onchange="sktype();" class="form-control input-sm">
                            <option value="">Choose Account Type</option>
                            <option value="CUSTOMER">CUSTOMER</option>
                            <option value="SERVICE PROVIDER">SERVICE PROVIDER</option>
                         </select> 
                        </div> 
                    </div>  
                     <div class="row">
                        <div class="col-md-3" > 
                        </div>
                        <div class="col-md-6" >
                            <label class="control-label" style="color: #55556D">ADDRESS</label>
                            <TEXTAREA style="resize: none" class="form-control well" id="address"  rows="3"></TEXTAREA>
                        </div> 
                    </div> 
                    <div class="row">
                        <div class="col-md-3" > 
                        </div>
                        <div class="col-md-3" >
                            <label class="control-label" style="color: #55556D">LOCATION</label>
                            <select name="location"  id="location"   class="form-control input-sm  ">
                                <option value="">Choose Location</option>
                                <?php
                                require_once("./connection_sql.php");

                                $sql = "Select * from location  where cancel ='0' and status='Active'";
                                foreach ($conn->query($sql) as $row) {
                                    echo "<option value='" . $row["id"] . "'>" . $row["location_name"] . "</option>";
                                }
                                ?>
                        </select>
                        </div>
                        <div class="col-md-3" >
                            <label class="control-label" style="color: #55556D">POST CODE</label> 
                            <input type="text"  id="postcode"  class="form-control input-sm well" >
                        </div>
                    </div> 
                    <div class="row" style="visibility: hidden;" id="skdiv">
                        <div class="col-md-3" > 
                        </div>
                        <div class="col-md-6"  >
                            <label class="control-label" style="color: #55556D">SKILL</label>
                             <select name="skill" id="skill"   class="form-control input-sm  ">
                                 <option value="">Choose Skill</option>
                                <?php
                                require_once("./connection_sql.php");

                                $sql = "Select * from skill  where cancel ='0' and status='Active'";
                                foreach ($conn->query($sql) as $row) {
                                    echo "<option value='" . $row["id"] . "'>" . $row["skill_name"] . "</option>";
                                }
                                  ?>
                            </select>
                        </div> 
                    </div> 
                    <div class="row">
                        <div class="col-md-3" > 
                        </div>
                        <div class="col-md-3" >
                            <label class="control-label" style="color: #55556D">PASSWORD</label>
                            <input type="password"  id="pass"  class="form-control input-sm well" >
                        </div>
                        <div class="col-md-3" >
                            <label class="control-label" style="color: #55556D">CONFIRM PASSWORD</label> 
                             <input type="password" id="cpass"  class="form-control input-sm well" >
                        </div>
                    </div> 
                    <div class="row form-group"></div>
                         <div class="row">
                            <div class="col-md-5" > 
                            </div>
                            <div class="col-md-4" >
                                <input type="button"   class="btn btn-primary" value="REGISTER" style="background-color: #004A3B;margin-left: 40px;" onclick="save_inv();"  > 
                           </div> 
                    </div> 
                    <div class="row form-group"></div>
                     <div class="row">
                        <div class="col-md-4" > 
                        </div>
                        <div class="col-md-6" >
                           <LABEL style="margin-left: 70px;">Already have an account?<a href="index1.php">&nbsp;Log in</a> </LABEL>
                        </div> 
                    </div> 
                    <div class="form-group">&nbsp;</div>
                   <div class="form-group">&nbsp;</div> 
                   <div class="form-group">&nbsp;</div>
                   <div class="form-group">&nbsp;</div>
                   <div class="form-group">&nbsp;</div>
                </DIV>  
   
            </div>

            <div id="itemdetails"></div>

        </form>
    </body>    
</html>     
 

<!-- <script src="js/jquery-2.1.0.js"></script> -->
<!-- <script src="js/bootstrap.min.js"></script> -->