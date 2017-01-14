<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Request;

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

    /* 菜单列表API */
    public function menuList(){
        return $this->menuSorts();
    }
    protected function menuSorts(){

        $menu_sorts= Sort::all();
        $sort[]='';
        foreach($menu_sorts as $list){
            $menu = Menu::whereMenuType($list['sort_id'])->get();
            foreach ($menu as $menu_list){
                $sort[$list['sort_name']][]=[
                    'id'=>$menu_list['menu_id'],
                    'name'=>$menu_list['menu_name'],
                    'cls'=>$menu_list['menu_description'],
                    'price'=>$menu_list['menu_price'],
                    'sels'=>$menu_list['menu_order'],
                    'imageUrl'=>$menu_list['menu_pictrue'] ? 'http://'.Request::getHttpHost().'/build/images/'.$menu_list['menu_pictrue'] :'',
                ];
            }
        }
        return array_filter($sort);
    }

}
