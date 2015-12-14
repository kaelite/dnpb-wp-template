<div class="col-md-12 dnpb_title">
	<center>
		<? $dnpb_curlang = pll_current_language('slug'); ?>								
		<?
if(file_exists(__DIR__.DIRECTORY_SEPARATOR."title".DIRECTORY_SEPARATOR."$dnpb_curlang.php"))
{
	include("title".DIRECTORY_SEPARATOR."$dnpb_curlang.php");
}
else
{
?>
		<small>НАЦІОНАЛЬНА АКАДЕМІЯ ПЕДАГОГІЧНИХ НАУК УКРАЇНИ</small>
		<p><nobr>ДЕРЖАВНА НАУКОВО-ПЕДАГОГІЧНА БІБЛІОТЕКА УКРАЇНИ</nobr><br/>
		<small>ІМЕНІ</small> В. О. СУХОМЛИНСЬКОГО</p>
<?
}
?>
		<p class="text-right dnpb_slogan" style="width:465px;">
			<img class="" src="<? bloginfo('template_url')?>/assets/images/slogan.png" alt="Бібліотека це дзеркало і джерело духовної культури"><br/>
			<img class="" src="<? bloginfo('template_url')?>/assets/images/sing.png" alt=""/>
		</p>
	</center>
</div>
