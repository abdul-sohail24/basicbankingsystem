<?php
    include 'transfer_logic.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Transfer</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="./images/TSFlogo.png" />
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Jquery CDN -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>

    <link rel="stylesheet" href="./css/transfer.css">
    <link rel="stylesheet" href="./css/nav.css" />
</head>

<body>
  <!-- Navbar -->
    <nav class="navbar navbar-expand-md bg-danger navbar-dark" id="navigation">
      <span class="navbar-text" id="nav_text">The Dark Knight Foundation</span>
      <button
        class="navbar-toggler"
        data-toggle="collapse"
        data-target="#collapse_target"
        data-color="red"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="collapse_target">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="./index.html" id="nav_text">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./displayusers.php" id="nav_text"
              >View Customers</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./transaction.php" id="nav_text"
              >Transactions</a
            >
          </li>
        </ul>
      </div>
    </nav>
  <!-- User display -->
    <?php
        include 'config.php';
        $sender_id=$_GET['id'];
        $sql = "SELECT * FROM  customers where id=$sender_id";
        $result=mysqli_query($conn,$sql);
        $rows=mysqli_fetch_assoc($result);
    ?>
    <!-- Heading -->
    <h3 style="text-align : center">
      Transfer
    </h3>
    <form method="POST">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Balance</th>
            </tr>
          </thead>
          <tbody>
          <tr>
            <td><?php echo $rows['id']?></td>
            <td><?php echo $rows['name']?></td>
            <td><?php echo $rows['email']?></td>
            <td><?php echo $rows['balance']?></td>
          </tr>
          </tbody>
        </table>

      <!-- User Selection -->
      <label class='transfer_message'>Transfer To : </label>
      <section class="container" >
        <select name="receiver" class='transfer_box' required >
            <option value="" disabled selected>Select</option>
            <?php
                include 'config.php';
                $sender_id=$_GET['id'];
                $sql = "SELECT * FROM customers where id!=$sender_id";
                $result=mysqli_query($conn,$sql);
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?php echo $rows['id'];?>">
                  <?php echo $rows['name'] ?> [Balance: <?php echo $rows['balance']?>];
                </option>
            <?php 
                } 
            ?>
        </select>
      </section>

      <!-- Amount transfer -->
      <label class='transfer_message' class='mt-5'>Amount : </label>
      <section class="container">
        <input type="number" name='amount' id='amount_box' required>
      </section>   
      <button class="button mt-5 btn-dark" name="submit">Transfer</button>
    </form>
</body>
</html>