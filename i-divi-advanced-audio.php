<?php
/*
Plugin Name: I Divi Advanced Audio
Plugin URI:  http://www.howidivit.com/i-divi-advanced-audio
Description: The plugin adds advanced style options in the Divi Audio module that let you configure all the Audio elements color, the width of the featured image and other.
Version:     1.0.0
Author:      Dan Mardis - Howidivit.com
Author URI:  http://www.howidivit.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: idaa-divi-advanced-audio
Domain Path: /languages

I Divi Advanced Audio is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

I Divi Advanced Audio is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with I Divi Advanced Audio. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

/**
 * Enqueue Css Style.
 *
 * @since 1.0.0
 */
function idaa_enqueue_css_styles() {
	//$plugin_version = '1.0';
	wp_enqueue_style('style', plugin_dir_url(__FILE__) . 'styles/style.css', array(), '1.0');
}
add_action( 'admin_enqueue_scripts', 'idaa_enqueue_css_styles' );

/**
 * Show error notice if Divi theme is not active.
 *
 * @since 1.0.0
 */
function idaa_inform_user() {
		 $user_id = get_current_user_id();
     $current_theme = wp_get_theme();
     if ( 'Divi' === $current_theme->get( 'Name' ) || 'Divi' === $current_theme->get( 'Template' ) ) {
      return;

     } else {
      echo '<div class="notice notice-error"><p>You need to have Divi theme active. i-Divi Advanced Audio <b>depends</b> from Divi!</p></div>';
    }
   }
	 add_action( 'admin_notices', 'idaa_inform_user' );

// function idaa_add_audio_toggles($settings_modal_toggles) {
// 	$toggles = [];
// 	$toggles['audio_styles'] = [
// 		'label' => 'Audio Styles'
// 	];
//  return array_merge($settings_modal_toggles, $toggles);
// }

/**
 * Add new option fields in the Audio module.
 *
 * @since 1.0.0
 */
