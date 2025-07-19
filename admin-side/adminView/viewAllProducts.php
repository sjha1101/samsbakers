<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta na0me="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="icon" href="../Images/LOGO.png" type="image/x-icon">
  <title>The Sams Bakers - Cake And Bake</title>
</head>

<body>
  <div>
    <h2>Product Items</h2>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-secondary " style="height:50px" data-toggle="modal" data-target="#myModal">
      Add Product
    </button>
    <br>
    <br>
    <table class="table">
      <thead>
        <tr>
          <th class="text-center">S.N.</th>
          <th class="text-center">Product Image</th>
          <th class="text-center">Product Name</th>
          <th class="text-center">Category Name</th>
          <th class="text-center">Unit Price</th>
          <th class="text-center" colspan="2">Action</th>
        </tr>
      </thead>

      <?php
      include_once "../config/dbconnect.php";
      $sql = "SELECT * from product, category WHERE product.category_id=category.category_id";
      $result = $conn->query($sql);
      $count = 1;

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>
          <tr>
            <td><?= $count ?></td>
            <td><img height='100px' src='<?= $row["product_image"] ?>'></td>
            <td><?= $row["product_name"] ?></td>
            <td><?= $row["category_name"] ?></td>
            <td><?= $row["price"] ?></td>
            <td><button class="btn btn-primary" style="width: 100px; height:40px; font-size:24px;" onclick="itemEditForm('<?= $row['product_id'] ?>')">Edit</button></td>
            <td><button class="btn btn-danger" style="width: 100px; height:40px; font-size:24px;" onclick="itemDelete('<?= $row['product_id'] ?>')">Delete</button></td>
          </tr>
      <?php
          $count = $count + 1;
        }
      }
      ?>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">New Product Item</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form action="./controller/addItemController.php" enctype='multipart/form-data' onsubmit="addItems()" method="post">
              <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" class="form-control" name="p_name" required>
              </div>
              <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" name="p_price" required>
              </div>
              <div class="form-group">
                <label>Category:</label>
                <select name="category">
                  <option disabled s elected>Select category</option>
                  <?php

                  $sql = "SELECT * from category";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="file">Choose Image:</label>
                <input type="file" class="form-control-file" id="file" name="file">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Item</button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script>
      //add product data
      function addItems() {
        var file = $('#file')[0].files[0];
        alert('Record Added Success.');

      }
      //update product after submit
      function updateItems() {
        var product_id = $('#product_id').val();
        var p_name = $('#p_name').val();
        var p_price = $('#p_price').val();
        var category = $('#category').val();
        var existingImage = $('#existingImage').val();
        var newImage = $('#newImage')[0].files[0];
        var fd = new FormData();
        fd.append('product_id', product_id);
        fd.append('p_name', p_name);
        fd.append('p_price', p_price);
        fd.append('category', category);
        fd.append('existingImage', existingImage);
        fd.append('newImage', newImage);
        $.ajax({
          url: "./controller/updateItemController.php",
          method: "post",
          data: fd,
          processData: false,
          contentType: false,
          success: function(data) {
            alert('Data Update Success.');
            $('form').trigger('reset');
            showProductItems();
          }
        });
      }

      //edit product data
      function itemEditForm(id) {
        $.ajax({
          url: "./adminView/editItemForm.php",
          method: "post",
          data: {
            record: id
          },
          success: function(data) {
            $('.allContent-section').html(data);
          }
        });
      }


      //delete product data
      function itemDelete(id) {
        $.ajax({
          url: "./controller/deleteItemController.php",
          method: "post",
          data: {
            record: id
          },
          success: function(data) {
            alert('Items Successfully deleted');
            $('form').trigger('reset');
            showProductItems();
          }
        });
      }
    </script>
    <script src="../js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>