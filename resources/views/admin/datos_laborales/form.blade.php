@extends("admin.admin_layout.default")
@section('breadcrumbs')
	<li class="breadcrumb-item"><a href="{{ route("admin.datos_laborales.index") }}">DATOS LABORALES</a></li>
    @if(isset($data->id))
        <li class="breadcrumb-item active">{{trans('admin/form.breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active">{{trans('admin/form.breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('page-title')
DATOS LABORALES
@endsection
@section('page-info')@endsection
@section('page-back-button'){{ route("admin.datos_laborales.index") }}@endsection
@section('page-content')
<div class="form-container content-width-medium datos-laborales-form-content js-ak-delete-container" data-delete-modal-action="{{route("admin.datos_laborales.delete")}}">
    <form method="POST" action="@isset($data->id){{route("admin.datos_laborales.update", $data->id)}}@else{{route("admin.datos_laborales.store")}}@endisset" enctype="multipart/form-data" class="form-page validate-form" novalidate>
        <div hidden>
            @isset($data->id) @method('PUT') @endisset
            @csrf
        </div>
        <div class="form-header">
            <h3>{{ isset($data->id) ? trans('admin/form.update') : trans('admin/form.add_new') }}</h3>
            <div class="form-delete-record">
                @can('datos_laborales_delete')
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
                            <label for="nombre_de_la_empresa_donde_labora">Nombre de la empresa donde labora</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="nombre_de_la_empresa_donde_labora" autocomplete="off"
                                   name="nombre_de_la_empresa_donde_labora"  placeholder="Nombre de la empresa donde labora"
                                   value="{{{ old('nombre_de_la_empresa_donde_labora', $data->nombre_de_la_empresa_donde_labora??'') }}}">
                            <div class="error-message @if ($errors->has('nombre_de_la_empresa_donde_labora')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="nombre_de_la_empresa_donde_labora_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="direccin_de_la_empresa">Dirección de la empresa</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="direccin_de_la_empresa" autocomplete="off"
                                   name="direccin_de_la_empresa"  placeholder="Direcci&oacute;n de la empresa"
                                   value="{{{ old('direccin_de_la_empresa', $data->direccin_de_la_empresa??'') }}}">
                            <div class="error-message @if ($errors->has('direccin_de_la_empresa')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="direccin_de_la_empresa_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="antigedad_en_la_empresa_u_ocupacin">Antigüedad en la empresa u ocupación</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="antigedad_en_la_empresa_u_ocupacin" autocomplete="off"
                                   name="antigedad_en_la_empresa_u_ocupacin"  placeholder="Antig&uuml;edad en la empresa u ocupaci&oacute;n"
                                   value="{{{ old('antigedad_en_la_empresa_u_ocupacin', $data->antigedad_en_la_empresa_u_ocupacin??'') }}}">
                            <div class="error-message @if ($errors->has('antigedad_en_la_empresa_u_ocupacin')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="antigedad_en_la_empresa_u_ocupacin_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="cargo_dentro_de_la_empresa">Cargo dentro de la empresa</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="cargo_dentro_de_la_empresa" autocomplete="off"
                                   name="cargo_dentro_de_la_empresa"  placeholder="Cargo dentro de la empresa"
                                   value="{{{ old('cargo_dentro_de_la_empresa', $data->cargo_dentro_de_la_empresa??'') }}}">
                            <div class="error-message @if ($errors->has('cargo_dentro_de_la_empresa')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="cargo_dentro_de_la_empresa_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="ingreso_mensual">Ingreso mensual</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="ingreso_mensual" autocomplete="off"
                                   name="ingreso_mensual"  placeholder="Ingreso mensual"
                                   value="{{{ old('ingreso_mensual', $data->ingreso_mensual??'') }}}">
                            <div class="error-message @if ($errors->has('ingreso_mensual')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="ingreso_mensual_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="de_cuanto_es_su_patrimonio">De cuanto es su patrimonio?</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="de_cuanto_es_su_patrimonio" autocomplete="off"
                                   name="de_cuanto_es_su_patrimonio"  placeholder="De cuanto es su patrimonio?"
                                   value="{{{ old('de_cuanto_es_su_patrimonio', $data->de_cuanto_es_su_patrimonio??'') }}}">
                            <div class="error-message @if ($errors->has('de_cuanto_es_su_patrimonio')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="de_cuanto_es_su_patrimonio_help"></div>
                        </div>
                    </div>
                </div>
        </div>
        @includeIf("admin.admin_layout.partials.form.footer",["cancel_route"=>route("admin.datos_laborales.index")])
    </form>
</div>
@isset($data->id)
    @includeIf("admin.admin_layout.partials.delete_modal_confirm")
@endisset
@endsection