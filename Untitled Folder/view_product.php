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
//$name=$_GET["name"];
//$description=$_GET["description"];
//$price=$_GET["price"];
//$costPrice=$_GET["costprice"];
//$stock=$_GET["stock"];
//$ean=$_GET["ean"];
$sql="SELECT * FROM products WHERE id='".$_GET["id"]."'";
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
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <?php
                $result=mysqli_query($connection, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                        $name=$row[1];
                        $description=$row[2];
                        //$price=$_GET["price"];
                        //$costPrice=$_GET["costprice"];
                        //$stock=$_GET["stock"];
                        //$ean=$_GET["ean"];
                        echo "<div class=\"col-xs-12\">
                                
                            </div>
                            <div class=\"col-xs-12\">
                                <p>".$description."</p>
                            </div>";
                    }
                } else {
                    echo 'Invalid query: ' . mysqli_error($connection) . "\n";
                    echo 'Whole query: ' . $sql;
                }
                ?>
            </>
        </div>
        </div>
    </div>
</body>
</html>