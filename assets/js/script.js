/*
Theme Name: moran
Description: Theme is designed and developed for marsadomran.com
Version: 1.0
Date created: 7th Jun 2016
Text Domain: marsadomran.com
Author: Kareem Atif
Author URI: http://kareematif.me
Theme URI: http://kareematif.me/marsad
Email: Kareematif@gmail.com | Twitter: @kareematif
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
'use strict';
(function($){
	$(document).on("scroll",function(){
    // Change menu height on scroll
    if($(document).scrollTop()>210){
      /*$('header').addClass('fixed');*/
    }else{
      $('header').removeAttr('class');
    }
  }).ready(function(){
	// Clean Post from Attributes and elements added from copying text from Word
		// Remove table width
		$('table, td').removeAttr('width');
		// Remove empty paragraphs
		$('article p').each(function() {
	    var $this = $(this);
	    if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
	    	 $this.remove();
	    });
	    // Remove empty rows of table
	    /*$('tr').filter(function(){
	    	return $(this).find('td').length == $(this).find('td:empty').length;
	    }).remove();
	    */
	// Functions related to Header
		// Show/hide Menu for smaller devices
		$('.show-menu').click(function(){
			$(this).addClass('close-menu');
			$('#menu-drawer').animate({'opacity': 'show'}, 'slow');
			$('body').addClass('drawer-open');
		});
		$('.show-menu.close-menu').click(function(){
			$(this).removeClass('close-menu');
			$('body').removeClass('drawer-open');
			$('#menu-drawer').animate({'opacity': 'hide'}, 'slow');
		});	
		// Change Lanugage text
		$('.lang-item a').text('ع');
		$('.rtl .lang-item a').text('EN');
		// Wrap span around anchor in primary menu
		$('.menu-row a, .menu-list a').each(
	    function(){
	        $(this.firstChild).wrap('<span></span>');
	    });
		// Show Advacned Search when text entered
		$('.drawer-container input').keypress(function() {
		    $('.drawer-container .form-collect').slideDown('slow');
		});
		if( $('.drawer-container input').val() ) {
	          $('.drawer-container .form-collect').show();
	    }
	// Functions related to Content
		// Lazy load for images in article
		$('article').imagesLoaded({ background: true }).progress(
			function(instanse, image){
				console.log('image is loading');
		}).done(
			function(instanse, image){
				console.log('image is done');
			}
		);
		// Filter and Sort content in Archive pages
		var $grid = $('.rtl .grid').isotope({
			originLeft: false,
		}); 
		var	$grid = $('.grid').isotope({
			itemSelector: 'article',
			layoutMode: 'masonry',
			animationOptions: {
		     	duration: 750,
     		 	easing: 'linear',
     			queue: false
   }

		});
		$grid.imagesLoaded().progress( function() {
  			$grid.isotope('layout');
		});
		var $optionSets = $('.filter'),
		$optionLinks = $optionSets.find('a');
 		$optionLinks.click(function(){
			var $this = $(this);
		if ( $this.hasClass('selected') ) {
		  return false;
		}
		var $optionSet = $this.parents('.filter');
		$optionSets.find('.selected').removeAttr('class');
		$this.addClass('selected');
	 	var selector = $(this).attr('data-filter');
	 	
		$grid.isotope({ filter: selector }); 
		return false;
		});
	// Functions related to Footer
		// Remove href from parent items
		$('footer .menu-item-has-children').each(function(){
			$(this).children('a').removeAttr('href');
		});
		// Clean form from outside    
		function resetForm() {
	    	document.getElementById("wp-advanced-search").reset();
		}
		$('form input').attr('autocomplete', 'off');
		// Change social box background based on service
		$('.share.item li').hover( function(){
			if($(this).hasClass('facebook')){ 
				$('.share.item').addClass('fb').removeClass('tw');
			}else if($(this).hasClass('twitter')){
				$('.share.item').addClass('tw').removeClass('fb');
			}
		},function(){
			$('.share.item').removeClass('tw fb');
		});
		
		
		

		
	});
})(jQuery);
