<div class="container-fluid p-0">
    <h1 class="h3 mb-3">New Contract</h1>
    <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-body" style="padding-bottom:0px">
                        <div class="row">
                       <div class="col-sm-3 mb-3">
                                <label class="form-label">Entry Date <span style='color:red'>*</span></label>
                                <input type="date" name="EntryDate" value="<?php echo date("Y-m-d");?>" id="EntryDate" class="form-control" placeholder="Entry Date" onchange="getGoldRate();">
                                <span id="ErrEntryDate" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Customers <span style='color:red'>*</span></label>
                                <input type="text" name="CustomerID" id="CustomerID" class="form-control" placeholder="Customer Name/Mobile Number">
                                <span id="ErrCustomerID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3" id="CustomerResult">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-body" style="padding-bottom:0px;">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Schemes <span style='color:red'>*</span></label>
                                <input type="text" name="SchemeID" id="SchemeID" class="form-control" placeholder="Scheme">
                                <span id="ErrSchemeID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3" id="SchemeResult">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-12 col-xl-12" id="contractinformation" >
                <div class="card">
                    <div class="card-body" style="padding-bottom:0px;">
                        <div class="row">
                        <div class="col-sm-4 mb-3">
                                <label class="form-label">Due Amount <span style='color:red'>*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">₹</span>
                                    </div>
                                    <input type="text" style="text-align: right;" name="DueAmount" id="DueAmount" class="form-control" placeholder="0"  onkeyup="getTotalAmount();">
                                </div>
                                <span id="ErrDueAmount" class="error_msg"></span>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Duration <span style='color:red'>*</span></label>
                                <div class="input-group">
                                <select data-live-search="true" data-size="2" name="InstallmentMode" id="InstallmentMode" class="form-select mselect" onchange="printLable()">
                                     <!-- <option value="0">Select Mode</option>
                                    <option  value="WEEKLY">WEEKLY</option> -->
                                    <option value="MONTHLY">MONTHLY</option>
                                </select>
                                <input type="text" style="text-align: right;" name="Duration" id="Duration" class="form-control" placeholder="0" onkeyup="getTotalAmount()">
                            </div>
                            <span id="ErrDuration" class="error_msg"></span>
                            </div>
                            <script>
                                function printLable() {
                                    if ($('#InstallmentMode').val()=="WEEKLY"){
                                        $('#_printlabel').html("Weekly");    
                                    }
                                    if ($('#InstallmentMode').val()=="MONTHLY"){
                                        $('#_printlabel').html("Monthly");    
                                    }
                                    if ($('#InstallmentMode').val()=="0"){
                                        $('#_printlabel').html("");    
                                    }
                                }
                                </script>
                                <div class="col-sm-4 mb-3">
                                <label class="form-label">Total Amount</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">₹</span>
                                    </div>
                                    <input type="text" readonly="readonly" style="text-align: right; "name="Amount" id="Amount" class="form-control" placeholder="0">
                                </div>
                                <script>
                                function getTotalAmount() {
                                    var _dueamount=$('#DueAmount').val()==""?0:$('#DueAmount').val();
                                    var _intallment=$('#Duration').val()==""?0:$('#Duration').val();
                                     var amount= parseFloat(_dueamount);       
                                     var installments= parseFloat(_intallment); 
                                     var Amount= amount*installments;
                                     $('#Amount').val(Amount.toFixed(2));
                                     
                                     calculateGold();
                                }
                                </script>
                            </div>
                                <div class="col-sm-4 mb-3">
                                <div id="Gold_benefits">
                                    <label class="form-label"><span id="_printChange"></span> Material Type <span style='color:red'>*</span></label>
                                    <select class="form-select" name="MaterialType" id="MaterialType" onchange="calculateGold()">
                                        <option value="0">Select Material Type </option>
                                        <option value="GOLD_18">GOLD_18</option>
                                        <option value="GOLD_22">GOLD_22</option>
                                        <option value="GOLD_24">GOLD_24</option>
                                    </select>
                                    <span id="ErrMaterialType" class="error_msg"></span> 
                                </div>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Gold price</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">₹</span>
                                    </div>
                                    <input type="text" readonly="readonly" style="text-align: right; "name="GoldRate" id="GoldRate" class="form-control" placeholder="0.00">
                                </div>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Gold (Grams) </label>
                                <input type="text" style="text-align: right;" readonly="readonly" name="GoldInGrams" id="GoldInGrams" class="form-control" placeholder="0.000">
                            </div>
                            <div class="col-sm-6  mb-3">
                                <label class="form-label">Payment Mode <span style='color:red'>*</span></label>
                                <select data-live-search="true" data-size="5" name="PaymentModeID" id="PaymentModeID" class="form-select mstateselect">
                                    <option>loading...</option>
                                </select>
                                <span id="ErrPaymentModeID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Payment Remarks <span style='color:red'>*</span></label>
                                <input type="text" name="PaymentRemarks" id="PaymentRemarks" class="form-control" placeholder="Payment Remarks">
                                <span id="ErrPaymentRemarks" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-sm-12" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=contracts/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                <button  type="button" onclick="Confirmationtoadd()" class="btn btn-primary">Create Contract</button>    
            </div>
        </div>                
    </form>
