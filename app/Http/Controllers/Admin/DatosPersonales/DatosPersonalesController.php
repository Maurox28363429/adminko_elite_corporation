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
namespace App\Http\Controllers\Admin\DatosPersonales;
use App\Http\Controllers\Controller;
use App\Models\Admin\DatosPersonales\DatosPersonales;
use App\Requests\Admin\DatosPersonales\DatosPersonalesRequest;
use Illuminate\Support\Facades\Gate;
class DatosPersonalesController extends Controller
{   
    public array $menu = ["item" =>"datos_personales", "folder" =>"formularios", "subfolder" =>""];

    public function index()
    {
        if (Gate::none(['datos_personales_access'])) {
            abort(403);
        }
		$menu = $this->menu;

        $datos_personales_list_all = DatosPersonales::startSearch(Request()->query("datos_personales_search"))->orderByDesc("id")->get();
        return view("admin.datos_personales.index")->with(compact('menu','datos_personales_list_all'));
    }

    public function create()
    {
        if (Gate::none('datos_personales_create')) {
            abort(403);
        }
        $menu = $this->menu;
        $data = new DatosPersonales();
        
        return view("admin.datos_personales.form")->with(compact('menu','data'));
    }

    public function store(DatosPersonalesRequest $request)
    {
        if (Gate::none('datos_personales_create')) {
            abort(403);
        }
        $requestAll = $request->all();
        $run = DatosPersonales::create($requestAll);
        

        return redirect(route("admin.datos_personales.index"))->with("toast_success", trans('admin/misc.success_confirmation_created'));
    }

    public function show()
    {
        abort(404);
    }

    public function edit()
    {
        if (Gate::none('datos_personales_edit')) {
            abort(403);
        }
        $menu = $this->menu;
        $data = DatosPersonales::findOrFail(request()->route()->datos_personales_id);;
        
        return view("admin.datos_personales.form")->with(compact('menu', 'data'));
    }

    public function update(DatosPersonalesRequest $request)
    {
        if (Gate::none('datos_personales_edit')) {
            abort(403);
        }
        $requestAll = $request->all();
        $run = DatosPersonales::findOrFail(request()->route()->datos_personales_id);
        $run->update($requestAll);
        return redirect(route("admin.datos_personales.index"))->with("toast_success", trans('admin/misc.success_confirmation_updated'));
    }

    public function destroy()
    {
        if (Gate::none('datos_personales_delete')) {
            abort(403);
        }
        DatosPersonales::destroy(Request()->delete_id);
        return redirect(route("admin.datos_personales.index"))->with("toast_success", trans('admin/misc.success_confirmation_deleted'));
    }
    
}
