<?
require_once(TEMPLATEPATH.'/widgets/custom_widget.php');

class DNPB_OurPublications_Widget extends DNPB_Custom_Widget{

	function __construct() {
	   	$this->imagesize["name"] = "op_custom_imagesize";
		$this->imagesize["w"] = 90;
		$this->imagesize["h"] = 130;

		$this->post_type="ourpublications";
		parent::__construct();
	}

}
