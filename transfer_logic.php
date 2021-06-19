<?php
include 'config.php';

// basic logic
if(isset($_POST['submit']))
{
    $sender_id = $_GET['id'];
    $receiver_id = $_POST['receiver'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where id=$sender_id";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from customers where id=$receiver_id";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

    // If amount is negative
    if (($amount) < 0)
   {
        echo '<script type="text/javascript"> alert("Negative amount cannot be transferred");</script>';
    }

    // If amount is Zero
    else if(($amount) == 0){
        echo "<script type='text/javascript'>alert('Zero amount cannot be transferred');</script>";
    }

    // If insufficient balance
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript"> alert("Insufficient Balance!")</script>';
    }

    else {
                // deducting amount from sender's account
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE customers set balance=$newbalance where id=$sender_id";
                mysqli_query($conn,$sql);
            

                // adding amount to reciever's account
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE customers set balance=$newbalance where id=$receiver_id";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transfers(sender, receiver, amount) VALUES ('$sender','$receiver',$amount)";
                $message=mysqli_query($conn,$sql);

                if($message){
                    echo "<script> alert('Transaction Successful');window.location='transaction.php';</script>";
                }
                $newbalance= 0;
                $amount =0;
        }
    
}
?>
