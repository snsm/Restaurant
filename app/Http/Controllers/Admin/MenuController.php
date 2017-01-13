<?php

namespace App\Http\Controllers\Admin;

use App\Sort;
use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {
        $sort= Sort::orderBy('sort_order','desc')->paginate(15);
        $result =(new Sort())->getSorts();
        return view('admin.menu-sort-list',compact('sort','result'));
    }

    public function sortInsert(Request $request){
        Sort::create([
            'sort_name' => $request->get('sort_name'),
        ]);
        return Redirect::back();
    }

    public function sortUpdate(Request $request)
    {
        $sort = Sort::find($request->get('sort_id'));
        $sort->sort_name = $request->get('sort_name');
        $sort->save();
        return Redirect::back();
    }

    public function sortOrder(Request $request)
    {
        $sort = Sort::find($request->get('sort_id'));
        $sort->sort_order = $request->get('sort_order');
        $result = $sort->save();
        if($result){
            $data = ['status' =>0,'msg' =>'更新成功！'];
        }else{
            $data = [ 'status' =>1,'msg' =>'更新失败！'];
        }
        return $data;
    }

    public function sortDelete($id)
    {
        $result = Sort::find($id)->delete();
        if($result){
            $data = ['status' =>0, 'msg' =>'删除成功！'];
        }else{
            $data = ['status' =>1,'msg' =>'删除失败！'];
        }
        return $data;
    }


    public function menuList()
    {
        $sorts = Sort::all();
        $menu = Menu::all();
        return view('admin.menu-list',compact('sorts','menu'));
    }

    public function menuInsert(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $file = $request->file('menu_pictrue');
            if($file)
            {
                $ext = $file->getClientOriginalExtension();
                $realPath = $file->getRealPath();

                $filename = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;
                Storage::disk('uploads')->put($filename,file_get_contents($realPath));

                Menu::create([
                    'menu_name' => $request->get('menu_name'),
                    'menu_description' => $request->get('menu_description'),
                    'menu_type' => $request->get('sort_id'),
                    'menu_price' => $request->get('menu_price'),
                    'menu_pictrue' => $filename,
                ]);
            }
            return Redirect::back();
        }
    }

    public function menuUpdate(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $file = $request->file('menu_pictrue');
            if($file)
            {
                // return '更新图片';
                $ext = $file->getClientOriginalExtension();
                $realPath = $file->getRealPath();

                $filename = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;
                Storage::disk('uploads')->put($filename,file_get_contents($realPath));

                $menu = Menu::find($request->get('menu_id'));
                if(!empty($menu['menu_pictrue'])){
                    $images = public_path('build/images/') . $menu['menu_pictrue'];
                    if (file_exists ($images )) {
                        unlink ($images);
                    }
                }
                $menu->menu_name = $request->get('menu_name');
                $menu->menu_description = $request->get('menu_description');
                $menu->menu_type= $request->get('sort_id');
                $menu->menu_price = $request->get('menu_price');
                $menu->menu_pictrue = $filename;
                $menu->save();

            }else{
                //return '不更新图片';
                $menu = Menu::find($request->get('menu_id'));
                $menu->menu_name = $request->get('menu_name');
                $menu->menu_description = $request->get('menu_description');
                $menu->menu_type = $request->get('sort_id');
                $menu->menu_price = $request->get('menu_price');
                $menu->save();
            }
            return Redirect::back();
        }
    }

    public function menuOrder(Request $request)
    {
        $sort = Menu::find($request->get('menu_id'));
        $sort->menu_order = $request->get('menu_order');
        $result = $sort->save();
        if($result){
            $data = ['status' =>0,'msg' =>'更新成功！',];
        }else{
            $data = [ 'status' =>1, 'msg' =>'更新失败！',];
        }
        return $data;
    }

    public function menuDelete($id)
    {
        $menu = Menu::find($id);
        if(!empty($menu['menu_pictrue'])){
            $images = public_path('build/images/') . $menu['menu_pictrue'];
            if (file_exists ($images )) {
                unlink ($images);
            }
        }
        $result = $menu->delete();
        if($result){
            $data = [ 'status' =>0,'msg' =>'删除成功！',];
        }else{
            $data = ['status' =>1,'msg' =>'删除失败！',];
        }
        return $data;
    }

}
