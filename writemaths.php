<?php
/*
Plugin Name: Write maths, see maths
Plugin URI: http://christianp.github.com/writemaths
Description: Add instant MathJax preview to LaTeX being typed in text areas.
Version: 1.0
Author: Christian Perfect
Author URI: http://checkmyworking.com
License: Apache 2
 */
/*
   Copyright 2012 Christian Perfect

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

   http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
 */
$writemaths = new Writemaths_Plugin;

class Writemaths_Plugin
{
	var $slug = 'writemaths';
	var $plugin_url;
	var $plugin_dir;

	function Writemaths_Plugin()
	{
		$this->option_name = $this->slug;

		$this->plugin_url = get_bloginfo('wpurl') . '/' . PLUGINDIR . '/' . $this->slug;
		$this->plugin_dir = str_replace('\\','/',dirname(__FILE__));

		register_activation_hook(__FILE__,array($this,'do_activate'));

		add_action('plugins_loaded',array($this,'do_plugins_loaded'));
	}

	function do_activate()
	{
		$option = get_option($this->option_name);
		if (empty($option)) update_option($this->option_name, array('selector'=>'textarea#comment'));
	}

	function do_plugins_loaded()
	{
		if(function_exists('wp_enqueue_script'))
		{
			//these scripts get loaded everywhere. How do I get them to only load when I'm looking at a post? is_single() seems not to work here
			wp_enqueue_script('jquery_caretposition', $this->plugin_url . '/assets/jquery.caretposition.js');
			wp_enqueue_script('textinputs_jquery', $this->plugin_url . '/assets/textinputs_jquery.js');
			wp_enqueue_script('writemaths_plugin', $this->plugin_url . '/assets/writemaths.js');
			wp_enqueue_script('writemaths_apply', $this->plugin_url . '/assets/writemaths_apply.js');
		}
	}
}
?>
