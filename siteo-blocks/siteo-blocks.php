<?php 
/**
 * Template for adding gutenberg blocks
 */
/**
 * Plugin Name:       Siteo Blocks
 * Plugin URI:        https://github.com/franciscorb/plugins.git/siteo-blocks.php
 * Description:       Plugin for adding custom gutenberg blocks to a theme.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Francisco Rosales
 * Author URI:        https://github.com/franciscorb/
 * License:           GPL2
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       siteo-blocks.php
 */

defined( 'ABSPATH' ) or die( 'No authorized access!' );


//DEFINE A CATEGORY FOR ALL BLOCKS
function siteo_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'siteo',
				'title' => 'Siteo blocks',
			),
		)
	);
}
add_filter( 'block_categories_all', 'siteo_block_category', 10, 2);


//action hook for calling the diaporama block init function
add_action('acf/init', 'siteo_diaporama_block_init', 9 );
add_action('acf/init', 'siteo_diaporama_block_init_settings', 10 );

function siteo_diaporama_block_init() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register slider block
        acf_register_block_type(array(
            'name'              => 'Diaporama',
            'title'             => __('Diaporama'),
            'description'       => __('Un block pour créer un diaporama bootstrap'),
            'render_template'   => plugin_dir_path( __FILE__ ) . 'template-parts/diaporama-block.php',
            'category'          => 'siteo',
            'mode'			    => 'preview',
            'data' => array(
                'testimonial'   => "Blocks are...",
                'author'        => "Jane Smith",
                'role'          => "Person",
                'is_preview'    => true
            ),
            'icon'              => 'images-alt',
            'editor-styles'     => 'add_theme_support',
            'keywords'          => array( 'Slider', 'diaporama', 'carousel'),
            'enqueue_assets'    => function() {
                wp_enqueue_style('diaporama', plugin_dir_url( __FILE__ ) . 'assets/css/blocks.css', '','1.0', 'all' );
            },
            'supports'          => array(
                    'align' => true,
                    'mode' => true,
                    'jsx' => true
            ),
        ));
    }
}

//function for adding acf diaporama field settings
function siteo_diaporama_block_init_settings() {
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'group_61409f2691d48',
            'title' => 'Bloc : Diaporama',
            'fields' => array(
                array(
                    'key' => 'field_6140a0ea09dc4',
                    'label' => 'Diaporama',
                    'name' => 'diaporama',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'collapsed' => '',
                    'min' => 0,
                    'max' => 0,
                    'layout' => 'block',
                    'button_label' => '',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_6140a0ea09dc5',
                            'label' => 'Diapositive',
                            'name' => 'diapositive',
                            'type' => 'image',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'url',
                            'preview_size' => 'medium',
                            'library' => 'all',
                            'min_width' => '',
                            'min_height' => '',
                            'min_size' => '',
                            'max_width' => '',
                            'max_height' => '',
                            'max_size' => '',
                            'mime_types' => '',
                        ),
                        array(
                            'key' => 'field_6140a0ea09dc6',
                            'label' => 'Titre diapositive',
                            'name' => 'titre_diapositive',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_6140a0ea09dc7',
                            'label' => 'Phrase mise en avant',
                            'name' => 'phrase',
                            'type' => 'textarea',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'maxlength' => '',
                            'rows' => '',
                            'new_lines' => '',
                        ),
                        array(
                            'key' => 'field_6140a0ea09dc8',
                            'label' => 'Lien bouton',
                            'name' => 'lien_bouton',
                            'type' => 'link',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'array',
                        ),
                    ),
                ),
                array(
                    'key' => 'field_614b0fabe1526',
                    'label' => 'Navigation carousel',
                    'name' => 'navigation_carousel',
                    'type' => 'radio',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'dots' => 'Points',
                        'arrows' => 'Flèches',
                    ),
                    'allow_null' => 0,
                    'other_choice' => 0,
                    'default_value' => '',
                    'layout' => 'vertical',
                    'return_format' => 'value',
                    'save_other_choice' => 0,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'all',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'show_in_rest' => 0,
        ));
        
    endif;		
}
