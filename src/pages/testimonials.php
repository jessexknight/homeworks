<html lang="en">
__head__
<body>
__nav__
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
__foot__
</body>
</html>
