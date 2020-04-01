<?php

if(isset($_POST['contact'])){
    include 'admin/config.php';

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
	   $subject = $_POST['subject'];
    $chekin = $_POST['from_date'];
    $checkout = $_POST['to_date'];
    $room_type = $_POST['room_type'];
    $guest = $_POST['guest_num'];    
    $message = $_POST['message'];
      
    $query="INSERT INTO `manage_contacts`(`name`,`email`,`phone`,`subject`,`message`,`from_date`,`to_date`,`room_type`,`guest_num`) VALUES ('$name','$email','$phone','$subject','$message','$chekin','$checkout','$room_type','$guest')";
        $stmt=$conn->prepare($query);
         $res=$stmt->execute();

   // $result = mysqli_query($con, $query);
    if($res){

 // sms start
        $username = "niranjanmwaghmare@gmail.com";
        $hash = "240746f9f66b8bacb71a30d05336571aa7fdba735b18d4d3ff4f1bb3e82369a8";

  // Config variables. Consult http://api.textlocal.in/docs for more info.
        $test = "0";

  // Data for text message. This is the text message data.
        $sender = "TXTLCL"; // This is who the message appears to be from.
        $numbers = $_POST['phone']; // A single number or a comma-seperated list of numbers
        $message = "Welcome to Lonavla Weekend family.";
  // 612 chars or less
  // A single number or a comma-seperated list of numbers
        $message = urlencode($message);
        $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
        $ch = curl_init('http://api.textlocal.in/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); // This is the result from the API
        curl_close($ch);
// sms end

// sms start
        $username1 = "niranjanmwaghmare@gmail.com";
        $hash1 = "240746f9f66b8bacb71a30d05336571aa7fdba735b18d4d3ff4f1bb3e82369a8";

  // Config variables. Consult http://api.textlocal.in/docs for more info.
        $test1 = "0";

  // Data for text message. This is the text message data.
        $sender1 = "TXTLCL";   //This is who the message appears to be from.
        $number1 = "9762241142"; // A single number or a comma-seperated list of numbers
        $message1 = "You have got enquiry from website.". 
        'User_name: '.$name.
        'email: '.$email.
        'ph.no: '.$phone.
        'check-in-date: '.$chekin.
        'checkout-date: '.$checkout.
        'room_type: '.$room_type.
        'no.of guest: '.$guest;
  // 612 chars or less
  // A single number or a comma-seperated list of numbers
        $message1 = urlencode($message1);
        $data1 = "username=".$username1."&hash=".$hash1."&message=".$message1."&sender=".$sender1."&numbers=".$numbers1."&test=".$test1;
        $ch = curl_init('http://api.textlocal.in/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); // This is the result from the API
        curl_close($ch);
// sms end



// email code
  $to = $email;
  $subject = "Hi " . $name . ", welcome to family of Lonavla Weekend....!";
  $body = '
Dear ' . $name . ',
  Thank you for joining our site. Your request has been successfully submitted to our end our team will contact you shortly.
  Kind Regards,
Lonavla Weekend
  ';
  $headers = 'From: contact@lonavalaweekend.com';

  if (mail($to, $subject, $body, $headers)) {
    header('location:contact-us.php?p=3');
  }
  else{
    echo("email failed to sent to user whose email is " . $email);
  }

  // email end

  //self mail
$to_email1 = 'contact@lonavalaweekend.com';
  $subject1 = ' Site Response  ';
  $message1 = 'User_name: '.$name.
  'email: '.$email.
  '\n'.
  'ph.no: '.$phone.
  '\n'.
  'check-in-date: '.$chekin.
  '\n'.
  'checkout-date: '.$checkout.
  '\n'.
  'room_type: '.$room_type.
  '\n'.
  'no.of guest: '.$guest;
  $headers1 = 'From: contact@lonavalaweekend.com';
  mail($to_email1,$subject1,$message1,$headers1);
  //self email end

      // header("location:contact-us.php?q=2");
    }
    else{

      header("location:contact-us.php?q=101");
    }



}
?>