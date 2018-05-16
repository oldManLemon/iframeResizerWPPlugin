<?php 

/**
 * @package iframePlugin
 */

 /**
  * 
Plugin Name: oldManLemon's Iframe Resizer
Plugin URI: https://github.com/oldManLemon
Description: This is my first attempt at writing a DIY plugin for iFrame Resizer. <a href="https://github.com/davidjbradshaw/iframe-resizer"> David Bradshaw</a> wrote the original scripts
Version: 1.0.0
Author: oldManLemon
Author URI: http://devilsdetailsdesigns.com.au
License: GPLv2 or later
Text Domain: iframeResizer

oldManLemon's Iframe Resizer
    Copyright (C) 2018  Andrew Hase

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.

  */
//ABSPATH is a WP contstant use by wordpress, if another app or bot access this file and tries to run code, WP Constant won't be defined thus kill app.
  if ( ! defined('ABSPATH')){
      die;
      // or exit;
  }

  class iframeResizerClass{

    //activate
    function activate(){

     add_action( 'activatedPlugin', 'myError' );
    //  echo "Plugin is activatedThis is a longer string to make it pioke out";
    }
    function register(){
      add_action('wp_enqueue_scripts', array($this, 'enqueue'));
    }
    function myError(){
      file_put_contents(dirname(__FILE__).'/error_activation.txt',ob_get_contents());
    }

    //deactivate 
    function dectivate(){
      flush_rewrite_rules( );
    }

    //uninstall
    function uninstall(){

    }

    //Enque myscripts

      function enqueue(){
        wp_enqueue_script ('iframeResizer.js', plugins_url('/assets/iframeResizer.js', __FILE__ ));

      }
  }

  if( class_exists ('iframeResizerClass')){
    $iframeClass = new iframeResizerClass();
    $iframeClass->myError();
    $iframeClass->register();
  }
//WP activation hook
  register_activation_hook(__FILE__, array('$iframeClass', 'activate')); // Use array to tap the class, 2 parameters 0: Class Name 1: function

//WP deactivation hook

register_deactivation_hook(__FILE__, array('$iframeClass', 'deactivate'));
