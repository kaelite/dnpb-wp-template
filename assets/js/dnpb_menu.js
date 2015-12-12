jQuery(function() {
	    console.log( "Dnpb menu script added!" );
		jQuery('ul.nav.navbar-nav.dnpb_mainmenu li.dropdown').hoverIntent(function(){if(jQuery(this).hasClass('open')){jQuery(this).removeClass('open');}else{jQuery(this).addClass('open');}})
});


