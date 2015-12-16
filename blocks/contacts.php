<?php $dnpb_admin_email = get_option( 'admin_email' ); ?> 

<? $dnpb_curlang = pll_current_language('slug'); ?>								
<?
if(file_exists(__DIR__.DIRECTORY_SEPARATOR."contacts".DIRECTORY_SEPARATOR."$dnpb_curlang.php"))
{
	include("contacts".DIRECTORY_SEPARATOR."$dnpb_curlang.php");
}
else
{
?>
04060, Київ, М.Берлинського, 9 
<nobr>380 (44) 467-22-14</nobr> <a href="mailto:<?=$dnpb_admin_email?>"><?=$dnpb_admin_email?></a>             
<a href="<?=get_permalink(12)?>"><nobr>Мапа проїзду</nobr></a>
<?
}
?>

