<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
<section class="dnpb_block dnpb_publications">
<h3><?php post_type_archive_title( '', true ); ?></h3>
<br/>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="media dnpb_innerblock">
<h3 class="dnpb_contentheader"><?=get_the_title();?></h3>
<?php
if ( has_post_thumbnail() ) {
        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
        echo '<a class="pull-left dnpb_publications_thumb" href="' . $large_image_url[0] . '" title="' . the_title_attribute( 'echo=0' ) . '">';
        the_post_thumbnail([120,0], ['alt' => 'image']);
        echo '</a>';
}else{
        echo '<a class="pull-left" href="#"><img/></a>';
}
?>
        <div class="media-body">
				<p class="">
<?=get_the_content() ?>
                </p>
        </div>
</div>
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
