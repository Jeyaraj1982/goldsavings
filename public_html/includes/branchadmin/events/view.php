<?php
    $data = $mysql->select("select * from _tbl_apps_events where EventID='".$_GET['edit']."'");
?>
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">View Event</h1>
     <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $data[0]['EventID'];?>" name="EventID">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Event Code</label>
                                <input type="text" value="<?php echo $data[0]['EventCode'];?>" readonly="readonly"  class="form-control">
                            </div>
                            <div class="-sm-6">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Event Title</label>
                                <input type="text" value="<?php echo $data[0]['EventTitle'];?>" readonly="readonly"  class="form-control">
                            </div>
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Event Description </label>
                                <textarea id="EventDescription"  readonly="readonly"  class="form-control" rows="4" cols="50"><?php echo $data[0]['EventDescription'];?></textarea>
                                </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Event Starts </label>
                                <div class="input-group">
                                <?php
                                    $day = date("d",strtotime($data[0]['EventStart']));
                                    $month = date("M",strtotime($data[0]['EventStart']));
                                    $year = date("Y",strtotime($data[0]['EventStart']));
                                    $hour = date("H",strtotime($data[0]['EventStart']));
                                    $minute = date("i",strtotime($data[0]['EventStart']));
                                ?>
                                <input type="text" value="<?php echo $day;?>" readonly="readonly" name="StartDay" id="StartDay" class="form-control" placeholder="Day">
                                <input type="text" value="<?php echo $month;?>" readonly="readonly" name="StartMonth" id="StartMonth" class="form-control" placeholder="Month">
                                <input type="text" value="<?php echo $year;?>" readonly="readonly" name="StartYear" id="StartYear" class="form-control" placeholder="Year">
                                <input type="text" value="<?php echo $hour;?>" readonly="Startreadonly" name="Hour" id="StartHour" class="form-control" placeholder="Hour">
                                <input type="text" value="<?php echo $minute;?>" readonly="Startreadonly" name="StartMinute" id="Minute" class="form-control" placeholder="Minute">
                                </div>
                        </div>
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Event End </label>
                                <div class="input-group">
                                <?php
                                    $day = date("d",strtotime($data[0]['EventEnd']));
                                    $month = date("M",strtotime($data[0]['EventEnd']));
                                    $year = date("Y",strtotime($data[0]['EventEnd']));
                                    $hour = date("H",strtotime($data[0]['EventEnd']));
                                    $minute = date("i",strtotime($data[0]['EventEnd']));
                                ?>
                                <input type="text" value="<?php echo $day;?>" readonly="readonly" name="EndDay" id="EndDay" class="form-control" placeholder="Day">
                                <input type="text" value="<?php echo $month;?>" readonly="readonly" name="EndMonth" id="EndMonth" class="form-control" placeholder="Month">
                                <input type="text" value="<?php echo $year;?>" readonly="readonly" name="EndYear" id="EndYear" class="form-control" placeholder="Year">
                                <input type="text" value="<?php echo $hour;?>" readonly="readonly" name="EndHour" id="EndHour" class="form-control" placeholder="Hour">
                                <input type="text" value="<?php echo $minute;?>" readonly="readonly" name="EndMinute" id="EndMinute" class="form-control" placeholder="Minute">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                            </div>
                             <div class="col-sm-6 mb-3">         
                                <label class="form-label">Status </label>
                                <input type="text" value="<?php echo ($data[0]['IsActive']==1) ? " Active " : "Deactivated";?>" readonly="readonly" class="form-control" placeholder="Login Password">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks</label>
                                <input type="text" value="<?php echo $data[0]['Remarks'];?>" readonly="readonly" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div>
                        </div>
        </div></div></div>
        </div>
</form> 
        <div class="col-sm-12" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?action=events/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
        </div>                           
</div>