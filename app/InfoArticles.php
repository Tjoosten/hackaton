<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoArticles extends Model
{
    /**
     * Mass-assign fields.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'heading', 'description'];
}
