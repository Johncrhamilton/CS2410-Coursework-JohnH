<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LostItem extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'found_time', 'found_place', 'colour', 'photo', 'description'
  ];
}
