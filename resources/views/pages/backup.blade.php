@extends('layouts.main')

@section('content')
<div class="row">
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
        <input type="submit" name="create_invoice" id="create_invoice" value="Create Invoice"
        class="btn btn-success">
    </form>
</div>
@push('scripts')

<script>
    $(document).ready(function(){
        // $('#order_date').datepicker({
        //     uiLibrary: 'bootstrap4',
        //     formart: "yyy-mm-dd",
        //     autoclose:true
        // });
        const final_total_amt = $('#final_total_amount').text();
        let count = 1;
        $(document).on('click', '#add_row', function(){
            count = count + 1;
            var total_item = $('#total_item').val(count);
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
    });
</script>
@endpush
@endsection

{{-- @endsection --}}