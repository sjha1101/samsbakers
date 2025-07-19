<?php
include('../config/dbconnect.php');
$cat_id = $_REQUEST["prodId"];
$product = mysqli_query($conn, "SELECT price from product WHERE product_id=$cat_id");
$c = mysqli_fetch_array($product);
?>
<input type="hidden" name="Price" value="<?= $c['price'] ?>">
<input type="submit" value="Price:<?php echo $c['price'] ?>" class="inputBox" style="width: auto;">