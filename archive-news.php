<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
<section class="dnpb_block">
<h3><?php post_type_archive_title( '', true ); ?></h3>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="media dnpb_innerblock">
		<h5><font color="#663300"><?=get_the_date();?></font></h5>	 
			<a class="pull-left" href="">
<?=get_the_post_thumbnail($post->ID, [110,110]);?>
			</a>
																			
			<div class="media-body">
				<a href="<? the_permalink() ?>">
					<h4 class="media-heading">
						<b>
							<?=get_the_title();?>
						</b>
					</h4>
				</a>
			<? the_excerpt() ?>
			</div>
	</div>

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
<?php get_footer(); ?>
