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
    // You would add code here to use the database (add, edit,
    // retrieve data etc.)
    // After all work with the database is complete disconnect the
    // database connection (we are finished with the database)


}
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

</body>
</html>