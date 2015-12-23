<?php
/*
 * Template Name: Full Width Page 
 * */
?>
<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
<?  get_template_part('blocks/contentmode'); ?>
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
	</div>
</div>
<?php get_footer(); ?>
