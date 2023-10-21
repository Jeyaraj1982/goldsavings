<?php
    $data = $mysql->select("select * from _tbl_apps_events where EventID='".$_GET['edit']."'");
?>
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Edit Event</h1>
     <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $data[0]['EventID'];?>" name="EventID">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Event Code </label>
                                <input type="text" disabled="disabled" value="<?php echo SequnceList::getNextNumber("_tbl_apps_events");?>" name="EventCode" id="EventCode" class="form-control" placeholder="Event Code">
                            </div>
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Event Title <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['EventTitle'];?>" name="EventTitle" id="EventTitle" class="form-control" placeholder="Event Title">
                                <span id="ErrEventTitle" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Event Description <span style='color:red'>*</span></label>
                                <textarea id="EventDescription" value=""  name="EventDescription" class="form-control" rows="4" cols="50"><?php echo $data[0]['EventDescription'];?></textarea>
                                <span id="ErrEventDescription" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Event Start <span style='color:red'>*</span></label>
                                <div class="input-group">
                                <?php             
                                    $day = date("d",strtotime($data[0]['EventStart']));                                                            
                                    $month = date("m",strtotime($data[0]['EventStart']));
                                    $year = date("Y",strtotime($data[0]['EventStart']));
                                    $hour = date("H",strtotime($data[0]['EventStart']));
                                    $minute = date("i",strtotime($data[0]['EventStart']));
                                ?>
                                <select class="form-select" name="StartDay" id="StartDay">
                                    <option value="01" <?php echo $day=="01" ? "selected=selected" : "";?> >01</option>
                                    <option value="02" <?php echo $day=="02" ? "selected=selected" : "";?> >02</option>
                                    <option value="03" <?php echo $day=="03" ? "selected=selected" : "";?> >03</option>
                                    <option value="04" <?php echo $day=="04" ? "selected=selected" : "";?> >04</option>
                                    <option value="05" <?php echo $day=="05" ? "selected=selected" : "";?> >05</option>
                                    <option value="06" <?php echo $day=="06" ? "selected=selected" : "";?> >06</option>
                                    <option value="07" <?php echo $day=="07" ? "selected=selected" : "";?> >07</option>
                                    <option value="08" <?php echo $day=="08" ? "selected=selected" : "";?> >08</option>
                                    <option value="09" <?php echo $day=="09" ? "selected=selected" : "";?> >09</option>
                                    <option value="10" <?php echo $day=="10" ? "selected=selected" : "";?> >10</option>
                                    <option value="11" <?php echo $day=="11" ? "selected=selected" : "";?> >11</option>
                                    <option value="12" <?php echo $day=="12" ? "selected=selected" : "";?> >12</option>
                                    <option value="13" <?php echo $day=="13" ? "selected=selected" : "";?> >13</option>
                                    <option value="14" <?php echo $day=="14" ? "selected=selected" : "";?> >14</option>
                                    <option value="15" <?php echo $day=="15" ? "selected=selected" : "";?> >15</option>
                                    <option value="16" <?php echo $day=="16" ? "selected=selected" : "";?> >16</option>
                                    <option value="17" <?php echo $day=="17" ? "selected=selected" : "";?> >17</option>
                                    <option value="18" <?php echo $day=="18" ? "selected=selected" : "";?> >18</option>
                                    <option value="19" <?php echo $day=="19" ? "selected=selected" : "";?> >19</option>
                                    <option value="20" <?php echo $day=="20" ? "selected=selected" : "";?> >20</option>
                                    <option value="21" <?php echo $day=="21" ? "selected=selected" : "";?> >21</option>
                                    <option value="22" <?php echo $day=="22" ? "selected=selected" : "";?> >22</option>
                                    <option value="23" <?php echo $day=="23" ? "selected=selected" : "";?> >23</option>
                                    <option value="24" <?php echo $day=="24" ? "selected=selected" : "";?> >24</option>
                                    <option value="25" <?php echo $day=="25" ? "selected=selected" : "";?> >25</option>
                                    <option value="26" <?php echo $day=="26" ? "selected=selected" : "";?> >26</option>
                                    <option value="27" <?php echo $day=="27" ? "selected=selected" : "";?> >27</option>
                                    <option value="28" <?php echo $day=="28" ? "selected=selected" : "";?> >28</option>
                                    <option value="29" <?php echo $day=="29" ? "selected=selected" : "";?> >29</option>
                                    <option value="30" <?php echo $day=="30" ? "selected=selected" : "";?> >30</option>
                                    <option value="31" <?php echo $day=="31" ? "selected=selected" : "";?>>31</option>
                                </select>
                                <select class="form-select" name="StartMonth" id="StartMonth">
                                    <option value="01" <?php echo $month=="1" ? "selected=selected" : "";?> >JAN</option>
                                    <option value="02" <?php echo $month=="2" ? "selected=selected" : "";?> >FEB</option>
                                    <option value="03" <?php echo $month=="3" ? "selected=selected" : "";?> >MAR</option>
                                    <option value="04" <?php echo $month=="4" ? "selected=selected" : "";?> >APR</option>
                                    <option value="05" <?php echo $month=="5" ? "selected=selected" : "";?> >MAY</option>
                                    <option value="06" <?php echo $month=="6" ? "selected=selected" : "";?> >JUN</option>
                                    <option value="07" <?php echo $month=="7" ? "selected=selected" : "";?> >JUL</option>
                                    <option value="08" <?php echo $month=="8" ? "selected=selected" : "";?> >AUG</option>
                                    <option value="09" <?php echo $month=="9" ? "selected=selected" : "";?> >SEP</option>
                                    <option value="10" <?php echo $month=="10" ? "selected=selected" : "";?> >OCT</option>
                                    <option value="11" <?php echo $month=="11" ? "selected=selected" : "";?> >NOV</option>
                                    <option value="12" <?php echo $month=="12" ? "selected=selected" : "";?> >DEC</option>
                                </select>
                                <select class="form-select" name="StartYear" id="StartYear">
                                    <option value="2023" <?php echo $year=="2023" ? "selected=selected" : "";?> >2023</option>
                                    <option value="2024" <?php echo $year=="2024" ? "selected=selected" : "";?> >2024</option>
                                </select>
                                <select class="form-select" name="StartHour" id="StartHour" style="text-align: center !important;">
                                    <option value="00" <?php echo $hour=="0" ? "selected=selected" : "";?> >00</option>
                                    <option value="01" <?php echo $hour=="1" ? "selected=selected" : "";?> >01</option>
                                    <option value="02" <?php echo $hour=="2" ? "selected=selected" : "";?> >02</option>
                                    <option value="03" <?php echo $hour=="3" ? "selected=selected" : "";?> >03</option>
                                    <option value="04" <?php echo $hour=="4" ? "selected=selected" : "";?> >04</option>
                                    <option value="05" <?php echo $hour=="5" ? "selected=selected" : "";?> >05</option>
                                    <option value="06" <?php echo $hour=="6" ? "selected=selected" : "";?> >06</option>
                                    <option value="07" <?php echo $hour=="7" ? "selected=selected" : "";?> >07</option>
                                    <option value="08" <?php echo $hour=="8" ? "selected=selected" : "";?> >08</option>
                                    <option value="09" <?php echo $hour=="9" ? "selected=selected" : "";?> >09</option>
                                    <option value="10" <?php echo $hour=="10" ? "selected=selected" : "";?> >10</option>
                                    <option value="11" <?php echo $hour=="11" ? "selected=selected" : "";?> >11</option>
                                    <option value="12" <?php echo $hour=="12" ? "selected=selected" : "";?> >12</option>
                                    <option value="13" <?php echo $hour=="13" ? "selected=selected" : "";?> >13</option>
                                    <option value="14" <?php echo $hour=="14" ? "selected=selected" : "";?> >14</option>
                                    <option value="15" <?php echo $hour=="15" ? "selected=selected" : "";?> >15</option>
                                    <option value="16" <?php echo $hour=="16" ? "selected=selected" : "";?> >16</option>
                                    <option value="17" <?php echo $hour=="17" ? "selected=selected" : "";?> >17</option>
                                    <option value="18" <?php echo $hour=="18" ? "selected=selected" : "";?> >18</option>
                                    <option value="19" <?php echo $hour=="19" ? "selected=selected" : "";?> >19</option>
                                    <option value="20" <?php echo $hour=="20" ? "selected=selected" : "";?> >20</option>
                                    <option value="21" <?php echo $hour=="21" ? "selected=selected" : "";?> >21</option>
                                    <option value="22" <?php echo $hour=="22" ? "selected=selected" : "";?> >22</option>
                                    <option value="23" <?php echo $hour=="23" ? "selected=selected" : "";?> >23</option>
                                </select>
                                <select class="form-select" name="StartMinute" id="StartMinute" style="text-align: center !important;">
                                    <option value="00" <?php echo $minute=="0" ? "selected=selected" : "";?>>00</option>
                                    <option value="01" <?php echo $minute=="1" ? "selected=selected" : "";?>>01</option>
                                    <option value="02" <?php echo $minute=="2" ? "selected=selected" : "";?>>02</option>
                                    <option value="03" <?php echo $minute=="3" ? "selected=selected" : "";?>>03</option>
                                    <option value="04" <?php echo $minute=="4" ? "selected=selected" : "";?>>04</option>
                                    <option value="05" <?php echo $minute=="5" ? "selected=selected" : "";?>>05</option>
                                    <option value="06" <?php echo $minute=="6" ? "selected=selected" : "";?>>06</option>
                                    <option value="07" <?php echo $minute=="7" ? "selected=selected" : "";?>>07</option>
                                    <option value="08" <?php echo $minute=="8" ? "selected=selected" : "";?>>08</option>
                                    <option value="09" <?php echo $minute=="9" ? "selected=selected" : "";?>>09</option>
                                    <option value="10" <?php echo $minute=="10" ? "selected=selected" : "";?>>10</option>
                                    <option value="11" <?php echo $minute=="11" ? "selected=selected" : "";?>>11</option>
                                    <option value="12" <?php echo $minute=="12" ? "selected=selected" : "";?>>12</option>
                                    <option value="13" <?php echo $minute=="13" ? "selected=selected" : "";?>>13</option>
                                    <option value="14" <?php echo $minute=="14" ? "selected=selected" : "";?>>14</option>
                                    <option value="15" <?php echo $minute=="15" ? "selected=selected" : "";?>>15</option>
                                    <option value="16" <?php echo $minute=="16" ? "selected=selected" : "";?>>16</option>
                                    <option value="17" <?php echo $minute=="17" ? "selected=selected" : "";?>>17</option>
                                    <option value="18" <?php echo $minute=="18" ? "selected=selected" : "";?>>18</option>
                                    <option value="19" <?php echo $minute=="19" ? "selected=selected" : "";?>>19</option>
                                    <option value="20" <?php echo $minute=="20" ? "selected=selected" : "";?>>20</option>
                                    <option value="21" <?php echo $minute=="21" ? "selected=selected" : "";?>>21</option>
                                    <option value="22" <?php echo $minute=="22" ? "selected=selected" : "";?>>22</option>
                                    <option value="23" <?php echo $minute=="23" ? "selected=selected" : "";?>>23</option>
                                    <option value="24" <?php echo $minute=="24" ? "selected=selected" : "";?>>24</option>
                                    <option value="25" <?php echo $minute=="25" ? "selected=selected" : "";?>>25</option>
                                    <option value="26" <?php echo $minute=="26" ? "selected=selected" : "";?>>26</option>
                                    <option value="27" <?php echo $minute=="27" ? "selected=selected" : "";?>>27</option>
                                    <option value="28" <?php echo $minute=="28" ? "selected=selected" : "";?>>28</option>
                                    <option value="29" <?php echo $minute=="29" ? "selected=selected" : "";?>>29</option>
                                    <option value="30" <?php echo $minute=="30" ? "selected=selected" : "";?>>30</option>
                                    <option value="31" <?php echo $minute=="31" ? "selected=selected" : "";?>>31</option>
                                    <option value="32" <?php echo $minute=="32" ? "selected=selected" : "";?>>32</option>
                                    <option value="33" <?php echo $minute=="33" ? "selected=selected" : "";?>>33</option>
                                    <option value="34" <?php echo $minute=="34" ? "selected=selected" : "";?>>34</option>
                                    <option value="35" <?php echo $minute=="35" ? "selected=selected" : "";?>>35</option>
                                    <option value="36" <?php echo $minute=="36" ? "selected=selected" : "";?>>36</option>
                                    <option value="37" <?php echo $minute=="37" ? "selected=selected" : "";?>>37</option>
                                    <option value="38" <?php echo $minute=="38" ? "selected=selected" : "";?>>38</option>
                                    <option value="39" <?php echo $minute=="39" ? "selected=selected" : "";?>>39</option>
                                    <option value="40" <?php echo $minute=="40" ? "selected=selected" : "";?>>40</option>
                                    <option value="41" <?php echo $minute=="41" ? "selected=selected" : "";?>>41</option>
                                    <option value="42" <?php echo $minute=="42" ? "selected=selected" : "";?>>42</option>
                                    <option value="43" <?php echo $minute=="43" ? "selected=selected" : "";?>>43</option>
                                    <option value="44" <?php echo $minute=="44" ? "selected=selected" : "";?>>44</option>
                                    <option value="45" <?php echo $minute=="45" ? "selected=selected" : "";?>>45</option>
                                    <option value="46" <?php echo $minute=="46" ? "selected=selected" : "";?>>46</option>
                                    <option value="47" <?php echo $minute=="47" ? "selected=selected" : "";?>>47</option>
                                    <option value="48" <?php echo $minute=="48" ? "selected=selected" : "";?>>48</option>
                                    <option value="49" <?php echo $minute=="49" ? "selected=selected" : "";?>>49</option>
                                    <option value="50" <?php echo $minute=="50" ? "selected=selected" : "";?>>50</option>
                                    <option value="51" <?php echo $minute=="51" ? "selected=selected" : "";?>>51</option>
                                    <option value="52" <?php echo $minute=="52" ? "selected=selected" : "";?>>52</option>
                                    <option value="53" <?php echo $minute=="53" ? "selected=selected" : "";?>>53</option>
                                    <option value="54" <?php echo $minute=="54" ? "selected=selected" : "";?>>54</option>
                                    <option value="55" <?php echo $minute=="55" ? "selected=selected" : "";?>>55</option>
                                    <option value="56" <?php echo $minute=="56" ? "selected=selected" : "";?>>56</option>
                                    <option value="57" <?php echo $minute=="57" ? "selected=selected" : "";?>>57</option>
                                    <option value="58" <?php echo $minute=="58" ? "selected=selected" : "";?>>58</option>
                                    <option value="59" <?php echo $minute=="59" ? "selected=selected" : "";?>>59</option>
                                </select>
                                <span id="ErrEventStart" class="error_msg"></span>
                                </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                        </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Event End <span style='color:red'>*</span></label>
                                <div class="input-group">
                                <?php
                                    $day = date("d",strtotime($data[0]['EventEnd']));
                                    $month = date("m",strtotime($data[0]['EventEnd']));
                                    $year = date("Y",strtotime($data[0]['EventEnd']));
                                    $hour = date("H",strtotime($data[0]['EventEnd']));
                                    $minute = date("i",strtotime($data[0]['EventEnd']));
                                ?>
                                <select class="form-select" name="EndDay" id="EndDay">
                                    <option value="01" <?php echo $day=="01" ? "selected=selected" : "";?> >01</option>
                                    <option value="02" <?php echo $day=="02" ? "selected=selected" : "";?> >02</option>
                                    <option value="03" <?php echo $day=="03" ? "selected=selected" : "";?> >03</option>
                                    <option value="04" <?php echo $day=="04" ? "selected=selected" : "";?> >04</option>
                                    <option value="05" <?php echo $day=="05" ? "selected=selected" : "";?> >05</option>
                                    <option value="06" <?php echo $day=="06" ? "selected=selected" : "";?> >06</option>
                                    <option value="07" <?php echo $day=="07" ? "selected=selected" : "";?> >07</option>
                                    <option value="08" <?php echo $day=="08" ? "selected=selected" : "";?> >08</option>
                                    <option value="09" <?php echo $day=="09" ? "selected=selected" : "";?> >09</option>
                                    <option value="10" <?php echo $day=="10" ? "selected=selected" : "";?> >10</option>
                                    <option value="11" <?php echo $day=="11" ? "selected=selected" : "";?> >11</option>
                                    <option value="12" <?php echo $day=="12" ? "selected=selected" : "";?> >12</option>
                                    <option value="13" <?php echo $day=="13" ? "selected=selected" : "";?> >13</option>
                                    <option value="14" <?php echo $day=="14" ? "selected=selected" : "";?> >14</option>
                                    <option value="15" <?php echo $day=="15" ? "selected=selected" : "";?> >15</option>
                                    <option value="16" <?php echo $day=="16" ? "selected=selected" : "";?> >16</option>
                                    <option value="17" <?php echo $day=="17" ? "selected=selected" : "";?> >17</option>
                                    <option value="18" <?php echo $day=="18" ? "selected=selected" : "";?> >18</option>
                                    <option value="19" <?php echo $day=="19" ? "selected=selected" : "";?> >19</option>
                                    <option value="20" <?php echo $day=="20" ? "selected=selected" : "";?> >20</option>
                                    <option value="21" <?php echo $day=="21" ? "selected=selected" : "";?> >21</option>
                                    <option value="22" <?php echo $day=="22" ? "selected=selected" : "";?> >22</option>
                                    <option value="23" <?php echo $day=="23" ? "selected=selected" : "";?> >23</option>
                                    <option value="24" <?php echo $day=="24" ? "selected=selected" : "";?> >24</option>
                                    <option value="25" <?php echo $day=="25" ? "selected=selected" : "";?> >25</option>
                                    <option value="26" <?php echo $day=="26" ? "selected=selected" : "";?> >26</option>
                                    <option value="27" <?php echo $day=="27" ? "selected=selected" : "";?> >27</option>
                                    <option value="28" <?php echo $day=="28" ? "selected=selected" : "";?> >28</option>
                                    <option value="29" <?php echo $day=="29" ? "selected=selected" : "";?> >29</option>
                                    <option value="30" <?php echo $day=="30" ? "selected=selected" : "";?> >30</option>
                                    <option value="31" <?php echo $day=="31" ? "selected=selected" : "";?>>31</option>
                                </select>
                                <select class="form-select" name="EndMonth" id="EndMonth">
                                    <option value="01" <?php echo $month=="1" ? "selected=selected" : "";?> >JAN</option>
                                    <option value="02" <?php echo $month=="2" ? "selected=selected" : "";?> >FEB</option>
                                    <option value="03" <?php echo $month=="3" ? "selected=selected" : "";?> >MAR</option>
                                    <option value="04" <?php echo $month=="4" ? "selected=selected" : "";?> >APR</option>
                                    <option value="05" <?php echo $month=="5" ? "selected=selected" : "";?> >MAY</option>
                                    <option value="06" <?php echo $month=="6" ? "selected=selected" : "";?> >JUN</option>
                                    <option value="07" <?php echo $month=="7" ? "selected=selected" : "";?> >JUL</option>
                                    <option value="08" <?php echo $month=="8" ? "selected=selected" : "";?> >AUG</option>
                                    <option value="09" <?php echo $month=="9" ? "selected=selected" : "";?> >SEP</option>
                                    <option value="10" <?php echo $month=="10" ? "selected=selected" : "";?> >OCT</option>
                                    <option value="11" <?php echo $month=="11" ? "selected=selected" : "";?> >NOV</option>
                                    <option value="12" <?php echo $month=="12" ? "selected=selected" : "";?> >DEC</option>
                                </select>
                                <select class="form-select" name="EndYear" id="EndYear">
                                    <option value="2023" <?php echo $year=="2023" ? "selected=selected" : "";?> >2023</option>
                                    <option value="2024" <?php echo $year=="2024" ? "selected=selected" : "";?> >2024</option>
                                </select>
                                <select class="form-select" name="EndHour" id="EndHour" style="text-align: center !important;">
                                    <option value="00" <?php echo $hour=="0" ? "selected=selected" : "";?> >00</option>
                                    <option value="01" <?php echo $hour=="1" ? "selected=selected" : "";?> >01</option>
                                    <option value="02" <?php echo $hour=="2" ? "selected=selected" : "";?> >02</option>
                                    <option value="03" <?php echo $hour=="3" ? "selected=selected" : "";?> >03</option>
                                    <option value="04" <?php echo $hour=="4" ? "selected=selected" : "";?> >04</option>
                                    <option value="05" <?php echo $hour=="5" ? "selected=selected" : "";?> >05</option>
                                    <option value="06" <?php echo $hour=="6" ? "selected=selected" : "";?> >06</option>
                                    <option value="07" <?php echo $hour=="7" ? "selected=selected" : "";?> >07</option>
                                    <option value="08" <?php echo $hour=="8" ? "selected=selected" : "";?> >08</option>
                                    <option value="09" <?php echo $hour=="9"  ? "selected=selected" : "";?> >09</option>
                                    <option value="10" <?php echo $hour=="10" ? "selected=selected" : "";?> >10</option>
                                    <option value="11" <?php echo $hour=="11" ? "selected=selected" : "";?> >11</option>
                                    <option value="12" <?php echo $hour=="12" ? "selected=selected" : "";?> >12</option>
                                    <option value="13" <?php echo $hour=="13" ? "selected=selected" : "";?> >13</option>
                                    <option value="14" <?php echo $hour=="14" ? "selected=selected" : "";?> >14</option>
                                    <option value="15" <?php echo $hour=="15" ? "selected=selected" : "";?> >15</option>
                                    <option value="16" <?php echo $hour=="16" ? "selected=selected" : "";?> >16</option>
                                    <option value="17" <?php echo $hour=="17" ? "selected=selected" : "";?> >17</option>
                                    <option value="18" <?php echo $hour=="18" ? "selected=selected" : "";?> >18</option>
                                    <option value="19" <?php echo $hour=="19" ? "selected=selected" : "";?> >19</option>
                                    <option value="20" <?php echo $hour=="20" ? "selected=selected" : "";?> >20</option>
                                    <option value="21" <?php echo $hour=="21" ? "selected=selected" : "";?> >21</option>
                                    <option value="22" <?php echo $hour=="22" ? "selected=selected" : "";?> >22</option>
                                    <option value="23" <?php echo $hour=="23" ? "selected=selected" : "";?> >23</option>
                                </select>
                                <select class="form-select" name="EndMinute" id="EndMinute" style="text-align: center !important;">
                                    <option value="00" <?php echo $minute=="0" ? "selected=selected" : "";?>>00</option>
                                    <option value="01" <?php echo $minute=="1" ? "selected=selected" : "";?>>01</option>
                                    <option value="02" <?php echo $minute=="2" ? "selected=selected" : "";?>>02</option>
                                    <option value="03" <?php echo $minute=="3" ? "selected=selected" : "";?>>03</option>
                                    <option value="04" <?php echo $minute=="4" ? "selected=selected" : "";?>>04</option>
                                    <option value="05" <?php echo $minute=="5" ? "selected=selected" : "";?>>05</option>
                                    <option value="06" <?php echo $minute=="6" ? "selected=selected" : "";?>>06</option>
                                    <option value="07" <?php echo $minute=="7" ? "selected=selected" : "";?>>07</option>
                                    <option value="08" <?php echo $minute=="8" ? "selected=selected" : "";?>>08</option>
                                    <option value="09" <?php echo $minute=="9" ? "selected=selected" : "";?>>09</option>
                                    <option value="10" <?php echo $minute=="10" ? "selected=selected" : "";?>>10</option>
                                    <option value="11" <?php echo $minute=="11" ? "selected=selected" : "";?>>11</option>
                                    <option value="12" <?php echo $minute=="12" ? "selected=selected" : "";?>>12</option>
                                    <option value="13" <?php echo $minute=="13" ? "selected=selected" : "";?>>13</option>
                                    <option value="14" <?php echo $minute=="14" ? "selected=selected" : "";?>>14</option>
                                    <option value="15" <?php echo $minute=="15" ? "selected=selected" : "";?>>15</option>
                                    <option value="16" <?php echo $minute=="16" ? "selected=selected" : "";?>>16</option>
                                    <option value="17" <?php echo $minute=="17" ? "selected=selected" : "";?>>17</option>
                                    <option value="18" <?php echo $minute=="18" ? "selected=selected" : "";?>>18</option>
                                    <option value="19" <?php echo $minute=="19" ? "selected=selected" : "";?>>19</option>
                                    <option value="20" <?php echo $minute=="20" ? "selected=selected" : "";?>>20</option>
                                    <option value="21" <?php echo $minute=="21" ? "selected=selected" : "";?>>21</option>
                                    <option value="22" <?php echo $minute=="22" ? "selected=selected" : "";?>>22</option>
                                    <option value="23" <?php echo $minute=="23" ? "selected=selected" : "";?>>23</option>
                                    <option value="24" <?php echo $minute=="24" ? "selected=selected" : "";?>>24</option>
                                    <option value="25" <?php echo $minute=="25" ? "selected=selected" : "";?>>25</option>
                                    <option value="26" <?php echo $minute=="26" ? "selected=selected" : "";?>>26</option>
                                    <option value="27" <?php echo $minute=="27" ? "selected=selected" : "";?>>27</option>
                                    <option value="28" <?php echo $minute=="28" ? "selected=selected" : "";?>>28</option>
                                    <option value="29" <?php echo $minute=="29" ? "selected=selected" : "";?>>29</option>
                                    <option value="30" <?php echo $minute=="30" ? "selected=selected" : "";?>>30</option>
                                    <option value="31" <?php echo $minute=="31" ? "selected=selected" : "";?>>31</option>
                                    <option value="32" <?php echo $minute=="32" ? "selected=selected" : "";?>>32</option>
                                    <option value="33" <?php echo $minute=="33" ? "selected=selected" : "";?>>33</option>
                                    <option value="34" <?php echo $minute=="34" ? "selected=selected" : "";?>>34</option>
                                    <option value="35" <?php echo $minute=="35" ? "selected=selected" : "";?>>35</option>
                                    <option value="36" <?php echo $minute=="36" ? "selected=selected" : "";?>>36</option>
                                    <option value="37" <?php echo $minute=="37" ? "selected=selected" : "";?>>37</option>
                                    <option value="38" <?php echo $minute=="38" ? "selected=selected" : "";?>>38</option>
                                    <option value="39" <?php echo $minute=="39" ? "selected=selected" : "";?>>39</option>
                                    <option value="40" <?php echo $minute=="40" ? "selected=selected" : "";?>>40</option>
                                    <option value="41" <?php echo $minute=="41" ? "selected=selected" : "";?>>41</option>
                                    <option value="42" <?php echo $minute=="42" ? "selected=selected" : "";?>>42</option>
                                    <option value="43" <?php echo $minute=="43" ? "selected=selected" : "";?>>43</option>
                                    <option value="44" <?php echo $minute=="44" ? "selected=selected" : "";?>>44</option>
                                    <option value="45" <?php echo $minute=="45" ? "selected=selected" : "";?>>45</option>
                                    <option value="46" <?php echo $minute=="46" ? "selected=selected" : "";?>>46</option>
                                    <option value="47" <?php echo $minute=="47" ? "selected=selected" : "";?>>47</option>
                                    <option value="48" <?php echo $minute=="48" ? "selected=selected" : "";?>>48</option>
                                    <option value="49" <?php echo $minute=="49" ? "selected=selected" : "";?>>49</option>
                                    <option value="50" <?php echo $minute=="50" ? "selected=selected" : "";?>>50</option>
                                    <option value="51" <?php echo $minute=="51" ? "selected=selected" : "";?>>51</option>
                                    <option value="52" <?php echo $minute=="52" ? "selected=selected" : "";?>>52</option>
                                    <option value="53" <?php echo $minute=="53" ? "selected=selected" : "";?>>53</option>
                                    <option value="54" <?php echo $minute=="54" ? "selected=selected" : "";?>>54</option>
                                    <option value="55" <?php echo $minute=="55" ? "selected=selected" : "";?>>55</option>
                                    <option value="56" <?php echo $minute=="56" ? "selected=selected" : "";?>>56</option>
                                    <option value="57" <?php echo $minute=="57" ? "selected=selected" : "";?>>57</option>
                                    <option value="58" <?php echo $minute=="58" ? "selected=selected" : "";?>>58</option>
                                    <option value="59" <?php echo $minute=="59" ? "selected=selected" : "";?>>59</option>
                                </select>
                                <span id="ErrEventEnd" class="error_msg"></span>
                                </div>
                        </div>
                         <div class="col-sm-6 mb-3">    
                         </div>
                        <div class="col-sm-6 mb-3">         
                                <label class="form-label">Status <span style='color:red'>*</span></label>
                                <select name="IsActive" id="IsActive" class="form-select">
                                    <option value="1" <?php echo ($data[0]['IsActive']==1) ? " selected='selected' " : "";?> >Active</option>
                                    <option value="0" <?php echo ($data[0]['IsActive']==0) ? " selected='selected' " : "";?> >Deactivated</option>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Remarks</label>
                                <input type="text" value="<?php echo $data[0]['Remarks'];?>"  name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
                        </div>
                    </div>
                </div>
             </div>
             <div class="col-sm-12 mb-3" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=events/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                <button onclick="toupdate()" type="button" class="btn btn-primary">Update Event</button>
            </div>
        </div>
        </div>
     </form>
</div>   
        
<div class="modal fade" id="confimation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to Update ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="doUpdate()" class="btn btn-primary">Yes,Upadte</button>
      </div>
    </div>
  </div>
</div>   
                            
<div class="modal" id="page_popup" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="page_popup_content" style="text-align: center;padding:30px;">
        <img src="<?php echo URL;?>assets/gif/spinner.gif" style="width:80px;margin:0px auto">
        Processing ...
    </div>
  </div>
</div>

<script>
function toupdate(){
   $('#confimation').modal("show");  
 }
 
function doUpdate() {
    $('#confimation').modal("hide"); 
    var param = $('#frm_edit').serialize();
    openPopup();
    clearDiv(['EventCode','EventTitle','EventDescription','EventStart','EventEnd','Remarks','CreatedOn','IsActive']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doUpdate&method=Events",
        data: new FormData($("#frm_edit")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#popupcontent').html(success_content(obj.message,'closePopup'));
             } else {
                if (obj.div!="") {
                    $('#Err'+obj.div).html(obj.message)
                } else {
                    $('#failure_div').html(obj.message);
                }
                $('#process_popup').modal('hide');
             }
        }
    });
}
setTimeout("d()",2000);
</script>