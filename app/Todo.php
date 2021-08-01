<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model {
  //
  protected $table = 'todos';
  protected $fillable = ['todo','category','user_id','description'];
}