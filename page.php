<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
<section class="dnpb_block">
<h3><? the_title(); ?></h3>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="media dnpb_innerblock">
		<a class="pull-left" href="<? the_permalink() ?>">
			<? the_post_thumbnail([120,0], ['alt' => 'image']) ?>
        </a>
        <div class="media-body">
                <p>
<? the_content() ?>
                </p>
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
