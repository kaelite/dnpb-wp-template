<?
class DNPB_News_Widget extends WP_Widget{

	var $post_type = "news";

	function __construct() {
		parent::__construct(
			'news_widget', // Base ID
			'Last News Widget', // Name
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
			echo $before_title . '<a href="' . get_post_type_archive_link( $this->post_type ) . '">' . $title . '</a>' . $after_title;
		}
		$this->getItems($numberOfListings);
		echo $after_widget;
	}


	function getItems($numberOfListings) { //html
		global $post;
		add_image_size( 'news_widget_size', 140, 140, false );
		$listings = new WP_Query();
		$listings->query('post_type='.$this->post_type.'&posts_per_page=' . $numberOfListings );
		if($listings->found_posts > 0) {
		?>
			<div class="row">
				<div class="col-md-12">
		<?
				while ($listings->have_posts()) {
					$listings->the_post();
					$image = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, 'news_widget_size') : '<div class="noThumb"></div>';
?>

									<div class="media">
									<h5><font color=#663300><?=get_the_date();?></font></h5>
									<? if(has_post_thumbnail($post->ID)): ?> 
										<a class="pull-left" href="<?=get_the_permalink();?>">
										<?=get_the_post_thumbnail($post->ID, 'news_widget_size');?>
										</a>
									<? endif; ?>
										
										<div class="media-body">
										<a href="<?=get_the_permalink();?>"><h4 class="media-heading"><b><?=get_the_title();?></b></h4></a>
											<p><?=get_the_excerpt();?></p>
										
										</div>
							</div>
<?
				}
			wp_reset_postdata();
?>
				</div>
			</div>
			<a href="<?=get_post_type_archive_link( $this->post_type );?>" class="pull-right dnpb-link"><?=__('Всі матеріали');?></a><br/>
<?
		}else{
			echo '<p style="padding:25px;">No listing found</p>';
		}
	}	
} //end class Realty_Widget

