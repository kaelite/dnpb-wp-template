jQuery(function() {
	    console.log( "Dnpb menu script added!" );
		jQuery('ul.nav.navbar-nav.dnpb_mainmenu li.dropdown').hoverIntent(function(){if(jQuery(this).hasClass('open')){jQuery(this).removeClass('open');}else{jQuery(this).addClass('open');}})
		jQuery('ul.nav.navbar-nav.dnpb_mainmenu li.dropdown a[href="#"]').click(function(){return false;});

		jQuery('ul.nav.navbar-nav.dnpb_mainmenu li.dropdown a[href!="#"]').click(function(){
			window.location.href = jQuery(this).attr("href");
			return false;
		})
});


