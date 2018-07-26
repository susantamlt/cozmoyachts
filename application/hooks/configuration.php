<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/*
This hook function is responsible for reading all of the settings from
the database into the config array so they can be accessed in controllers
and views with $this->config->item('whatever'); or config_item('whatever');
*/

function pre_controller() {
	$CI =& get_instance();
	$results = $CI->db->get('settings')->result();
	foreach ($results as $setting) {
		$CI->config->set_item($setting->setting_name, $setting->setting_value);     
	} 
}