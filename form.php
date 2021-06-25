<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Leave us a message</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles2.css">

</head>

<body>

    <body>
        <header class="topbar">
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"><img src="menu.png" alt=""></i>
            </label>
            <label class="logo"><img src="LOGO-2018.jpg" alt=""></label>
            <nav>
                <a href="index.php">Accueil</a>
                <a href="Articles.php">Articles</a>
                <a href="#" class="active">A propos</a>
                <a href="form.php">Contact</a>
            </nav>
            <div id="google_translate_element"></div>
            <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'fr'
                }, 'google_translate_element')
            }
            </script>
            <script type="text/javascript"
                src="//translate.google.com/translate_a/element.js?cb=gooleTranslateElementInit">
            </script>
            <div class="social">
                <a href="#"><img src="facebook.png" title=""></a>
                <a href="#"><img src="twitter.png" title=""></a>
            </div>
        </header>
        <div class="banniere"></div>
    </body>




    <?php


  require("./PHPMailer/PHPMailer.php");
  require("./PHPMailer/SMTP.php");

  
if(isset($_POST['name']) && isset($_POST['email'])) {

        $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP

    $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    //$mail->IsHTML(true);
    $mail->Username = "mbutiji1@gmail.com";
    $mail->Password = "developer-8081";
    $mail->SetFrom($email, $name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress("mbiakopclinton@gmail.com");

     if(!$mail->Send()) {
        //echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "<p class='sent_alert'> Message has been sent </p>";
     }


     header( "refresh:2;url=form.php" );
}




?>





    <!----------------  Sending mail using PHPMailer  -------------->
    <?php

//   require("/home/site/libs/PHPMailer-master/src/PHPMailer.php");
//   require("/home/site/libs/PHPMailer-master/src/SMTP.php");

//     $mail = new PHPMailer\PHPMailer\PHPMailer();
//     $mail->IsSMTP(); // enable SMTP

//     $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
//     $mail->SMTPAuth = true; // authentication enabled
//     $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
//     $mail->Host = "smtp.gmail.com";
//     $mail->Port = 465; // or 587
//     $mail->IsHTML(true);
//     $mail->Username = "xxxxxx";
//     $mail->Password = "xxxx";
//     $mail->SetFrom("xxxxxx@xxxxx.com");
//     $mail->Subject = "Test";
//     $mail->Body = "hello";
//     $mail->AddAddress("xxxxxx@xxxxx.com");

//      if(!$mail->Send()) {
//         echo "Mailer Error: " . $mail->ErrorInfo;
//      } else {
//         echo "Message has been sent";
//      }
?>


    <div class="form_container">

        <form action="form.php" method="POST" class="mb-3">



            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                <input id="name" type="text" name="name" class="form-control" id="exampleFormControlInput1"
                    placeholder="Enter Name" required>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input id="email" type="email" name="email" class="form-control" id="exampleFormControlInput1"
                    placeholder="name@example.com" required>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Subject</label>
                <input id="subject" type="text" name="subject" class="form-control" id="exampleFormControlInput1"
                    placeholder="Message Subject" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Enter your message</label>
                <textarea id="body" class="form-control" name="body" id="exampleFormControlTextarea1" rows="3"
                    required></textarea>
            </div>
            <input id="submit" onclick="sendEmail()" type="submit" name="submit" class="btn btn-primary btn-lg"
                value="Submit">
        </form>


    </div>

    <!-- ------------------link jquery-------------- -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
    function sendEmail() {
        var name = $("#name");
        var email = $("#email");
        var subject = $("#subject");
        var body = $("#body");


        if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
            // ajax here
            $.ajax({
                url: 'form.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    name: name.val(),
                    email: email.val(),
                    subject: subject.val(),
                    body: body.val()

                },
                success: function(response) {
                    console.log(response);
                }
            });

        }

    }


    function isNotEmpty(caller) {

        if (caller.val() == "") {
            caller.css('border', '2px solid red');
            return false;
        } else {
            caller.css('border', '');
            return true;
        }
    }
    </script>

</body>

</html>