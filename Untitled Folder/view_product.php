<!DOCTYPE html>
<?php
$username = "root";
$password = "";
$host = "127.0.0.1";
$db = "superdash";
$connection = mysqli_connect($host, $username, $password, $db);
if (mysqli_connect_error()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    echo "<p>Connected to server: ".$host."</p>";

}

if(isset($_GET["id"]) && isset($_GET["name"]) && isset($_GET["description"]) && isset($_GET["price"])) {
    $id = $_GET["id"];
    $name = $_GET["name"];
    $description = $_GET["description"];
    $price = $_GET["price"];
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
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="col-xs-12 text-center">
                    <h1 class="page-header">
                        <?php
                            echo "$name"
                        ?>
                    </h1>
                    </div>
                    <?php
                    if (isset($_GET["mode"])) {
                        $sql="DELETE FROM products WHERE id='$id'";
                        $result = mysqli_query($connection, $sql);
                        if ($result) {
                            echo "Item successfully removed from inventory.";
                        } else {
                            echo 'Invalid query: ' . mysqli_error($connection) . "\n";
                            echo 'Whole query: ' . $sql;
                        }
                    } else {
                        echo "<div class='row text-center'>
                                <div class=\"col-md-8 col-xs-12\">
                                    <img class='img-responsive' src=\"http://placehold.it/960x480?text=Product+Image\">
                                </div>
                                <div class=\"col-md-4 col-xs-12\">
                                    <div class='well'>
                                        <p>" . $id . "</p>
                                        <p>" . $name . "</p>
                                        <p>" . $description . "</p>
                                        <p>" . $price . "</p>
                                    </div>
                                </div>
                                </div>
                                <div class='row text-center'>
                                    <div class='col-md-3 col-md-offset-8'>
                                        <a href='update_product.php' class='btn btn-primary btn-lg btn-block' id='update' name='update'>Update</a>
                                    </div>
                                    <div class='col-md-3'>
                                        <form action=\"?\" method=\"post\">
                                            <fieldset>
                                                <div class='form-group'>
                                                    <a href=\"view_product.php?id=$id&name=$name&description=$description&price=$price&mode=delete\" class='btn btn-primary btn-lg btn-block' id='delete' name='delete'>Delete</a>
                                                </div>        
                                            </fieldset>        
                                        </form>
                                    </div>
                                </div>";
                        }
                    ?>
        </div>

    </div>
</body>
</html>