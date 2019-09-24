{{-- @extends('layouts.app') --}}

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INVOICE</title>

    <!-- Custom fonts for this template-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css">
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom /styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        {{-- sidebar --}}
        {{-- endsideba --}}

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been
                                            having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60"
                                            alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them
                                            sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60"
                                            alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so
                                            far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people
                                            say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">New Invoice</h1>
                        <a href="{{route('home')}}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                                class="fas fa-arrow-left fa-sm text-white-50"></i> Go Back</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        {{-- <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                              aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}
                    </div>

                    <!-- Content Row -->

                    <div class="row">
                        <form action="{{route('form.store')}}" class="form" id="invoice_form" method="POST">
                            {{ csrf_field() }}
                            <div class="table-responsive">
                                <table class="table table-bordered table-responsive">
                                    <tr>
                                        <td scope="col" colspan="2" align="center">
                                            <h1 style="margin-top:10.5px;">Create Invoice</h1>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="row">
                                                <div class="form-group col-md-8">
                                                    To, <br>
                                                    <b>RECEIVER (BILL TO)</b><br>
                                                    <input type="text" name="order_receiver_name"
                                                        id="order_receiver_name" class="form-control input-sm"
                                                        placeholder="Order Receiver name" required><br>
                                                    <textarea name="order_receiver_adress" id="order_receiver_adress"
                                                        cols="30" rows="10" class="form-control"
                                                        placeholder="enter Billing adress"></textarea>
                                                </div>
                                                <div class="form-group col-md-4" style="margin-top:1.5em;">
                                                    Reverse Charge<br />
                                                    <input type="text" name="order_no" id="order_no"
                                                        class="form-control input-sm" placeholder="Enter Order No"
                                                        required><br>
                                                    <input type="text" name="order_date" id="order_date"
                                                        class="form-control input-sm" placeholder="select invoice date"
                                                        readonly required>
                                                    <script>
                                                        $('#order_date').datepicker({
                                                                        uiLibrary: 'bootstrap4',
                                                                        formart: "yyy-mm-dd",
                                                                        autoclose:true
                                                                    });
                                                    </script>
                                                </div>
                                            </div>
                                            <table id="invoice-item-table"
                                                class="table table-bordered table-responsive">
                                                <tr>
                                                    <th scope="col">Sr No.</th>
                                                    <th scope="col">Item Name</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">price</th>
                                                    <th scope="col">Actual Amt.</th>
                                                    <th scope="col" colspan="2">Tax1 (%)</th>
                                                    <th scope="col" colspan="2">Tax2 (%)</th>
                                                    <th scope="col" colspan="2">Tax3 (%)</th>
                                                    <th scope="col" colspan="2">Total</th>
                                                    <th scope="col" colspan="2"></th>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Rate</th>
                                                    <th>Amt.</th>
                                                    <th>Rate</th>
                                                    <th>Amt.</th>
                                                    <th>Rate</th>
                                                    <th>Amt.</th>
                                                </tr>
                                                <tr>
                                                    <td><span class="sr_no">1</span></td>
                                                    <td>
                                                        <input type="text" name="item_name[]" id="item_name1"
                                                            placeholder="Enter Item Name" required data-srno="1"
                                                            class="form-control input-sm">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="item_quantity[]" id="item_quantity1"
                                                            placeholder="Enter Item quantity" required data-srno="1"
                                                            class="form-control input-sm number_only order_item_quantity">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="item_price[]" id="item_price1"
                                                            placeholder="Enter Item price" required data-srno="1"
                                                            class="form-control input-sm number_only order_item_price">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="item_actual_amount[]"
                                                            id="item_actual_amount1" required data-srno="1" readonly
                                                            required class="form-control input-sm item_actual_amount">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="item_tax1_rate[]" id="item_tax1_rate1"
                                                            required data-srno="1" required
                                                            class="form-control input-sm number_only item_tax1_rate">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="item_tax1_amount[]"
                                                            id="item_tax1_amount1" required data-srno="1" readonly
                                                            required
                                                            class="form-control input-sm order_item_tax1_amount">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="item_tax2_rate[]" id="item_tax2_rate1"
                                                            required data-srno="1" required
                                                            class="form-control input-sm number_only item_tax2_rate">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="item_tax2_amount[]"
                                                            id="item_tax2_amount1" required data-srno="1" readonly
                                                            required
                                                            class="form-control input-sm order_item_tax2_amount">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="item_tax3_rate[]" id="item_tax3_rate1"
                                                            required data-srno="1" required
                                                            class="form-control input-sm number_only item_tax3_rate">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="item_tax3_amount[]"
                                                            id="item_tax3_amount1" required data-srno="1" readonly
                                                            required
                                                            class="form-control input-sm order_item_tax3_amount">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="item_final_amount[]"
                                                            id="item_final_amount1" required data-srno="1" readonly
                                                            required class="form-control input-sm item_final_amount">
                                                    </td>
                                                </tr>
                                            </table>
                                            <div align="center">
                                                <button type="button" class="add_row btn-primary btn btn-xs"
                                                    id="add_row">+</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Total</td>
                                        <td align="right"><b><span id="final_total_amt"></span></br></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center">
                                            <input type="hidden" class="total_item" id="total_item" value="1">
                                            <input type="submit" name="create_invoice" id="create_invoice"
                                                value="Create Invoice" class="btn btn-success">
                                        </td>

                                    </tr>
                                </table>

                            </div>
                        </form>
                    </div>
                    <script>
                        $(document).ready(function(){
                            const final_total_amt = $('#final_total_amount').text();
                            let count = 1;
                            $(document).on('click', '#add_row', function(){
                                count = count + 1;
                                $('#total_item').val(count);
                                var html_code = '';
                                html_code += '<tr id="row_id_'+count+'">';
                                html_code += '<td><span id="sr_no">'+count+'</span></td>'
                                html_code +='<td> <input type="text" name="item_name[]" id="item_name1'+count+'" class="form-control input-sm" placeholder="Enter Item Name"></td>'; 
                                html_code += '<td><input type="text" name="item_quantity[]" id="item_quantity'+count+'" placeholder="Enter Item quantity" required data-srno="'+count+'" class="form-control input-sm number_only order_item_quantity"></td>';
                                html_code += '<td><input type="text" name="item_price[]" id="item_price'+count+'" placeholder="Enter Item price" required data-srno="'+count+'" class="form-control input-sm number_only order_item_price"></td>';
                                html_code += '<td><input type="text" name="item_actual_amount[]" id="item_actual_amount'+count+'" required data-srno="'+count+'" readonly required class="form-control input-sm item_actual_amount"></td>';
                                html_code += '<td><input type="text" name="item_tax1_rate[]" id="item_tax1_rate'+count+'" required data-srno="'+count+'" required class="form-control input-sm number_only item_tax1_rate"></td>';
                                html_code += '<td><input type="text" name="item_tax1_amount[]" id="item_tax1_amount'+count+'" required data-srno="'+count+'" readonly required class="form-control input-sm order_item_tax1_amount"></td>';
                                html_code += '<td><input type="text" name="item_tax2_rate[]" id="item_tax2_rate'+count+'" required data-srno="'+count+'" required class="form-control input-sm number_only item_tax2_rate"></td>';
                                html_code += '<td><input type="text" name="item_tax2_amount[]" id="item_tax2_amount'+count+'" required data-srno="'+count+'" readonly required class="form-control input-sm order_item_tax2_amount"></td>';
                                html_code += '<td><input type="text" name="item_tax3_rate[]" id="item_tax3_rate'+count+'" required data-srno="'+count+'" required class="form-control input-sm number_only item_tax3_rate"></td>';
                                html_code += '<td><input type="text" name="item_tax3_amount[]" id="item_tax3_amount'+count+'" required data-srno="'+count+'" readonly required class="form-control input-sm order_item_tax3_amount"></td>';
                                html_code += '<td><input type="text" name="item_final_amount[]" id="item_final_amount'+count+'" required data-srno="'+count+'" readonly required class="form-control input-sm item_final_amount"></td>';
                                html_code += '<td><button type="button" name="remove_row" class="remove_row btn btn-danger btn-xs" id="'+count+'">X</button></td></tr>';
                                $('#invoice-item-table').append(html_code);
                            });
                            $(document).on('click', '.remove_row', function(){
                             var row_id = $(this).attr("id");
                             var item_total_amount = $('#item_final_amount'+row_id).val();
                             var final_amount = $('#final_total_amt').text();
                             var result_amout = parseFloat(final_amount) - parseFloat(item_total_amount);
                             $('#final_total_amount').text(result_amout);
                             $('#row_id_'+row_id).remove();
                              count --;
                             $('#total_item').val(count);
                            });
                            function cal_final_total(count){
                                // event.preventDefault();
                                var final_item_total = 0;
                                for(j=0; j<=count; j++){
                                    var quantity = 0;
                                    var price = 0;
                                    var actual_amount = 0;
                                    var tax1_rate = 0;
                                    var tax1_amount = 0;
                                    var tax2_rate = 0;
                                    var tax2_amount = 0;
                                    var tax3_rate = 0;
                                    var tax3_amount = 0;
                                    var item_total = 0;
                                      quantity = $('#item_quantity' +j).val();
                                    if(quantity > 0){
                                        price = $('#item_price' +j).val();
                                        if (price > 0) {
                                            actual_amount = parseFloat(quantity) * parseFloat(price);
                                            $('#item_actual_amount'+j).val(actual_amount);
                                            tax1_rate = $('#item_tax1_rate' +j).val();
                                            if (tax1_rate > 0) {
                                                tax1_amount = parseFloat(actual_amount) * parseFloat(tax1_rate)/100;
                                                $('#item_tax1_amount' +j).val(tax1_amount);
                                            }
                                            tax2_rate = $('#item_tax2_rate' +j).val();
                                            if (tax2_rate > 0) {
                                                tax2_amount = parseFloat(actual_amount) * parseFloat(tax2_rate)/100;
                                                $('#item_tax2_amount' +j).val(tax2_amount);
                                            }
                                            tax3_rate = $('#item_tax3_rate' +j).val();
                                            if (tax3_rate > 0) {
                                                tax3_amount = parseFloat(actual_amount) * parseFloat(tax3_rate)/100;
                                                $('#item_tax3_amount' +j).val(tax3_amount);
                                            }
                                            item_total = parseFloat(actual_amount) + parseFloat(tax1_amount) + parseFloat(tax2_amount) + parseFloat(tax3_amount);
                                            final_item_total = parseFloat(final_item_total) + parseFloat(item_total);
                                            $('#item_final_amount').val(item_total);
                                        }
                                    }

                                }
                                $('#final_total_amt').text(final_item_total);
                            }
                            $(document).on('blur', '.order_item_price', function(){
                                cal_final_total(count);
                            });
                            $(document).on('blur', '.item_tax1_rate', function(){
                                cal_final_total(count); 
                            })
                            $(document).on('blur', '.item_tax2_rate', function(){
                                cal_final_total(count); 
                            });
                            $(document).on('blur', '.item_tax3_rate', function(){
                                cal_final_total(count); 
                            });
                            $('#create_invoice').click(function(){
                                if ($.trim($('#order_receiver_name').val()).length == 0) {
                                    alert('please enter receiver name');
                                    return false;
                                }
                                if ($.trim($('#order_no').val()).length == 0) {
                                    alert('please invoice number is required');
                                }
                                if ($.trim($('#order_date').val()).length == 0) {
                                    alert('Invoice date is required');
                                    return false;
                                }
                                for (let no = 0; no <= count; no++) {
                                    if ($.trim($('#item_name' +no).val()).length ==0) {
                                        alert(" invoice item name is required");
                                        $('#item_name'+no).focus();
                                        return false;
                                    }
                                    if ($.trim($('#item_quantity' + no).val()).length ==0) {
                                        alert(" invoice item name is required");
                                        $('#item_quantity' + no).focus();
                                        return false;
                                    }
                                    if ($.trim($('#item_price' +no).val()).length ==0) {
                                        alert(" invoice item name is required");
                                        $('#item_price'+no).focus();
                                        return false;
                                    }
                                    
                                }
                                $('#invoice_form').submit();

                            });
                        });
                    </script>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; moses invoice 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    {{-- <a class="btn btn-primary" href="login.html">Logout</a> --}}
                    <a class="dropdown-item btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plu/gin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom s/cripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page lev/el plugins -->
    <script src="/vendor/chart.js/Chart.min.js"></script>

    <!-- Page lev/el custom scripts -->
    <script src="/js/demo/chart-area-demo.js"></script>
    <script src="/js/demo/chart-pie-demo.js"></script>

</body>

</html>
{{-- @endsection --}}