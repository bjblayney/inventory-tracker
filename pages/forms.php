<?php
include '../includes/db.php';
include 'header.php';
include '../includes/getTypes.php';
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Inventory</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            New Shirts
                        </div>
                        <div class="panel-body">

                            <form role="form" id="shirt-input" action="javascript:;">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="shirtType">Type</label>
                                            <select name="shirtType" id="shirtType" class="form-control" required>
                                                <option value="">Select Shirt Type</option>
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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Brand + Type</label>
                                            <select name="brand" id="brand" class="form-control" required>
                                                <option value="">Select Brand</option>
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
                                </div>
                                <div class="row newType">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>New Type</label>
                                            <input name="newShirtType" class="form-control" id="newType">
                                            <p class="help-block">Type new garment type here</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>New Brand + Type</label>
                                            <input name="newShirtBrand" class="form-control" id="newBrand">
                                            <p class="help-block">Type new garment type here</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select name="gender" class="form-control" required>
                                                <option value="">Select Gender</option>
                                                <option>Ladies</option>
                                                <option>Mens</option>
                                                <option>Unisex</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input name="quantity" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Size</label>
                                            <select name="size" id="size" class="form-control" required>
                                                <option value="">Select Size</option>
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
                                    <div class="col-sm-6">
                                        <div class="form-group newSize">
                                            <label>New Size</label>
                                            <input class="form-control">
                                            <p class="help-block">Type new garment size here</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Colour</label>
                                            <select name="colour" id="colour" class="form-control" required>
                                                <option value="">Select Colour</option>
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
                                    <div class="col-sm-6">
                                        <div class="form-group newColour">
                                            <label>New Colour</label>
                                            <input name="newShirtColour" class="form-control" id="newColour">
                                            <p class="help-block">Type new garment colour here</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Total Cost</label>
                                            <input name="totalCost" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Date Picker</label>
                                            <input name="date" class="form-control" required>
                                            <p class="help-block">This should be a date picker</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button id="new-shirts" type="submit" class="btn btn-success">Submit Button</button>
                                        <div class="success">
                                            <p><i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>&nbsp;New inventory added!</p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- /.row -->
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            New Vinyl
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form role="form">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Colour</label>
                                            <select class="form-control" required>
                                                <option value="">Select Brand</option>
                                                <option>Black</option>
                                                <option>White</option>
                                                <option>Red</option>
                                                <option>Blue</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>New Colour</label>
                                            <input class="form-control">
                                            <p class="help-block">Type new vinyl colour here</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Cost</label>
                                            <input class="form-control">
                                            <p class="help-block">Type cost here</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Length</label>
                                            <select class="form-control">
                                                <option>1 yard roll</option>
                                                <option>5 yard roll</option>
                                                <option>10 yard roll</option>
                                                <option>25 yard roll</option>
                                                <option>50 yard roll</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>New Length</label>
                                            <input class="form-control">
                                            <p class="help-block">Type new length here</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Date Picker</label>
                                            <input class="form-control">
                                            <p class="help-block">This should be a date picker</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-success">Submit Button</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- /#page-wrapper -->

<?php include 'footer.php'; ?>
