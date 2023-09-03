<?php
    $data = $mysql->select("select * from _tbl_events where EventID='".$_GET['edit']."'");
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
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" value="<?php echo $data[0]['Title'];?>" readonly="readonly"  class="form-control">
                            </div>
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Event Description </label>
                                <textarea id="EventDescription"  readonly="readonly"  class="form-control" rows="4" cols="50"><?php echo $data[0]['EventDescription'];?></textarea>
                            </div>
                                <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Event Heldon From<span style='color:red'>*</span></label>
                                <div class="input-group">
                                <?php
                                    $day = date("d",strtotime($data[0]['ScheduledOn']));
                                    $month = date("M",strtotime($data[0]['ScheduledOn']));
                                    $year = date("Y",strtotime($data[0]['ScheduledOn']));
                                    $hour = date("h",strtotime($data[0]['ScheduledOn']));
                                    $minute = date("i",strtotime($data[0]['ScheduledOn']));
                                ?>
                                <input type="text" value="<?php echo $day;?>" readonly="readonly" name="Day" id="Day" class="form-control" placeholder="Day">
                                <input type="text" value="<?php echo $month;?>" readonly="readonly" name="Month" id="Month" class="form-control" placeholder="Month">
                                <input type="text" value="<?php echo $year;?>" readonly="readonly" name="Year" id="Year" class="form-control" placeholder="Year">
                                <input type="text" value="<?php echo $hour;?>" readonly="readonly" name="Hour" id="Hour" class="form-control" placeholder="Hour">
                                <input type="text" value="<?php echo $minute;?>" readonly="readonly" name="Minute" id="Minute" class="form-control" placeholder="Minute">
                                </div>
                        </div>
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Event End On<span style='color:red'>*</span></label>
                                <div class="input-group">
                                <?php
                                    $day = date("d",strtotime($data[0]['ScheduledOn']));
                                    $month = date("M",strtotime($data[0]['ScheduledOn']));
                                    $year = date("Y",strtotime($data[0]['ScheduledOn']));
                                    $hour = date("h",strtotime($data[0]['ScheduledOn']));
                                    $minute = date("i",strtotime($data[0]['ScheduledOn']));
                                ?>
                                <input type="text" value="<?php echo $day;?>" readonly="readonly" name="Day" id="Day" class="form-control" placeholder="Day">
                                <input type="text" value="<?php echo $month;?>" readonly="readonly" name="Month" id="Month" class="form-control" placeholder="Month">
                                <input type="text" value="<?php echo $year;?>" readonly="readonly" name="Year" id="Year" class="form-control" placeholder="Year">
                                <input type="text" value="<?php echo $hour;?>" readonly="readonly" name="Hour" id="Hour" class="form-control" placeholder="Hour">
                                <input type="text" value="<?php echo $minute;?>" readonly="readonly" name="Minute" id="Minute" class="form-control" placeholder="Minute">
                                </div>
                            </div>
                        </div>
        </div></div></div>
        </div>
</form> 
        <div class="col-sm-12" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?action=events/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
        </div>                           
</div>