function idaa_add_audio_settings($fields_unprocessed) {

 $fields = [];
 $fields['image_width'] = [
	 'label' => esc_html__('Image Width','idaa-divi-advanced-audio'),
	 'type' => 'range',
	 'option_category' => 'configuration',
	 'description' => esc_html__('Set the Width of the featured image.','idaa-divi-advanced-audio'),
	 'mobile_options'   => true,
	 'default_on_child' => true,
	 'validate_unit'    => true,
	 'default'          => '35%',
	 'default_tablet'   => '100%',
	 'default_unit'     => '%',
	 'allow_empty'      => true,
	 'range_settings'   => array(
		 'min'  => '0',
		 'max'  => '100',
		 'step' => '1',
	 ),
	 'toggle_slug' => 'image'
 ];
 $fields['audio_margin'] = [
	 'label' => esc_html__('Audio Timeline Margin','idaa-divi-advanced-audio'),
	 'type' => 'range',
	 'option_category' => 'configuration',
	 'description' => esc_html__('Set the Margin of the Audio timeline.','idaa-divi-advanced-audio'),
	 'mobile_options'   => true,
	 'default_on_child' => true,
	 'validate_unit'    => true,
	 'default'          => '220px',
	 'default_tablet'   => '220px',
	 'default_unit'     => 'px',
	 'allow_empty'      => true,
	 'range_settings'   => array(
		 'min'  => '0',
		 'max'  => '800',
		 'step' => '1',
	 ),
	 'toggle_slug' => 'audio'
 ];
 $fields['play_color'] = [
	 'label' => esc_html__('Player Color','idaa-divi-advanced-audio'),
	 'type' => 'color-alpha',
	 'option_category' => 'configuration',
	 'default'          => '#ffffff',
	 'description' => esc_html__('Choose the color of the Play button.','idaa-divi-advanced-audio'),
	 'tab_slug' => 'advanced'
 ];
 $fields['volume_color'] = [
	 'label' => esc_html__('Volume Color','idaa-divi-advanced-audio'),
	 'type' => 'color-alpha',
	 'option_category' => 'configuration',
	 'default'          => '#ffffff',
	 'description' => esc_html__('Choose the color of the Volume button.','idaa-divi-advanced-audio'),
	 'tab_slug' => 'advanced'
 ];
 $fields['timer_color'] = [
	 'label' => esc_html__('Timer Color','idaa-divi-advanced-audio'),
	 'type' => 'color-alpha',
	 'option_category' => 'configuration',
	 'default'          => '#ffffff',
	 'description' => esc_html__('Choose the color of Timer.','idaa-divi-advanced-audio'),
	 'tab_slug' => 'advanced'
 ];
 $fields['time_slider_color'] = [
	 'label' => esc_html__('Time Slider Color','idaa-divi-advanced-audio'),
	 'type' => 'color-alpha',
	 'option_category' => 'configuration',
	 'default'          => '#ffffff',
	 'description' => esc_html__('Choose the color of the Time Slider.','idaa-divi-advanced-audio'),
	 'tab_slug' => 'advanced'
 ];
 $fields['current_time_slider_color'] = [
	 'label' => esc_html__('Current Time Slider Color','idaa-divi-advanced-audio'),
	 'type' => 'color-alpha',
	 'option_category' => 'configuration',
	 'default'          => '#ffffff',
	 'description' => esc_html__('Choose the color of the Time Slider at current point.','idaa-divi-advanced-audio'),
	 'tab_slug' => 'advanced'
 ];
 $fields['volume_slider_color'] = [
	 'label' => esc_html__('Volume Slider Color','idaa-divi-advanced-audio'),
	 'type' => 'color-alpha',
	 'option_category' => 'configuration',
	 'default'          => '#ffffff',
	 'description' => esc_html__('Choose the color of the Volume Slider.','idaa-divi-advanced-audio'),
	 'tab_slug' => 'advanced'
 ];
 $fields['current_volume_slider_color'] = [
	 'label' => esc_html__('Current Volume Slider Color','idaa-divi-advanced-audio'),
	 'type' => 'color-alpha',
	 'option_category' => 'configuration',
	 'default'          => '#ffffff',
	 'description' => esc_html__('Choose the color of the Volume Slider at current point.','idaa-divi-advanced-audio'),
	 'tab_slug' => 'advanced'
 ];
 $fields['handle_size'] = [
	 'label' => esc_html__('Handle Size','idaa-divi-advanced-audio'),
	 'type' => 'range',
	 'option_category' => 'configuration',
	 'description' => esc_html__('Set the Size of the Time Handle.','idaa-divi-advanced-audio'),
	 'mobile_options'   => true,
	 'default_on_child' => true,
	 'unitless' => true,
	 'validate_unit'    => true,
	 'default'          => '1',
	 'default_tablet'   => '1',
	 'default_unit'     => '',
	 'allow_empty'      => true,
	 'range_settings'   => array(
		 'min'  => '0',
		 'max'  => '3',
		 'step' => '.1',
	 ),
	 'tab_slug' => 'advanced'
 ];
 $fields['handle_hover_size'] = [
	 'label' => esc_html__('Handle Hover Size','idaa-divi-advanced-audio'),
	 'type' => 'range',
	 'option_category' => 'configuration',
	 'description' => esc_html__('Set the Size of the Time Handle on hovering.','idaa-divi-advanced-audio'),
	 'mobile_options'   => true,
	 'default_on_child' => true,
	 'unitless' => true,
	 'validate_unit'    => true,
	 'default'          => '1',
	 'default_tablet'   => '1',
	 'default_unit'     => '',
	 'allow_empty'      => true,
	 'range_settings'   => array(
		 'min'  => '0',
		 'max'  => '3',
		 'step' => '.1',
	 ),
	 'tab_slug' => 'advanced'
 ];
 $fields['time_handle_border_radius'] = [
	 'label' => esc_html__('Handle Border Radius','idaa-divi-advanced-audio'),
	 'type' => 'range',
	 'option_category' => 'configuration',
	 'description' => esc_html__('Set the Border Radius of the Time Handle.','idaa-divi-advanced-audio'),
	 'default_on_child' => true,
	 'validate_unit'    => true,
	 'default'          => '100%',
	 'default_unit'     => '%',
	 'allow_empty'      => true,
	 'range_settings'   => array(
		 'min'  => '1',
		 'max'  => '100',
		 'step' => '1',
	 ),
	 'tab_slug' => 'advanced'
 ];
 $fields['time_handle_color'] = [
	 'label' => esc_html__('Time Handle Color','idaa-divi-advanced-audio'),
	 'type' => 'color-alpha',
	 'option_category' => 'configuration',
	 'default'          => 'antiquewhite',
	 'description' => esc_html__('Choose the color of the Time Handle.','idaa-divi-advanced-audio'),
	 'tab_slug' => 'advanced'
 ];
 $fields['time_handle_border_color'] = [
	 'label' => esc_html__('Time Handle Border Color','idaa-divi-advanced-audio'),
	 'type' => 'color-alpha',
	 'option_category' => 'configuration',
	 'default'          => '#ffffff',
	 'description' => esc_html__('Choose the color of the Time Handle border.','idaa-divi-advanced-audio'),
	 'tab_slug' => 'advanced'
 ];

 return array_merge($fields_unprocessed, $fields);

}
add_filter('et_pb_all_fields_unprocessed_et_pb_audio', 'idaa_add_audio_settings');

/**
 * Render the new option values in the frontend output.
 *
 * @since 1.0.0
 */
