<html lang="en">
<!-- Head -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link rel="icon" type="image/png" href="favicon.png"></link>
  <title>HomeWorks | Testimonials</title>
  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">
  <!-- Bootstrap -->
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- Owl Carousel -->
  <link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
  <link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />
  <!-- Magnific Popup -->
  <link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />
  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="css/style.css" />
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<!-- /Head -->
<body>
<!-- Nav -->
<div id='nav-div'>
  <script>$(function(){$('#nav-div').load('nav.php')});</script>
</div>
<!-- /Nav -->
<!-- Service -->
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
<!-- /Service -->
<!-- Foot -->
<div id='foot-div'>
  <script>$(function(){$('#foot-div').load('foot.php')});</script>
</div>
<!-- /Foot -->
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
</body>
</html>
