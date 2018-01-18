<?php

/**
 * Class RBM_CPT_Case_Studies
 *
 * Creates the post type.
 *
 * @since 1.0.0
 */
class RBM_CPT_Case_Studies extends RBM_CPT {

	public $post_type = 'case-studies';
	public $label_singular = null;
	public $label_plural = null;
	public $labels = array();
	public $icon = 'welcome-write-blog';
	public $post_args = array(
		'hierarchical' => true,
		'supports'     => array( 'title', 'editor', 'author', 'thumbnail' ),
		'has_archive'  => false,
		'rewrite'      => array(
			'slug'       => 'docs',
			'with_front' => false,
			'feeds'      => false,
			'pages'      => true
		),
		'capability_type' => 'case-studies',
	);

	/**
	 * RBM_CPT_Case_Studies constructor.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// This allows us to Localize the Labels
		$this->label_singular = __( 'Case Study', 'rbm-case-studies' );
		$this->label_plural   = __( 'Case Studies', 'rbm-case-studies' );

		$this->labels = array(
			'menu_name' => __( 'Case Studies', 'rbm-case-studies' ),
			'all_items' => __( 'All Case Studies', 'rbm-case-studies' ),
		);

		parent::__construct();
		
	}

	/**
	 * Adds meta boxes to the post type edit page.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	function add_meta_boxes() {

		add_meta_box(
			'rbm-case-studies-order',
			'Order',
			array( $this, 'mb_order' ),
			'case studies'
		);
	}
	
}