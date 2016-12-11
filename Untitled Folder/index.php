<!DOCTYPE html>
<?php
include("connection.php");
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Super Dash - E-Commerce Dashboard</title>

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
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">

            <div class="row text-center">
                <div class="col-xs-12">
                    <h1 class="page-header">
                        Super Dash
                        <small>E-Commerce Dashboard</small>
                    </h1>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-xs-12">
                    <div class="btn-group" role="group" aria-label="navigation-buttons">
                        <a href="add_product.html" class="btn btn-default">Left</a>
                        <a href="all_products.php" class="btn btn-default">Middle</a>
                        <a href="search_products.php" class="btn btn-default">Right</a>
                        <a href="add_product.html" class="btn btn-default">Right</a>
                        <a href="add_product.html" class="btn btn-default">Right</a>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-lg-6">
                    <h2>
                        Your Product Statistics
                    </h2>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Product Stats
                        </div>
                        <div class="panel-body">
                            <?php
                            $sql = "SELECT SUM(price) * SUM(stock) as total FROM products";
                            $sql2 = "SELECT SUM(stock) FROM products";
                            $result = mysqli_query($connection, $sql);
                            $result2 = mysqli_query($connection, $sql2);

                            if ($result2) {
                                while ($row = mysqli_fetch_array($result2, MYSQLI_BOTH)) {
                                    echo "<p>You currently have a total of <b>" . $row[0] . "</b> individual products</p>";
                                }
                            } else {
                                echo 'Invalid query: ' . mysqli_error($connection) . "\n";
                                echo 'Whole query: ' . $sql;
                            }

                            if ($result) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                    echo "<p>The total value for all of your current product is: " . $row[0] . "</p>";
                                }
                            } else {
                                echo 'Invalid query: ' . mysqli_error($connection) . "\n";
                                echo 'Whole query: ' . $sql;
                            }
                            ?>
                        </div>
                        <div class="panel-footer">

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <h2>
                        Current Inventory
                    </h2>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Product Stats
                        </div>
                        <div class="panel-body">
                            <ul>
                                <?php
                                $sql = "SELECT * FROM products";

                                $result = mysqli_query($connection, $sql);

                                if ($result) {
                                    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                        echo "<li>Product ID: " . $row[0] . "  Product Name: " . $row[1] . "</li>";
                                    }
                                } else {
                                    echo 'Invalid query: ' . mysqli_error($connection) . "\n";
                                    echo 'Whole query: ' . $sql;
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="panel-footer">

                        </div>
                    </div>
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
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>
