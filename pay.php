<?php
$con=mysqli_connect('localhost','root','','payment');
if (isset($_POST['payment']) && $_POST['amt'] >=99) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $amount=$_POST['amt'];
    $pay_to='MCA Foundation (Save Tree , Save India)';
    include 'instamojo\Instamojo.php';
    $api = new Instamojo\Instamojo('test_3fca8eebb469e6292a0003326f6', 'test_69ae86fc88c4fccf0809d1641df', 'https://test.instamojo.com/api/1.1/');
    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $pay_to,
            "user_name" => $name,
            "email" => $email,
            "phone" => $phone,
            "amount" => $amount,
            "send_email" => true,
            "allow_repeated_payments" => false,
            "redirect_url" => "http://localhost/Payment/thankyou.php"
            ));
       // print_r($response);
        $url=$response['longurl'];
        header("location:$url");
        }
        catch (Exception $e) {
            print('Error: ' . $e->getMessage());
        }
        $query="INSERT INTO transaction (name,email,phone,amount,pay_to) VALUES ('$name','$email','$phone','$amount','$pay_to')";
        $run=mysqli_query($con,$query);
    }
?>
