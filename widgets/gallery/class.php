<?
class DNPB_Gallery_Widget extends WP_Widget{
	var $post_type = "slider";

	function __construct() {
		parent::__construct(
			'gallery_widget', // Base ID
			'Gallery', // Name
			array('description' => __( 'Displays slider'))
		   );
	}

	function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['text'] = $new_instance['text'];
			$instance['numberOfListings'] = strip_tags($new_instance['numberOfListings']);
			return $instance;
	}

	function form($instance) {
	if( $instance) {
		$text = esc_attr($instance['text']);
		$numberOfListings = esc_attr($instance['numberOfListings']);
	} else {
		$text = '';
		$numberOfListings = '';
	}
	?>
		<p>
		<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text', 'slider_widget'); ?></label>
		<textarea class="widefat" name="<?php echo $this->get_field_name('text') ?>"><?php echo esc_attr($text) ?></textarea>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('numberOfListings'); ?>"><?php _e('Number of Listings:', 'realty_widget'); ?></label>
		<select id="<?php echo $this->get_field_id('numberOfListings'); ?>"  name="<?php echo $this->get_field_name('numberOfListings'); ?>">
			<?php for($x=1;$x<=10;$x++): ?>
			<option <?php echo $x == $numberOfListings ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
			<?php endfor;?>
		</select>
		</p>
	<?
	}

	function widget($args, $instance) {
		extract( $args );
		$text = apply_filters('widget_text', $instance['text']);
		$numberOfListings = $instance['numberOfListings'];
		echo $before_widget;
		$this->getItems($numberOfListings, $text);
		echo $after_widget;
	}


	function getItems($numberOfListings, $text) { //html
		global $post;
		add_image_size( 'slider_widget_size', 510, 300, false );
		$listings = new WP_Query();
		$listings->query('post_type='.$this->post_type.'&posts_per_page=' . $numberOfListings );
		if($listings->found_posts > 0) {
?>
		<div class="row">
			<div class="col-md-7">
				<div id="carousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
<?
			while ($listings->have_posts()) {
				$listings->the_post();
?>
<li data-target="#carousel" data-slide-to="<?=$listings->current_post;?>" <?if( $listings->current_post == 0 && !is_paged() ) { echo "class=\"active\""; }?>></li>
<?
			}
			$listings->rewind_posts();
?>
				</ol>
				<div class="carousel-inner">
<?
			while ($listings->have_posts()) {
				$listings->the_post();
?>
				<div class="item<?if( $listings->current_post == 0 && !is_paged() ) { echo " active"; }?>">
					<? the_post_thumbnail('slider_widget_size'); ?>
				</div>
<?
			}
			wp_reset_postdata();
?>
				</div>
				</div>
			</div>
		   <div class="col-md-5">
				<section>
					<p>
<?= $text?>
					</p>
				</section>
			</div>
		</div>
<?
		}else{
			echo '<p style="padding:25px;">No listing found</p>';
		}
	}	
} //end class Realty_Widget

