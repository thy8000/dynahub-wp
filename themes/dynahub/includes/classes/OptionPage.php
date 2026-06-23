<?php

class OptionPage {

	public function __construct() {
		add_action( 'acf/init', array( $this, 'add_options_page' ), 5 );
		add_action( 'acf/init', array( $this, 'add_fields' ), 10 );
	}

	public function add_options_page() {
		if ( ! function_exists( 'acf_add_options_page' ) ) {
			return;
		}

		acf_add_options_page(
			array(
				'page_title' => 'Opções do Tema',
				'menu_title' => 'Opções do Tema',
				'menu_slug'  => 'theme-options',
				'capability' => 'edit_posts',
				'redirect'   => true,
				'show_in_graphql' => true,
			)
		);

		acf_add_options_sub_page(
			array(
				'page_title'  => 'Opções Gerais',
				'menu_title'  => 'Opções Gerais',
				'parent_slug' => 'theme-options',
				'menu_slug'   => 'opcoes-da-home',
				'show_in_graphql' => true,
			)
		);
	}

	public function add_fields() {
		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}

		acf_add_local_field_group(
			array(
				'key'      => 'group_home_options',
				'title'    => 'Opções Gerais',
				'show_in_graphql' => true,
				'graphql_field_name' => 'themeOptions',
				'fields'   => array(
					array(
						'key'       => 'field_header_tab',
						'label'     => 'Header',
						'name'      => 'header_tab',
						'type'      => 'tab',
						'placement' => 'top',
						'endpoint'  => 0,
					),
					array(
						'key'        => 'field_header_logo',
						'label'      => 'Logo do Site',
						'name'       => 'header_logo',
						'type'       => 'group',
						'layout'     => 'block',
						'sub_fields' => array(
							array(
								'key'           => 'field_logo_image',
								'label'         => 'Imagem do Logo',
								'name'          => 'logo_image',
								'type'          => 'image',
								'return_format' => 'array',
								'preview_size'  => 'medium',
								'library'       => 'all',
							),
						),
					),
					array(
						'key'        => 'field_redes_sociais',
						'label'      => 'Redes Sociais',
						'name'       => 'social_share',
						'type'       => 'group',
						'layout'     => 'block',
						'sub_fields' => array(
							array(
								'key'   => 'field_facebook',
								'label' => 'Facebook',
								'name'  => 'facebook',
								'type'  => 'url',
							),
							array(
								'key'   => 'field_instagram',
								'label' => 'Instagram',
								'name'  => 'instagram',
								'type'  => 'url',
							),
							array(
								'key'   => 'field_linkedin',
								'label' => 'Linkedin',
								'name'  => 'linkedin',
								'type'  => 'url',
							),
							array(
								'key'   => 'field_twitter',
								'label' => 'Twitter',
								'name'  => 'twitter',
								'type'  => 'url',
							),
						),
					),
				),
				'location' => array(
					array(
						array(
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => 'opcoes-da-home',
						),
					),
				),
			)
		);
	}
}

new OptionPage();
