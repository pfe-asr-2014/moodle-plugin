<?php
/**
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
* along with this program.  If not, see http://opensource.org/licenses/gpl-3.0.html.
*/

/**
* EMFM services definition
*
* @author François Monniot
* @package local_emfm
* @license http://opensource.org/licenses/gpl-3.0.html GNU Public License
*
**/

// We defined the web service functions to install.
$functions = array(
  'local_emfm_post_event' => array(
    'classname'   => 'local_emfm_external',
    'methodname'  => 'post_event',
    'classpath'   => 'local/emfm/externallib.php',
    'description' => 'Save the given event to the database.',
    'type'        => 'write',
  )
);

// We define the services to install as pre-build services. A pre-build service is not editable by administrator.
$services = array(
  'Mooc Event for Moodle' => array(
    'functions' => array (
      'local_emfm_post_event'
    ),
    'restrictedusers' => 0,
    'enabled'         => 1,
    'shortname'       => 'emfm',
  )
);
