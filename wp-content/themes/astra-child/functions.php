<?php
/**
 * Child functions and definitions.
 */

//add_action( 'astra_header', 'cb_child_do_header', -999 );
//add_action( 'astra_footer', 'cb_child_do_footer', -999 );

/**
 * Apply Crocoblock custom headers
 *
 * @return [type] [description]
 */
function cb_child_do_header() {
	cb_child_process_location( 'header', true );
}

/**
 * Apply Crocoblock custom footers
 *
 * @return [type] [description]
 */
function cb_child_do_footer() {
	cb_child_process_location( 'footer', true );
}

/**
 * Process single location
 *
 * @return void
 */
function cb_child_process_location( $location = null, $cleanup = false ) {

	if ( ! function_exists( 'jet_theme_core' ) ) {
		return false;
	}
	if( ! defined( 'ELEMENTOR_VERSION' ) ) {
		return false;
	}

	$done = jet_theme_core()->locations->do_location( $location );

	if ( $done && $cleanup ) {
		$hook = current_filter();
		remove_all_actions( $hook );
	}

	return $done;

}
