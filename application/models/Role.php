<?php

class Application_Model_Role
{
  protected $id;
  protected $role;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = (int) $id;
  }

  public function getRole() {
    return $this->role;
  }

  public function setRole($role) {
    $this->role = (string) $role;
  }


}

