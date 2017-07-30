( function( $ ) {

	// Add upgrade link
	upgrade = $( '<a class="evolution-upgrade-link"></a>' )
			.attr( 'href', evolution_customizer_links.url )
			.attr( 'target', '_blank' )
			.text( evolution_customizer_links.label );
	$( '.preview-notice' ).append( upgrade );

} )( jQuery );