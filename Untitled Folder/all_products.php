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
                            <input id="textinput" name="textinput" type="text" placeholder="Search For a Product Here"
                                   class="form-control input-md" required="">

                        </div>

                        <div class="col-md-3">
                            <label class="control-label" for="singlebutton"></label>
                            <button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php
            include("display-products.php");
            ?>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->


</body>
</html>