function idaa_render_audio_settings($output, $render_slug, $module) {

 if('et_pb_audio' !== $render_slug) return $output;

	$defaultWidth = '35%';
	$defaultMargin = '220px';
	$defaultColor = '#ffffff';
	$defaultHandleSize = '1';
	$defaultBorderColor = 'antiquewhite';
	$defaultBorderRadius = '100%';

	$imgWidth = $module->props['image_width'];
	$audioMargin = $module->props['audio_margin'];
	$playerColor = $module->props['play_color'];
	$volumeColor = $module->props['volume_color'];
	$timerColor = $module->props['timer_color'];
	$timeSliderColor = $module->props['time_slider_color'];
	$timeCurrentSliderColor = $module->props['current_time_slider_color'];
	$volSliderColor = $module->props['volume_slider_color'];
	$volCurrentSliderColor = $module->props['current_volume_slider_color'];
	$timeHandleColor = $module->props['time_handle_color'];
	$timeHandleBorderColor = $module->props['time_handle_border_color'];
	$timeHandleBorderRadius = $module->props['time_handle_border_radius'];
	$timeHandleSize = $module->props['handle_size'];
	$timeHandleHoverSize = $module->props['handle_hover_size'];

	 if ($imgWidth !== $defaultWidth) {
		ET_Builder_Element::set_style($render_slug, array(
		'selector' => '%%order_class%% .et_pb_audio_cover_art',
		'declaration' =>'width:' . $imgWidth . ';'
		));
	 }
	if ($audioMargin !== $defaultMargin) {
		ET_Builder_Element::set_style($render_slug, array(
		'selector' => '%%order_class%% .et_pb_audio_module_content',
		'declaration' =>'margin-left:' . $audioMargin . ';'
		));
	 }
	 if ($playerColor !== $defaultColor) {
		 ET_Builder_Element::set_style($render_slug, array(
		 'selector' => '%%order_class%% .et_audio_container .mejs-playpause-button button:before',
		 'declaration' =>'color:' . $playerColor . ';'
		 ));
	}
	if ($volumeColor !== $defaultColor) {
		ET_Builder_Element::set_style($render_slug, array(
		'selector' => '%%order_class%% .et_audio_container .mejs-volume-button button:before',
		'declaration' =>'color:' . $volumeColor . ';'
		));
	}
	if ($timerColor !== $defaultColor) {
		ET_Builder_Element::set_style($render_slug, array(
		'selector' => '%%order_class%% .et_audio_container .mejs-container .mejs-controls .mejs-time span',
		'declaration' =>'color:' . $timerColor . ';'
		));
	}
	if ($timeSliderColor !== $defaultColor) {
		ET_Builder_Element::set_style($render_slug, array(
		'selector' => '%%order_class%% .et_audio_container .mejs-controls .mejs-time-rail .mejs-time-total',
		'declaration' =>'background:' . $timeSliderColor . ';'
		));
	}
	if ($timeCurrentSliderColor !== $defaultColor) {
		ET_Builder_Element::set_style($render_slug, array(
		'selector' => '%%order_class%% .et_audio_container .mejs-controls .mejs-time-rail .mejs-time-current,.et_audio_container .mejs-controls .mejs-time-rail .mejs-time-handle',
		'declaration' =>'background:' . $timeCurrentSliderColor . ';'
		));
	}
	if ($volSliderColor !== $defaultColor) {
		ET_Builder_Element::set_style($render_slug, array(
		'selector' => '%%order_class%% .et_audio_container .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-total',
		'declaration' =>'background:' . $volSliderColor . ';'
		));
	}
	if ($volCurrentSliderColor !== $defaultColor) {
		ET_Builder_Element::set_style($render_slug, array(
		'selector' => '%%order_class%% .et_audio_container .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current, .et_audio_container .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-handle',
		'declaration' =>'background:' . $volCurrentSliderColor . ';'
		));
	}
	if ($timeHandleColor !== $defaultColor) {
		ET_Builder_Element::set_style($render_slug, array(
		'selector' => '%%order_class%% .et_audio_container .mejs-time-rail .mejs-time-handle-content',
		'declaration' =>'background:' . $timeHandleColor . ';'
		));
	}
	if ($timeHandleBorderColor !== $defaultBorderColor) {
		ET_Builder_Element::set_style($render_slug, array(
		'selector' => '%%order_class%% .et_audio_container .mejs-time-handle-content',
		'declaration' =>'border-color:' . $timeHandleBorderColor . ';'
		));
	}
	if ($timeHandleBorderRadius !== $defaultBorderRadius) {
		ET_Builder_Element::set_style($render_slug, array(
		'selector' => '%%order_class%% .et_audio_container .mejs-time-rail .mejs-time-handle-content',
		'declaration' =>'border-radius:' . $timeHandleBorderRadius . ';'
		));
	}
	if ($timeHandleSize !== $defaultHandleSize) {
		ET_Builder_Element::set_style($render_slug, array(
		'selector' => '%%order_class%% .et_audio_container .mejs-time-rail .mejs-time-handle-content',
		'declaration' =>'transform:scale(' . $timeHandleSize . ');'
		));
	}
	if ($timeHandleHoverSize !== $defaultHandleSize) {
		ET_Builder_Element::set_style($render_slug, array(
		'selector' => '%%order_class%% .et_audio_container .mejs-time-rail:hover .mejs-time-handle-content',
		'declaration' =>'transform:scale(' . $timeHandleHoverSize . ');'
		));
	}

 return $output;

}
add_filter('et_module_shortcode_output', 'idaa_render_audio_settings', 10, 3);
