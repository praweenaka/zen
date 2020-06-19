<?php
session_start();
?> 
<section class="content"  >

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"  style="color: #1ABC9C">View Service Providers</h3>
            <h4 style="float: right;height: 3px;"><b id="time"></b></h4>  
        </div>
        <form name= "form1" role="form" class="form-horizontal">

            <div class="box-body">

                   <!-- page content -->
        <div class="right_col" role="main">
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
 
                            <div id="serprovidertbl" style="font-weight: 600"></div>
                        </div>
                    </div>
                    <br><br><br><br>
                </div>
            </div>

        </div>
                 
            </div>

        </form>
    </div>

</section> 

<script src="js/serprovider.js" type="text/javascript"></script>
<script>pass_data('All');</script>
