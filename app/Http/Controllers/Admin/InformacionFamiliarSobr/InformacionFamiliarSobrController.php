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
namespace App\Http\Controllers\Admin\InformacionFamiliarSobr;
use App\Http\Controllers\Controller;
use App\Models\Admin\InformacionFamiliarSobr\InformacionFamiliarSobr;
use App\Requests\Admin\InformacionFamiliarSobr\InformacionFamiliarSobrRequest;
use Illuminate\Support\Facades\Gate;
class InformacionFamiliarSobrController extends Controller
{   
    public array $menu = ["item" =>"informacion_familiar_sobr", "folder" =>"formularios", "subfolder" =>""];

    public function index()
    {
        if (Gate::none(['informacion_familiar_sobr_access'])) {
            abort(403);
        }
		$menu = $this->menu;

        $informacion_familiar_sobr_list_all = InformacionFamiliarSobr::startSearch(Request()->query("informacion_familiar_sobr_search"))->orderByDesc("id")->get();
        return view("admin.informacion_familiar_sobr.index")->with(compact('menu','informacion_familiar_sobr_list_all'));
    }

    public function create()
    {
        if (Gate::none('informacion_familiar_sobr_create')) {
            abort(403);
        }
        $menu = $this->menu;
        $data = new InformacionFamiliarSobr();
        
        return view("admin.informacion_familiar_sobr.form")->with(compact('menu','data'));
    }

    public function store(InformacionFamiliarSobrRequest $request)
    {
        if (Gate::none('informacion_familiar_sobr_create')) {
            abort(403);
        }
        $requestAll = $request->all();
        $run = InformacionFamiliarSobr::create($requestAll);
        

        return redirect(route("admin.informacion_familiar_sobr.index"))->with("toast_success", trans('admin/misc.success_confirmation_created'));
    }

    public function show()
    {
        abort(404);
    }

    public function edit()
    {
        if (Gate::none('informacion_familiar_sobr_edit')) {
            abort(403);
        }
        $menu = $this->menu;
        $data = InformacionFamiliarSobr::findOrFail(request()->route()->informacion_familiar_sobr_id);;
        
        return view("admin.informacion_familiar_sobr.form")->with(compact('menu', 'data'));
    }

    public function update(InformacionFamiliarSobrRequest $request)
    {
        if (Gate::none('informacion_familiar_sobr_edit')) {
            abort(403);
        }
        $requestAll = $request->all();
        $run = InformacionFamiliarSobr::findOrFail(request()->route()->informacion_familiar_sobr_id);
        $run->update($requestAll);
        return redirect(route("admin.informacion_familiar_sobr.index"))->with("toast_success", trans('admin/misc.success_confirmation_updated'));
    }

    public function destroy()
    {
        if (Gate::none('informacion_familiar_sobr_delete')) {
            abort(403);
        }
        InformacionFamiliarSobr::destroy(Request()->delete_id);
        return redirect(route("admin.informacion_familiar_sobr.index"))->with("toast_success", trans('admin/misc.success_confirmation_deleted'));
    }
    
}
