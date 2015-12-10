<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
<!-- <section class="dnpb_block"> -->
<? if(!dynamic_sidebar('homepage-main')):?>
<?="No dynamic sidebar defined"?>
 <? endif; ?>


<!-- </section> -->
		</div>
		<div class="col-md-4">
				<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
