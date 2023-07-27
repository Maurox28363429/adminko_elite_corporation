<?php
/**
* @author Admiko
* @copyright Copyright (c) Admiko
* @link https://admiko.com
* @Help We are committed to delivering the best code quality and user experience. If you have suggestions or find any issues, please don't hesitate to contact us. Thank you.
* This file is managed by Admiko and is not recommended to be modified.
* Any custom code should be added elsewhere to avoid losing changes during updates.
* However, in case your code is overwritten, you can always restore it from a backup folder.
*/
namespace App\Http\Controllers\Admin\Damas;
use App\Http\Controllers\Controller;
use App\Models\Admin\Damas\Damas;
use App\Requests\Admin\Damas\DamasRequest;
use Illuminate\Support\Facades\Gate;
class DamasController extends Controller
{   
    public array $menu = ["item" =>"damas", "folder" =>"formularios", "subfolder" =>""];

    public function index()
    {
        if (Gate::none(['damas_access'])) {
            abort(403);
        }
		$menu = $this->menu;

        $damas_list_all = Damas::startSearch(Request()->query("damas_search"))->orderByDesc("id")->get();
        return view("admin.damas.index")->with(compact('menu','damas_list_all'));
    }

    public function create()
    {
        if (Gate::none('damas_create')) {
            abort(403);
        }
        $menu = $this->menu;
        $data = new Damas();
        
        return view("admin.damas.form")->with(compact('menu','data'));
    }

    public function store(DamasRequest $request)
    {
        if (Gate::none('damas_create')) {
            abort(403);
        }
        $requestAll = $request->all();
        $run = Damas::create($requestAll);
        

        return redirect(route("admin.damas.index"))->with("toast_success", trans('admin/misc.success_confirmation_created'));
    }

    public function show()
    {
        abort(404);
    }

    public function edit()
    {
        if (Gate::none('damas_edit')) {
            abort(403);
        }
        $menu = $this->menu;
        $data = Damas::findOrFail(request()->route()->damas_id);;
        
        return view("admin.damas.form")->with(compact('menu', 'data'));
    }

    public function update(DamasRequest $request)
    {
        if (Gate::none('damas_edit')) {
            abort(403);
        }
        $requestAll = $request->all();
        $run = Damas::findOrFail(request()->route()->damas_id);
        $run->update($requestAll);
        return redirect(route("admin.damas.index"))->with("toast_success", trans('admin/misc.success_confirmation_updated'));
    }

    public function destroy()
    {
        if (Gate::none('damas_delete')) {
            abort(403);
        }
        Damas::destroy(Request()->delete_id);
        return redirect(route("admin.damas.index"))->with("toast_success", trans('admin/misc.success_confirmation_deleted'));
    }
    
}
