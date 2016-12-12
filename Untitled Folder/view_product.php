<!DOCTYPE html>
<?php
include("connection.php");

if (isset($_GET["id"]) && isset($_GET["name"]) && isset($_GET["description"]) && isset($_GET["price"]) && isset($_GET["stock"])) {
    $id = $_GET["id"];
    $name = $_GET["name"];
    $description = $_GET["description"];
    $price = $_GET["price"];
    $stock = $_GET["stock"];
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
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="col-xs-12 text-center">
                <h1 class="page-header">
                    <?php
                    $name = $_GET["name"];
                    echo "$name";
                    ?>
                </h1>
            </div>
            <?php
            include("display-single-product.php");
            ?>
        </div>

    </div>
</body>
</html>