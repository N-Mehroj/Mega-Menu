<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['title','parent_id'];

    public function childs() : HasMany {
        return $this->hasMany('App\Models\Menu','parent_id','id') ;
    }

    public function parent() : HasOne {
        return $this->hasOne('App\Models\Menu','parent_id','id');
    }
}
