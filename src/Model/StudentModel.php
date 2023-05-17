<?php

namespace App\Model;

use Common\Model;

class StudentModel extends Model
{
  public int $id;
  public string $firstName;
  public string $lastName;
  public int $matricule;
  public string $birthday;
  public string $createdAt;
  public string $updatedAt;

  public function __construct()
  {
    parent::__construct("students");
  }
}