</div>

<div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to create Contract ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="addNew()" class="btn btn-primary">Yes, Create</button>
      </div>
    </div>
  </div>
</div>
            <style>
              
              .autocomplete {
  position: relative;
  display: inline-block;
}
.autocomplete-items {
  /*position: absolute;*
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
  margin:0px 10px;
  
  border: 1px solid #ccc;border-top: 0px;
}

.autocomplete-items div {
  padding: 5px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
              </style>              
                           
  
  

<script>  

var goldRates_18;
var goldRates_22;
var goldRates_24;

var selectedCustomerID=0; 
var selectedSchemeID=0; 

function daysdifference(firstDate, secondDate){  
    var startDay = new Date('<?php echo date("Y-m-d");?>');  
    var endDay = new Date(secondDate);  
  
// Determine the time difference between two dates     
    var millisBetween = startDay.getTime() - endDay.getTime();  
  
// Determine the number of days between two dates  
    var days = millisBetween / (1000 * 3600 * 24);  
  
// Show the final number of days between dates  
if (Math.round(Math.abs(days))<1)    {
    return Math.round(Math.abs(days))+ " day";  
}   else {
    return Math.round(Math.abs(days))+ " days";  
}
    
}  

function openLink(link) {
    //window.open(link+"&viewonly=1"); 
    //window.open(link+"&viewonly=1", "MsgWindow", "width=800,height=500");  
    var url = link+"&viewonly=1";
    var h=500;
    var w=800;
    var left = (screen.width/2)-(w/2);
    var top = (screen.height/2)-(h/2);
    window.open(url, "Information", 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);

}


function autocomplete(inp, arr) {
    selectedCustomerID = 0;
   
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/ 
       $('#ErrCustomerID').html(""); 
       $.each(arr, function(i, item) {
        /*check if the item starts with the same letters as the text field value:*/
        if ( (item.text.substr(0, val.length).toUpperCase() == val.toUpperCase()) ||  (item.MobileNumber.substr(0, val.length).toUpperCase() == val.toUpperCase()) ||  (item.CustomerID.substr(0, val.length).toUpperCase() == val.toUpperCase()) ) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          html = "<span class='row' style='background:none;'>";
            //html += "<span class='col-sm-2' style='background:none'>"+item.CustomerID+"</span>";
            html += "<span class='col-sm-4' style='background:none'>"+item.CustomerName+"</span>";
            html += "<span class='col-sm-3' style='background:none'>"+item.MobileNumber+"</span>";
            html += "<span class='col-sm-3' style='background:none'>"+item.AreaName+"</span>";
          html += "</span>"
          
          //b.innerHTML = "<strong>" + item.text.substr(0, val.length) + "</strong>";
          //b.innerHTML += item.text.substr(val.lengt  h);
          
          b.innerHTML = html;
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + item.text+ "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              selectedCustomerID = item.value;
              
              
              txtHtml = '<div class="row">'
                                    + '<div class="col-sm-4">'
                                        + '<label class="form-label" style="font-weight:bold;margin-bottom:0px !important">Customer Name</label><br>'
                                        +  item.CustomerName
                                    + '</div>'
                                    + '<div class="col-sm-4">'
                                        + '<label class="form-label" style="font-weight:bold;margin-bottom:0px !important">Mobile Number</label><br>'
                                        +  item.MobileNumber
                                    + '</div>'
                                    + '<div class="col-sm-8" style="margin-top: 15px;">'
                                       + '<label class="form-label" style="font-weight:bold;margin-bottom:0px !important">Address</label><br>'
                                       +  item.AddressLine
                                    + '</div>'
                                    + '<div class="col-sm-12" style="text-align:right;">'
                                        + '<!--<a href="'+URL +'dashboard.php?action=customers/view&edit='+item.value+'" class="btn btn-outline-primary btn-sm" target="_blank">View Details</a>-->'
                                        + '<a href="'+URL+'dashboard.php?action=masters/customers/view&customer='+item.CustomerID+'" class="btn btn-outline-primary btn-sm">View Details</a>'
                                    + '</div>';
             $('#CustomerResult').html(txtHtml) ;
             $('#customersince').html(daysdifference(0,item.CreatedOn));
             $('#CustomerResult').show() ;
              
              $('#ErrCustomerID').html("");
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      });
      
  });
  
  
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      selectedID = 0;
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
      selectedID = 0;
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
      selectedID=0;
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
      
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

