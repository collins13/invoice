@extends('layouts.main')
@section('content')
<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Invoice</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
  </ul>
</div>
<div class="card">
    <div class="card-header bg-primary">
      All Invoice
    </div>
    <div class="card-body">
        <a href="#" class="btn btn-primary" id="create-invoice">Create New Invoice</a><hr>
        <table class="table" id="invoice-table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Invoice No.</th>
              <th scope="col">Invoice Date.</th>
              <th scope="col">Receiver Name.</th>
              <th scope="col">Invoice Total.</th>
              <th scope="col">PDF.</th>
              <th scope="col">Edit.</th>
              <th scope="col">Delete.</th>
              <th scope="col">Send.</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($invoices as $invoice)
            <tr>
              <th scope="row">{{$invoice->id}}</th>
              <td>{{$invoice->order_no}}</td>
              <td>{{$invoice->order_date}}</td>
              <td>{{$invoice->order_receiver_name}}</td>
              <td>{{$invoice->order_total_after_tax}}</td>
              <td><a href=""><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
              <td><a href="#"><i class="fa fa-pencil"></i></a></td>
              <td><a href=""><i class="fa fa-trash" aria-hidden="true" style="color:red"></i></a></td>
              <td><a href=""><i class="fa fa-paper-plane" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
  </div>

<style>
.modal {
    display: none;
    height: 100%;
    left: 0;
    position: fixed;
    top: 0;
    width: 100%;
}

</style>

