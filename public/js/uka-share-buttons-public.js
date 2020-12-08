( function( $ ) {
	'use strict';

	$( ".uka-share-button" ).on( 'click.uka-share-buttons', function() {
		if ( $( this ).hasClass( 'uka-share-button--email' ) ) {
			return;
		}

		var window_size = "width=585, height=511";
		var url = this.href;
		var domain = url.split("/")[2];

		switch( domain ) {
		  case "twitter.com":
				window_size = "width=585, height=261";
				break;
		  case "www.facebook.com":
				window_size = "width=585, height=368";
				break;
		  case "www.linkedin.com":
				window_size = "width=570, height=494";
				break;
		}

		window.open( url, '', 'menubar=no, toolbar=no, resizable=yes, scrollbars=yes,' + window_size );
		return false;
	} );

} )( jQuery );
