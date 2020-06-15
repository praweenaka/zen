<?php
include './CheckCookie.php';
$cookie_name = "user";
if (isset($_COOKIE[$cookie_name])) {

    $mo = chk_cookie($_COOKIE[$cookie_name]);

    if ($mo == "ok") {
        header('Location: ' . "home.php");
        exit();
    }
}
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
        <script src="js/user.js"></script>
        
        <style>
            
            /*body{*/
            /*    background-color: #3f484f;*/
            /*}*/
            /*#login-form{*/
            /*    background-color: #e7535f;*/
            /*    border: 0px;*/
            /*}*/
            /*#topic{*/
            /*    color: white;*/
            /*}*/
            /*#lab{*/
            /*    color: white;*/
            /*}*/
            /*#txterror{*/
            /*    color: white;*/
            /*}*/
        </style>
        
    </head>
    <body>
 
   <div class="form-group">&nbsp;</div>
   

        <div class="container">
            <div  class=" form-group mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" > 
                <div class="form-group">
                    <h1 style="color: #3c8dbc;font-family: Cookie;color: #004A3B;" id="topic"><center><b>LogIn Now</b></center></h1>
                </div>
                <div class="form-group"></div>
                <div class="form-group"></div>

                <strong id="lab" style="color: #55556D">EMAIL:</strong>
                <input class="form-control well"  name="txtUserName" type="text" id="txtUserName" onkeypress="keyset('txtPassword', event)"  />
                 
                 <div class="form-group"></div>
                 <div class="form-group"></div>
                <strong id="lab" style="color: #55556D">PASSWORD:</strong>
                <input class="form-control well" name="txtPasswords" type="password" id="txtPasswords" onkeypress="keyset('lbtn', event)"/>

                <div class="form-group"></div>
                <div class="form-group"></div>
                 <div class="row form-group"></div>
                         <div class="row">
                            <div class="col-md-1" > 
                            </div>
                            <div class="col-md-8" >
                               <div id="txterror" class="login_error">
                            </div>
                        </div> 
                    </div> 
                
                <div class="row form-group"></div>
                         <div class="row">
                            <div class="col-md-4" > 
                            </div>
                            <div class="col-md-3" >
                               <input type="button"   class="btn btn-primary" value="LOG-IN" style="background-color: #004A3B;width:  120px;" onclick="IsValiedData();" >  
                    </div> 
                </div> 
                    <div class="row form-group"></div>
                    <div class="row form-group"></div>
                     <div class="row">
                        <div class="col-md-2" > 
                        </div>
                        <div class="col-md-8" >
                            <LABEL>Don't have an account?<a href="createuser.php">&nbsp;Create an account</a> </LABEL> 
                        </div> 
                </div> 
 
            </div>
        </div>

        
    </body>    
</html>     


<script>
    var elem = document.getElementById("txtPasswords");
    elem.onkeyup = function (e) {
        if (e.keyCode == 13) {
            IsValiedData();
        }
    }


</script>


<script src="js/jquery-2.1.0.js"></script>
<script src="js/bootstrap.min.js"></script>