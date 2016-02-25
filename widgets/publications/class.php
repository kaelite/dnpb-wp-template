<?
require_once(TEMPLATEPATH.'/widgets/custom_widget.php');

class DNPB_Publications_Widget extends DNPB_Custom_Widget{

	function __construct() {
	   	$this->imagesize["name"] = "p_custom_imagesize";
		$this->imagesize["w"] = 60;
		$this->imagesize["h"] = 80;

		$this->post_type="publications";
		parent::__construct();
	}


   function update($new_instance, $old_instance) {
					$instance = $old_instance;
					$instance['title'] = strip_tags($new_instance['title']);
					return $instance;
	}

	function form($instance) {
	if( $instance) {
			$title = esc_attr($instance['title']);
			$numberOfListings = esc_attr($instance['numberOfListings']);
	} else {
			$title = '';
	}
	?>
			<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', $this->post_type.'_widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>
	<?
	}



    function getItems($numberOfListings) { //html
        global $post;

        if (isset($this->imagesize["name"]))
            add_image_size(
                $this->imagesize["name"],
                $this->imagesize["w"],
                $this->imagesize["h"],
                $this->imagesize["crop"]
            );

        $listings = new WP_Query();
        $listings->query('post_type='.$this->post_type.'&posts_per_page=3');
        if($listings->found_posts > 0) {
?>
    <div class="row">
<?
                while ($listings->have_posts()) {
                    $listings->the_post();
?>

        <div class="col-md-4">
            <div class="media">
               <? if(has_post_thumbnail($post->ID)): ?>
                        <a class="pull-left" href="<?=get_the_permalink();?>">
                        <?=get_the_post_thumbnail($post->ID, $this->imagesize["name"]);?>
                        </a>
                <? endif; ?>
                <div class="media-body">
                <p><a href="<?=get_the_permalink();?>"><?=get_the_title()?></a></p>
                </div>
            </div>
        </div>
<? } ?>
    </div>
	<a href="<?=get_post_type_archive_link( $this->post_type );?>" class="pull-right dnpb-link"><?=__('Всі матеріали');?></a><br/>
<?
            wp_reset_postdata();
        }else{
            echo '<p style="padding:25px;">No listing found</p>';
        }

   }
	


}
