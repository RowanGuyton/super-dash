<!DOCTYPE html>
<?php
    $username = "root";
    $password = ""; // Put your password in the quotations
    $host = "127.0.0.1";
    $db = "superdash";
    $connection = mysqli_connect($host, $username, $password, $db);

    if (mysqli_connect_error()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } else {
        echo "<p>Connected to server: " . $host . "</p>";
    }
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav text-center">
            <li class="sidebar-brand">
                <a href="index.php">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="all_products.php">View All Products</a>
            </li>
            <li>
                <a href="add_product.html">Add New Product</a>
            </li>
            <li>
                <a href="view_product.php">Update Product</a>
            </li>
            <li>
                <a href="#">Search Products</a>
            </li>
            <li>
                <a href="#">Delete Product</a>
            </li>

        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">

            <div class="row text-center">
                <div class="col-xs-12">
                    <h1 class="page-header">
                        Add Item
                    </h1>
                </div>
            </div>

            <div class="row text-center">
                <form class="form-horizontal" action="?" method="post">
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Form Name</legend>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-6 control-label" for="textinput">Product Name</label>
                            <div class="col-md-6">
                                <input id="textinput" name="textinput" type="text" placeholder="Enter a product name" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="selectbasic">Product Category</label>
                            <div class="col-md-4">
                                <select id="selectbasic" name="selectbasic" class="form-control">
                                    <option value="shoes">Shoes</option>
                                    <option value="shirts">Shirts</option>
                                    <option value="jeans">Jeans</option>
                                    <option value="dresses">Dresses</option>
                                    <option value="jumpers">Jumpers</option>
                                    <option value="accessories">Accessories</option>
                                    <option value="sunglasses">Sunglasses</option>
                                    <option value="underwear">Underwear</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="productprice">
                                Product Price:
                            </label>
                            <input type="number" min="0" step="any" name="productprice" id="productprice">
                        </div>

                        <div class="col-md-4">
                            <label for="productcostprice">
                                Product Cost Price:
                            </label>
                            <input type="number" min="0" step="any" name="productcostprice" id="productcostprice">
                        </div>

                        <div class="col-md-4">
                            <label for="stock">
                                Stock:
                            </label>
                            <input type="number" min="0" step="1" name="stock" id="stock">
                        </div>

                        <!-- Textarea -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textarea">Product Description</label>
                            <div class="col-md-4">
                                <textarea class="form-control" id="textarea" name="textarea">Enter a description here</textarea>
                            </div>
                        </div>

                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Upload An Image</label>
                            <div class="col-md-4">
                                <input id="filebutton" name="filebutton" class="input-file" type="file">
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton"></label>
                            <div class="col-md-4">
                                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
                <?php
                    if (isset($_POST["singlebutton"])) {
                        if ((!empty($_POST["textinput"])) && (!empty($_POST["textarea"])) && (!empty($_POST["productprice"])) && (!empty($_POST["productcostprice"])) && (!empty($_POST["stock"])) && (!empty($_POST["selectbasic"]))) {

                            $name = $_POST["textinput"];
                            $description = $_POST["textarea"];
                            $price = $_POST["productprice"];
                            $costPrice = $_POST["productcostprice"];
                            $stock = $_POST["stock"];
                            $category = $_POST["selectbasic"];

                            $sql = "INSERT INTO products (name, description, price, cost_price, stock, category) VALUES ('$name', '$description', '$price', '$costPrice', '$stock', '$category')";

                            $result = mysqli_query($connection, $sql);

                            if ($result) {
                                echo "Item successfully added to inventory.";
                            } else {
                                echo 'Invalid query: ' . mysqli_error($connection) . "\n";
                                echo 'Whole query: ' . $sql;
                            }
                        }
                    }
                ?>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h1>Simple Sidebar</h1>
                    <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                    <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>