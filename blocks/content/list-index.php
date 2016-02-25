<div class="media dnpb_innerblock">
<? 
	$type =  get_post_meta($post->ID, "type", true);
	$link =  get_post_meta($post->ID, "link", true);
?>
<?php 
if ( has_post_thumbnail() ) {
	$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
	echo '<a class="pull-left" href="' . $large_image_url[0] . '" title="' . the_title_attribute( 'echo=0' ) . '">';
	the_post_thumbnail([120,0], ['alt' => 'image']);
	echo '</a>';
}else{
	echo '<a class="pull-left" href="#"><img/></a>';
}
?>
        <div class="media-body">
                <p>
<? $description = get_the_content(); 
	if(count(strip_tags(trim($description)))){
		$first = strip_tags(trim($description))[0];
	}else{
		$first = null;
	}
?> 
				<b><? if($link)echo "<a href=\"$link\">";?><?= get_the_title() ?><? if($link)echo "</a>";?></b><? if($type) echo(" [ $type ]"); ?><? 
if(!empty($first) && $first != ':' && $first != '/' && $first != '[' ){ ?> :<? } ?> <?=$description;?>
                </p>
        </div>
</div>
