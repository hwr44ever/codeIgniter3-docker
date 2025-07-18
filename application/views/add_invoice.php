<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('_head'); ?>
    <body>
        <!-- Begin page -->
        <div id="layout-wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <?php $this->load->view('_nav_bar') ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <?php $this->load->view('_header'); ?>

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form  id="add_entry_form" action="<?php echo base_url('cash/add_entry'); ?>" method="POST">

                                            <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="date">Date</label>
                                                    <input type="date" class="form-control" onblur="checkInvoice()" id="date" name="date"  required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustomUsername">Choose Vendor:</label>
                                                    <div class="input-group">
                                                        <select class="form-control" onblur="checkInvoice()" id="vendor_drop_down" name="vendor_drop_down">
                                                            <option value = "0">Choose from list</option>
                                                            <?php
                                                            foreach ($vendor_data as $vendor_row) {
                                                                ?>
                                                                <option value="<?php echo $vendor_row->vendor_id; ?>"><?php echo $vendor_row->vendor_company; ?></option>

                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Enter Vendor Name Manually</label>
                                                    <input type="text" class="form-control" id="vendor_name_custom" name="vendor_name_custom" placeholder="Enter Vendor Name"  required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-2 mb-3">
                                                    <label for="validationCustom02">Weight</label>
                                                    <input type="number" class="form-control" onblur="checkInvoice()" id="weight_qty" name="weight_qty" placeholder="Enter weight here"  required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <label for="validationCustom02">Rate</label>
                                                    <input type="number" class="form-control" id="rate_qty" onblur="checkInvoice()" name="rate_qty" placeholder="Enter Rate here"  required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <label for="validationCustom02">Total</label>
                                                    <input type="number" class="form-control" id="item_total_amount" name="item_total_amount" value="0" disabled>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Detail</label>
                                                    <textarea class="form-control" id="detail_textarea" name="detail_textarea" rows="5" cols="70"></textarea>

                                                </div>
                                            </div>                                           
                                            <div class="form-row">
                                                <div class="form-group">
                                                    <b class="float-left">Pending:&nbsp;&nbsp;<input  type="checkbox" id="pending_box" name="pending_box" value="1" onclick="checkEntry()"></b>
                                                </div>
                                                <div class="form-group">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Entry Type:</b>&nbsp;&nbsp;
                                                    <input type="radio" id="entry_type" name="entry_type" value="1" onclick="checkEntry()" checked="">&nbsp;&nbsp;Buyer&nbsp;&nbsp;
                                                    <input type="radio" id="entry_type" name="entry_type" value="2" onclick="checkEntry()"> &nbsp;&nbsp;Seller
                                                </div>
                                            </div>
                                            <br>
                                            <div id="error"></div>
                                            <button class="btn btn-primary" type="button" id="submit_button" name="submit_button">Add Invoice </button>
                                        </form>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <?php $this->load->view('_footer'); ?>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Overlay-->
        <div class="menu-overlay"></div>



        <!-- jQuery  -->

        <script src="<?php echo base_url(SITETHEME) ?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(SITETHEME) ?>assets/js/metismenu.min.js"></script>
        <script src="<?php echo base_url(SITETHEME) ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url(SITETHEME) ?>assets/js/simplebar.min.js"></script>

        <!-- Validation custom js-->
        <script src="<?php echo base_url(SITETHEME) ?>assets/pages/validation-demo.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url(SITETHEME) ?>assets/js/theme.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>



        <script type="text/javascript">

                                                        $(document).ready(function () {

                                                            $("#submit_button").click(function (event) {

                                                                var invoice_entry_type = $('input[name="entry_type"]:checked').val();
                                                                var weight_qty = document.getElementById('weight_qty').value;
                                                                var rate_qty = document.getElementById('rate_qty').value;
                                                                var item_total_amount = document.getElementById('item_total_amount').value;
                                                                var date = document.getElementById('date').value;
                                                                var vendor_drop_down = document.getElementById('vendor_drop_down').value;
                                                                var vendor_name_custom = document.getElementById('vendor_name_custom').value;
                                                                var detail_message = $('textarea#detail_textarea').val();
                                                                var pendingValue = $('input[name="pending_box"]:checked').val();

                                                                var selected_vendor = 0;
                                                                if (vendor_drop_down > 0) {
                                                                    selected_vendor = vendor_drop_down;
                                                                }
                                                                if (date == '') {
                                                                    Swal.fire('Alert', "Please select date!", 'warning');
                                                                    document.getElementById('date').focus();
                                                                } else if (detail_textarea = '') {
                                                                    document.getElementById('detail_textarea').focus();
                                                                } else {//esle start here
                                                                    // disabled the submit button
                                                                    //$("#submit_button").prop("disabled", true);
                                                                    $.ajax({
                                                                        //alert(email);
                                                                        url: "<?php echo base_url() . 'invoices/add_invoice_entry'; ?>",
                                                                        data: {"entry_type": invoice_entry_type,
                                                                            "date": date,
                                                                            "vendor_drop_down": selected_vendor,
                                                                            "vendor_name_custom": vendor_name_custom,
                                                                            "weight_qty": weight_qty,
                                                                            "rate_qty": rate_qty,
                                                                            "item_total_amount": item_total_amount,
                                                                            "pendingValue": pendingValue,
                                                                            "detail_textarea": detail_message},
                                                                        type: "POST",
                                                                        success: function (data) {
                                                                            var result = jQuery.parseJSON(data);
                                                                            if (result.status == 'success') {
                                                                                Swal.fire({
                                                                                    icon: 'success',
                                                                                    title: '' + result.msg,
                                                                                    showConfirmButton: false,
                                                                                    timer: 1500
                                                                                });
                                                                                $("#submit_button").prop("disabled", true);
                                                                                setTimeout(function () {
                                                                                    window.location.reload(1);
                                                                                }, 3000);
                                                                            } else {
                                                                                Swal.fire('Error', result.msg, 'error');
                                                                                $("#submit_button").prop("disabled", false);
                                                                            }

                                                                        }

                                                                    });
                                                                }//end if else

                                                            });

                                                        });

                                                        $('#vendor_drop_down').on('change', function () {
                                                            document.getElementById("vendor_name_custom").value = '';
                                                        });
                                                        $('#vendor_name_custom').on('change', function () {
                                                            document.getElementById("vendor_drop_down").value = 0;
                                                        });

                                                        $('#weight_qty').on('change', function () {

                                                            var custom_weight = document.getElementById("weight_qty").value;
                                                            var custom_price = document.getElementById("rate_qty").value;
                                                            document.getElementById("item_total_amount").value = custom_price * custom_weight;
                                                        });
                                                        $('#rate_qty').on('change', function () {

                                                            var custom_weight = document.getElementById("weight_qty").value;
                                                            var custom_price = document.getElementById("rate_qty").value;
                                                            document.getElementById("item_total_amount").value = custom_price * custom_weight;
                                                        });

                                                        function checkInvoice() {
                                                            var invoice_entry_type = document.getElementById('invoice_entry_type').value;
                                                            var weight_qty = document.getElementById('weight_qty').value;
                                                            var rate_qty = document.getElementById('rate_qty').value;
                                                            var item_total_amount = document.getElementById('item_total_amount').value;
                                                            var date = document.getElementById('date').value;
                                                            var vendor_drop_down = document.getElementById('vendor_drop_down').value;
                                                            var detail_message = $('textarea#detail_textarea').val()
                                                            $.ajax({
                                                                method: "POST",
                                                                url: "<?php echo base_url('invoices/check_invoice_if_exist'); ?>",
                                                                data: {"entry_type": invoice_entry_type,
                                                                    "date": date,
                                                                    "vendor_drop_down": vendor_drop_down,
                                                                    "rate_qty": rate_qty,
                                                                    "weight_qty": weight_qty},
                                                                success: function (data) {
                                                                    var result = jQuery.parseJSON(data);
                                                                    if (result.status == 'entry_success') {
                                                                        Swal.fire({
                                                                            title: '' + result.msg,
                                                                            showDenyButton: true,
                                                                            confirmButtonText: 'Yes',
                                                                            denyButtonText: `No`,
                                                                        }).then((result) => {
                                                                            /* Read more about isConfirmed, isDenied below */
                                                                            if (result.isConfirmed) {
                                                                                Swal.fire({
                                                                                    icon: 'success',
                                                                                    title: 'you can Add Duplicate Entry',
                                                                                    showConfirmButton: false,
                                                                                    timer: 1500
                                                                                });
                                                                            } else if (result.isDenied) {
                                                                                $("#submit_button").prop("disabled", true);
                                                                            }
                                                                        });
                                                                        //$('#emailStatus').html(result.msg);
                                                                        //$("#submit_button").prop("disabled", true);
                                                                        // setTimeout(function () {window.location.reload(1);}, 3000);
                                                                    } else {
                                                                        $("#submit_button").prop('disabled', false);
                                                                    }
                                                                }
                                                            });
                                                        }

        </script>

    </body>

</html>