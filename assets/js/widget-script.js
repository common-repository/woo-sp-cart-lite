jQuery(document).ready(function($) {

	function initColorPicker( widget ) {
		widget.find('.spcolor').wpColorPicker( {
			change: _.throttle( function() {
				$(this).trigger('change');
			}, 3000 )
		});
	}

	function onFormUpdate( event, widget ) {
		initColorPicker(widget);
	}
			
	$(document).on( 'widget-added widget-updated', onFormUpdate );

	$(document).ready( function() {
		$('#widgets-right .widget:has(.spcolor)').each( function () {
			initColorPicker($(this));
		});
	});

 });    