<?
require_once(TEMPLATEPATH.'/widgets/custom_widget.php');

class DNPB_Exhibitions_Widget extends DNPB_Custom_Widget{

	function __construct() {
		$this->imagesize["name"] = "exhibitions_custom_imagesize";
		$this->imagesize["w"] = 90;
		$this->imagesize["h"] = 70;		
		$this->post_type="exhibitions";
		parent::__construct();
	}

}