function scheme_autocomplete(inp, arr) {
    selectedSchemeID = 0;
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/ 
     
       $.each(arr, function(i, item) {
        /*check if the item starts with the same letters as the text field value:*/
        if ( (item.text.substr(0, val.length).toUpperCase() == val.toUpperCase())) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");  
          /*make the matching letters bold:*/
          html = "<span class='row' style='background:none;'>";
            //html += "<span class='col-sm-2' style='background:none'>"+item.CustomerID+"</span>";
            html += "<span class='col-sm-4' style='background:none'>"+item.SchemeName+"</span>";
            html += "<span class='col-sm-4' style='background:none'>"+item.WastageDiscount+"<span>%</span></span>";
            html += "<span class='col-sm-4' style='background:none'>"+item.MakingChargeDiscount+"<span>%</span></span>";
            
            //html += "<span class='col-sm-3' style='background:none'>"+item.MobileNumber+"</span>";
            //html += "<span class='col-sm-3' style='background:none'>"+item.Address+"</span>";
          html += "</span>"
          
          //b.innerHTML = "<strong>" + item.text.substr(0, val.length) + "</strong>";
          //b.innerHTML += item.text.substr(val.length);
          
          b.innerHTML = html;
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + item.text+ "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              selectedSchemeID = item.value;
              $('#ErrSchemeID').html("");
              
              
             $('#DueAmount').val(item.InstallmentAmount) ;
              txtHtml = '<div class="row">'
                                    + '<div class="col-sm-4">'
                                        + '<label class="form-label" style="font-weight:bold;margin-bottom:0px !important">Scheme Name </label><br>'
                                        +  item.SchemeName
                                    + '</div>'
                                    + '<div class="col-sm-4">'
                                        + '<label class="form-label" style="font-weight:bold;margin-bottom:0px !important">Due Amount <span>(₹)</span></label><br>'
                                        +  item.MinDueAmount+ '&nbsp; - &nbsp;'  + item.MaxDueAmount
                                    + '</div>'+ 
                                    '<div class="col-sm-4">'
                                        + '<label class="form-label" style="font-weight:bold;margin-bottom:0px !important">Duration (Months) </label><br>'
                                        +  item.MinDuration+ '&nbsp; - &nbsp;'  + item.MaxDuration
                                    + '</div>' 
                                    + '<div class="col-sm-4">'
                                        + '<label class="form-label" style="font-weight:bold;margin-bottom:0px !important">Wastage Discount <span>(%)</span></label><br>'
                                        +  item.WastageDiscount 
                                    + '</div>'
                                    + '<div class="col-sm-4">'
                                        + '<label class="form-label" style="font-weight:bold;margin-bottom:0px !important">Making Charge Discount <span>(%)</span></label><br>'
                                        + item.MakingChargeDiscount
                                    + '</div>' 
                                    + '<div class="col-sm-12" style="text-align:right;">'
                                        + '<!--<a href="'+URL +'dashboard.php?action=masters/services/view&edit='+item.value+'" class="btn btn-outline-primary btn-sm" target="_blank">View Details</a>-->'
                                        + '<a href="'+URL+'dashboard.php?action=masters/schemes/view&edit='+item.SchemeID+'" class="btn btn-outline-primary btn-sm">View Details</a>'
                                    + '</div>';
             $('#SchemeResult').html(txtHtml) ;
             $('#SchemeResult').show() ;
             
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      });
      
  });
  
  
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      selectedID = 0;
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
      selectedID = 0;
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
      selectedID=0;
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
      
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}      

