<!DOCTYPE html>
<?php
$username = "root";
$password = ""; // Put your password in the quotations
$host = "127.0.0.1";
$db = "superdash"; // In our case the database name is the same as
// the username (normally it is different) so we
// can set it as the same as the username
$connection = mysqli_connect($host, $username, $password, $db);
if (mysqli_connect_error()){ // If connection error
    // Display error message and stop the script, we can't do any
    // database work as there is no connection to use
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    echo "<p>Connected to server: ".$host."</p>";
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
                <a href="add_product.php">Add New Product</a>
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
            <div class="col-xs-12">
                <h1 class="page-header text-center">
                    View and Search Products
                </h1>
                <form class="form-horizontal" action="?" method="post">
                    <div class="form-group">

                            <label class="col-md-3 control-label" for="textinput">Search</label>
                            <div class="col-md-6">
                                <input id="textinput" name="textinput" type="text" placeholder="Search For a Product HEre" class="form-control input-md" required="">

                            </div>

                        <div class="col-md-3">
                            <label class="control-label" for="singlebutton"></label>
                            <button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    </form>
                </div>
            <?php
            if (isset($_POST["singlebutton"])) {
                if (!empty($_POST["textinput"])) {
                    $search=$_POST["textinput"];
                    $sql="SELECT * FROM products WHERE category LIKE LOWER('%$search%') or name LIKE LOWER('%$search%') ";
                }
            } else {
                $sql = "SELECT * FROM products";
            }


            $result=mysqli_query($connection, $sql);

            if ($result) {
                while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                    $id=$row[0];
                    $name=$row[1];
                    $desc=$row[2];
                    $price=$row[3];
                    echo "<div class=\"col-xs-6 col-lg-3 text-center\">
                            <div class=\"panel panel-default\">
                            <div class=\"panel-heading\" id=\"id\">
                                ".$row[0]."
                            </div>
                            <div class=\"panel-body\">
                            <a href=\"view_product.php?id=$id&name=$name&description=$desc&price=$price\"><p id='name'>".$row[1]."</p></a>
                            <p id='description'>".$row[2]."</p>
                            <p>Currently <b>".$row[5]."</b> in stock.</p>
                            </div>
                            <div class=\"panel-footer\">
                                <b><p>".$row[3]."</p></b>
                            </div>
                            </div>
                            </div>";
                }
            } else {
                echo 'Invalid query: ' . mysqli_error($connection) . "\n";
                echo 'Whole query: ' . $sql;
            }
            ?>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->


</body>
</html>