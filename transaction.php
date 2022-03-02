<!doctype html>
<html lang="en">
<head>
    <title>Transactions</title>
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
    <?php 
    include 'config.php';
    $query = "SELECT * from transfers";
    $res = mysqli_query($conn, $query);
    ?>

    <!-- Heading -->
    <h3 style="text-align : center">
        Transactions 
    </h3> 

    <!-- Table -->
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Sender</th>
            <th scope="col">Receiver</th>
            <th scope="col">Amount</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            while($rows = mysqli_fetch_assoc($res)) {
        ?>
        <tr>
            <td><?php echo $rows['id']?></td>
            <td><?php echo $rows['sender']?></td>
            <td><?php echo $rows['receiver']?></td>
            <td><?php echo $rows['amount']?></td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</body>
</html>