<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
<section class="dnpb_block">
<h3>
<?php $post_type = get_post_type_object( get_post_type($post) );

echo $post_type->label ; ?>
</h3>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="media dnpb_innerblock">
        <h5><font color="#663300">08.05.2015</font></h5>
		<a class="pull-left" href="<? the_permalink() ?>">
			<? the_post_thumbnail([120,0], ['alt' => 'image']) ?>
        </a>
        <div class="media-body">
                <p>
<? the_excerpt() ?>
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
