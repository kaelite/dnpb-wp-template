<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
<section class="dnpb_block dnpb_publications">
<h3><?php post_type_archive_title( '', true ); ?></h3>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="media dnpb_innerblock">
	<h3 class="dnpb_contentheader"><?=get_the_title();?></h3>
		<a class="pull-left dnpb_publications_thumb" href="<? the_permalink() ?>">
			<? the_post_thumbnail("dnpb_publications-thumb", ['alt' => 'image']) ?>
        </a>
        <div class="media-body">
				<p class="dnpb_publications_title">
<?=get_the_excerpt() ?>
                </p>
				<p>
Анотація  анотація  анотація анотація анотація анотація анотація анотація анотація анотація анотація анотація анотація анотація анотація анотація манотація
				</p>

<span style="cursor: pointer" class="dnpb_publication_bookcontenttoggle" data-toggle="collapse" data-target="#dnpb_bookcontent_<?= get_the_ID(); ?>">
<i class="fa fa-sort-desc"></i>
Зміст</span>


<div style="margin-top: 20px">
    <div id="dnpb_bookcontent_<?= get_the_ID(); ?>" class="collapse">
<b>Зміст</b><br/> 
    Передмова<br/>    
    Розділ 1.<br/> 
     ...................<br/> 
          1.1. ..................<br/> 
     ...........................................................................<br/> 
     ...........................................................................                                            ...........................................................................<br/> 
   Література
<br/>
<br/>
    </div>
</div>

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
