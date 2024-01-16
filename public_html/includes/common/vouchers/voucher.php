<?php $data= $mysql->select("select * from _tbl_receipts where ReceiptNumber='".$_GET['number']."'");?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Voucher</h1>
        </div>
        <div class="col-6" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?action=../common/vouchers/customized_voucherlist" class="btn btn-warning btn-sm">Customize Columns</a>
    </div>
</div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form id="frm_receipt" name="frm_receipt" id="frm_receipt">
                    <div class="row">
                        <div class="col-sm-9">
                           <div class="col-12 mb-1">
                                <input class="form-check-input" type="Radio" value="DATEWISE" id="Datewise" name="voucher" onclick="vouchersmethod('Datewise')">&nbsp;
                                    Date Wise  &nbsp;&nbsp;
                                 <input class="form-check-input" type="Radio" value="SEARCH" id="Search" name="voucher" onclick="vouchersmethod('Search')">&nbsp;
                                    Search
                                </div>
                           </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="display: none;" id="datewisevoucher">
        <div class="col-sm-12">
            <div class="card">
            <div class="card-body">
                <div class="col-sm-9 mb-3">
                    <label class="form-label">Date Range <span style='color:red'>*</span></label>
                        <div class="input-group">
                            <input type="text" readonly="readonly" name="FromDate" value="<?php echo date("d-m-Y");?>" id="FromDate" class="form-control" placeholder="From Date">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">To</span>
                        </div>
                            <input type="text" readonly="readonly" value="<?php echo date("d-m-Y");?>" name="ToDate" id="ToDate" class="form-control" placeholder="To Date">
                            <button type="button" onclick="getData()" class="btn btn-primary">Get Data</button>
                        </div> 
                            <span id="Errmessage" class="error_msg"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function vouchersmethod(m) {    
           clearDiv(['message']); 
            if (m=="Datewise"){
               $('#datewisevoucher').show();   
               $('#searchwisevoucher').hide();   
            } 
            if (m=="Search")  {
               $('#datewisevoucher').hide();  
               $('#searchwisevoucher').show();  
               $('#listData').hide();  
            }
        } 
    </script>
    <div class="row" id="listData" style="display:none">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:25px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Voucher<br>Number</th>
                                <th>Voucher<br>Date</th>
                                <th>Customer<br>Name</th>
                                <th>Contract<br>ID</th>
                                <th>Voucher<br>Type</th>
                                <th style="text-align: right;">Gold<br>(Grams)</th>
                                <th style="text-align: right;">Settlement<br>Amount(₹)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="7" style="text-align: center;background:#fff !important">Loading customers ...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" style="display: none;" id="searchwisevoucher">
        <div class="col-sm-12">
            <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data" >
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-body" style="padding-bottom:0px">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="form-label">Customer <span style='color:red'>*</span></label>
                                <input type="text" name="CustomerID" id="CustomerID" class="form-control" placeholder="Customer Name/Mobile Number">
                                <span id="ErrCustomerID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3" id="CustomerResult">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 col-xl-3">
                <div class="card"  style="display: none;">
                    <div class="card-body" style="padding:10px 20px">
                        <div class="row">
                            <div class="col-sm-12">
                                 
                                <div class="row">
                                <div class="col-sm-12">
                                       <hr>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="form-label">Recurring mode</label>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:5px"><input type="radio"> One Time</div>
                                    <div class="col-sm-12" style="margin-bottom:5px"><input type="radio"> Monthly</div>
                                    <div class="col-sm-12" style="margin-bottom:5px"><input type="radio"> Yearly</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>                
    </form>
        </div>
    </div>

<script>

function getData() {
    var param = $('#frm_voucher').serialize();
    openPopup();
    clearDiv(['message']);
    $.post(URL+ "webservice.php?action=listAll&method=Vouchers",param,function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.VoucherNumber + '</td>'
                    + '<td>' + data.VoucherDate + '</td>'
                    + '<td>' + data.CustomerName + '</td>'
                    + '<td>' + data.ContractCode + '</td>'
                    + '<td>' + data.VoucherType + '</td>'
                    + '<td style="text-align:right">' + data.GoldInGrams + '</td>'
                    + '<td style="text-align:right">' + data.TotalPaidAmount + '</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/voucher&number='+data.VoucherNumber+'">View Voucher</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'">View Contract</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=customers/view&customer='+data.CustomerID+'">View Customer</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
            }); 
            if (obj.data.length==0) {
         html += '<tr>'
                    + '<td colspan="7" style="text-align: center;background:#fff !important">No Data Found</td>'
               + '</tr>';
    }  
            $('#tbl_content').html(html);
            $('#listData').show();
            
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
</script>

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


var selectedCustomerID=0; 


 

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
                                        + '<a href="'+URL+'dashboard.php?action=masters/customers/view&customer='+item.CustomerID+'&fpg=masters/customers/searchcustomers" class="btn btn-outline-primary btn-sm">View Details</a>'
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



/*An array containing all the country names in the world:*/
<?php 
$clients = $mysql->select("select CustomerID,Date(CreatedOn) as CreatedOn, CustomerID as value,CustomerName as text,AreaName, CustomerName, MobileNumber,concat(AddressLine1,', ',AddressLine2,', ',AreaName,', ',DistrictName,', ',StateName,', ',PinCode) as AddressLine from _tbl_masters_customers where IsActive='1' and CustomerID in (select CustomerID from _tbl_vouchers) order by CustomerName");
?>
autocomplete(document.getElementById("CustomerID"), <?php echo json_encode($clients);?>); 

</script>
         