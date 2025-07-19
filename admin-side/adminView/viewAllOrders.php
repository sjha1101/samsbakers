<?php
include_once "../config/dbconnect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../Images/LOGO.png" type="image/x-icon">
  <title>The Sams Bakers - Cake And Bake</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <div id="ordersBtn">
    <h2>Order Details</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>O.N.</th>
          <th>Customer</th>
          <th>Contact</th>
          <th>Category</th>
          <th>Cake Name</th>
          <th>Address</th>
          <th>Price</th>
          <th>Order Status</th>
          <th>Payment Status</th>
        </tr>
      </thead>

      <?php

      $sql = "SELECT orders.order_status,orders.pay_status,orders.order_id,orders.name,orders.address,orders.contact,orders.Price,category.category_name,product.product_name from orders 
      INNER JOIN category 
      INNER JOIN product
      WHERE orders.category = category.category_id AND orders.cake = product.product_id";
      $result = $conn->query($sql);



      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>

          <tr>
            <td><?= $row["order_id"] ?></td>
            <td><?= $row["name"] ?></td>
            <td><?= $row["contact"] ?></td>
            <td><?= $row["category_name"] ?></td>
            <td><?= $row["product_name"] ?></td>
            <td><?= $row["address"] ?></td>
            <td><?= $row["Price"] ?></td>
            <?php
            if ($row["order_status"] == 0) {

            ?>
              <td><button class="btn btn-danger" onclick="ChangeOrderStatus('<?= $row['order_id'] ?>')">Pending </button></td>
            <?php

            } else {
            ?>
              <td><button class="btn btn-success" onclick="ChangeOrderStatus('<?= $row['order_id'] ?>')">Delivered</button></td>

            <?php
            }
            if ($row["pay_status"] == 0) {
            ?>
              <td><button class="btn btn-danger" onclick="ChangePay('<?= $row['order_id'] ?>')">Unpaid</button></td>
            <?php

            } else if ($row["pay_status"] == 1) {
            ?>
              <td><button class="btn btn-success" onclick="ChangePay('<?= $row['order_id'] ?>')">Paid </button></td>
            <?php
            }
            ?>


          </tr>
      <?php

        }
      }
      ?>

    </table>
  </div>
  <script>
    //for view order modal  
    $(document).ready(function() {
      $('.openPopup').on('click', function() {
        var dataURL = $(this).attr('data-href');

        $('.order-view-modal').load(dataURL, function() {
          $('#viewModal').modal({
            show: true
          });
        });
      });
    });


    function ChangeOrderStatus(id) {
      $.ajax({
        url: "./controller/updateOrderStatus.php",
        method: "post",
        data: {
          record: id
        },
        success: function(data) {
          alert('Order Status updated successfully');
          $('form').trigger('reset');
          showOrders();
        }
      });
    }

    function ChangePay(id) {
      $.ajax({
        url: "./controller/updatePayStatus.php",
        method: "post",
        data: {
          record: id
        },
        success: function(data) {
          alert('Payment Status updated successfully');
          $('form').trigger('reset');
          showOrders();
        }
      });
    }
  </script>

</body>


</html>