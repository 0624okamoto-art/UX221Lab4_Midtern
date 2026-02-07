<?php


//-----------------------------Site Identity Color----------------

	$birthday_blast_site_identity_color = get_theme_mod('birthday_blast_site_identity_color');
	$birthday_blast_site_identity_tagline_color = get_theme_mod('birthday_blast_site_identity_tagline_color');

	


//=====================Whole CSS===================================


	$custom_css ='.display_only h1 a,.display_only p{';
	
	$custom_css .='}';





//==============Main Setting Section===========================================


// ----------------Site Identity Color--------------------

	if($birthday_blast_site_identity_color != false){
		$custom_css .='.display_only h1 a{';
			if($birthday_blast_site_identity_color != false)
		    	$custom_css .='color: '.esc_html($birthday_blast_site_identity_color).'!important;';
		$custom_css .='}';
	}

	if($birthday_blast_site_identity_tagline_color != false){
		$custom_css .='.display_only p{';
			if($birthday_blast_site_identity_tagline_color != false)
		    	$custom_css .='color: '.esc_html($birthday_blast_site_identity_tagline_color).'!important;';
		$custom_css .='}';
	}



?>