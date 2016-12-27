<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sort extends Model
{
    protected $fillable = [
        'title', 'sort'
    ];

    protected function menuSorts(){
        $menu_sorts= Sort::orderBy('sort','desc')->get();
        $sort[]='';
        foreach($menu_sorts as $list){
            $sort[]=[
                'id'=>$list['id'],
                'title'=>$list['title'],
                'count'=>Menu::whereSorts_id($list['id'])->count(),
            ];
        }
        return array_filter($sort);
    }

    public function getSorts(){
        return $this->menuSorts();
    }

}
