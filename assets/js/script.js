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
   $(document).ready(function(){
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
