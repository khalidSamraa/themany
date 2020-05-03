<?php
/**
 * Default Post
 *
 * @package Plus Plus Productions
 * @since 1.0



// Redefine default custom post
function default_post_register() {

    $args = array(
        'labels' => array(
            'name_admin_bar'    => __('News', 'mistresscreative')
        ),
        'public'            => true,
        '_builtin'          => true, // hack to remove duplicate "news" menu item. If issues arise, set to false.
        '_edit_link'        => 'post.php?post=%d',
        'capability_type'   => 'post',
        'map_meta_cap'      => true,
        'publicly_queryable'        => true,
        'hierarchical'      => false,
        'query_var'         => true,
        'taxonomies'                => array('clients', 'services'),
        'supports'          => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'revisions', 'post-formats' ),
        'menu_icon' => 'dashicons-megaphone'

    );

    register_post_type( 'post' , $args );
}

add_action( 'init', 'default_post_register', 1 );



if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_news-post',
		'title' => 'News Post',
		'fields' => array (
			array(
				'key' => 'field_5cd0d74de0de5',
				'label' => 'News Images',
				'name' => 'news_images',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_5cd0d766e0de6',
						'label' => 'Primary Image',
						'name' => 'primary_image',
						'type' => 'image',
						'instructions' => '768x500px - News post header Image',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '100',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'preview_size' => 'hp-header-mobile',
						'library' => 'all',
						'min_width' => 768,
						'min_height' => 500,
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
					array(
						'key' => 'field_5cd0d8a0e0de7',
						'label' => 'Lead Image',
						'name' => 'lead_image',
						'type' => 'image',
						'instructions' => '740x340px | Optional. If nothing provided, primary image will be automatically cropped to this size.

	Appears on News Page as Lead Image (1st Image shown)',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '60',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'preview_size' => 'primary-news-feature',
						'library' => 'all',
						'min_width' => 740,
						'min_height' => 340,
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
					array(
						'key' => 'field_5cd0d945e0de8',
						'label' => 'News Page Second Lead',
						'name' => 'news_page_second_lead',
						'type' => 'image',
						'instructions' => '500x340px | Optional. If nothing provided, primary image will be automatically cropped to this size.

	Appears on News Page as Second Lead Image (2nd Image shown)',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '40',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'preview_size' => 'primary-news-feature-2',
						'library' => 'all',
						'min_width' => 500,
						'min_height' => 340,
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
					array(
						'key' => 'field_5cd0d9abe0de9',
						'label' => 'News Page Secondary Row Image',
						'name' => 'news_page_secondary_row_image',
						'type' => 'image',
						'instructions' => '620x170px | Optional. If nothing provided, primary image will be automatically cropped to this size.

	Appears on News Page as third and fourth image on the second row.',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '60',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'preview_size' => 'secondary-news-feature',
						'library' => 'all',
						'min_width' => 620,
						'min_height' => 170,
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
					array(
						'key' => 'field_5cd0da1fe0dea',
						'label' => 'News Feed Image',
						'name' => 'news_feed_image',
						'type' => 'image',
						'instructions' => '180x115px | Optional. If nothing provided, primary image will be automatically cropped to this size.

	Appears as small thumbnail for feed below featured news stories on news page.',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '40',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'preview_size' => 'recent-news',
						'library' => 'all',
						'min_width' => 180,
						'min_height' => 115,
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
				),
			),
			array (
				'key' => 'field_55ca3d6e89650',
				'label' => 'Featured Introduction Line',
				'name' => 'featured_introduction_line',
				'type' => 'text',
				'default_value' => '',
				'instructions' => 'Optional, shows above headline if used.',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55cb82fecc93f',
				'label' => 'News Author',
				'name' => 'news_author',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'people',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
					1 => 'post_type',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_title',
				),
				'max' => '',
			),
		array (
			'key' => 'field_5823b569cfee1',
			'label' => 'Carousel',
			'name' => 'enable_carousel',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'message' => 'Enable Carousel',
			'default_value' => 0,
		),
		array (
			'key' => 'field_5823b591cfee2',
			'label' => 'Fancybox',
			'name' => 'enable_fancybox',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'message' => 'Enable Fancybox',
			'default_value' => 0,
		),
		array (
			'key' => 'field_57e0279654db5',
			'label' => 'featured video',
			'name' => 'featured_video_toggle',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'message' => 'Enable featured video',
			'default_value' => 0,
		),

		array (
			'key' => 'field_57e027b854db6',
			'label' => 'MP4 Video URL',
			'name' => 'mp4_video_url',
			'type' => 'file',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_57e0279654db5',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array (
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'library' => 'all',
			'min_size' => '',
			'max_size' => 10,
			'mime_types' => '.mp4',
		),
		array (
			'key' => 'field_57e0289254db7',
			'label' => 'WEBM Video URL',
			'name' => 'webm_video_url',
			'type' => 'file',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_57e0279654db5',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array (
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'library' => 'all',
			'min_size' => '',
			'max_size' => 10,
			'mime_types' => '.webm',
		),
		array (
			'key' => 'field_57e028b954db8',
			'label' => 'OGV Video URL',
			'name' => 'ogv_video_url',
			'type' => 'file',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_57e0279654db5',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array (
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'library' => 'all',
			'min_size' => '',
			'max_size' => 10,
			'mime_types' => '.ogv',
		),
		array (
			'key' => 'field_57e02c15c17d6',
			'label' => 'Poster Image',
			'name' => 'poster_image',
			'type' => 'file',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_57e0279654db5',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array (
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'library' => 'all',
			'min_size' => '',
			'max_size' => '1.2',
			'mime_types' => '.jpg, .gif',
		),	

		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => array(
			0 => 'discussion',
			1 => 'comments',
			2 => 'slug',
			3 => 'author',
			4 => 'format',
			5 => 'page_attributes',
			6 => 'send-trackbacks',
		),
		'active' => true,
		'description' => '',
	));
}
 */




?>