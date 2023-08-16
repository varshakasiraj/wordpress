<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * This file is generated by Webpack, do not edit it directly.
 */
return [
	'handle' => 'elementor-packages-editor-app-bar',
	'src' => plugins_url( '/', __FILE__ ) . 'editor-app-bar{{MIN_SUFFIX}}.js',
	'i18n' => [
		'domain' => 'elementor',
		'replace_requested_file' => false,
	],
	'type' => 'extension',
	'deps' => [
		'elementor-packages-editor',
		'elementor-packages-editor-documents',
		'elementor-packages-editor-v1-adapters',
		'elementor-packages-icons',
		'elementor-packages-locations',
		'elementor-packages-ui',
		'react',
		'wp-i18n',
	],
];
