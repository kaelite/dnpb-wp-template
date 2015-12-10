<?
class DNPB_Custom_Widget extends WP_Widget{

	public $post_type;

	var $imagesize = [
		"name" => "",
		"w" => 0,
		"h" => 0,
		"crop" => false
		];


	function __construct() {
		parent::__construct(
			ucfirst ( $this->post_type ).'_widget', // Base ID
			'Top '.ucfirst ( $this->post_type ) , // Name
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
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', $this->post_type.'_widget'); ?></label>
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

		if (isset($this->imagesize["name"]))
			add_image_size( 
				$this->imagesize["name"], 
				$this->imagesize["w"],
				$this->imagesize["h"], 
				$this->imagesize["crop"] 
			);

		$listings = new WP_Query();
		$listings->query('post_type='.$this->post_type.'&posts_per_page=' . $numberOfListings );
		if($listings->found_posts > 0) {
				while ($listings->have_posts()) {
					$listings->the_post();
?>

	<div class="row">
		<div class="col-md-12">
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
	</div>

<?
/*
					if(isset($this->imagesize["name"]))
						$image = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, $this->imagesize["name"]) : '<div class="noThumb"></div>';

					$date = '<p class="dnpb_date">'.get_the_date().'</p>';
					$listItem = '<div class="media">'.$date . $image;
					$listItem .= get_the_content();
					$listItem .= '</div>';
					echo $listItem;*/
				}
?>
	<a href="<?=get_post_type_archive_link( $this->post_type );?>" class="pull-right dnpb-link"><?=__('Всі матеріали');?></a><br/>
<?
			wp_reset_postdata();
		}else{
			echo '<p style="padding:25px;">No listing found</p>';
		}
	}	
}
