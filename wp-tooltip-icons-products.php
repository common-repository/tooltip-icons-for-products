<?php
/*
Plugin Name: Tooltip Icons for Products
Plugin URI: https://danielesparza.studio/tooltip-icons-for-products/
Description: Tooltip Icons for Products es un Plugin para WordPress que sirve para agregar iconos informativos en la parte inferior del precio de los productos. Este plugin esta integrado con el kit CDN de font awesome para integrar iconos.
Version: 1.0
Author: Daniel Esparza
Author URI: https://danielesparza.studio/
License: GPL v3

Tooltip Icons for Products
©2020 Daniel Esparza, inspirado por #openliveit #dannydshore | Consultoría en servicios y soluciones de entorno web - https://danielesparza.studio/

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

//global
$dewp_prefix = 'dewp_';
$dewp_plugin_name = 'Tooltip Icons for Products';
$dewp_options = get_option( 'dewp_settings' );

//includes
include ( 'includes/wp-tooltip-icons-products-admin.php' );
include ( 'includes/wp-tooltip-icons-products-functions.php' );