<?php

namespace App\Model;

use Common\Model;

class SchoolYearModel extends Model
{
  public int $id;
  public string $label;
  public string $createdAt;
  public string $updatedAt;

  public function __construct()
  {
    parent::__construct("schoolYear");
  }
}
