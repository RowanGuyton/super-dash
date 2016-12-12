<?php
if (isset($_GET["mode"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM products WHERE id='$id'";
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
                                    <img class='img-responsive' src=\"http://placehold.it/1200x480?text=Product+Image\">
                                </div>
                                <div class=\"col-md-4 col-xs-12\">
                                    <div class='well'>
                                        <p>" . $id . "</p>
                                        <p>" . $name . "</p>
                                        <p>" . $description . "</p>
                                        <p>" . $price . "</p>
                                        <p>" . $stock . " in stock.</p>
                                    </div>
                                </div>
                                </div>
                                <div class='row text-center'>
                                    <div class='col-md-3 col-md-offset-3'>
                                        <a href='update_product.php?id=$id&name=$name&description=$description&price=$price&stock=$stock' class='btn btn-primary btn-lg btn-block' id='update' name='update'>Update</a>
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