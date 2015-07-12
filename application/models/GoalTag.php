<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class GoalTag extends OaModel {

  static $table_name = 'goal_tags';

  static $has_one = array (
  );

  static $has_many = array (
    array ('tag_goal_maps', 'class_name' => 'GoalTagMap'),

    array ('goals', 'class_name' => 'Goal', 'through' => 'tag_goal_maps')
  );

  static $belongs_to = array (
  );

  public function __construct ($attributes = array (), $guard_attributes = true, $instantiating_via_find = false, $new_record = true) {
    parent::__construct ($attributes, $guard_attributes, $instantiating_via_find, $new_record);
  }
  public function destroy () {
    if ($old_tag_ids = column_array ($this->tag_goal_maps, 'goal_tag_id'))
      GoalTagMap::delete_all (array ('conditions' => array ('tag_id IN (?)', $old_tag_ids)));

    return $this->delete ();
  }
}