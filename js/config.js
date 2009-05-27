$(document).ready ( 
	function () {
		$('div#bannercolor').css('backgroundColor', $('div#bannercolor input').val());
		$('div#bannercolor').ColorPicker({
			onChange: function (hsb, hex, rgb) {
				$('div#bannercolor').css('backgroundColor', '#' + hex);
				$('div#bannercolor input').val('#'+hex);
			}
		});
		
		$('div#linkscolor').css('backgroundColor', $('div#linkscolor input').val());
		$('div#linkscolor').ColorPicker({
			onChange: function (hsb, hex, rgb) {
				$('div#linkscolor').css('backgroundColor', '#' + hex);
				$('div#linkscolor input').val('#'+hex);
			}
		});
		
		$('div#bgcolor').css('backgroundColor', $('div#bgcolor input').val());
		$('div#bgcolor').ColorPicker({
			onChange: function (hsb, hex, rgb) {
				$('div#bgcolor').css('backgroundColor', '#' + hex);
				$('div#bgcolor input').val('#'+hex);
			}
		});

		$('div#hovercolor').css('backgroundColor', $('div#hovercolor input').val());
		$('div#hovercolor').ColorPicker({
			onChange: function (hsb, hex, rgb) {
				$('div#hovercolor').css('backgroundColor', '#' + hex);
				$('div#hovercolor input').val('#'+hex);
			}
		});
		
		$('div.colorpicker').hover( function (){}, function () { setTimeout('$(\'div.colorpicker\').hide();',1000); } );
	});
	
	function load_defaults(){
		$('div#bannercolor').css('backgroundColor', '#f9683c');
		$('div#bannercolor input').val('#f9683c');
		$('div#linkscolor').css('backgroundColor', '#5cc5c9');
		$('div#linkscolor input').val('#5cc5c9');
		$('div#bgcolor').css('backgroundColor', '#fafafa');
		$('div#bgcolor input').val('#fafafa');
		$('div#hovercolor').css('backgroundColor', '#1ce0e7');
		$('div#hovercolor input').val('#1ce0e7');
	}
	