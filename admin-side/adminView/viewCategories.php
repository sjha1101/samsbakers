<!DOCTYPE html>
<html>

<head>
  <link rel="icon" href="../Images/LOGO.png" type="image/x-icon">
  <title>The Sams Bakers - Cake And Bake</title>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    </link>
  </head>
</head>

<body>

  <div>
    <h3>Category Items</h3>
    <table class="table ">
      <thead>
        <tr>
          <th class="text-center">S.N.</th>
          <th class="text-center">Category Name</th>
          <th class="text-center" colspan="2">Action</th>
        </tr>
      </thead>
      <?php
      include_once "../config/dbconnect.php";
      $sql = "SELECT * from category";
      $result = $conn->query($sql);
      $count = 1;
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>
          <tr>
            <td><?= $count ?></td>
            <td><?= $row["category_name"] ?></td>
            <!-- <td><button class="btn btn-primary" >Edit</button></td> -->
            <td><button class="btn btn-danger" style="height:40px; width:90px; font-size:22px;" onclick="categoryDelete('<?= $row['category_id'] ?>')">Delete</button></td>
          </tr>
      <?php
          $count = $count + 1;
        }
      }
      ?>
    </table>

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-secondary" style="height:40px; width:136px; font-size:18px;" data-toggle="modal" data-target="#myModal">
      Add Category
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" style="font-size:22px;">New Category Item</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form enctype='multipart/form-data' action="./controller/addCatController.php" method="POST">
              <div class="form-group">
                <label for="c_name" style="font-size:22px;">Category Name:</label>
                <input type="text" class="form-control" name="c_name" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-secondary" name="upload" style="height:40px; font-size:22px ">Add Category</button>
              </div>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px; font-size:22px">Close</button>
          </div>
        </div>

      </div>
    </div>
  </div>
  <script>
    //delete category data
    function categoryDelete(id) {
      $.ajax({
        url: "./controller/catDeleteController.php",
        method: "post",
        data: {
          record: id
        },
        success: function(data) {
          alert('Category Successfully deleted');
          $('form').trigger('reset');
          showCategory();
        }
      });
    }
  </script>
</body>

</html>