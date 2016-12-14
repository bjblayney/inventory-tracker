<?php
include '../includes/db.php';
include 'header.php';
include '../includes/getShirts.php';
include '../includes/getTypes.php';
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Check Inventory</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Filter By:
                        </div>

                        <div class="panel-body">
                            <form role="form" id="check-inventory" action="javascript:;">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-4 col-md-2">
                                        <div class="form-group">
                                            <label for="type" class="sr-only">Type</label>
                                            <select name="type" id="type" class="form-control" >
                                                <option value="">Shirt Type</option>
                                                <?php
                                                    if ($resultTypes->num_rows > 0) {
                                                        // output data of each row
                                                        while($row = $resultTypes->fetch_assoc()) {
                                                            echo '<option value="' . $row["id"]. '">' . $row["name"]. '</option>';
                                                        }
                                                    }
                                                ?>
                                                <option value="-1">NEW</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-2">
                                        <div class="form-group">
                                            <label class="sr-only">Brand + Type</label>
                                            <select name="brand" id="brand" class="form-control">
                                                <option value="">Brand</option>
                                                <?php
                                                    if ($resultBrands->num_rows > 0) {
                                                        // output data of each row
                                                        while($row = $resultBrands->fetch_assoc()) {
                                                            echo '<option value="' . $row["id"]. '">' . $row["name"]. '</option>';
                                                        }
                                                    }
                                                ?>
                                                <option value="-1">NEW</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-2">
                                        <div class="form-group">
                                            <label class="sr-only">Colour</label>
                                            <select name="colour" id="colour" class="form-control">
                                                <option value="">Colour</option>
                                                <?php
                                                    if ($resultColours->num_rows > 0) {
                                                        // output data of each row
                                                        while($row = $resultColours->fetch_assoc()) {
                                                            echo '<option value="' . $row["id"]. '">' . $row["name"]. '</option>';
                                                        }
                                                    }
                                                ?>
                                                <option value="-1">NEW</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-2">
                                        <div class="form-group">
                                            <label for="gender" class="sr-only">Gender</label>
                                            <select name="gender" class="form-control">
                                                <option value="">Gender</option>
                                                <option>Ladies</option>
                                                <option>Mens</option>
                                                <option>Unisex</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-2">
                                        <div class="form-group">
                                            <label class="sr-only">Size</label>
                                            <select name="size" id="size" class="form-control">
                                                <option value="">Size</option>
                                                <option>Extra Small</option>
                                                <option>Small</option>
                                                <option>Medium</option>
                                                <option>Large</option>
                                                <option>Extra Large</option>
                                                <option>XX Large</option>
                                                <option>NEW</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-2">
                                        <div class="form-group">
                                            <button id="checkInventory" type="submit" class="btn btn-success pull-right">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


            <div class="row theFiltered">
                <div class="col-lg-12">
                    <div class="panel panel-default">

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
                                            <th>Colour</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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


            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
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
                                            <th>Colour</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if ($allShirtsResults->num_rows > 0) {
                                                // output data of each row
                                                while($row = $allShirtsResults->fetch_assoc()) {
                                                    echo '<tr><td>' . $row["quantity"]. '</td><td>' . $row["brand_name"]. '</td><td>' . $row["shirt_type"]. '</td><td>' . $row["gender"]. '</td><td>' . $row["size"]. '</td><td>' . $row["colour"]. '</td></tr>';
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php include 'footer.php'; ?>
