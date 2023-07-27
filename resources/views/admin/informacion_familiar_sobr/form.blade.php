@extends("admin.admin_layout.default")
@section('breadcrumbs')
	<li class="breadcrumb-item"><a href="{{ route("admin.informacion_familiar_sobr.index") }}">INFORMACION FAMILIAR, SOBRE SEGUROS Y CONDICIONES DE SALUD</a></li>
    @if(isset($data->id))
        <li class="breadcrumb-item active">{{trans('admin/form.breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active">{{trans('admin/form.breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('page-title')
INFORMACION FAMILIAR, SOBRE SEGUROS Y CONDICIONES DE SALUD
@endsection
@section('page-info')@endsection
@section('page-back-button'){{ route("admin.informacion_familiar_sobr.index") }}@endsection
@section('page-content')
<div class="form-container content-width-medium informacion-familiar-sobr-form-content js-ak-delete-container" data-delete-modal-action="{{route("admin.informacion_familiar_sobr.delete")}}">
    <form method="POST" action="@isset($data->id){{route("admin.informacion_familiar_sobr.update", $data->id)}}@else{{route("admin.informacion_familiar_sobr.store")}}@endisset" enctype="multipart/form-data" class="form-page validate-form" novalidate>
        <div hidden>
            @isset($data->id) @method('PUT') @endisset
            @csrf
        </div>
        <div class="form-header">
            <h3>{{ isset($data->id) ? trans('admin/form.update') : trans('admin/form.add_new') }}</h3>
            <div class="form-delete-record">
                @can('informacion_familiar_sobr_delete')
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
            
                <div class="row-100 el-box-checkbox">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="casoslegales">Ha tenido casos legales en algun momento ?</label>
                        </div>
                        <div class="input-data">
                            <div class="checkbox-input form-switch">
                                <input type="hidden" name="casoslegales" value="0">
                                <input class="form-checkbox" type="checkbox" id="casoslegales" name="casoslegales" value="1"
                                       @if(old("casoslegales") || ((isset($data->casoslegales)&&$data->casoslegales==1))) checked @endif >
                                <label class="form-check-label" for="casoslegales"></label>
                            </div>
                            <div class="text-muted" id="casoslegales_help">¿Incluyendo divorcios y/o robos?</div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-checkbox">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="le_han_rechazado_alguna_poliza">Le han rechazado alguna póliza?</label>
                        </div>
                        <div class="input-data">
                            <div class="checkbox-input form-switch">
                                <input type="hidden" name="le_han_rechazado_alguna_poliza" value="0">
                                <input class="form-checkbox" type="checkbox" id="le_han_rechazado_alguna_poliza" name="le_han_rechazado_alguna_poliza" value="1"
                                       @if(old("le_han_rechazado_alguna_poliza") || ((isset($data->le_han_rechazado_alguna_poliza)&&$data->le_han_rechazado_alguna_poliza==1))) checked @endif >
                                <label class="form-check-label" for="le_han_rechazado_alguna_poliza"></label>
                            </div>
                            <div class="text-muted" id="le_han_rechazado_alguna_poliza_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-checkbox">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="cambiar_1">Cambiar</label>
                        </div>
                        <div class="input-data">
                            <div class="checkbox-input form-switch">
                                <input type="hidden" name="cambiar_1" value="0">
                                <input class="form-checkbox" type="checkbox" id="cambiar_1" name="cambiar_1" value="1"
                                       @if(old("cambiar_1") || ((isset($data->cambiar_1)&&$data->cambiar_1==1))) checked @endif >
                                <label class="form-check-label" for="cambiar_1"></label>
                            </div>
                            <div class="text-muted" id="cambiar_1_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-checkbox">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="tiene_planes_de_viaje_cambiar">Tiene planes de viaje (cambiar)</label>
                        </div>
                        <div class="input-data">
                            <div class="checkbox-input form-switch">
                                <input type="hidden" name="tiene_planes_de_viaje_cambiar" value="0">
                                <input class="form-checkbox" type="checkbox" id="tiene_planes_de_viaje_cambiar" name="tiene_planes_de_viaje_cambiar" value="1"
                                       @if(old("tiene_planes_de_viaje_cambiar") || ((isset($data->tiene_planes_de_viaje_cambiar)&&$data->tiene_planes_de_viaje_cambiar==1))) checked @endif >
                                <label class="form-check-label" for="tiene_planes_de_viaje_cambiar"></label>
                            </div>
                            <div class="text-muted" id="tiene_planes_de_viaje_cambiar_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="de_ser_si_especifique">De ser si, especifique</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="de_ser_si_especifique" autocomplete="off"
                                   name="de_ser_si_especifique"  placeholder="De ser si, especifique"
                                   value="{{{ old('de_ser_si_especifique', $data->de_ser_si_especifique??'') }}}">
                            <div class="error-message @if ($errors->has('de_ser_si_especifique')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="de_ser_si_especifique_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-checkbox">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="alguna_vez_a_tenido_consulta_con_cambia">Alguna vez a tenido consulta con (cambia</label>
                        </div>
                        <div class="input-data">
                            <div class="checkbox-input form-switch">
                                <input type="hidden" name="alguna_vez_a_tenido_consulta_con_cambia" value="0">
                                <input class="form-checkbox" type="checkbox" id="alguna_vez_a_tenido_consulta_con_cambia" name="alguna_vez_a_tenido_consulta_con_cambia" value="1"
                                       @if(old("alguna_vez_a_tenido_consulta_con_cambia") || ((isset($data->alguna_vez_a_tenido_consulta_con_cambia)&&$data->alguna_vez_a_tenido_consulta_con_cambia==1))) checked @endif >
                                <label class="form-check-label" for="alguna_vez_a_tenido_consulta_con_cambia"></label>
                            </div>
                            <div class="text-muted" id="alguna_vez_a_tenido_consulta_con_cambia_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-number">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="cual_es_su_estatura">Cual es su estatura?</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input js-ak-limit-poz-neg-numbers"
                                   id="cual_es_su_estatura" name="cual_es_su_estatura"  placeholder="Cual es su estatura?" autocomplete="off"
                                   value="{{{ old('cual_es_su_estatura', $data->cual_es_su_estatura??'') }}}">
                            <div class="error-message @if ($errors->has('cual_es_su_estatura')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="cual_es_su_estatura_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-number">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="cual_es_su_peso">Cual es su peso?</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input js-ak-limit-poz-neg-numbers"
                                   id="cual_es_su_peso" name="cual_es_su_peso"  placeholder="Cual es su peso?" autocomplete="off"
                                   value="{{{ old('cual_es_su_peso', $data->cual_es_su_peso??'') }}}">
                            <div class="error-message @if ($errors->has('cual_es_su_peso')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="cual_es_su_peso_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-number">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="edad_de_su_madre">Edad de su madre?</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input js-ak-limit-poz-neg-numbers"
                                   id="edad_de_su_madre" name="edad_de_su_madre"  placeholder="Edad de su madre?" autocomplete="off"
                                   value="{{{ old('edad_de_su_madre', $data->edad_de_su_madre??'') }}}">
                            <div class="error-message @if ($errors->has('edad_de_su_madre')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="edad_de_su_madre_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-number">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="edad_de_su_padre">Edad de su padre?</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input js-ak-limit-poz-neg-numbers"
                                   id="edad_de_su_padre" name="edad_de_su_padre"  placeholder="Edad de su padre?" autocomplete="off"
                                   value="{{{ old('edad_de_su_padre', $data->edad_de_su_padre??'') }}}">
                            <div class="error-message @if ($errors->has('edad_de_su_padre')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="edad_de_su_padre_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="si_fallecieron_indique_la_cambiar">Si fallecieron indique la (cambiar)</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="si_fallecieron_indique_la_cambiar" autocomplete="off"
                                   name="si_fallecieron_indique_la_cambiar"  placeholder="Si fallecieron indique la (cambiar)"
                                   value="{{{ old('si_fallecieron_indique_la_cambiar', $data->si_fallecieron_indique_la_cambiar??'') }}}">
                            <div class="error-message @if ($errors->has('si_fallecieron_indique_la_cambiar')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="si_fallecieron_indique_la_cambiar_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-number">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="cuantos_hermanos_y_hermanas_tiene">Cuantos hermanos y hermanas tiene?</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input js-ak-limit-poz-neg-numbers"
                                   id="cuantos_hermanos_y_hermanas_tiene" name="cuantos_hermanos_y_hermanas_tiene"  placeholder="Cuantos hermanos y hermanas tiene?" autocomplete="off"
                                   value="{{{ old('cuantos_hermanos_y_hermanas_tiene', $data->cuantos_hermanos_y_hermanas_tiene??'') }}}">
                            <div class="error-message @if ($errors->has('cuantos_hermanos_y_hermanas_tiene')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="cuantos_hermanos_y_hermanas_tiene_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="edad_actual">Edad actual?</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="edad_actual" autocomplete="off"
                                   name="edad_actual"  placeholder="Edad actual?"
                                   value="{{{ old('edad_actual', $data->edad_actual??'') }}}">
                            <div class="error-message @if ($errors->has('edad_actual')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="edad_actual_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="si_fallecieron_indique_la_edad_y_cambia">Si fallecieron indique la edad y (cambia</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="si_fallecieron_indique_la_edad_y_cambia" autocomplete="off"
                                   name="si_fallecieron_indique_la_edad_y_cambia"  placeholder="Si fallecieron indique la edad y (cambia"
                                   value="{{{ old('si_fallecieron_indique_la_edad_y_cambia', $data->si_fallecieron_indique_la_edad_y_cambia??'') }}}">
                            <div class="error-message @if ($errors->has('si_fallecieron_indique_la_edad_y_cambia')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="si_fallecieron_indique_la_edad_y_cambia_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-checkbox">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="tiene_mdico_de_cabecera">Tiene médico de cabecera?</label>
                        </div>
                        <div class="input-data">
                            <div class="checkbox-input form-switch">
                                <input type="hidden" name="tiene_mdico_de_cabecera" value="0">
                                <input class="form-checkbox" type="checkbox" id="tiene_mdico_de_cabecera" name="tiene_mdico_de_cabecera" value="1"
                                       @if(old("tiene_mdico_de_cabecera") || ((isset($data->tiene_mdico_de_cabecera)&&$data->tiene_mdico_de_cabecera==1))) checked @endif >
                                <label class="form-check-label" for="tiene_mdico_de_cabecera"></label>
                            </div>
                            <div class="text-muted" id="tiene_mdico_de_cabecera_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="brindenos_su_nombre_telfono_cambiar">Brindenos su nombre, teléfono (cambiar)</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="brindenos_su_nombre_telfono_cambiar" autocomplete="off"
                                   name="brindenos_su_nombre_telfono_cambiar"  placeholder="Brindenos su nombre, tel&eacute;fono (cambiar)"
                                   value="{{{ old('brindenos_su_nombre_telfono_cambiar', $data->brindenos_su_nombre_telfono_cambiar??'') }}}">
                            <div class="error-message @if ($errors->has('brindenos_su_nombre_telfono_cambiar')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="brindenos_su_nombre_telfono_cambiar_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-checkbox">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="tiene_cicatrices">Tiene cicatrices?</label>
                        </div>
                        <div class="input-data">
                            <div class="checkbox-input form-switch">
                                <input type="hidden" name="tiene_cicatrices" value="0">
                                <input class="form-checkbox" type="checkbox" id="tiene_cicatrices" name="tiene_cicatrices" value="1"
                                       @if(old("tiene_cicatrices") || ((isset($data->tiene_cicatrices)&&$data->tiene_cicatrices==1))) checked @endif >
                                <label class="form-check-label" for="tiene_cicatrices"></label>
                            </div>
                            <div class="text-muted" id="tiene_cicatrices_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="indicar_dnde_y_cmo_fue_provocada">Indicar dónde y cómo fue provocada</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="indicar_dnde_y_cmo_fue_provocada" autocomplete="off"
                                   name="indicar_dnde_y_cmo_fue_provocada"  placeholder="Indicar d&oacute;nde y c&oacute;mo fue provocada"
                                   value="{{{ old('indicar_dnde_y_cmo_fue_provocada', $data->indicar_dnde_y_cmo_fue_provocada??'') }}}">
                            <div class="error-message @if ($errors->has('indicar_dnde_y_cmo_fue_provocada')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="indicar_dnde_y_cmo_fue_provocada_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-checkbox">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="tiene_alguna_condicin_de_salud">Tiene alguna condición de salud?</label>
                        </div>
                        <div class="input-data">
                            <div class="checkbox-input form-switch">
                                <input type="hidden" name="tiene_alguna_condicin_de_salud" value="0">
                                <input class="form-checkbox" type="checkbox" id="tiene_alguna_condicin_de_salud" name="tiene_alguna_condicin_de_salud" value="1"
                                       @if(old("tiene_alguna_condicin_de_salud") || ((isset($data->tiene_alguna_condicin_de_salud)&&$data->tiene_alguna_condicin_de_salud==1))) checked @endif >
                                <label class="form-check-label" for="tiene_alguna_condicin_de_salud"></label>
                            </div>
                            <div class="text-muted" id="tiene_alguna_condicin_de_salud_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="explique">Explique</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="explique" autocomplete="off"
                                   name="explique"  placeholder="Explique"
                                   value="{{{ old('explique', $data->explique??'') }}}">
                            <div class="error-message @if ($errors->has('explique')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="explique_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-checkbox">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="ha_tenido_operaciones">Ha tenido operaciones?</label>
                        </div>
                        <div class="input-data">
                            <div class="checkbox-input form-switch">
                                <input type="hidden" name="ha_tenido_operaciones" value="0">
                                <input class="form-checkbox" type="checkbox" id="ha_tenido_operaciones" name="ha_tenido_operaciones" value="1"
                                       @if(old("ha_tenido_operaciones") || ((isset($data->ha_tenido_operaciones)&&$data->ha_tenido_operaciones==1))) checked @endif >
                                <label class="form-check-label" for="ha_tenido_operaciones"></label>
                            </div>
                            <div class="text-muted" id="ha_tenido_operaciones_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="explique_1">Explique</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="explique_1" autocomplete="off"
                                   name="explique_1"  placeholder="Explique"
                                   value="{{{ old('explique_1', $data->explique_1??'') }}}">
                            <div class="error-message @if ($errors->has('explique_1')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="explique_1_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-checkbox">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="ha_sido_positivo_covid">Ha sido positivo covid?</label>
                        </div>
                        <div class="input-data">
                            <div class="checkbox-input form-switch">
                                <input type="hidden" name="ha_sido_positivo_covid" value="0">
                                <input class="form-checkbox" type="checkbox" id="ha_sido_positivo_covid" name="ha_sido_positivo_covid" value="1"
                                       @if(old("ha_sido_positivo_covid") || ((isset($data->ha_sido_positivo_covid)&&$data->ha_sido_positivo_covid==1))) checked @endif >
                                <label class="form-check-label" for="ha_sido_positivo_covid"></label>
                            </div>
                            <div class="text-muted" id="ha_sido_positivo_covid_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="indique_fecha_y_sntomas">Indique fecha y síntomas</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="indique_fecha_y_sntomas" autocomplete="off"
                                   name="indique_fecha_y_sntomas"  placeholder="Indique fecha y s&iacute;ntomas"
                                   value="{{{ old('indique_fecha_y_sntomas', $data->indique_fecha_y_sntomas??'') }}}">
                            <div class="error-message @if ($errors->has('indique_fecha_y_sntomas')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="indique_fecha_y_sntomas_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-checkbox">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="se_ha_vacunado_contra_el_covid">Se ha vacunado contra el covid?</label>
                        </div>
                        <div class="input-data">
                            <div class="checkbox-input form-switch">
                                <input type="hidden" name="se_ha_vacunado_contra_el_covid" value="0">
                                <input class="form-checkbox" type="checkbox" id="se_ha_vacunado_contra_el_covid" name="se_ha_vacunado_contra_el_covid" value="1"
                                       @if(old("se_ha_vacunado_contra_el_covid") || ((isset($data->se_ha_vacunado_contra_el_covid)&&$data->se_ha_vacunado_contra_el_covid==1))) checked @endif >
                                <label class="form-check-label" for="se_ha_vacunado_contra_el_covid"></label>
                            </div>
                            <div class="text-muted" id="se_ha_vacunado_contra_el_covid_help"></div>
                        </div>
                    </div>
                </div>
                <div class="row-100 el-box-text">
                    <div class="input-container">
                        <div class="input-label">
                            <label for="indique_fecha_y_tipo_de_vacuna">Indique fecha y tipo de vacuna</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="indique_fecha_y_tipo_de_vacuna" autocomplete="off"
                                   name="indique_fecha_y_tipo_de_vacuna"  placeholder="Indique fecha y tipo de vacuna"
                                   value="{{{ old('indique_fecha_y_tipo_de_vacuna', $data->indique_fecha_y_tipo_de_vacuna??'') }}}">
                            <div class="error-message @if ($errors->has('indique_fecha_y_tipo_de_vacuna')) show @endif">{{trans('admin/form.required_text')}}</div>
                            <div class="text-muted" id="indique_fecha_y_tipo_de_vacuna_help"></div>
                        </div>
                    </div>
                </div>
        </div>
        @includeIf("admin.admin_layout.partials.form.footer",["cancel_route"=>route("admin.informacion_familiar_sobr.index")])
    </form>
</div>
@isset($data->id)
    @includeIf("admin.admin_layout.partials.delete_modal_confirm")
@endisset
@endsection