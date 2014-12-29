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
* MEM version file
*
* @author François Monniot
* @package local_mem
* @license http://opensource.org/licenses/gpl-3.0.html GNU Public License
*
**/

defined('MOODLE_INTERNAL') || die();

$plugin->version   = 2014122902;  // format YYYYMMDDXX
$plugin->requires  = 2013051400;  // Requires at least Moodle version 2.5
$plugin->component = 'local_mem';
$plugin->cron      = 0;
$plugin->maturity  = MATURITY_ALPHA;
$plugin->release   = '0.1 (Build: 2014-11-15)';
