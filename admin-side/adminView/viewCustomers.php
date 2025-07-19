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
    <h2>All Customers</h2>
    <table class="table ">
      <thead>
        <tr>
          <th class="text-center">S.N.</th>
          <th class="text-center">Name </th>
          <th class="text-center">Email</th>
          <th class="text-center">Contact Number</th>
          <th class="text-center">Password</th>
          <th class="text-center" colspan="2">Action</th>

        </tr>
      </thead>
      <?php
      include_once "../config/dbconnect.php";
      $sql = "SELECT * from users where is_admin=0";
      $result = $conn->query($sql);
      $count = 1;
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

      ?>
          <tr>
            <td><?= $count ?></td>
            <td><?= $row["name"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["contact"] ?></td>
            <td><?= $row["password"] ?></td>
            <td><button class="btn btn-danger" style="height:40px; width:90px; font-size:22px;" onclick="userDelete('<?= $row['user_id'] ?>')">Delete</button></td>
          </tr>
      <?php
          $count = $count + 1;
        }
      }
      ?>
    </table>

    <script>
      //delete product data
      function userDelete(id) {
        $.ajax({
          url: "./controller/deletecustomerController.php",
          method: "post",
          data: {
            record: id
          },
          success: function(data) {
            alert('Customer Successfully deleted');
            $('form').trigger('reset');
            showProductItems();
          }
        });
      }
    </script>
</body>

</html>