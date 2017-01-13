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
        //DB::table(A)leftJoin( B , A.id, = , B.aid )->where("")->select(A.*,B.某列)->get();
        $sorts = Sort::all();
        $menu = DB::table('menus')->join('sorts','menus.sorts_id','=','sorts.id')->select('sorts.title as bt','menus.*')->orderBy('menu_order','desc')->paginate(15);
        return view('admin.menu-list',compact('sorts','menu'));
    }

    public function menuInsert(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $file = $request->file('pictrue');
            if($file)
            {
                $originalName = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                $type = $file->getClientMimeType();
                $realPath = $file->getRealPath();

                $filename = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;
                Storage::disk('uploads')->put($filename,file_get_contents($realPath));

                Menu::create([
                    'title' => $request->get('title'),
                    'description' => $request->get('description'),
                    'sorts_id' => $request->get('sorts_id'),
                    'price' => $request->get('price'),
                    'pictrue' => $filename,
                ]);
            }
            return Redirect::back();
        }
    }

    public function menuUpdate(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $file = $request->file('pictrue');
            if($file)
            {
                // return '更新图片';
                $originalName = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                $type = $file->getClientMimeType();
                $realPath = $file->getRealPath();

                $filename = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;
                Storage::disk('uploads')->put($filename,file_get_contents($realPath));

                $menu = Menu::find($request->get('id'));
                if(!empty($menu['pictrue'])){
                    $images = public_path('build/images/') . $menu['pictrue'];
                    if (file_exists ($images )) {
                        unlink ($images);
                    }
                }
                $menu->title = $request->get('title');
                $menu->description = $request->get('description');
                $menu->sorts_id = $request->get('sorts_id');
                $menu->price = $request->get('price');
                $menu->pictrue = $filename;
                $menu->save();

            }else{
                //return '不更新图片';
                $menu = Menu::find($request->get('id'));
                $menu->title = $request->get('title');
                $menu->description = $request->get('description');
                $menu->sorts_id = $request->get('sorts_id');
                $menu->price = $request->get('price');
                $menu->save();
            }
            return Redirect::back();
        }
    }

    public function menuOrder(Request $request)
    {
        $sort = Menu::find($request->get('id'));
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
        if(!empty($menu['pictrue'])){
            $images = public_path('build/images/') . $menu['pictrue'];
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
