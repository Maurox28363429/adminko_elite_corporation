@extends("admin.admin_layout.default")
@section('breadcrumbs')
	<li class="breadcrumb-item"><a href="{{ route("admin.damas.index") }}">DAMAS</a></li>
    @if(isset($data->id))
        <li class="breadcrumb-item active">{{trans('admin/form.breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active">{{trans('admin/form.breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('page-title')
DAMAS
@endsection
@section('page-info')@endsection
@section('page-back-button'){{ route("admin.damas.index") }}@endsection
@section('page-content')
<div class="form-container content-width-medium damas-form-content js-ak-delete-container" data-delete-modal-action="{{route("admin.damas.delete")}}">
    <form method="POST" action="@isset($data->id){{route("admin.damas.update", $data->id)}}@else{{route("admin.damas.store")}}@endisset" enctype="multipart/form-data" class="form-page validate-form" novalidate>
        <div hidden>
            @isset($data->id) @method('PUT') @endisset
            @csrf
        </div>
        <div class="form-header">
            <h3>{{ isset($data->id) ? trans('admin/form.update') : trans('admin/form.add_new') }}</h3>
            <div class="form-delete-record">
                @can('damas_delete')
                    @if(isset($data->id))
                    <a href="#" data-id="{{$data->id}}" class="delete-link js-ak-delete-link" draggable="false">
                        @includeIf("admin/admin_layout/partials/misc/icons/delete_icon")
                    </a>
                    @endIf
                @endcan
            </div>
        </div>
        @includeIf("admin.admin_layout.partials.form.errors")
        <div class="form-content">
            
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="nombre_de_su_gineclogo">Nombre de su ginecólogo</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="nombre_de_su_gineclogo" autocomplete="off"
                                   name="nombre_de_su_gineclogo"  placeholder="Nombre de su ginec&oacute;logo"
                                   value="{{{ old('nombre_de_su_gineclogo', $data->nombre_de_su_gineclogo??'') }}}">
                            <div class="error-message @if ($errors->has('nombre_de_su_gineclogo')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="nombre_de_su_gineclogo_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="direccin_de_la_clnica">Dirección de la clínica</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="direccin_de_la_clnica" autocomplete="off"
                                   name="direccin_de_la_clnica"  placeholder="Direcci&oacute;n de la cl&iacute;nica"
                                   value="{{{ old('direccin_de_la_clnica', $data->direccin_de_la_clnica??'') }}}">
                            <div class="error-message @if ($errors->has('direccin_de_la_clnica')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="direccin_de_la_clnica_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="porque_asisti">Porque asistió?</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="porque_asisti" autocomplete="off"
                                   name="porque_asisti"  placeholder="Porque asisti&oacute;?"
                                   value="{{{ old('porque_asisti', $data->porque_asisti??'') }}}">
                            <div class="error-message @if ($errors->has('porque_asisti')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="porque_asisti_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-checkbox">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="se_ha_realizado_pap">Se ha realizado PAP?</label>
                        </div>
                        <div class="input-data">
                            <div class="checkbox-input form-switch">
                                <input type="hidden" name="se_ha_realizado_pap" value="0">
                                <input class="form-checkbox" type="checkbox" id="se_ha_realizado_pap" name="se_ha_realizado_pap" value="1"
                                       @if(old("se_ha_realizado_pap") || ((isset($data->se_ha_realizado_pap)&&$data->se_ha_realizado_pap==1))) checked @endif >
                                <label class="form-check-label" for="se_ha_realizado_pap"></label>
                            </div>
                            <div class="text-muted" id="se_ha_realizado_pap_help"></div>
                        </div>
                    </div>
                </div>
        </div>
        @includeIf("admin.admin_layout.partials.form.footer",["cancel_route"=>route("admin.damas.index")])
    </form>
</div>
@isset($data->id)
    @includeIf("admin.admin_layout.partials.delete_modal_confirm")
@endisset
@endsection