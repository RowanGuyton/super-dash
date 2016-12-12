<?php
if (isset($_POST["singlebutton"])) {
    if ((!empty(mysqli_real_escape_string($connection, $_POST["textinput"]))) && (!empty(mysqli_real_escape_string($connection, $_POST["textarea"]))) && (!empty(mysqli_real_escape_string($connection, $_POST["productprice"]))) && (!empty(mysqli_real_escape_string($connection, $_POST["productcostprice"]))) && (!empty(mysqli_real_escape_string($connection, $_POST["stock"]))) && (!empty(mysqli_real_escape_string($connection, $_POST["selectbasic"])))) {

        $name = mysqli_real_escape_string($connection, $_POST["textinput"]);
        $description = mysqli_real_escape_string($connection, $_POST["textarea"]);
        $price = mysqli_real_escape_string($connection, $_POST["productprice"]);
        $costPrice = mysqli_real_escape_string($connection, $_POST["productcostprice"]);
        $stock = mysqli_real_escape_string($connection, $_POST["stock"]);
        $category = mysqli_real_escape_string($connection, $_POST["selectbasic"]);

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