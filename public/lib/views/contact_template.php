<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!--<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;900&display=swap" rel="stylesheet"> -->
        <link rel="stylesheet" href="/lib/css/style.css">
        <title>Contact Us| 86400.global</title>
        <meta name="description" content="Premium Web Design based in Brisbane, Queensland, Australia.
        Providing complete website services including web design, hosting and SEO."/> 
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
            <div class="container-fluid">
              <a class="navbar-brand" href="/">
                  <img src="/lib/img/logo.svg" height="100%" width="auto" alt="Best web design, web hosting and SEO company in Brisbane, 86400.global"/>
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/contact.php">Contact Us</a>
                  </li>
                </ul>
            </div>
          </nav>
        <div class="jumbotron jumbo-contact">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="panel-contact">
                            <h1 class="contact-heading">
                                <small>Contact</small><br/>
                                 <strong>86400.global</strong>
                            </h1>
                            <p>Enquire about our websites and web services.</p>
                            <hr/><br/>
                            <form action="/contact.php" method="POST">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input name="name" type="text" class="form-control form-control-md" required
                                    value="<?php if($name) { echo $name; }?>"/>
                                    <p class="form-error">
                                        <?php if($name_error) { echo $name_error; } ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>Phone:</label>
                                    <input name="phone" type="tel" class="form-control form-control-md" required
                                    value="<?php if($phone) { echo $phone; }?>"/>
                                    <p class="form-error">
                                        <?php if($phone_error) { echo $phone_error; } ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input name="email" type="email" class="form-control form-control-md" required
                                    value="<?php if($email) { echo $email; }?>"/>
                                    <p class="form-error">
                                        <?php if($email_error) { echo $email_error; } ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>Message:</label>
                                    <textarea name="message" type="text" class="form-control form-control-md" rows="5" required
                                    value="<?php if($message) { echo $message; }?>"></textarea>
                                    <p class="form-error">
                                        <?php if($message_error) { echo $message_error; } ?>
                                    </p>
                                </div>
                                <input type="submit" class="btn btn-lg btn-yellow w-100" value="Submit Enquiry"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <img src="/lib/img/logo.svg" class="footer-brand" alt="Best web design, web hosting and SEO company in Brisbane, 86400.global"/>
                    </div>
                    <div class="col-12 col-md-4">
                        <a href="/">Home</a>
                    </div>
                    <div class="col-12 col-md-4">
                        <a href="">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
