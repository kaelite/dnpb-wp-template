<?php
/*
 * Template Name: Online Chat Page 
 * */
?>
<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
<section class="dnpb_block">


<div class="row">
	<div class="col-md-12">
		<h3><? the_title(); ?></h3>
<!--		<p class="dnpb_date"><?=get_the_date();?></p> -->
	</div>
</div>
<div style="float:right; margin:0 0 5px; 10px;">
<?php 
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	the_post_thumbnail('medium');
} 
?>
</div>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<? the_content() ?>
<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<br/>
</section>
		</div>
		<div class="col-md-4">
				<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'o4HXeqjxKZ';
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();

function jivo_onLoadCallback() {
console.log("chat callback");
setTimeout(function(){
	jQuery(function(){
	console.log("open chat");
	jivo_api.open();
	});
},
500);
}

</script>
<!-- {/literal} END JIVOSITE CODE -->
<?php get_footer(); ?>
