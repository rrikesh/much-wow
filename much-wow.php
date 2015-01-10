<?php
/**
 * Plugin Name: Much Wow
 * Author: Rikesh Ramlochund
 * Description: Adds fade in animations to your WordPress site.
 *
 */

namespace RRikesh\MuchWow;

\function_exists( 'add_action' ) || die;

\add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_scripts' );
\add_filter( 'post_class', __NAMESPACE__ . '\\add_post_class' );
\add_filter( 'body_class', __NAMESPACE__ . '\\add_body_class' );

/**
 * Enqueue JS and CSS
 */
function enqueue_scripts(){
	$version = '1';

	# Minify only if WP_DEBUG is set to false
	$min = \defined( 'WP_DEBUG' ) && WP_DEBUG ? '' : '.min';

	\wp_enqueue_script( 'much-wow', \plugins_url( '/wow' . $min . '.js' , __FILE__ ), array( 'jquery' ), $version );

	\wp_enqueue_style( 'much-wow', \plugins_url( '/animate' . $min . '.css', __FILE__ ), null, $version );
}

/**
 * Add bounce up to posts
 * @param array $classes array of classes present
 * @return array new array of classes
 */
function add_post_class( $classes ) {
	global $post;
	$classes[] = 'much-wow';
	$classes[] = 'bounceInUp';
	return $classes;
}

/**
 * Fades in the body
 * @param  array $classes array of classes present
 * @return array new array of classes
 */
function add_body_class( $classes ) {
	global $post;
	$classes[] = 'much-wow';
	$classes[] = 'fadeIn';
	return $classes;
}


