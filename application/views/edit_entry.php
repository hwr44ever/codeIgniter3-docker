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
                            <?php
                            //print_r($entry_data);die;
                            $disabled_value = "";
                            $disabled_message = "";
                            if ($entry_data->from_invoice == 1) {
                                $disabled_value = "disabled";
                                $disabled_message = "You can not edit this from this screen! You can edit it from invoice screen";
                            }
                            ;
                            ?>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form  id="add_entry_form" method="POST">
                                            <div class="form-row"><h1><?= $disabled_message ?></h1></div>
                                            <div class="form-row">
                                                <div class="col-md-4 mb-3">

                                                    <label for="date">Date</label>
                                                    <input type="date" class="form-control" id="date" name="date" value="<?php echo $entry_data->date; ?>"  <?= $disabled_value ?> required>
                                                    <input type="hidden" class="form-control" id="cash_book_id" name="cash_book_id" value="<?php echo $entry_data->cash_book_id; ?>"  required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustomUsername">Choose Vendors:</label>
                                                    <div class="input-group">
                                                        <select class="form-control" id="vendor_drop_down" name="vendor_drop_down" <?= $disabled_value ?>>
                                                            <option value = "0">Choose from list</option>
                                                            <?php
                                                            $checked = "";
                                                            foreach ($vendor_data as $vendor_row) {
                                                                if ($entry_data->vendor_id != $vendor_row->vendor_id) {
                                                                    ?>
                                                                    <option value="<?php echo $vendor_row->vendor_id; ?>"><?php echo $vendor_row->vendor_company; ?> </option>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <option selected="selected" value="<?php echo $vendor_row->vendor_id; ?>"><?php echo $vendor_row->vendor_company; ?></option>

    <?php }
} ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Enter Vendor Name Manually</label>
                                                    <input type="text" class="form-control" id="vendor_name_custom" name="vendor_name_custom" placeholder="Vendor Name"  <?= $disabled_value ?> required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom02">Amount</label>
                                                    <input type="number" class="form-control" value="<?php echo $entry_data->amount ?>" <?= $disabled_value ?> id="amount" name="amount" placeholder="Enter user amount here"  required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Textarea</label>
                                                    <textarea class="form-control" id="detail_textarea" name="detail_textarea" <?= $disabled_value ?> rows="5" cols="70"><?php echo $entry_data->detail ?></textarea>
                                                </div>
                                                <div class="mt-3">
                                                    Entry Type:&nbsp;&nbsp;
                                                    <?php if ($entry_data->entry_type == 1) { ?>
                                                        <input type="radio" id="radio1" name="entry_type" value="1" checked <?= $disabled_value ?>>&nbsp;&nbsp;Debit&nbsp;&nbsp;
                                                        <input type="radio" id="radio2" name="entry_type" value="2" <?= $disabled_value ?>> &nbsp;&nbsp;Credit
                                                    <?php } else { ?>
                                                        <input type="radio" id="radio1" name="entry_type" value="1"<?= $disabled_value ?> >&nbsp;&nbsp;Debit&nbsp;&nbsp;
                                                        <input type="radio" id="radio2" name="entry_type" value="2" checked <?= $disabled_value ?>> &nbsp;&nbsp;Credit
<?php } ?>

                                                </div>
                                            </div>
                                            <br>
                                            <div id="error"></div>
                                            <button class="btn btn-primary" type="button" <?= $disabled_value ?> id="submit_button" name="submit_button">Update Cash Entry</button>
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

                    var date = document.getElementById('date').value;
                    var cash_book_id = document.getElementById('cash_book_id').value;
                    var vendor_drop_down = document.getElementById('vendor_drop_down').value;
                    var vendor_name_custom = document.getElementById('vendor_name_custom').value;
                    var amount = document.getElementById('amount').value;
                    var detail_message = $('textarea#detail_textarea').val();
                    var entry_type = $('input[name="entry_type"]:checked').val();
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
                            url: "<?php echo base_url() . 'cash/update_entry'; ?>",
                            data: {"date": date, "cash_book_id": cash_book_id, "vendor_drop_down": selected_vendor, "vendor_name_custom": vendor_name_custom, "amount": amount, "detail_textarea": detail_message, "entry_type": entry_type},
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

        </script>

    </body>

</html>