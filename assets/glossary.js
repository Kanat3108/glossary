jQuery(document).ready(function(){

	if(jQuery('#pineal-glossary').length){


		// Adding Letters

		jQuery('#pineal-glossary .odd').each(function(){

			var get_letter = jQuery(this).text().charAt(0);

			var str = jQuery(this).parent().siblings('.pg-letter').text();

			if (str.indexOf(get_letter) == -1){
				jQuery(this).parent().siblings('.pg-letter').append(get_letter);
			}

			

		});




		// Wrapping Letters


		jQuery('#pineal-glossary .pg-letter').html(function (i, html) {
    		var chars = jQuery.trim(html).split("");
    		return '<span >' + chars.join('</span><span >') + '</span>';
		});


		// click Letter

	

		jQuery('#pineal-glossary .pg-letter span').click(function(){

			jQuery('#pineal-glossary .pg-letter span').removeClass('pg-selected');
			jQuery(this).addClass('pg-selected');

			jQuery('#pineal-glossary .odd').css('display','none');
			jQuery('#pineal-glossary .even').css('display','none');

			var this_letter = jQuery(this).text();

			jQuery('#pineal-glossary .odd').each(function(){
				if( jQuery(this).text().charAt(0) == this_letter){
					jQuery(this).css('display','block');
					jQuery(this).next().css('display','block');
				}

			})

			

		});

	};

})