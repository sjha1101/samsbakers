<?php
include('../config/dbconnect.php');
$cat_id = $_REQUEST["catId"];
$product = mysqli_query($conn, "SELECT * from product WHERE category_id=$cat_id");

while ($c = mysqli_fetch_array($product)) {
?>
    <option value="<?php echo $c['product_id'] ?>"><?php echo $c['product_name'] ?></option>
<?php
}
