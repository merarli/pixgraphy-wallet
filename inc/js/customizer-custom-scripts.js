( function( api ) {

	// Extends our custom "pixgraphy" section.
	api.sectionConstructor['pixgraphy'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
