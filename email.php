<!DOCTYPE html>
<html>
<head>
    <title>Email Reminder</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <style>
         body {
    background-image: url('images/emailbg.png');
    background-size: cover;
    background-position: center;
    backdrop-filter: blur(5px); /* Set the blur radius to 5px */
}

         body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h1 {
        font-size: 50px;
        font-weight: bold;
        color: #333;
        text-align: center;
        margin: 39px 0;
    }

    p {
        font-size: 18px;
        line-height: 1.5;
        color: #666;
        margin-bottom: 10px;
    }
    form {
    background-color: #fff;
    padding: 89px;
    margin: 40px auto;
    max-width: 600px;
    border-radius: -49px;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
    height: auto;
}

        label {
            display: block;
            margin-bottom: 24px;
        }
        input[type="radio"] {
            margin-right: 10px;
            transform: scale(1.5); /* increases the size of the radio button */
            -webkit-appearance: none; /* removes the default appearance */
            border: 4px solid #ccc;
            border-radius: 70%; /* makes the radio button circular */
            outline: none; /* removes the outline on focus */
             }

/* changes the color of the radio button when checked */
input[type="radio"]:checked {
  background-color: #4CAF50;
  border-color: #4CAF50;
}


input[type="text"], textarea {
    padding: 14px;
    border-radius: 12px;
    border: 6px solid #ccc;
    width: 100%;
    box-sizing: border-box;
    margin-bottom: 33px;
    font-size: 16px;
    line-height: 1.5;
    resize: vertical;
    max-width: 100%;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: #fff;
  padding: 12px 24px;
  border-radius: 5px;
  border: none;
  cursor: pointer;
  font-size: 16px;
  font-weight: bold;
  transition: all 0.3s ease-in-out;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}

    /* Text styles */
    h1 {
        font-size: xxx-large;
        color: #333;
        text-align: center;
        margin-top: 20px;
    }

    p {
        font-size: 16px;
        line-height: 1.5;
        color: #666;
    }

    .message {
        margin-top: 20px;
        text-align: center;
    }

    .message p {
        font-size: 18px;
        font-weight: bold;
        color: #333;
    }
    legend {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 24px;
}


    .success {
        color: green;
    }

    .error {
        color: red;
    }


</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Email Reminder</h1>
        <form method="post" action="">
            <fieldset>
                <legend>Select an Event:</legend>
                <?php
                 // Include PHPMailer library
                 use PHPMailer\PHPMailer\PHPMailer;
                 use PHPMailer\PHPMailer\Exception;
                 require 'C:/xampp/htdocs/CEHP/PHPMailer-master/src/PHPMailer.php';
                 require 'C:/xampp/htdocs/CEHP/PHPMailer-master/src/Exception.php';
                 require 'C:/xampp/htdocs/CEHP/PHPMailer-master/src/SMTP.php';
                             // Database configuration
                             $servername = "localhost";
                             $username = "root";
                             $password = "";
                             $dbname = "ceh";
             
                             // Create connection
                             $conn = new mysqli($servername, $username, $password, $dbname);
             
                             // Check connection
                             if ($conn->connect_error) {
                                 die("Connection failed: " . $conn->connect_error);
                             }
             
                             // SQL query to retrieve all event names from the "events" table
                             $sql = "SELECT event_title FROM events";
                             $result = $conn->query($sql);
             
                             if ($result->num_rows > 0) {
                                 // Loop through all event names and create radio buttons
                                 while($row = $result->fetch_assoc()) {
                                     $event_title = $row["event_title"];
                                     echo '<label><input type="radio" name="event_title" value="' . $event_title . '">' . $event_title . '</label>';
                                 }
                             } else {
                                 echo "No events found in the database.";
                             }
             
                             
             
                             if ($result->num_rows > 0) {
                                 // Create radio buttons for all events
                                 echo '<form method="post" action="">';
                                 while($row = $result->fetch_assoc()) {
                                 $event_title= $row["event_title"];
                                 echo ' =<input type="radio" id="'.$event_title.'" name="event_title" value="'.$event_title.'">';
                                 echo '<label for="'.$event_title.'">'.$event_title.'</label><br>';
                                 }
                                 echo '<br><br>';
                                 // Add email input fields and submit button
                                 echo '<label for="subject">Subject:</label>';
                                 echo '<input type="text" id="subject" name="subject"><br>';
                                 
                                 echo '<label for="body">Body:</label>';
                                 echo '<textarea id="body" name="body"></textarea><br>';
                                 
                                 echo '<label for="alt-body">Alternate Body:</label>';
                                 echo '<textarea id="alt-body" name="alt-body"></textarea><br>';
                                 
                                 echo '<input type="submit" value="Send Email">';
                                 echo '</form>';
                                 } else {
                                     echo "No events found in the database.";
                                     }
                                     
                                     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                     $subject = $_POST['subject'];
                                     $body = $_POST['body'];
                                     $altBody = $_POST['alt-body'];
                                     $event_title = $_POST['event_title'];
                                     // Database configuration
                                 $servername = "localhost";
                                 $username = "root";
                                 $password = "";
                                 $dbname ="ceh";
                                 
                                 // Create connection
                                 $conn = new mysqli($servername, $username, $password, $dbname);
                                 
                                 // Check connection
                                 if ($conn->connect_error) {
                                     die("Connection failed: " . $conn->connect_error);
                                 }
                                 
                                 // SQL query to retrieve all email addresses for the selected event
                                 $sql = "SELECT email FROM participent WHERE event_id = (SELECT event_id FROM events WHERE event_title = '$event_title');
                                 ";
                                 $result = $conn->query($sql);
                                 
                                 if ($result->num_rows > 0) {
                                     // Loop through all email addresses and send email
                                     while($row = $result->fetch_assoc()) {
                                         $email = $row["email"];
                                 
                                         // PHPMailer configuration
                                         $mail = new PHPMailer(true);
                                         $mail->SMTPDebug = 0;
                                         $mail->isSMTP();
                                 
                                         // SMTP configuration
                                         $mail->Host = 'smtp.gmail.com';
                                         $mail->SMTPAuth = true;
                                         $mail->Username = 'pisepiyush39@gmail.com';
                                         $mail->Password = 'elmmedjekmbpuwgy';
                                         $mail->SMTPSecure = 'tls';
                                         $mail->Port = 587;
                                 
                                         // Email content
                                         $mail->setFrom('pisepiyush39@gmail.com', 'PIYUSH PISE');
                                         $mail->addAddress($email);
                                         $mail->Subject = $subject;
                                         $mail->Body = $body;
                                         $mail->AltBody = $altBody;
                                 
                                         // Send email
                                         try {
                                             $mail->send();
                             echo '<div class="message success">Email reminder sent to ' . $email . '.</div>';
                                         } catch (Exception $e) {
                                             echo "Email could not be sent to " . $email . ". Error: " . $mail->ErrorInfo . "<br>";
                                         }
                                     }
                                 } else {
                                     echo "No participants found for the selected event.";
                                 }
                                 }
                                 ?>
<!-- <script>
   $(document).ready(function(){
       $('.message').hide(); // Hide the message div initially
       $('form').submit(function(event){
           event.preventDefault(); // Prevent the form from submitting
           var form = $(this);
           $.ajax({
               type: form.attr('method'),
               url: form.attr('action'),
               data: form.serialize(),
               success: function(data){
                   $('.message').html(data); // Set the message text
                   $('.message').show(); // Show the message div
               }
           });
       });
   }); -->
</script>    
</body>
</html>
