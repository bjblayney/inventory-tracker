<?php
include '../includes/db.php';
include 'header.php';
include '../includes/getShirts.php';
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Shirts
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Quantity</th>
                                            <th>Brand</th>
                                            <th>Type</th>
                                            <th>Gender</th>
                                            <th>Size</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if ($allShirtsResults->num_rows > 0) {
                                                // output data of each row
                                                while($row = $allShirtsResults->fetch_assoc()) {
                                                    echo '<tr><td>' . $row["quantity"]. '</td><td>' . $row["brand_name"]. '</td><td>' . $row["shirt_type"]. '</td><td>' . $row["gender"]. '</td><td>' . $row["size"]. '</td></tr>';
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php include 'footer.php'; ?>
