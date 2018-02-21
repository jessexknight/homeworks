<html lang="en">
<!-- Head -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link rel="icon" type="image/png" href="img/favicon.png"></link>
  <title>Portfolio | HomeWorks</title>
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

      <!-- <li>
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
            <a href="portfolio.php#living-rooms">Living Rooms</a>
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
      </li> -->
    </ul>
    <!-- /Main navigation -->
  </div>
</nav>
<!-- /Nav -->

<!-- Portfolio -->
<div id="portfolio" class="section md-padding bg-grey">
  <!-- Container -->
  <div class="container">
    <!-- Row -->
    <div class="row">
      <!-- Section header -->
      <div class="section-header text-center">
        <h2 class="title" id='portfolio-title'>Portfolio</h2>
      </div>
      <!-- /Section header -->
      <!-- Portfolio container -->
      <div id='portfolio-grid'>
      </div>
      <!-- /Portfolio Grid -->
      <!-- Portfolio Slider -->
      <div class="col-md-12">
        <div id="portfolio-slider" class="owl-carousel owl-theme">
        </div>
      </div>
      <!-- /Portfolio Slider -->
    </div>
    <!-- /Row -->
  </div>
  <!-- /Container -->
</div>
<!-- Portfolio scripts -->
<script>
// index the portfolio
<?php include 'get-portfolio.php' ?>
// functions
function linkify(string,ext='') {
  string = string.replace(' ','-');
  string = string.toLowerCase();
  return string+ext;
}
function unlinkify(string,ext='') {
  string = string.replace('-',' ');
  string = toTitleCase(string);
  return string.replace(ext,'');
}
function toTitleCase(str) {
  return str.replace(/\w\S*/g, function(txt){
    return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
  });
}
function replaceAll(string,find,replace) {
  return string.split(find).join(replace);
}
function addPortfolioGrid(parent,title,src,href){
  var template = `
  <div class="work col-md-4 col-xs-6">
    <a href="{href}">
      <img src="{src}" class="img-responsive"></img>
      <div class="overlay"></div>
      <div class="work-content"><h3>{title}</h3></div>
    </a>
  </div>`;
  template = replaceAll(template,'{title}',title);
  template = replaceAll(template,'{src}',src);
  template = replaceAll(template,'{href}',href);
  var t = document.createElement('template');
  t.innerHTML = template;
  parent.appendChild(t.content);
}
function addPortfolioSliderImg(parent,src){
  var i = document.createElement('img');
  i.src = src;
  i.classList.add('img-responsive');
  i.style.maxHeight = '80vh';
  i.style.width = 'auto';
  i.style.height = 'auto';
  i.style.margin = '0 auto';
  parent.appendChild(i);
}
function createBackButton(parent,link){
  template = `<br>
  <ul class="footer-follow">
  <li>
  <a href='#'>
  <i class="fa fa-angle-left"></i>
  <i class="fa fa-angle-left"></i>
  </a></li>
  </ul>
  `;
  var t = document.createElement('template');
  t.innerHTML = template;
  parent.appendChild(t.content);
}
function definePortfolio(){
  var imgs = <?php echo $imgs; ?>;
  var grid   = document.getElementById('portfolio-grid')
  var slider = document.getElementById('portfolio-slider')
  var title  = document.getElementById('portfolio-title')
  var url    = location.protocol+'//'+location.host+location.pathname;
  var hash   = window.location.hash.substr(1);
  grid.innerHTML = '';
  slider.innerHTML = '';
  if (hash.length === 0) { // portfolio overview
    title.innerHTML = 'Portfolio';
    for (key in imgs){
      addPortfolioGrid(grid,key,imgs[key][0],'portfolio.php#'+linkify(key))
    }
  } else { // portfolio section
    title.innerHTML = unlinkify(hash);
    for (i in imgs[unlinkify(hash)]){
      addPortfolioSliderImg(slider,imgs[unlinkify(hash)][i]);
    }
    $('.owl-carousel').owlCarousel('destroy');
    $('.owl-carousel').owlCarousel({
      singleItem: true,
      items: 1,
      loop: true,
      dots: true,
      nav: true,
      autoplay: false,
      margin: 15,
      navText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
    });
    createBackButton(slider,url);
    $(document).keydown( function(eventObject) {
      switch(eventObject.which){
        case 37: {$('.owl-prev').click();     break;} // left arrow
        case 39: {$('.owl-next').click();     break;} // left arrow
        case 8:  {window.location.href = url; break;} // backspace
      }
    });
  }
}
// define the portfolio content
window.addEventListener('hashchange',definePortfolio,false);
window.addEventListener('load',definePortfolio,false);
</script>
<!-- /Portfolio scripts -->
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
