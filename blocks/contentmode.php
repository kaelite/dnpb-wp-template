<div class="dnpb_contentmode_block">
<?
/*<a href="#" id="dnpb_contentsend">
<i class="fa fa-envelope"></i>
</a>
<a href="#" id="dnpb_contentprint">
<i class="fa fa-print"></i>
</a>
 */
?>
<a href="#" id="dnpb_modesize1">A</a>
<a href="#" id="dnpb_modesize2">A</a>
<a href="#" id="dnpb_modesize3">A</a>

<script>
jQuery(function(){
console.log('size init');
	jQuery('#dnpb_modesize1').click(
		function(){
			console.log('size1');
			jQuery('.dnpb_block').css('font-size', '14px');
			return false;
		});

	jQuery('#dnpb_modesize2').click(
		function(){
			console.log('size1');
			jQuery('.dnpb_block').css('font-size', '18px');
			return false;
		});
	jQuery('#dnpb_modesize3').click(
		function(){
			console.log('size1');
			jQuery('.dnpb_block').css('font-size', '20px');
			return false;
		});
}
);
</script>

</div>
