<?php
/**
 * i-MSCP - internet Multi Server Control Panel
 * Copyright (C) 2010 - 2012 by i-MSCP Team
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 * @category	iMSCP
 * @package		iMSCP_Plugin
 * @subpackage	HelloWorld
 * @copyright	2010 - 2012 by i-MSCP Team
 * @author		Laurent Declercq <l.declercq@nuxwin.com>
 * @link		http://www.i-mscp.net i-MSCP Home Site
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GPL v2
 */

/**
 * Hello World Plugin.
 *
 * This plugin is only intended to be used in documentation to explain how to create a plugin for i-MSCP. This plugin
 * simply say 'Hello World' when the login page is loaded and stop the execution just after.
 *
 * @category	iMSCP
 * @package		iMSCP_Plugin
 * @subpackage	HelloWorld
 * @author		Laurent Declercq <l.declercq@nuxwin.com>
 * @version		0.0.1
 */
class iMSCP_Plugin_HelloWorld extends iMSCP_Plugin_Action
{
	/**
	 * Register a callback for the given event(s).
	 *
	 * @param iMSCP_Events_Manager_Interface $controller
	 */
	public function register(iMSCP_Events_Manager_Interface $controller)
	{
		$controller->registerListener(array(iMSCP_Events::onLoginScriptStart, iMSCP_Events::onLoginScriptEnd), $this);
	}

	/**
	 * Implements the onLoginScriptStart listener method.
	 *
	 * @param iMSCP_Events_Event $event
	 */
	public function onLoginScriptStart($event)
	{
		// Say Hello World on the login page
		set_page_message('i-MSCP HelloWorld plugin says: Hello World', 'info');

		// Stop the propagation of this event to prevent execution of any other plugin that also listen on it.
		$event->stopPropagation();
	}

	/**
	 * Implements the onLoginScriptEnd listener method.
	 *
	 * @param iMSCP_Events_Event $event
	 */
	public function onLoginScriptEnd($event)
	{
		// Stop the propagation of this event to prevent execution of any other lugin that also listen on it.
		$event->stopPropagation();
	}
}