/*An array containing all the country names in the world:*/
<?php 
$clients = $mysql->select("select CustomerID,Date(CreatedOn) as CreatedOn, CustomerID as value,CustomerName as text,AreaName, CustomerName, MobileNumber,concat(AddressLine1,', ',AddressLine2,', ',AreaName,', ',DistrictName,', ',StateName,', ',PinCode) as AddressLine from _tbl_masters_customers where IsActive='1' order by CustomerName");
$scheme = $mysql->select("select *,SchemeName as text,SchemeID as value  from _tbl_masters_schemes where IsActive='1' order by SchemeName");
?>
autocomplete(document.getElementById("CustomerID"), <?php echo json_encode($clients);?>);
scheme_autocomplete(document.getElementById("SchemeID"), <?php echo json_encode($scheme);?>);
function Confirmationtoadd(){
   $('#confirmation').modal("show");  
 }
 var CreatedContractID=0;
function addNew() {
        clearDiv(['CustomerName','MobileNumber','PaymentModeID','EntryDate','DueAmount','Amount','Duration','InstallmentMode','InstallmentAmount','MaterialType','ModeOfBenifits','Remarks','IsActive']);
     $('#confirmation').modal("hide");
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(['CustomerName','MobileNumber','EntryDate','PaymentModeID','DueAmount','Amount','Duration','InstallmentMode','InstallmentAmount','MaterialType','ModeOfBenifits','Remarks','IsActive']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addNew&method=Contracts&Customer="+selectedCustomerID+"&Scheme="+selectedSchemeID,
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                CreatedContractID = obj.ContractID;
                $('#popupcontent').html(success_content(obj.message,'closePopup(); opencontractview'));
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
function opencontractview()  {
  location.href=URL +'dashboard.php?action=contracts/view&view='+CreatedContractID;  
}
setTimeout("listpaymentmodes();getGoldRate();",2000);


function calculateGold() {
    
    $('#GoldRate').val("");
        $('#GoldInGrams').val("");
        $('#ErrDueAmount').html("");  
        if ($('#DueAmount').val()=="") {
       $('#ErrDueAmount').html("Please Enter Due Amount"); 
       return false; 
     } 
        var dueamount=parseInt($('#DueAmount').val());  
     if (dueamount==0) {
       $('#ErrDueAmount').html("Please Enter Due Amount"); 
       return false; 
     } 
     
     if ( $('#MaterialType').val()=="0") {
          $('#GoldRate').val("");
          $('#GoldInGrams').val("");
          $('#ErrDueAmount').html("");  
          return false; 
     } 
     
         if ($('#MaterialType').val()=="GOLD_18") {
              var goldrate=parseInt(goldRates_18);                   
              $('#GoldRate').val(goldrate);
              $('#GoldInGrams').val( (dueamount/goldrate).toFixed(3)); 
         }
         
          if ($('#MaterialType').val()=="GOLD_22") {
              var goldrate=parseInt(goldRates_22);  
              $('#GoldRate').val(goldrate);
              $('#GoldInGrams').val( (dueamount/goldrate).toFixed(3)); 
         }
         
          if ($('#MaterialType').val()=="GOLD_24") {
              var goldrate=parseInt(goldRates_24);  
              $('#GoldRate').val(goldrate);
              $('#GoldInGrams').val( (dueamount/goldrate).toFixed(3)); 
         }
}

function getGoldRate() {
    openPopup();
    $.post(URL+"webservice.php?action=getGoldRate&method=goldRates&date="+$('#EntryDate').val(),"",function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
         
            goldRates_18=obj.data.GOLD_18;
            goldRates_22=obj.data.GOLD_22;
            goldRates_24=obj.data.GOLD_24; 
            calculateGold(); 
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
            $('#process_popup').modal('hide');
        }
        closePopup();
        
    });
}

