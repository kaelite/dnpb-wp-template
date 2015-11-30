<?
class DNPB_Announcements_Widget extends WP_Widget{

	function __construct() {
		parent::__construct(
			'Announcements_widget', // Base ID
			'Top Announcements', // Name
			array('description' => __( 'Displays your latest listings. Outputs the post thumbnail, title and date per listing'))
		   );
	}

	function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['numberOfListings'] = strip_tags($new_instance['numberOfListings']);
			return $instance;
	}

	function form($instance) {
	if( $instance) {
		$title = esc_attr($instance['title']);
		$numberOfListings = esc_attr($instance['numberOfListings']);
	} else {
		$title = '';
		$numberOfListings = '';
	}
	?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'realty_widget'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
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
		$title = apply_filters('widget_title', $instance['title']);
		$numberOfListings = $instance['numberOfListings'];
		echo $before_widget;
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		$this->getItems($numberOfListings);
		echo $after_widget;
	}


	function getItems($numberOfListings) { //html
		global $post;
		add_image_size( 'realty_widget_size', 85, 45, false );
		$listings = new WP_Query();
		$listings->query('post_type=announcements&posts_per_page=' . $numberOfListings );
		if($listings->found_posts > 0) {
			echo "<div class=\"row\"><div class=\"col-md-12\">";
				while ($listings->have_posts()) {

					$listings->the_post();
					$image = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, 'realty_widget_size') : '<div class="noThumb"></div>';
					$date = '<p class="dnpb_date">'.get_the_date().'</p>';
					$listItem = '<div class="media">'.$date . $image;
					$listItem .= get_the_content();
					$listItem .= '</div>';
					echo $listItem;
				}
				echo "<a href=\"#\" class=\"pull-right dnpb-link\">".__("Всі матеріали")."</a>";
				echo "</div></div>";
			wp_reset_postdata();
		}else{
			echo '<p style="padding:25px;">No listing found</p>';
		}
	}	
} //end class Realty_Widget