{{-- add modal --}}
<div class="modal fade" id="invoiceModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create New Invoice</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                <form action="{{route('create')}}" class="form" id="invoice_form" method="POST">
                        @csrf
                        {{-- <div class="table-responsive table table-borderless">
                                <table class="table table-bordered table-responsive"> --}}
                        <div>
                            <table>
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
                                                <input type="text" name="order_receiver_name" id="order_receiver_name"
                                                    class="form-control input-sm" placeholder="Order Receiver name" required><br>
                                                <textarea name="order_receiver_adress" id="order_receiver_adress" cols="30" rows="10"
                                                    class="form-control" placeholder="enter Billing adress"></textarea>
                                            </div>
                                            <div class="form-group col-md-4" style="margin-top:1.5em;">
                                                Reverse Charge<br />
                                                <input type="text" name="order_no" id="order_no" class="form-control input-sm"
                                                    placeholder="Enter Order No" required><br>
                                                <input type="date" name="order_date" id="order_date" class="form-control input-sm"
                                                    placeholder="select invoice date" required>
                                            </div>
                                        </div>
                                        <table id="invoice-item-table" class="table table-borderless table-responsive">
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
                                                <th></th>
                                            </tr>
                                            <tr>
                                                <td><span class="sr_no">1</span></td>
                                                <td width="150">
                                                    <input type="text" name="addmore[0][item_name]" id="item_name1" placeholder="Enter Item Name"
                                                        required data-srno="1" class="form-control input-sm">
                                                </td>
                                                <td>
                                                    <input type="text" name="addmore[0][item_quantity]" id="item_quantity1"
                                                        placeholder="Enter Item quantity" required data-srno="1"
                                                        class="form-control input-sm number_only order_item_quantity">
                                                </td>
                                                <td width="100">
                                                    <input type="text" name="addmore[0][item_price]" id="item_price1"
                                                        placeholder="Enter Item price" required data-srno="1"
                                                        class="form-control input-sm number_only order_item_price">
                                                </td>
                                                <td width="100">
                                                    <input type="text" name="addmore[0][item_actual_amount]" id="item_actual_amount1" required
                                                        data-srno="1" readonly required
                                                        class="form-control input-sm item_actual_amount">
                                                </td>
                                                <td>
                                                    <input type="text" name="addmore[0][item_tax1_rate]" id="item_tax1_rate1" required
                                                        data-srno="1" required class="form-control input-sm number_only item_tax1_rate">
                                                </td>
                                                <td>
                                                    <input type="text" name="addmore[0][item_tax1_amount]" id="item_tax1_amount1" required
                                                        data-srno="1" readonly required
                                                        class="form-control input-sm order_item_tax1_amount">
                                                </td>
                                                <td>
                                                    <input type="text" name="addmore[0][item_tax2_rate]" id="item_tax2_rate1" required
                                                        data-srno="1" required class="form-control input-sm number_only item_tax2_rate">
                                                </td>
                                                <td>
                                                    <input type="text" name="addmore[0][item_tax2_amount]" id="item_tax2_amount1" required
                                                        data-srno="1" readonly required
                                                        class="form-control input-sm order_item_tax2_amount">
                                                </td>
                                                <td>
                                                    <input type="text" name="addmore[0][item_tax3_rate]" id="item_tax3_rate1" required
                                                        data-srno="1" required class="form-control input-sm number_only item_tax3_rate">
                                                </td>
                                                <td>
                                                    <input type="text" name="addmore[0][item_tax3_amount]" id="item_tax3_amount1" required
                                                        data-srno="1" readonly required
                                                        class="form-control input-sm order_item_tax3_amount">
                                                </td>
                                                <td width="150">
                                                    <input type="text" name="addmore[0][item_final_amount]" id="item_final_amount1" required
                                                        data-srno="1" readonly required class="form-control input-sm item_final_amount">
                                                </td>
                                                <td> <button type="button" class="add_row btn-primary btn btn-xs" id="add_row">+</button></td>
                                            </tr>
                                        </table>
                                        
                                    {{-- </td>
                                </tr> --}}
                                <tr>
                                    <td align="right"><b>Total</td>
                                    <td align="right"><b><span id="final_total_amt"></span></br></td>
                                </tr>
                                {{-- <tr>
                                    <td colspan="2"></td>
                                </tr> --}}
                                {{-- <tr>
                                    <td colspan="2" align="center">
                                        <input type="hidden" class="total_item" id="total_item" value="1">
                                        <input type="submit" name="create_invoice" id="create_invoice" value="Create Invoice"
                                            class="btn btn-success">
                                    </td>
                
                                </tr>--}}
                            </table> 
                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <input type="submit" name="create_invoice" id="create_invoice" value="Create Invoice"
                        class="btn btn-primary">
                          </div>
                    </form>
                </div>
      </div>
    </div>
  </div>
{{-- end add modal --}}
@push('scripts')
<script>
$(document).ready(function() {
  $('#invoice-table').DataTable();

  $('#create-invoice').click(function(){
    $('#invoiceModal').modal('show');
  })

  // invoice calculations
      // $('#order_date').datepicker({
        //     uiLibrary: 'bootstrap4',
        //     formart: "yyy-mm-dd",
        //     autoclose:true
        // });
        const final_total_amt = $('#final_total_amount').text();
        let count = 1;
        $(document).on('click', '#add_row', function(){
            count = count + 1;
            $('#total_item').val(count);
            var html_code = '';
            html_code += '<tr id="row_id_'+count+'">';
            html_code += '<td><span id="sr_no">'+count+'</span></td>'
            html_code +='<td> <input type="text" name="addmore['+count+'][item_name]" id="item_name1'+count+'" class="form-control input-sm" placeholder="Enter Item Name"></td>'; 
            html_code += '<td><input type="text" name="addmore['+count+'][item_quantity]" id="item_quantity'+count+'" placeholder="Enter Item quantity" required data-srno="'+count+'" class="form-control input-sm number_only order_item_quantity"></td>';
            html_code += '<td><input type="text" name="addmore['+count+'][item_price]" id="item_price'+count+'" placeholder="Enter Item price" required data-srno="'+count+'" class="form-control input-sm number_only order_item_price"></td>';
            html_code += '<td><input type="text" name="addmore['+count+'][item_actual_amount]" id="item_actual_amount'+count+'" required data-srno="'+count+'" readonly required class="form-control input-sm item_actual_amount"></td>';
            html_code += '<td><input type="text" name="addmore['+count+'][item_tax1_rate]" id="item_tax1_rate'+count+'" required data-srno="'+count+'" required class="form-control input-sm number_only item_tax1_rate"></td>';
            html_code += '<td><input type="text" name="addmore['+count+'][item_tax1_amount]" id="item_tax1_amount'+count+'" required data-srno="'+count+'" readonly required class="form-control input-sm order_item_tax1_amount"></td>';
            html_code += '<td><input type="text" name="addmore['+count+'][item_tax2_rate]" id="item_tax2_rate'+count+'" required data-srno="'+count+'" required class="form-control input-sm number_only item_tax2_rate"></td>';
            html_code += '<td><input type="text" name="addmore['+count+'][item_tax2_amount]" id="item_tax2_amount'+count+'" required data-srno="'+count+'" readonly required class="form-control input-sm order_item_tax2_amount"></td>';
            html_code += '<td><input type="text" name="addmore['+count+'][item_tax3_rate]" id="item_tax3_rate'+count+'" required data-srno="'+count+'" required class="form-control input-sm number_only item_tax3_rate"></td>';
            html_code += '<td><input type="text" name="addmore['+count+'][item_tax3_amount]" id="item_tax3_amount'+count+'" required data-srno="'+count+'" readonly required class="form-control input-sm order_item_tax3_amount"></td>';
            html_code += '<td><input type="text" name="addmore['+count+'][item_final_amount]" id="item_final_amount'+count+'" required data-srno="'+count+'" readonly required class="form-control input-sm item_final_amount"></td>';
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
                        $('#item_final_amount'+count).val(item_total);
                    }
                }

            }
            $('#final_total_amt').text(final_item_total);
        }
        $(document).on('blur', '.order_item_price,.item_tax1_rate,.item_tax2_rate,.item_tax3_rate', function(e){
            var id = e.target.id;
            id = id.substring(id.length-1,id.length);
            cal_final_total(id);
        });
        // $(document).on('blur', '.item_tax1_rate', function(e){
            
        //     cal_final_total(id); 
        // })
        // $(document).on('blur', '.item_tax2_rate', function(e){
        //     cal_final_total(id); 
        // });
        // $(document).on('blur', '.item_tax3_rate', function(e){
        //     cal_final_total(id); 
        // });
        total_item
  // end calculation
$('#order_receiver_name').keyup(function(){
    this.value = this.value.toUpperCase();
});

})
</script>    
@endpush
@endsection