function CreateContract() {
    if (selectedCustomerID==0) {
        $('#ErrCustomerID').html("please select customer");
        return;
    }
    if (selectedSchemeID==0) {
        $('#ErrSchemeID').html("please select scheme");
        return;
    }
    openPopup();
    $.post(URL+"webservice.php?action=addNew&method=Contracts&Customer="+selectedCustomerID+"&Service="+selectedSchemeID,"",function(data){
        
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            //$('#frm_create').trigger("reset");
            //if (obj.BankNameCode.length>3) {
                //$('#BankNameCode').val(obj.BankNameCode);
            //}                   
            $('#popupcontent').html(successcontent(obj.message,'dashboard.php?action=contracts/edit&edit='+obj.id));
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
            $('#process_popup').modal('hide');
        }
        
    });
}

function listpaymentmodes() {
    $.post(URL+ "webservice.php?action=listAllActive&method=PaymentModes","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'> Select Payment Mode</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.PaymentModeID+'">'+data.PaymentMode+'</option>';
            });   
            $('#PaymentModeID').html(html);
             $("#PaymentModeID").append($("#PaymentModeID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            $("#PaymentModeID").val("0");
            setTimeout(function(){
            },1500);
        } else {
            alert(obj.message);
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    const ele = document.getElementById('DueAmount');
    const state = {
        value: ele.value,
    };

    ele.addEventListener('keydown', function (e) {
        const target = e.target;
        state.selectionStart = target.selectionStart;
        state.selectionEnd = target.selectionEnd;
    });

    ele.addEventListener('input', function (e) {
        const target = e.target;

        if (/^[0-9\s]*$/.test(target.value)) {
            state.value = target.value;
        } else {
            // Users enter the not supported characters
            // Restore the value and selection
            target.value = state.value;
            target.setSelectionRange(state.selectionStart, state.selectionEnd);
        }
    });
});  

document.addEventListener('DOMContentLoaded', function () {
    const ele = document.getElementById('Duration');
    const state = {
        value: ele.value,
    };

    ele.addEventListener('keydown', function (e) {
        const target = e.target;
        state.selectionStart = target.selectionStart;
        state.selectionEnd = target.selectionEnd;
    });

    ele.addEventListener('input', function (e) {
        const target = e.target;

        if (/^[0-9\s]*$/.test(target.value)) {
            state.value = target.value;
        } else {
            // Users enter the not supported characters
            // Restore the value and selection
            target.value = state.value;
            target.setSelectionRange(state.selectionStart, state.selectionEnd);
        }
    });
}); 


</script>  
 <!--
 https://bootstrap-autocomplete.readthedocs.io/en/latest/
 https://www.w3schools.com/howto/howto_js_autocomplete.asp
  -->