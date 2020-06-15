<?php
include './connection_sql.php';
?>

<!-- Main content -->

<section class="content">



    <div class="box box-primary">

        <div class="box-header with-border">

            <h3 class="box-title" style="color: #1ABC9C">Change Password</h3>
            <h4 style="float: right;height: 3px;"><b id="time"></b></h4> 

        </div>

        <form  name= "form1"  role="form" class="form-horizontal">

            <div class="box-body">



                <div class="form-group">

                   <a onclick="location.reload();" class="btn btn-default">
                        <span class="fa fa-user-plus"></span> &nbsp; Clear
                    </a>
                    <a onclick="save();" class="btn btn-primary">
                        <span class="fa fa-save"></span> &nbsp; Save
                    </a>

                </div>

                <div id="msg_box"  class="span12 text-center"  >
                </div>
                <input type="hidden"  id="tmpno" >

                <div class="form-group">
                    <label class="col-sm-2 control-label" style="color: #73879c">USER EMAIL</label>
                    <div class="col-sm-2">
                        <input type="text" placeholder="UserName" id="usn" value="<?php echo $_SESSION["CURRENT_USER"]; ?>" class="form-control input-sm" disabled="">

                    </div>
                </div>
                <div class="form-group">
                        <label class="col-sm-2 control-label" style="color: #73879c">User Type</label>
                    <div class="col-sm-2">
                        
                        <?php
                        $sql = "select user_type from user_mast where email ='" . $_SESSION["CURRENT_USER"] . "'";
                        $result = $conn->query($sql);
                        $row = $result->fetch();
                        echo"<input type=\"text\"  id=\"creditCombo\" value=\"" . $row["user_type"] . "\" disabled class=\"form-control input-sm\"/>";
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" style="color: #73879c">Password</label>

                    <div class="col-sm-2">

                        <input type="password" placeholder="Password" id="psw" value="" class="form-control input-sm">

                    </div>

                </div>

            </div>

            <div id="itemdetails"></div>

        </form>

    </div>

</section>

<script src="js/change_password.js">

</script>





