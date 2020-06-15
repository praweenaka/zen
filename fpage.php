<!-- Main content -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Home Page</small>
        <b><p  style="float: right; color: black" id="time"></p></b> 
    </h1>

</section>

<section class="content">
     

        <?php
        require_once ("connection_sql.php");
        $sql1 = "SELECT count(id)as count from  user_mast where  user_type='Customer' "; 
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch();

        $sql2 = "SELECT * from  skill ";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch();

        $sql3 = "SELECT count(id) as count from  user_mast where  user_type='Service Provider' and status='Approval'";
        $result3 = $conn->query($sql3);
        $row3 = $result3->fetch();

        $sql4 = "SELECT count(id) as count from  user_mast where  user_type='Service Provider' and status='Rejected'";
        $result4 = $conn->query($sql4);
        $row4 = $result4->fetch();

        $sql5 = "SELECT count(id) as count from  user_mast where  user_type='Service Provider' and status='Pending'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch();
        ?>
             <div class="row   container" style="background-color:#F7F7F7;margin-right: 500px;">
 
                <div class="col-md-4 col-sm-4 col-xs-12  ">
                    <div class="x_panel tile fixed_height_320">
                        <div class="x_title">
                            <h2>Total Users</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <h5>Customer Accounts</h5>
                            <div class="widget_summary">
                                <div class="w_left w_25">
                                    <span>Customers</span>
                                </div>
                                <div class="w_center w_55">
                                    <div class="progress">
                                        <div id="cust_rate" class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                             aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                         
                                    </div>
                                </div>
                               <div class="w_right w_20">
                                    <span id="cust_count"><?php echo  $row1['count']?></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <h5>Service Providers</h5>
                            <div class="widget_summary">
                                <div class="w_left w_25">
                                    <span>Pending</span>
                                </div>
                                <div class="w_center w_55">
                                    <div class="progress">
                                        <div id="sp_pending_rate" class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                             aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w_right w_20">
                                    <span id="sp_pending_count"><?php echo  $row5['count']?></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="widget_summary">
                                <div class="w_left w_25">
                                    <span>Approved</span>
                                </div>
                                <div class="w_center w_55">
                                    <div class="progress">
                                        <div id="sp_approved_rate" class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                             aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w_right w_20">
                                    <span id="sp_approved_count"><?php echo  $row3['count']?></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="widget_summary">
                                <div class="w_left w_25">
                                    <span>Rejected</span>
                                </div>
                                <div class="w_center w_55">
                                    <div class="progress">
                                        <div id="sp_rejected_rate" class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                             aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w_right w_20">
                                    <span id="sp_rejected_count"><?php echo  $row4['count']?></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12 ">
                    <div class="x_panel tile fixed_height_320 overflow_hidden">
                        <div class="x_title">
                            <h2>Higher Demand Skills</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="" style="width:100%">

                                <tr> 
                                    <th>
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                            <p class="">Service</p>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <p class="">Requests</p>
                                        </div>
                                    </th>
                                
                                    <td >
                                        <?php
                                            $sql = "SELECT COUNT(id) as count,skid from orders where  status='Approval' group by skid";
                                            foreach ($conn->query($sql) as $row) {

                                                $sql6 = "SELECT * from  skill where  id='".$row['skid']."' and status='active'"; 
                                                $result6 = $conn->query($sql6);
                                                $row6 = $result6->fetch();
        
                                              echo "<tr >";
                                              echo "<td style=\"color: #405467;\">" . $row6['skill_name'] . "</a></td>";
                                              echo "<td style=\"color: #405467;\">" . $row['count'] . "</a></td>";
                                              echo "<tr>";
                                            }
                                        ?>
                                        
                                    </td>
                                    <td>
                                        <table class="tile_info" id="service_list">
                                           <tbody></tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>


</section>

