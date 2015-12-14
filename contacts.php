<?php
/*
 * Template Name: Contacts 
 * */
?>
<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-6" style="height:500px">
<section class="dnpb_block" style="height:500px">


<div class="row">
	<div class="col-md-12">
		<h3><? the_title(); ?></h3>
	</div>
</div>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<? the_content() ?>
<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<br/>
</section>
		</div>
		<div class="col-md-6">

			<script src="https://maps.googleapis.com/maps/api/js"></script>
			
<script>
  function initialize() {
	  console.log('google map initalizer');
    var mapCanvas = document.getElementById('map');
    var mapOptions = {
      center: new google.maps.LatLng(50.4734955, 30.4377183),
      zoom: 17,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(mapCanvas, mapOptions);
  }
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div class="row">
			<div id="map" class="col-md-12" style="height:500px">
			</div>
</div>

		</div>
	</div>
</div>
<?php get_footer(); ?>
