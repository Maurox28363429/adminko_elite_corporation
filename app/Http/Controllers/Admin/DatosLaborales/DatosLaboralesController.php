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
namespace App\Http\Controllers\Admin\DatosLaborales;
use App\Http\Controllers\Controller;
use App\Models\Admin\DatosLaborales\DatosLaborales;
use App\Requests\Admin\DatosLaborales\DatosLaboralesRequest;
use Illuminate\Support\Facades\Gate;
class DatosLaboralesController extends Controller
{   
    public array $menu = ["item" =>"datos_laborales", "folder" =>"formularios", "subfolder" =>""];

    public function index()
    {
        if (Gate::none(['datos_laborales_access'])) {
            abort(403);
        }
		$menu = $this->menu;

        $datos_laborales_list_all = DatosLaborales::startSearch(Request()->query("datos_laborales_search"))->orderByDesc("id")->get();
        return view("admin.datos_laborales.index")->with(compact('menu','datos_laborales_list_all'));
    }

    public function create()
    {
        if (Gate::none('datos_laborales_create')) {
            abort(403);
        }
        $menu = $this->menu;
        $data = new DatosLaborales();
        
        return view("admin.datos_laborales.form")->with(compact('menu','data'));
    }

    public function store(DatosLaboralesRequest $request)
    {
        if (Gate::none('datos_laborales_create')) {
            abort(403);
        }
        $requestAll = $request->all();
        $run = DatosLaborales::create($requestAll);
        

        return redirect(route("admin.datos_laborales.index"))->with("toast_success", trans('admin/misc.success_confirmation_created'));
    }

    public function show()
    {
        abort(404);
    }

    public function edit()
    {
        if (Gate::none('datos_laborales_edit')) {
            abort(403);
        }
        $menu = $this->menu;
        $data = DatosLaborales::findOrFail(request()->route()->datos_laborales_id);;
        
        return view("admin.datos_laborales.form")->with(compact('menu', 'data'));
    }

    public function update(DatosLaboralesRequest $request)
    {
        if (Gate::none('datos_laborales_edit')) {
            abort(403);
        }
        $requestAll = $request->all();
        $run = DatosLaborales::findOrFail(request()->route()->datos_laborales_id);
        $run->update($requestAll);
        return redirect(route("admin.datos_laborales.index"))->with("toast_success", trans('admin/misc.success_confirmation_updated'));
    }

    public function destroy()
    {
        if (Gate::none('datos_laborales_delete')) {
            abort(403);
        }
        DatosLaborales::destroy(Request()->delete_id);
        return redirect(route("admin.datos_laborales.index"))->with("toast_success", trans('admin/misc.success_confirmation_deleted'));
    }
    
}
