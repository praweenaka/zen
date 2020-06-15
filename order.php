<?php
session_start();
?>  
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"  style="color: #1ABC9C">Your Order Details</h3>
            <h4 style="float: right;height: 3px;"><b id="time"></b></h4> 
        </div>
        <form name= "form1" role="form" class="form-horizontal">

            <div class="box-body">

                <input type="hidden" id="uniq" class="form-control">

                <input type="hidden" id="item_count" class="form-control">
                
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div id="msg_box"  class="span12 text-center"  ></div>
                <div class="row">  
 
                    <div class="form-group control-label">
                         <label class="col-sm-3 " for="txt_usernm" style="color: #73879c">USER EMAIL</label>
                        <div class="col-md-3">
                            <input type="text" id="cid" disabled value="<?php echo $_SESSION["CURRENT_USER"]; ?>" class="form-control">
                        </div>
                         <label class="col-sm-2 " for="txt_usernm" style="color: #73879c">CHOOSE DATE</label>
                        <div class="col-md-3">
                            <input type="text" id="sdate" required="required" class="form-control dt"  >
                        </div>
                    </div> 
                    
                     <div class="form-group control-label">
                         <label class="col-sm-3 " for="txt_usernm" style="color: #73879c">SELECT SKILL</label>
                            <div class="col-md-3">
                               <select name="skid" id="skid" onchange="selectserpro();"   class="form-control input-sm">
                                    <option value=""></option>
                                    <?php
                                    require_once("./connection_sql.php");

                                    $sql = "Select * from skill  where cancel ='0' and status='Active'";
                                    foreach ($conn->query($sql) as $row) {
                                        echo "<option value='" . $row["id"] . "'>" . $row["skill_name"] . "</option>";
                                    }
                                    ?>
                                </select> 
                            </div>
                        <label class="col-sm-2 " for="txt_usernm" style="color: #73879c">DESCRIPTION</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="des" placeholder="DESCRIPTION"  >                           
                        </div>
                    </div> 
                    <div class="form-group control-label">
                         <label class="col-sm-3 " for="txt_usernm" style="color: #73879c">SELECT SERVICE PROVIDER*</label>
                            <div class="col-md-3" id="dd">
                                
                         <!-- echo"<select id = \"spid\"  class =\"selectpicker form-control input-sm\"  size=\"10\"
                         style=\"margin: 10px; width: 100%;height: 170px;\" data-show-subtext=\"true\" data-live-search=\"true\">";
                         echo "<option data-subtext= \"\"></option>";
                          $sql = "Select * from skill  where cancel ='0' and status='Active'";
                        foreach ($conn->query($sql) as $row) {
                             echo "<option data-subtext='" . $row["id"] . "'   >" . $row["skill_name"] . "</option>";
                         }
                         echo"</select>";  -->
                        
                            </div>
                             
                    </div>  
                    <div class="form-group control-label"> 
                        <div class="col-md-8"></div>
                        <div class="col-md-3">
                            <a onclick="save_inv();" style="background-color: teal" class="btn btn-success">
                         &nbsp; SEND YOUR ORDER
                    </a>
                        </div>
                    </div> 
                    
                </div> 
                 <div class="form-group"></div>
                <div class="form-group"></div>  
                 
                <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel"> 
                        <div class="row">
                            <div class="col-md-4">
                                <label style="color: #405467;">Select Service Provider Type : </label>
                            </div>
                            <div class="col-md-1">
                                <div class="form-check">
                                    <input class="form-check-input radiobtn" type="radio" name="selectStatus" id="selectStatus" value="all" onclick="pass_data('All');" checked>
                                    <label class="form-check-label" style="color: #405467;">
                                        All
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input radiobtn" type="radio" name="selectStatus" id="selectStatus" value="APPROVED" onclick="pass_data('Approval');">
                                    <label class="form-check-label" style="color: #405467;">
                                        Approval
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input radiobtn" type="radio" name="selectStatus" id="selectStatus" value="PENDING" onclick="pass_data('Pending');">
                                    <label class="form-check-label" style="color: #405467;">
                                        Pending
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input radiobtn" type="radio" name="selectStatus" id="selectStatus" value="REJECTED" onclick="pass_data('Rejected');">
                                    <label class="form-check-label" style="color: #405467;">
                                        Rejected
                                    </label>
                                </div>
                            </div>
 
                        </div>
                        <div class="x_content">

                            <table class="table table-striped jambo_table bulk_action" id="tblServiceProvider">
                                 
                            </table>
                            <div id="ordertbl" style="font-weight: 600;overflow: auto;white-space: nowrap;"></div>
                        </div>
                    </div>
                    <br><br><br><br>
                </div>
            </div>

            </div>

        </form>
    </div>

</section> 

<script src="js/order.js" type="text/javascript"></script>
<script>pass_data('All');</script> 