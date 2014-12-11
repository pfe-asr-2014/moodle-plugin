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
* MEM external functions
*
* @author François Monniot
* @package local_mem
* @license http://opensource.org/licenses/gpl-3.0.html GNU Public License
*
**/

require_once($CFG->libdir . "/externallib.php");

class local_mem_external extends external_api {

  /**
   * Return description of post_event method parameters.
   * @return external_function_parameters
   */
  public static function post_event_parameters() {
    return new external_function_parameters(
      array(
        'category' => new external_value(PARAM_TEXT, 'category of this event (eg. Videos)'),
        'action'   => new external_value(PARAM_TEXT, 'action of this event (eg. Play)'),
        'label'    => new external_value(PARAM_TEXT, 'label of the event (additional information, eg. title of the video)'),
        'datetime' => new external_value(PARAM_TEXT, 'date and time of the event in the ISO8601 format (eg. 2014-12-11T16:31:12.436+01:00)')
      )
    );
  }

  /**
   * Returns description of post_event method result value.
   * @return external_description
   */
  public static function post_event_returns() {
    return new external_value(PARAM_BOOL, 'Whether or not the event was saved.');
  }

  /**
   * Save an event to the database.
   * @return boolean message saved or not
   */
  public static function post_event($category, $action, $label, $datetime) {
    return true;
  }
}
