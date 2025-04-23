<?php

/**
 * Plugin Name:       Yotako Forms
 * Description:       Yotako wordpress forms
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           1.1.1
 * Author:            Yotako team
 * Text Domain:       yotako forms
 *
 * @package           yotako forms
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

require_once(__DIR__ . '/build/api/routes.php');

function create_block_yotako_wordpress_forms_plugin_block_init()
{
	register_block_type(__DIR__ . '/build/blocks/button', array(
		'attributes' => array(
			'buttonType' => array(
				'type' => 'string',
				'enum' => array('submit', 'link'),
			),
			'linkTo' => array(
				'type' => 'string',
			),
			'form' => array(
				'type' => 'string',
			),
			'target' => array(
				'type' => 'string',
				'enum' => array('_blank', '_self'),
			),
			'inlineStyle' => array(
				'type' => 'string',
			),
			'linkClassName' => array(
				'type' => 'string',
			),
		)
	));
	register_block_type(__DIR__ . '/build/blocks/form', array('attributes' => array(
		'formName' => array(
			'type' => 'string',
		)
	)));
	register_block_type(__DIR__ . '/build/blocks/input-text', array(
		'attributes' => array(
			'type' => array(
				'type' => 'string',
				'enum' => array('text', 'password'),
			),
			'placeholder' => array(
				'type' => 'string',
			),
			'inlineStyle' => array(
				'type' => 'string',
			),
			'name' => array(
				'type' => 'string',
			),
			'form' => array(
				'type' => 'string',
			),
			'required' => array(
				'type' => 'string',
				'enum' => array('required', 'false'),
			)
		)
	));
	register_block_type(__DIR__ . '/build/blocks/input-select', array(
		'attributes' => array(
			'inlineStyle' => array(
				'type' => 'string',
			),
			'name' => array(
				'type' => 'string',
			),
			'form' => array(
				'type' => 'string',
			),
			'required' => array(
				'type' => 'string',
				'enum' => array('required', 'false'),
			),
			'options' => array(),
		)
	));
}


add_action('init', 'create_block_yotako_wordpress_forms_plugin_block_init');
