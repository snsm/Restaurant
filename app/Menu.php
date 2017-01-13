<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    protected $primaryKey = 'menu_id';

    protected $fillable = [
        'menu_name','menu_description','menu_type','menu_price','menu_pictrue','menu_order'
    ];

    public function applySort()
    {
        return $this->belongsTo('App\Sort', 'menu_type');
    }
    public function getSortNameAttribute()
    {
        return $this->applySort->sort_name;
    }

}
