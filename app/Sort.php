<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sort extends Model
{
    public $primaryKey = 'sort_id';

    protected $fillable = [
        'sort_name', 'sort_order'
    ];

    protected function menuSorts(){
        $menu_sorts= Sort::orderBy('sort_order','desc')->get();
        $sort[]='';
        foreach($menu_sorts as $list){
            $sort[]=[
                'id'=>$list['sort_id'],
                'title'=>$list['sort_name'],
                'count'=>Menu::whereMenuType($list['sort_id'])->count(),
            ];
        }
        return array_filter($sort);
    }

    public function getSorts(){
        return $this->menuSorts();
    }

}
