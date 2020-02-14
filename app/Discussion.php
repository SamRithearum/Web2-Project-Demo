<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'discussions';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['comment', 'username'];
}
