@extends("admin.admin_layout.default")
@section('breadcrumbs')
	<li class="breadcrumb-item"><a href="{{ route("admin.cuenta_bancaria_y_referen.index") }}">CUENTA BANCARIA Y REFERENCIAS</a></li>
    @if(isset($data->id))
        <li class="breadcrumb-item active">{{trans('admin/form.breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active">{{trans('admin/form.breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('page-title')
CUENTA BANCARIA Y REFERENCIAS
@endsection
@section('page-info')@endsection
@section('page-back-button'){{ route("admin.cuenta_bancaria_y_referen.index") }}@endsection
@section('page-content')
<div class="form-container content-width-medium cuenta-bancaria-y-referen-form-content js-ak-delete-container" data-delete-modal-action="{{route("admin.cuenta_bancaria_y_referen.delete")}}">
    <form method="POST" action="@isset($data->id){{route("admin.cuenta_bancaria_y_referen.update", $data->id)}}@else{{route("admin.cuenta_bancaria_y_referen.store")}}@endisset" enctype="multipart/form-data" class="form-page validate-form" novalidate>
        <div hidden>
            @isset($data->id) @method('PUT') @endisset
            @csrf
        </div>
        <div class="form-header">
            <h3>{{ isset($data->id) ? trans('admin/form.update') : trans('admin/form.add_new') }}</h3>
            <div class="form-delete-record">
                @can('cuenta_bancaria_y_referen_delete')
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
                            <label for="forma_de_pago">Forma de pago</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="forma_de_pago" autocomplete="off"
                                   name="forma_de_pago"  placeholder="Forma de pago"
                                   value="{{{ old('forma_de_pago', $data->forma_de_pago??'') }}}">
                            <div class="error-message @if ($errors->has('forma_de_pago')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="forma_de_pago_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="nombre_del_banco">Nombre del banco</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="nombre_del_banco" autocomplete="off"
                                   name="nombre_del_banco"  placeholder="Nombre del banco"
                                   value="{{{ old('nombre_del_banco', $data->nombre_del_banco??'') }}}">
                            <div class="error-message @if ($errors->has('nombre_del_banco')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="nombre_del_banco_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-number">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="nmero_de_cuenta_bancaria">Número de cuenta bancaria</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input js-ak-limit-poz-neg-numbers"
                                   id="nmero_de_cuenta_bancaria" name="nmero_de_cuenta_bancaria"  placeholder="N&uacute;mero de cuenta bancaria" autocomplete="off"
                                   value="{{{ old('nmero_de_cuenta_bancaria', $data->nmero_de_cuenta_bancaria??'') }}}">
                            <div class="error-message @if ($errors->has('nmero_de_cuenta_bancaria')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="nmero_de_cuenta_bancaria_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-file">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="adjuntar_confirmacion_de_su_cuenta">Adjuntar confirmacion de su cuenta</label>
                        </div>
                        <div class="input-data">
                            @if ($data->adjuntar_confirmacion_de_su_cuenta)
                                <div>
                                    <a href="{{ $data->adjuntar_confirmacion_de_su_cuenta }}" target="_blank" class="js-ak-adjuntar_confirmacion_de_su_cuenta-available">
                                        {{$data->adjuntar_confirmacion_de_su_cuenta}}
                                    </a>
                                </div>
                                <div>
                                    <label for="ak_adjuntar_confirmacion_de_su_cuenta_delete" class="checkbox-input">
                                        <input class="form-checkbox" type="checkbox" name="ak_adjuntar_confirmacion_de_su_cuenta_delete" id="ak_adjuntar_confirmacion_de_su_cuenta_delete" value="1">
                                        {{trans('admin/form.remove_file')}}
                                    </label>
                                </div>
                            @elseif(isset($data->adjuntar_confirmacion_de_su_cuenta) && $data->getRawOriginal("adjuntar_confirmacion_de_su_cuenta"))
                                <div class="alert-info-container">
                                    <div>'{{$data->getRawOriginal("adjuntar_confirmacion_de_su_cuenta")}}' {{trans('admin/form.file_location_error')}}</div>
                                </div>
                            @endif
                            <input type="file" class="form-file js-ak-file-upload" data-id="adjuntar_confirmacion_de_su_cuenta"   name="adjuntar_confirmacion_de_su_cuenta" >
                            <input type="hidden" name="ak_adjuntar_confirmacion_de_su_cuenta_current" value="{{$data->getRawOriginal("adjuntar_confirmacion_de_su_cuenta")??''}}">
                            <div class="error-message @if ($errors->has('adjuntar_confirmacion_de_su_cuenta')) show @endif" data-required="{{trans('admin/form.required_file')}}" data-size="{{trans('admin/form.required_size')}}" data-type="{{trans('admin/form.required_type')}}" data-size-type="{{trans('admin/form.invalid_size_or_type')}}">
                                @if ($errors->has('adjuntar_confirmacion_de_su_cuenta')){{ $errors->first('adjuntar_confirmacion_de_su_cuenta') }}@endif
                            </div>
                            <div class="text-muted" id="adjuntar_confirmacion_de_su_cuenta_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="referencia_personal_1">Referencia personal 1</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="referencia_personal_1" autocomplete="off"
                                   name="referencia_personal_1"  placeholder="Referencia personal 1"
                                   value="{{{ old('referencia_personal_1', $data->referencia_personal_1??'') }}}">
                            <div class="error-message @if ($errors->has('referencia_personal_1')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="referencia_personal_1_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="referencia_personal_2">Referencia personal 2</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="referencia_personal_2" autocomplete="off"
                                   name="referencia_personal_2"  placeholder="Referencia personal 2"
                                   value="{{{ old('referencia_personal_2', $data->referencia_personal_2??'') }}}">
                            <div class="error-message @if ($errors->has('referencia_personal_2')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="referencia_personal_2_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="referencia_personal_3">Referencia personal 3</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="referencia_personal_3" autocomplete="off"
                                   name="referencia_personal_3"  placeholder="Referencia personal 3"
                                   value="{{{ old('referencia_personal_3', $data->referencia_personal_3??'') }}}">
                            <div class="error-message @if ($errors->has('referencia_personal_3')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="referencia_personal_3_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="referencia_comercial">Referencia comercial</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="referencia_comercial" autocomplete="off"
                                   name="referencia_comercial"  placeholder="Referencia comercial"
                                   value="{{{ old('referencia_comercial', $data->referencia_comercial??'') }}}">
                            <div class="error-message @if ($errors->has('referencia_comercial')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="referencia_comercial_help"></div>
                        </div>
                    </div>
                </div>
        </div>
        @includeIf("admin.admin_layout.partials.form.footer",["cancel_route"=>route("admin.cuenta_bancaria_y_referen.index")])
    </form>
</div>
@isset($data->id)
    @includeIf("admin.admin_layout.partials.delete_modal_confirm")
@endisset
@endsection