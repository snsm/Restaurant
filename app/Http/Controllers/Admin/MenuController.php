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
        $sort= Sort::orderBy('sort','desc')->paginate(15);
        $result =(new Sort())->getSorts();
        return view('admin.menu-sort-list',compact('sort','result'));
    }

    public function sortInsert(Request $request){
        Sort::create([
            'title' => $request->get('title'),
        ]);
        return Redirect::back();
    }

    public function sortUpdate(Request $request)
    {
        $sort = Sort::find($request->get('id'));
        $sort->title = $request->get('title');
        $sort->save();
        return Redirect::back();
    }

    public function sortOrder(Request $request)
    {
        $sort = Sort::find($request->get('id'));
        $sort->sort = $request->get('sort');
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
}
