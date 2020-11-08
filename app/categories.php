<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = 'categories';

    

    protected $fillable = [
        'name_ar', 'name_en','active','desc','created_at', 'updated_at'
    ];

    public function scopeSelection($query)
    {
        return $query->select('id', 'name_' . app()->getLocale() . ' as name');
    }

}
