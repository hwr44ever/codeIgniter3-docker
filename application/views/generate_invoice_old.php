<!DOCTYPE html>
<html lang="en">
    <body>

        <!-- Invoice 1 - Bootstrap Brain Component -->
        <section class="py-3 py-md-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div id="printableArea" class="col-12 col-lg-9 col-xl-8 col-xxl-7">
                        <div class="row gy-3 mb-3">
                            <div class="col-12">
                                <h1>Invoice</h1>
                            </div>
                            <div class="col-6">
                                <a class="d-block text-end" href="#!">
                                    <img src="<?php echo base_url('theme/vertical-dark/'); ?>assets/images/najam-logo.png" class="img-fluid" alt="Najam Traders Logo" width="135" height="44">
                                </a>
                            </div>
                            <div class="col-12">
                                <table border="1">
                                    <tr>
                                        <th class="col-4">From</th>
                                        <td>
                                            <strong>Najam Traders</strong><br>
                                            Sargodha, Punjab<br>
                                            Pakistan<br>
                                            +92-336-6006366
                                        </td>
                                        <th>To</th>
                                        <td>

                                            <strong><?php echo "TO NAME"; ?></strong><br>
                                            7657 NW Prairie View Rd<br>
                                            Kansas City, Mississippi, 64151<br>
                                            United Sta</td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                        <div  class="row mb-3">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" border="1">
                                        <thead>
                                            <tr>
                                                <th scope="col-3" class="text-uppercase">Date of Purchase</th>
                                                <th scope="col-3" class="text-uppercase">Detail</th>
                                                <th scope="col-3" class="text-uppercase">Weight</th>
                                                <th scope="col-3" class="text-uppercase text-end">Price</th>
                                                <th scope="col-3" class="text-uppercase text-end">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            <tr>
                                                <td scope="col-3" class="text-uppercase"><?php echo $invoice_data->date; ?></td>
                                                <td scope="col-3" class="text-uppercase"><?php echo $invoice_data->detail_box; ?></td>
                                                <td scope="col-3" class="text-uppercase"><?php echo $invoice_data->weight; ?></td>
                                                <td scope="col-3" class="text-uppercase text-end"><?php echo $invoice_data->rate; ?></td>
                                                <td scope="col-3" class="text-uppercase text-end"><?php echo $invoice_data->total_invoice; ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-end">
                            <button type="submit" onclick="printDiv('printableArea')" class="btn btn-primary mb-3">Print</button>
                            <button type="submit" class="btn btn-danger mb-3">Submit Payment</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end row-->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
</body>

</html>


<!-- Version 2 ----->

<!DOCTYPE html>
<html lang="en">
    <body>
        <section id="printableArea">
            <p style="text-align: left">Page 1</p>
            <span><h3 style="text-align: right; background-color: black; color:white">
                    <?php if ($invoice_data->invoice_type == 2) { ?>
                        <?php
                        echo "SALE INVOICE";
                    } else {
                        echo "BUYER INVOICE";
                    }
                    ?>
                </h3>
            </span>
            <center><img src="<?php echo base_url('theme/vertical-dark/'); ?>assets/images/najam-logo.png" /></center>

            <table style="margin-left: auto; margin-right: auto"  border="1">
                <tr>
                    <th class="col-4">From</th>
                    <td>
                        <strong>Najam Traders</strong><br>
                        Sargodha, Punjab<br>
                        Pakistan<br>
                        +92-336-6006366
                    </td>
                    <th >To</th>
                    <td colspan="2">

                        <strong><?php echo $vendor_data->vendor_company; ?></strong><br>
                        <?php echo $vendor_data->vendor_address; ?><br>
                        <?php echo $vendor_data->vendor_phone; ?><br>
                    </td>
                </tr>
                <tr>
                    <th scope="col-3" class="text-uppercase">Date of Purchase</th>
                    <th scope="col-3" class="text-uppercase">Detail</th>
                    <th scope="col-3" class="text-uppercase">Weight (KG)</th>
                    <th scope="col-3" class="text-uppercase text-end">Rate</th>
                    <th scope="col-3" class="text-uppercase text-end">Total</th>
                </tr>
                <tr>
                    <td style="text-align: center" scope="col-3" class="text-uppercase"><?php echo $invoice_data->date; ?></td>
                    <td style="text-align: center" scope="col-3" class="text-uppercase"><?php echo $invoice_data->detail_box; ?></td>
                    <td style="text-align: center" scope="col-3" class="text-uppercase"><?php echo $invoice_data->weight; ?></td>
                    <td style="text-align: center" scope="col-3" class="text-uppercase text-end"><?php echo number_format($invoice_data->rate, 2); ?></td>
                    <td style="text-align: center" scope="col-3" class="text-uppercase text-end"><?php echo number_format($invoice_data->total_invoice, 2); ?></td>
                </tr>
                <tr>
                    <td colspan="5">
                        <?php
                        $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                        echo strtoupper("<b>total</b>: " . $f->format($invoice_data->total_invoice) . " Rupees Only");
                        ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <p style="text-align: right"> مال اگر وقت پر نہ پہنچنے تو فوری اطلاح دیں  بعد اذا ہر صورت خریدار ذمہ دار ہو گا <br/>
                            واٹس اپپ گروپ میں رابطہ کریں </p>
                    </td>
                </tr>
            </table>

        </section>
    <center>
        <div class="col-12 text-end">
            <button type="submit" onclick="printDiv('printableArea')" style="background-color: blue;color:white;text-align: center;text-decoration: none;display: inline-block;font-size: 16px"> Print</button>
        </div>
    </center>

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</body>

</html>