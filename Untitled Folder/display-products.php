<?php
if (isset($_POST["singlebutton"])) {

    if (!empty(mysqli_real_escape_string($connection, $_POST["textinput"]))) {

        $search = mysqli_real_escape_string($connection, $_POST["textinput"]);
        $sql = "SELECT * FROM products WHERE category LIKE LOWER('%$search%') or name LIKE LOWER('%$search%') ";
    }
} else {

    $sql = "SELECT * FROM products";
}


$result = mysqli_query($connection, $sql);

if ($result) {
    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
        $id = $row[0];
        $name = $row[1];
        $desc = $row[2];
        $price = $row[3];
        $stock = $row[5];
        echo "<div class=\"col-xs-6 col-lg-3 text-center\">
                            <div class=\"panel panel-default\">
                            <div class=\"panel-heading\" id=\"id\">
                                " . $row[0] . "
                            </div>
                            <div class=\"panel-body\">
                            <a href=\"view_product.php?id=$id&name=$name&description=$desc&price=$price&stock=$stock\"><p id='name'>" . $row[1] . "</p></a>
                            <p id='description'>" . $row[2] . "</p>
                            <p>Currently <b>" . $row[5] . "</b> in stock.</p>
                            </div>
                            <div class=\"panel-footer\">
                                <b><p>" . $row[3] . "</p></b>
                            </div>
                            </div>
                            </div>";
    }
} else {
    echo 'Invalid query: ' . mysqli_error($connection) . "\n";
    echo 'Whole query: ' . $sql;
}
?>