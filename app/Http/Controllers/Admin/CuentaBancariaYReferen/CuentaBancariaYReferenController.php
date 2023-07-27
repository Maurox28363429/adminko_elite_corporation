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
namespace App\Http\Controllers\Admin\CuentaBancariaYReferen;
use App\Http\Controllers\Controller;
use App\Models\Admin\CuentaBancariaYReferen\CuentaBancariaYReferen;
use App\Requests\Admin\CuentaBancariaYReferen\CuentaBancariaYReferenRequest;
use Illuminate\Support\Facades\Gate;
class CuentaBancariaYReferenController extends Controller
{   
    public array $menu = ["item" =>"cuenta_bancaria_y_referen", "folder" =>"formularios", "subfolder" =>""];

    public function index()
    {
        if (Gate::none(['cuenta_bancaria_y_referen_access'])) {
            abort(403);
        }
		$menu = $this->menu;

        $cuenta_bancaria_y_referen_list_all = CuentaBancariaYReferen::startSearch(Request()->query("cuenta_bancaria_y_referen_search"))->orderByDesc("id")->get();
        return view("admin.cuenta_bancaria_y_referen.index")->with(compact('menu','cuenta_bancaria_y_referen_list_all'));
    }

    public function create()
    {
        if (Gate::none('cuenta_bancaria_y_referen_create')) {
            abort(403);
        }
        $menu = $this->menu;
        $data = new CuentaBancariaYReferen();
        
        return view("admin.cuenta_bancaria_y_referen.form")->with(compact('menu','data'));
    }

    public function store(CuentaBancariaYReferenRequest $request)
    {
        if (Gate::none('cuenta_bancaria_y_referen_create')) {
            abort(403);
        }
        $requestAll = $request->all();
        $run = CuentaBancariaYReferen::create($requestAll);
        

        return redirect(route("admin.cuenta_bancaria_y_referen.index"))->with("toast_success", trans('admin/misc.success_confirmation_created'));
    }

    public function show()
    {
        abort(404);
    }

    public function edit()
    {
        if (Gate::none('cuenta_bancaria_y_referen_edit')) {
            abort(403);
        }
        $menu = $this->menu;
        $data = CuentaBancariaYReferen::findOrFail(request()->route()->cuenta_bancaria_y_referen_id);;
        
        return view("admin.cuenta_bancaria_y_referen.form")->with(compact('menu', 'data'));
    }

    public function update(CuentaBancariaYReferenRequest $request)
    {
        if (Gate::none('cuenta_bancaria_y_referen_edit')) {
            abort(403);
        }
        $requestAll = $request->all();
        $run = CuentaBancariaYReferen::findOrFail(request()->route()->cuenta_bancaria_y_referen_id);
        $run->update($requestAll);
        return redirect(route("admin.cuenta_bancaria_y_referen.index"))->with("toast_success", trans('admin/misc.success_confirmation_updated'));
    }

    public function destroy()
    {
        if (Gate::none('cuenta_bancaria_y_referen_delete')) {
            abort(403);
        }
        CuentaBancariaYReferen::destroy(Request()->delete_id);
        return redirect(route("admin.cuenta_bancaria_y_referen.index"))->with("toast_success", trans('admin/misc.success_confirmation_deleted'));
    }
    
}
