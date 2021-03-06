<?php

namespace ResponsiveMenu\Collections;
use ResponsiveMenu\Models\Option as Option;

class OptionsCollection implements \ArrayAccess {

  private $options;

  public function add(Option $option) {
    $this->options[$option->getName()] = $option;
  }

  public function get($name) {
    return $this->options[$name];
  }

  public function all() {
    return $this->options;
  }

  public function usesFontIcons() {
    return false;
  }

  public function getActiveArrow() {
    if($this->options['active_arrow_image'] && $this->options['active_arrow_image']->getValue())
      return '<img src="' . $this->options['active_arrow_image'] .'" />';
    else
      return $this->options['active_arrow_shape'];

  }

  public function getInActiveArrow() {
    if($this->options['inactive_arrow_image'] && $this->options['inactive_arrow_image']->getValue())
      return '<img src="' . $this->options['inactive_arrow_image'] .'" />';
    else
      return $this->options['inactive_arrow_shape'];

  }

  public function getTitleImage() {
    if($this->options['menu_title_image'] && $this->options['menu_title_image']->getValue())
      return '<img src="' . $this->options['menu_title_image'] .'" />';
    else
      return null;

  }

  public function getButtonIcon() {
    if($this->options['button_image'] && $this->options['button_image']->getValue())
      return '<img src="' . $this->options['button_image'] .'" class="responsive-menu-button-icon responsive-menu-button-icon-active" />';
    else
      return '<span class="responsive-menu-inner"></span>';
  }

  public function getButtonIconActive() {
    if($this->options['button_image'] && $this->options['button_image']->getValue())
      return '<img src="' . $this->options['button_image_when_clicked'] .'" class=" responsive-menu-button-icon responsive-menu-button-icon-inactive" />';
  }

  public function offsetExists($offset) {
    return array_key_exists($offset, $this->options);
  }

  public function offsetGet($offset) {
    return $this->options[$offset];
  }

  public function offsetSet($offset, $value) {
    if(isset($this->options[$offset]))
      $this->options[$offset]->setValue($value);
  }

  public function offsetUnset($offset) {
    unset($this->options[$offset]);
  }

  public function isEmpty() {
    return isset($this->options) && count($this->options) > 0 ? false : true;
  }

}
