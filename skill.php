<?php
session_start();
?> 
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b style="color: #1ABC9C">New Skill</b></h3>
            <h4 style="float: right;height: 3px;"><b id="time"></b></h4> 
        </div>
        <form name= "form1" role="form" class="form-horizontal">

            <div class="box-body">

                <input type="hidden" id="uniq" class="form-control">

                <input type="hidden" id="item_count" class="form-control">
                <div class="form-group">

                    <a onclick="pass_data();" class="btn btn-default  ">
                        <span class="fa fa-user-plus"></span> &nbsp; Clear
                    </a>

                    <a onclick="save_inv();" class="btn btn-primary  ">
                        <span class="fa fa-save"></span> &nbsp; Save
                    </a>
 

                </div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div id="msg_box"  class="span12 text-center"  ></div>
                <div class="row">  
 
                    <div class="form-group control-label">
                         <label class="col-sm-2 " for="txt_usernm" style="color: #73879c">Skill Name</label>
                        <div class="col-md-4">
                            <input type="text" id="skill_name" required="required" class="form-control input-sm" placeholder="Enter Skill Name">
                        </div>
                    </div> 
                </div> 
              
                 <div class="form-group"></div>
                <div class="form-group"></div>  
                 
                 <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2 style="color: #405467;">View Skill</h2>
                                <div class="clearfix"></div>
                            </div>
                             
                                <table class="table table-striped jambo_table bulk_action" >
                                    <thead>
                                    <tr class="headings " style="background-color: #405467;color: white">
                                        <th width="500px;">Skill</th>
                                        <th width="500px;">Status</th>
                                    </tr>
                                    </thead> 
                                </table>
                                <div id="skilltbl" style="font-weight: 600;"></div> 
                        </div>
                        <br><br><br><br>
                    </div>
                </div>
            </div>
            <input type="text" id="uniq" class="form-control" style="visibility: hidden">
        </form>
    </div>

</section> 

<script src="js/skill.js" type="text/javascript"></script>
<script>pass_data();</script>
