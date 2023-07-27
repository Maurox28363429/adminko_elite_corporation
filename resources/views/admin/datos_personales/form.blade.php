@extends("admin.admin_layout.default")
@section('breadcrumbs')
	<li class="breadcrumb-item"><a href="{{ route("admin.datos_personales.index") }}">DATOS PERSONALES</a></li>
    @if(isset($data->id))
        <li class="breadcrumb-item active">{{trans('admin/form.breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active">{{trans('admin/form.breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('page-title')
DATOS PERSONALES
@endsection
@section('page-info')@endsection
@section('page-back-button'){{ route("admin.datos_personales.index") }}@endsection
@section('page-content')
<div class="form-container content-width-medium datos-personales-form-content js-ak-delete-container" data-delete-modal-action="{{route("admin.datos_personales.delete")}}">
    <form method="POST" action="@isset($data->id){{route("admin.datos_personales.update", $data->id)}}@else{{route("admin.datos_personales.store")}}@endisset" enctype="multipart/form-data" class="form-page validate-form" novalidate>
        <div hidden>
            @isset($data->id) @method('PUT') @endisset
            @csrf
        </div>
        <div class="form-header">
            <h3>{{ isset($data->id) ? trans('admin/form.update') : trans('admin/form.add_new') }}</h3>
            <div class="form-delete-record">
                @can('datos_personales_delete')
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
                            <label for="direccin_residencial">Dirección Residencial</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="direccin_residencial" autocomplete="off"
                                   name="direccin_residencial"  placeholder="Direcci&oacute;n Residencial"
                                   value="{{{ old('direccin_residencial', $data->direccin_residencial??'') }}}">
                            <div class="error-message @if ($errors->has('direccin_residencial')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="direccin_residencial_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-checkbox">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="consume_tabaco">Consume Tabaco</label>
                        </div>
                        <div class="input-data">
                            <div class="checkbox-input form-switch">
                                <input type="hidden" name="consume_tabaco" value="0">
                                <input class="form-checkbox" type="checkbox" id="consume_tabaco" name="consume_tabaco" value="1"
                                       @if(old("consume_tabaco") || ((isset($data->consume_tabaco)&&$data->consume_tabaco==1))) checked @endif >
                                <label class="form-check-label" for="consume_tabaco"></label>
                            </div>
                            <div class="text-muted" id="consume_tabaco_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-number">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="telfono_residencial">Teléfono Residencial</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input js-ak-limit-poz-neg-numbers"
                                   id="telfono_residencial" name="telfono_residencial"  placeholder="Tel&eacute;fono Residencial" autocomplete="off"
                                   value="{{{ old('telfono_residencial', $data->telfono_residencial??'') }}}">
                            <div class="error-message @if ($errors->has('telfono_residencial')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="telfono_residencial_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-email">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="correo_electrnico">Correo electrónico</label>
                        </div>
                        <div class="input-data">
                            <input type="email" autocomplete="off" class="form-input" id="correo_electrnico" name="correo_electrnico" 
                                   placeholder="Correo electr&oacute;nico"  value="{{{ old('correo_electrnico', $data->correo_electrnico??'') }}}">
                            <div class="error-message @if ($errors->has('correo_electrnico')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="correo_electrnico_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-textarea">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="cambiar">Cambiar</label>
                        </div>
                        <div class="input-data">
                            <textarea class="form-input form-textarea js-ak-tiny-mce-simple-text-editor" id="cambiar" data-height="250" style="height:250px" name="cambiar"  placeholder="Cambiar">{{{ old('cambiar', $data->cambiar??'') }}}</textarea>
                            <div class="error-message @if ($errors->has('cambiar')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="cambiar_help"></div>
                        </div>
                    </div>
                </div>
        </div>
        @includeIf("admin.admin_layout.partials.form.footer",["cancel_route"=>route("admin.datos_personales.index")])
    </form>
</div>
@isset($data->id)
    @includeIf("admin.admin_layout.partials.delete_modal_confirm")
@endisset
@endsection