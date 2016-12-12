<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = "SELECT * FROM products WHERE id='$id'";
    $result = mysqli_query($connection, $query);


    if ($result) {
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            echo "<div class=\"row text-center\">
                <div class=\"col-xs-12\">
                    <h1 class=\"page-header\">
                        Add Item
                    </h1>
                </div>
            </div>

            <div class=\"row text-center\">
                <form class=\"form-horizontal\" action=\"?\" method=\"post\">
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Form Name</legend>

                        <!-- Text input-->
                        <div class=\"form-group\">
                            <label class=\"col-md-6 control-label\" for=\"textinput\">id</label>
                            <div class=\"col-md-6\">
                                <input id=\"idfield\" name=\"id\" type=\"text\" value=\"$row[0]\" class=\"form-control input-md\" readonly>

                            </div>
                        </div>
                        
                        <div class=\"form-group\">
                            <label class=\"col-md-6 control-label\" for=\"textinput\">Product Name</label>
                            <div class=\"col-md-6\">
                                <input id=\"textinput\" name=\"textinput\" type=\"text\" placeholder=\"Enter a product name\" class=\"form-control input-md\" required=\"\">

                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class=\"form-group\">
                            <label class=\"col-md-4 control-label\" for=\"selectbasic\">Product Category</label>
                            <div class=\"col-md-4\">
                                <select id=\"selectbasic\" name=\"selectbasic\" class=\"form-control\">
                                    <option value=\"accessories\">Accessories</option>
                                    <option value=\"dresses\">Dresses</option>
                                    <option value=\"jackets\">Jackets</option>
                                    <option value=\"jeans\">Jeans</option>
                                    <option value=\"jumpers\">Jumpers</option>
                                    <option value=\"shirts\">Shirts</option>
                                    <option value=\"shoes\">Shoes</option>
                                    <option value=\"sunglasses\">Sunglasses</option>
                                    <option value=\"t-shirts\">T-Shirts</option>
                                    <option value=\"underwear\">Underwear</option>
                                    <option value=\"watches\">Watches</option>
                                </select>
                            </div>
                        </div>

                        <div class=\"col-md-4\">
                            <label for=\"productprice\">
                                Product Price:
                            </label>
                            <input type=\"number\" min=\"0\" step=\"any\" name=\"productprice\" id=\"productprice\">
                        </div>

                        <div class=\"col-md-4\">
                            <label for=\"productcostprice\">
                                Product Cost Price:
                            </label>
                            <input type=\"number\" min=\"0\" step=\"any\" name=\"productcostprice\" id=\"productcostprice\">
                        </div>

                        <div class=\"col-md-4\">
                            <label for=\"stock\">
                                Stock:
                            </label>
                            <input type=\"number\" min=\"0\" step=\"1\" name=\"stock\" id=\"stock\">
                        </div>

                        <!-- Textarea -->
                        <div class=\"form-group\">
                            <label class=\"col-md-4 control-label\" for=\"textarea\">Product Description</label>
                            <div class=\"col-md-4\">
                                <textarea class=\"form-control\" id=\"textarea\" name=\"textarea\">Enter a description here</textarea>
                            </div>
                        </div>

                        <!-- File Button -->
                        <div class=\"form-group\">
                            <label class=\"col-md-4 control-label\" for=\"filebutton\">Upload An Image</label>
                            <div class=\"col-md-4\">
                                <input id=\"filebutton\" name=\"filebutton\" class=\"input-file\" type=\"file\">
                            </div>
                        </div>

                        <!-- Button -->
                        <div class=\"form-group\">
                            <label class=\"col-md-4 control-label\" for=\"singlebutton\"></label>
                            <div class=\"col-md-4\">
                                <button id=\"singlebutton\" name=\"singlebutton\" class=\"btn btn-primary\">Submit</button>
                            </div>
                        </div>

                    </fieldset>
                </form>";
        }
    }

} else {
    echo "<p>Error: Unable to access page directly.</p>";
}

if (isset($_POST["singlebutton"])) {
    if ((!empty(mysqli_real_escape_string($connection, $_POST["textinput"]))) && (!empty(mysqli_real_escape_string($connection, $_POST["textarea"]))) && (!empty(mysqli_real_escape_string($connection, $_POST["productprice"]))) && (!empty(mysqli_real_escape_string($connection, $_POST["productcostprice"]))) && (!empty(mysqli_real_escape_string($connection, $_POST["stock"]))) && (!empty(mysqli_real_escape_string($connection, $_POST["selectbasic"])))) {

        $id = mysqli_real_escape_string($connection, $_POST["id"]);
        $name = mysqli_real_escape_string($connection, $_POST["textinput"]);
        $description = mysqli_real_escape_string($connection, $_POST["textarea"]);
        $price = mysqli_real_escape_string($connection, $_POST["productprice"]);
        $costPrice = mysqli_real_escape_string($connection, $_POST["productcostprice"]);
        $stock = mysqli_real_escape_string($connection, $_POST["stock"]);
        $category = mysqli_real_escape_string($connection, $_POST["selectbasic"]);

        $sql = "UPDATE products SET name='$name', description='$description', price='$price', cost_price='$costPrice', stock='$stock', category='$category' WHERE id='$id'";

        $result2 = mysqli_query($connection, $sql);

        if ($result2) {
            echo "Item successfully updated.";
        } else {
            echo 'Invalid query: ' . mysqli_error($connection) . "\n";
            echo 'Whole query: ' . $sql;
        }
    }
}

?>