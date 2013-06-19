<?php
/***********************************************
* File      :   admin_boot.php
* Project   :   piwigo-openstreetmap
* Descr     :   Generate the admin panel
*
* Created   :   11.06.2013
*
* Copyright 2013 <xbgmsharp@gmail.com>
*
*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
*
************************************************/

// Check whether we are indeed included by Piwigo.
if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

// Hook to a admin config page
add_event_handler('get_admin_plugin_menu_links', 'osm_admin_menu');
function osm_admin_menu($menu)
{
	array_push($menu,
		array(
			'NAME' => 'OpenStreetMap',
			'URL'  => get_admin_plugin_menu_link(dirname(__FILE__).'/admin.php')
		)
	);
	return $menu;
}

// Exit if we don't want batch_manager support
if ($conf['osm_conf']['batch_manager'])
{
	// Batch_manager support
	include_once(dirname(__FILE__).'/admin_batchmanager.php');
}

?>