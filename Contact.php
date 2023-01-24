<?php
  require 'vendor/autoload.php';
  $key = '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';
  if(isset($_POST['submit'])){
    $send = new \SendGrid\Mail\Mail();
    $send->setFrom($_POST['email'],"Contact Form");
    $send->setSubject("[Test]" . $_POST['subject']);
    $send->addTo('youssefachchirajdevelopper@gmail.com',"Youssef dev");
    $send->addContent(
          "text/html",
            "<h1> Email from Contact Form from" .$_POST['name'] . "</h1>" .
            "<div> Email: " . $_POST['email'] . "</div>".
            "<div> Email: " . $_POST['message'] . "</div>"
    );
    $msg = new \SendGrid($key);

    try{
      $response = $msg->send($send);
      header("Location: /successuflly");
    }catch(Exception $e){
        header("Location: /Faild_Sending");
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrab -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <header class="bg-body-tertiary" style="display: flex; justify-content: space-around; align-items: center; padding-block: .5em; margin-bottom: .5em;">
        <h3>Youssef ACHCHIRAJ</h3>
        <nav class="navbar navbar-expand-lg ">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">My Projects</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="#">Contact</a>
                </li>
            </ul>
            <form style="margin-left: .5em;" class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="button">Search</button>
            </form>
          </nav>
    </header>
    <div class="container" style="max-width: 50em;">
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Full name</label>
                <input type="text" name="name" class="form-control" id="name">
              </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="subject" class="form-label">Subject</label>
              <input type="text" name="subject" class="form-control" id="subject">
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Your message for me" name="message" id="floatingTextarea2" style="height: 80px"></textarea>
                <label for="floatingTextarea2">Message</label>
              </div>
              <!-- check box -->
              <!-- <h3>choose wich email you want send to: </h3>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="emailName" value="youssefachchirajdevelopper@gmail.com" id="flexRadioDefault1" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                  Youssef Developper
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="emailName" value="youssefachchirraje66@gmail.com" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                  Youssef ACHCHIRAJ
                </label>
              </div> -->
            <button style="margin-top: .5em;" type="submit" class="btn btn-primary" name="submit">Send</button>
          </form>
    </div>
</body>
</html>