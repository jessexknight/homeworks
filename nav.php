<!-- Nav -->
<nav id="nav" class="navbar nav-transparent">
  <div class="container">
    <div class="navbar-header">
      <!-- Logo -->
      <div class="navbar-brand">
        <a href="index.html">
          <span class="logo">HomeWorks</span>
          <span class="logo-alt">HomeWorks</span>
          <!-- <img class="logo" src="img/logo.png" alt="HomeWorks">
          <img class="logo-alt" src="img/logo-alt.png" alt="HomeWorks"> -->
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
      <!-- JavaScript Generated Menu -->
    </ul>
    <!-- /Main navigation -->
  </div>
</nav>
<!-- /Nav -->
<!-- Portfolio Scripts -->
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
function appendNavLink(parent,title,href) {
  var template = `
  <li id="nav-{title}">
    <a href="{href}">{title}</a>
  </li>`
  template = replaceAll(template,'{title}',title);
  template = replaceAll(template,'{href}',href);
  var t = document.createElement('template');
  t.innerHTML = template;
  parent.appendChild(t.content)
}
function appendNavSubLink(parent,title,href) {
  parent.classList.add('has-dropdown')
  if (parent.childElementCount === 1) {
    var ul = document.createElement('ul');
    ul.classList.add('dropdown');
    parent.appendChild(ul);
  }
  parent = parent.getElementsByTagName('ul')[0];
  var template = `
    <li id="nav-{title}" class="open-drop">
      <a href="{href}">{title}</a>
    </li>`;
  template = replaceAll(template,'{title}',title);
  template = replaceAll(template,'{href}',href);
  var t = document.createElement('template');
  t.innerHTML = template;
  parent.appendChild(t.content);
}
// build the main nav bar
var pages = ['Home','About','Portfolio','Testimonials','Links','Contact'];
var link;
nav = document.getElementById('nav-list')
for (p in pages){
  if (['Portfolio','Testimonials'].includes(pages[p])) {
    link = linkify(pages[p],'.php')
  } else if (pages[p] === 'Home') {
    link = linkify('index','.html')
  } else {
    link = linkify(pages[p],'.html')
  }
  appendNavLink(nav,pages[p],link)
}
// build the portfolio nav links
var imgs = <?php echo $imgs; ?>;
var portfolio = document.getElementById('nav-Portfolio')
for (key in imgs){
  appendNavSubLink(portfolio,key,'portfolio.php#'+linkify(key))
}
</script>
<!-- /Portfolio Scripts -->
