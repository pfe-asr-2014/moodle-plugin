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
* Event to be triggered when a new analytics is received from the API
*
* @package local_mem
* @author François Monniot
* @license http://opensource.org/licenses/gpl-3.0.html GNU Public License
*
**/

namespace local_mem\event;
defined('MOODLE_INTERNAL') || exit();

/**
* Class event_created
*
* Class for event to be triggered when a new analytics event is received.
*
* @property-read array $other {
*      Extra information about event.
*
*      - string category: category of the event (eg. Videos).
*      - string action: action of this event (eg. Play).
*      - string label: label of the event (additional information, eg. title of the video).
*      - DateTime datetime: date and time of the event.
* }
*
* @package    local_mem
* @author     François Monniot
* @license    http://opensource.org/licenses/gpl-3.0.html GNU Public License
*/
class mooc_event_created extends \core\event\base {


  /**
  * Set basic properties for the event.
  */
  protected function init() {
    $this->data['crud'] = 'c'; // c(reate)
    $this->data['edulevel'] = self::LEVEL_PARTICIPATING;
  }

  /**
  * Returns localised general event name.
  *
  * @return string
  */
  public static function get_name() {
    return get_string('eventmemeventcreated', 'local_mem');
  }

  /**
  * Returns non-localised event description for admin use only.
  *
  * @return string
  */
  public function get_description() {
    return "The user with id {$this->userid} created a new event «{$this->other['action']} on ".
           "{$this->other['label']} in category {$this->other['category']}».";
  }

  /**
  * custom validations
  *
  * Throw \coding_exception notice in case of any problems.
  */
  protected function validate_data() {
    if (!isset($this->other['category'])) {
      throw new \coding_exception('The \'category\' value must be set in other.');
    }
    if (!isset($this->other['action'])) {
      throw new \coding_exception('The \'action\' value must be set in other.');
    }
    if (!isset($this->other['label'])) {
      throw new \coding_exception('The \'label\' value must be set in other.');
    }
    if (!isset($this->other['datetime'])) {
      throw new \coding_exception('The \'datetime\' value must be set in other.');
    }
    if(!($this->other['datetime'] instanceof \DateTime)) {
      throw new \coding_exception('The \'datetime\' value must be a \\DateTime object.');
    }
  }
}
