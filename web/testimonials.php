<html lang="en">
<!-- Head -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link rel="icon" type="image/png" href="img/favicon.png"></link>
  <title>Testimonials | HomeWorks</title>
  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">
  <!-- Bootstrap -->
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- Owl Carousel -->
  <link type="text/css" rel="stylesheet" href="css/owl.carousel.min.css" />
  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<!-- /Head -->

<body>
<!-- Nav -->
<nav id="nav" class="navbar nav-transparent">
  <div class="container">
    <div class="navbar-header">
      <!-- Logo -->
      <div class="navbar-brand">
        <a href="index.php">
          <img class="logo" src="img/logo-top.png" alt="HomeWorks">
          <img class="logo-alt" src="img/logo-top.png" alt="HomeWorks">
        </a>
      </div>
      <!-- /Logo -->
      <!-- Collapse nav button -->
      <div class="nav-collapse">
        <span></span>
      </div>
      <!-- /Collapse nav button -->
    </div>
    <!--  Main navigation  -->
    <ul id="nav-list" class="main-nav nav navbar-nav navbar-right">
      <li>
  <a href="index.php">Home</a>
</li>
<li>
  <a href="about.php">About</a>
</li>
<li class="has-dropdown">
  <a href="portfolio.php">Portfolio</a>
  <ul class="dropdown">
    <li class="open-drop">
  <a href="portfolio.php#bathrooms">Bathrooms</a>
</li>
<li class="open-drop">
  <a href="portfolio.php#living-rooms">Living rooms</a>
</li>

  </ul>
</li>
<li>
  <a href="testimonials.php">Testimonials</a>
</li>
<li>
  <a href="links.php">Links</a>
</li>
<li>
  <a href="contact.php">Contact</a>
</li>

    </ul>
    <!-- /Main navigation -->
  </div>
</nav>
<!-- /Nav -->

<!-- Testimonials -->
<div id="service" class="section md-padding">
  <!-- Container -->
  <div class="container">
    <!-- Row -->
    <div class="row">
      <!-- Section header -->
      <div class="section-header text-center">
        <h2 class="title">Testimonials</h2>
      </div>
      <!-- /Section header -->
      <!-- Testimonials -->
      <div id="testimonials-list" class="col-md-12 col-sm-12">
      </div>
      <!-- /Testimonials -->
    </div>
    <!-- /Row -->
  </div>
  <!-- /Container -->
</div>
<!-- /Testimonials -->
<!-- Testimonials Scripts -->
<script>
<?php include 'get-testimonials.php' ?>
function replaceAll(string,find,replace) {
  return string.split(find).join(replace);
}
function appendTestimonial(parent,testimonial,author,location) {
  var template = `
  <div class="testimonial">
    <p>{testimonial}</p>
    <span class="author">{author}</span>
    <span class="location">{location}</span>
  </div>`;
  template = replaceAll(template,'{testimonial}',testimonial);
  template = replaceAll(template,'{author}',author);
  template = replaceAll(template,'{location}',location);
  var t = document.createElement('template');
  t.innerHTML = template;
  parent.appendChild(t.content)
}
var testimonials = <?php echo $testimonials; ?>;
var testimonialsList = document.getElementById('testimonials-list');
for (t in testimonials){
  appendTestimonial(testimonialsList,
    testimonials[t]['testimonial'],
    testimonials[t]['author'],
    testimonials[t]['location'])
}
</script>
<!-- /Testimonials Scripts -->
<!-- Foot -->
<div id='foot-div'>
  <!-- Footer -->
  <footer id="footer" class="sm-padding bg-dark">
    <!-- Container -->
    <div class="container">
      <!-- Row -->
      <div class="row">
        <div class="col-md-12">
          <!-- footer logo -->
          <div class="footer-logo">
            <a href="index.php">
              <!-- <h2 class="white-text">HomeWorks</h2> -->
              <img src='img/logo.png'></img>
            </a>
          </div>
          <!-- /footer logo -->
          <!-- footer follow -->
          <!-- <ul class="footer-follow"> -->
            <!-- <li><a href="#"><i class="fa fa-facebook"></i></a></li> -->
            <!-- <li><a href="#"><i class="fa fa-twitter"></i></a></li> -->
            <!-- <li><a href="#"><i class="fa fa-instagram"></i></a></li> -->
            <!-- <li><a href="https://homestars.com/companies/2776847-homeworks"><i class="fa fa-home"></i></a></li> -->
            <!-- <li><a href="https://www.linkedin.com/in/wendell-sumner-2875a817/"><i class="fa fa-linkedin"></i></a></li> -->
          <!-- </ul> -->
          <!-- /footer follow -->
          <!-- footer copyright -->
          <div class="footer-copyright">
            <p>Copyright © 2018. All Rights Reserved. Designed by
              <a href="https://colorlib.com" target="_blank">Colorlib</a>
              &
              <a href="https://github.com/jessexknight/" target="_blank">JK</a>.
            </p>
          </div>
          <!-- /footer copyright -->
        </div>
      </div>
      <!-- /Row -->
    </div>
    <!-- /Container -->
  </footer>
  <!-- /Footer -->
  <!-- jQuery Plugins -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <!-- /jQuery Plugins -->
</div>
<!-- /Foot -->

</body>
</html>
