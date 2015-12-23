<?php
/*
 * Template Name: Contacts 
 * */
?>
<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-6" style="height:500px">
<?  get_template_part('blocks/contentmode'); ?>
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
<? $dnpb_curlang = pll_current_language('slug'); ?>
<? $map_lang = ($dnpb_curlang == 'ua') ? 'ru' : 'en' ;?>
<script src="https://maps.googleapis.com/maps/api/js?language=<?=$map_lang?>"></script>
			
<script>
  function initialize() {
	  console.log('google map initalizer');
    var mapCanvas = document.getElementById('map');
    var mapOptions = {
      center: new google.maps.LatLng(50.4735296, 30.4398373),
      zoom: 17,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(mapCanvas, mapOptions);

	var marker = new google.maps.Marker({
		position: {lat:50.4735296, lng:30.4398373 },
		map: map,
		title: 'DNPB'
	  });

	var infowindow = new google.maps.InfoWindow({
<? if( $dnpb_curlang == 'ua' ):?>
		content: "<b>Державна<br/> науково-педагогічна бібліотека України<br/> імені В. О. Сухомлинського</b><br/>вул. М.Берлинського, 9"
<? else:?>
		content: "<b>V.O. Sukhomlynskyi<br/> State Scientific And Pedagogical Library<br/> of Ukraine<br/></b> 9 M.Berlynskoho Street"
<? endif ?>
 	 });

   	infowindow.open(map, marker);

	marker.addListener('click', function() {
    	infowindow.open(map, marker);
  	});

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
