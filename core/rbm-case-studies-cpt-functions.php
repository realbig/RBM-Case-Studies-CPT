<?php
/**
 * Provides helper functions.
 *
 * @since	  1.0.0
 *
 * @package	CPT_Case_Studies_Plugin
 * @subpackage CPT_Case_Studies_Plugin/core
 */
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Returns the main plugin object
 *
 * @since		1.0.0
 *
 * @return		CPT_Case_Studies_Plugin
 */
function RBMCASESTUDIESCPT() {
	return CPT_Case_Studies_Plugin::get_instance();
}