<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_58a0579b83982',
	'title' => 'Fiche artistes',
	'fields' => array (
		array (
			'key' => 'field_58a057bfd213e',
			'label' => 'Biographie',
			'name' => 'biographie',
			'type' => 'wysiwyg',
			'instructions' => '(2000 caractères maximum)',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'text',
			'toolbar' => 'basic',
			'media_upload' => 1,
			'delay' => 0,
		),
		array (
			'key' => 'field_58a05b8f4652b',
			'label' => 'Galerie média',
			'name' => 'galerie_media',
			'type' => 'gallery',
			'instructions' => '(un maximum de 10 vidéos et 10 images est recommandé)',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'min' => '',
			'max' => 20,
			'insert' => 'append',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_58a05ceb916fe',
			'label' => 'Discographie',
			'name' => 'discographie',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array (
				array (
					'key' => 'field_58a05d36916ff',
					'label' => 'Image album',
					'name' => 'image',
					'type' => 'image',
					'instructions' => '(000 x 000 px - Taille max 2mo)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '20',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'id',
					'preview_size' => 'thumbnail',
					'library' => 'uploadedTo',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '.jpg , .png',
				),
				array (
					'key' => 'field_58a05e7691700',
					'label' => 'Titre de l\'album',
					'name' => 'titre_de_labum',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '20',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_58a05ed491701',
					'label' => 'Artistes',
					'name' => 'artistes',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '20',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '(Artiste 1, Artiste 2 , ect ...)',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_58a05fd891703',
					'label' => 'Label',
					'name' => 'label',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '20',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_58a05f3e91702',
					'label' => 'Année de parution',
					'name' => 'annee_de_parution_',
					'type' => 'number',
					'instructions' => 'format :',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '20',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
			),
		),
		array (
			'key' => 'field_58a060ef1d989',
			'label' => 'Liens et téléchargements',
			'name' => 'liens_et_telechargements',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array (
				array (
					'key' => 'field_58a06218710bd',
					'label' => 'Liens',
					'name' => 'liens',
					'type' => 'url',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
				),
			),
		),
		array (
			'key' => 'field_58a0aca38c8fb',
			'label' => 'Ensembles',
			'name' => 'ensembles',
			'type' => 'post_object',
			'instructions' => 'Choisissez les ensembles dont fait partie l\'artiste',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array (
				0 => 'artistes',
			),
			'taxonomy' => array (
				0 => 'category:ensembles',
			),
			'allow_null' => 0,
			'multiple' => 1,
			'return_format' => 'object',
			'ui' => 1,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'artistes',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'the_content',
		1 => 'excerpt',
		2 => 'discussion',
		3 => 'comments',
		4 => 'slug',
		5 => 'author',
		6 => 'format',
		7 => 'send-trackbacks',
	),
	'active' => 1,
	'description' => '',
));

endif;