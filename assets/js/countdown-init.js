// wrap with js test
if ( document.getElementById ) {
	
	var styles = '';
	
	// style declaration
	styles += '<style type="text/css" media="screen">';
	styles += '#countdown { font-size: 80%; position: absolute; top: 25%; right: 2%; width: 220px; height: 48px; } ';
	styles += '</style>';
	
	// write to page now
	document.write( styles );

}



/** 
 * @description: define what happens when the page is ready
 *
 */
jQuery(document).ready( function($) {

	var austDay = new Date(2014, 6-1, 12, 17, 00, 00, 00);
	$('#countdown').countdown({timezone: -3, until: austDay});

});                
