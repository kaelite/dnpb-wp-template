<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
<section class="dnpb_block">
<h3>
<?

function mb_ucfirst($string, $encoding)
{
	    $strlen = mb_strlen($string, $encoding);
	    $firstChar = mb_substr($string, 0, 1, $encoding);
	    $then = mb_substr($string, 1, $strlen - 1, $encoding);
	    return mb_strtoupper($firstChar, $encoding) . $then;
}

if( is_tax() ) {
    global $wp_query;
    $term = $wp_query->get_queried_object();
    $title = $term->name;
	echo mb_ucfirst($title, "UTF-8");
}else{
 post_type_archive_title( '', true );
}
?>
</h3>
<br/>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'blocks/content/list', 'index' ); ?>
<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_template_part( 'blocks/paging'); ?>

<br/>
</section>
		</div>
		<div class="col-md-4">
				<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
