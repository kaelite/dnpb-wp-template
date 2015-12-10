			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<div class="dnpb-portrait visible-xs visible-sm visible-md">
						</div>
						<div class="dnpb-portrait-lg visible-lg">
						</div>
						<!-- <img src="./img/s_portrait.jpg" class="dnpb_portrait" alt=""/> -->
					</div>
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-12">
										<center>
										<? wp_nav_menu( 
											[
												'theme_location' => 'top-menu',
												'container' => false,
												'menu_class' => "nav nav-pills dnpb_topmenu"
											] 
										); 
										?>
										<!-- <ul class="nav nav-pills dnpb_topmenu">
										  <li role="presentation"><a href="#">Головна</a></li>
										  <li role="presentation"><a href="#">Контакти</a></li>
										  <li role="presentation"><a href="#">Допомога онлайн</a></li>
										  <li role="presentation"><a href="#">Мапа сайту</a></li>
										  <li role="presentation"><a href="#">Статистика</a></li>
										</ul>-->	
										</center>
									</div>
									<div class="col-md-12 dnpb_title">
<center>									
<small>НАЦІОНАЛЬНА АКАДЕМІЯ ПЕДАГОГІЧНИХ НАУК УКРАЇНИ</small>
<p><nobr>ДЕРЖАВНА НАУКОВО-ПЕДАГОГІЧНА БІБЛІОТЕКА УКРАЇНИ</nobr><br/>
<small>ІМЕНІ</small> В. О. СУХОМЛИНСЬКОГО</p>

<p class="text-right dnpb_slogan" style="width:465px;">
<img class="" src="<? bloginfo('template_url')?>/assets/images/slogan.png" alt="Бібліотека це дзеркало і джерело духовної культури"><br/>
<img class="" src="<? bloginfo('template_url')?>/assets/images/sing.png" alt=""/>
</p>
</center>

									</div>
								</div>
							
							</div>
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-7 col-sm-12">
										<? $dnpb_langs = pll_the_languages(['raw'=>1]); ?>
										<? if(count($dnpb_langs)): ?>
										<ul class="nav nav-pills dnpb_langmenu hidden-md hidden-sm">
											<?foreach($dnpb_langs as $lang):?>
											<li role="presentation" <? if ($lang["current_lang"]):?> class="active" <? endif;?>><a href="<?=pll_home_url($lang["slug"]);?>"><?=$lang["name"];?></a></li>
											<?endforeach;?>
										</ul>
										
										<ul class="nav nav-pills dnpb_langmenu visible-md visible-sm">
											<?foreach($dnpb_langs as $lang):?>
											<li role="presentation" <? if ($lang["current_lang"]):?> class="active" <? endif;?>><a href="<?=pll_home_url($lang["slug"]);?>"><?=$lang["slug"];?></a></li>
											<?endforeach;?>
										</ul>
<!--
										<ul class="nav nav-pills dnpb_langmenu hidden-md hidden-sm">
										  <li role="presentation" class="active"><a href="#">Українська</a></li>
										  <li role="presentation"><a href="#">English</a></li>
										</ul>										
										<ul class="nav nav-pills dnpb_langmenu visible-md visible-sm">
										  <li role="presentation" class="active"><a href="#">Укр</a></li>
										  <li role="presentation"><a href="#">En</a></li>
										</ul>-->
										<? endif; ?>						
									</div>

									<div class="col-md-5 hidden-sm dnpb_socials">
									<div>
								<a href="#" class="btn azm-social azm-size-32 azm-r-square azm-rss" style="color:white"><i class="fa fa-rss"></i></a>
								<a href="http://www.facebook.com/pages/%D0%94%D0%9D%D0%9F%D0%91-%D0%A3%D0%BA%D1%80%D0%B0%D1%97%D0%BD%D0%B8-%D1%96%D0%BC-%D0%92-%D0%9E-%D0%A1%D1%83%D1%85%D0%BE%D0%BC%D0%BB%D0%B8%D0%BD%D1%81%D1%8C%D0%BA%D0%BE%D0%B3%D0%BE/240019389383740" class="btn azm-social azm-size-32 azm-r-square azm-facebook"  style="color:white"><i class="fa fa-facebook"></i></a>	
								<a href="#" class="btn azm-social azm-size-32  azm-r-square azm-linkedin"><i class="fa fa-linkedin" style="color:white"></i></a>
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
									<section class="dnpb_border dnpb_address">
										<div class="media">
										<a class="pull-left" href="#"><img src="<? bloginfo('template_url');?>/assets/images/building_icon.png" alt="Image"></a>
											<div class="media-body">
												<address>
	04060, Київ, М.Берлинського,  9 
	<nobr>380 (44) 467-22-14</nobr> <a href="mailto:dnpb@i.ua">dnpb@i.ua</a>             
	<a href="#"><nobr>Мапа проїзду</nobr></a>
												</address>
											</div>
										</div>	
									</section>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<?php include (TEMPLATEPATH . '/blocks/menu.php'); ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
					<? dnpb_breadcrumbs();?>
							</div>
						</div>
					</div>
					
				</div>
			</div>
