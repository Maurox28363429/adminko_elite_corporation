@extends("admin.admin_layout.default")
@section('breadcrumbs')
<li class="breadcrumb-item active">INFORMACION FAMILIAR, SOBRE SEGUROS Y CONDICIONES DE SALUD</li>
@endsection
@section('page-title')
INFORMACION FAMILIAR, SOBRE SEGUROS Y CONDICIONES DE SALUD
@endsection
@section('page-info')@endsection
@section('page-back-button')@endsection
@section('page-content')

	@can("informacion_familiar_sobr_access")
    <div class="content-layout content-width-full informacion-familiar-sobr-data-content js-ak-DataTable js-ak-delete-container js-ak-content-layout"
        data-id="informacion_familiar_sobr"
        data-delete-modal-action="{{route("admin.informacion_familiar_sobr.delete")}}">
        <div class="content-element">
            <div class="content-header">
                <div class="header">
                    <h3></h3>
                    <p class="info"></p>
                </div>
                <div class="action">
                    <div class="left">
                        <form class="search-container" ><input name="informacion_familiar_sobr_source" value="informacion_familiar_sobr" type="hidden"/><input name="informacion_familiar_sobr_length" value="{{Request()->query("informacion_familiar_sobr_length")}}" type="hidden"/>
                            <div class="search">
                                <input type="text" autocomplete="off" placeholder="{{trans('admin/table.search')}}" name="informacion_familiar_sobr_search" value="{{(Request()->query("informacion_familiar_sobr_source") == "informacion_familiar_sobr")?Request()->query("informacion_familiar_sobr_search")??"":""}}" class="form-input js-ak-search-input">
                                <button class="search-button" draggable="false">
                                    @includeIf("admin/admin_layout/partials/misc/icons/search_icon")
                                </button>
                                @if(Request()->query("informacion_familiar_sobr_source") == "informacion_familiar_sobr" && Request()->query("informacion_familiar_sobr_search"))
                                    <div class="reset-search js-ak-reset-search">
                                        @includeIf("admin/admin_layout/partials/misc/icons/reset_search_icon")
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="right">
                        @canany('informacion_familiar_sobr_create')
                        <a href="{{route('admin.informacion_familiar_sobr.create')}}" class="button primary-button add-new" draggable="false">
                            @includeIf("admin/admin_layout/partials/misc/icons/add_new_icon")
                            {{trans('admin/table.add_new')}}
                        </a>
                        @endcanany
                    </div>
                </div>
            </div>
            <div class="content table-content">
                <table class="table js-ak-content" data-dom="ltrip">
                <thead>
                    <tr data-sort-method='thead'>
						<th class="table-id" data-sort-method="number">ID</th>
						<th class="center-text" data-sort-method="number">Ha tenido casos legales en algun momento ?</th>
						<th class="center-text" data-sort-method="number">Le han rechazado alguna póliza?</th>
						<th class="center-text table-col-hide-sm" data-sort-method="number">Cambiar</th>
						<th class="center-text table-col-hide-sm" data-sort-method="number">Tiene planes de viaje (cambiar)</th>
						<th class=" table-col-hide-sm">De ser si, especifique</th>
						<th class="center-text table-col-hide-sm" data-sort-method="number">Alguna vez a tenido consulta con (cambia</th>
						<th class="table-col-hide-sm">Cual es su estatura?</th>
						<th class="table-col-hide-sm">Cual es su peso?</th>
						<th class="table-col-hide-sm">Edad de su madre?</th>
						<th class="table-col-hide-sm">Edad de su padre?</th>
						<th class=" table-col-hide-sm">Si fallecieron indique la (cambiar)</th>
						<th class="table-col-hide-sm">Cuantos hermanos y hermanas tiene?</th>
						<th class=" table-col-hide-sm">Edad actual?</th>
						<th class=" table-col-hide-sm">Si fallecieron indique la edad y (cambia</th>
						<th class="center-text table-col-hide-sm" data-sort-method="number">Tiene médico de cabecera?</th>
						<th class=" table-col-hide-sm">Brindenos su nombre, teléfono (cambiar)</th>
						<th class="center-text table-col-hide-sm" data-sort-method="number">Tiene cicatrices?</th>
						<th class=" table-col-hide-sm">Indicar dónde y cómo fue provocada</th>
						<th class="center-text table-col-hide-sm" data-sort-method="number">Tiene alguna condición de salud?</th>
						<th class=" table-col-hide-sm">Explique</th>
						<th class="center-text table-col-hide-sm" data-sort-method="number">Ha tenido operaciones?</th>
						<th class=" table-col-hide-sm">Explique</th>
						<th class="center-text table-col-hide-sm" data-sort-method="number">Ha sido positivo covid?</th>
						<th class=" table-col-hide-sm">Indique fecha y síntomas</th>
						<th class="center-text table-col-hide-sm" data-sort-method="number">Se ha vacunado contra el covid?</th>
						<th class=" table-col-hide-sm">Indique fecha y tipo de vacuna</th>
						<th class="center-text table-col-hide-sm">Created at</th>
						<th class="center-text table-col-hide-sm">Updated at</th>
                        @canany(['informacion_familiar_sobr_edit','informacion_familiar_sobr_delete'])
                        <th class="no-sort manage-th" data-orderable="false">
                            <div class="manage-links">
                                
                            </div>
                        </th>
                        @endcanany
                    </tr>
                </thead>
                <tbody class="">
                @forelse($informacion_familiar_sobr_list_all as $data)
                    <tr>
						<td>
							{{$data->id}}
						</td>
						<td class="center-text">
							<span class="checkbox-status {{$data->casoslegales == 1?"bg-success":""}}"></span>
						</td>
						<td class="center-text">
							<span class="checkbox-status {{$data->le_han_rechazado_alguna_poliza == 1?"bg-success":""}}"></span>
						</td>
						<td class="center-text table-col-hide-sm">
							<span class="checkbox-status {{$data->cambiar_1 == 1?"bg-success":""}}"></span>
						</td>
						<td class="center-text table-col-hide-sm">
							<span class="checkbox-status {{$data->tiene_planes_de_viaje_cambiar == 1?"bg-success":""}}"></span>
						</td>
						<td class=" table-col-hide-sm">
							{{$data->de_ser_si_especifique}}
						</td>
						<td class="center-text table-col-hide-sm">
							<span class="checkbox-status {{$data->alguna_vez_a_tenido_consulta_con_cambia == 1?"bg-success":""}}"></span>
						</td>
						<td class="table-col-hide-sm">
							@if ($data->cual_es_su_estatura!=null){{$data->cual_es_su_estatura}} @endIf
						</td>
						<td class="table-col-hide-sm">
							@if ($data->cual_es_su_peso!=null){{$data->cual_es_su_peso}} @endIf
						</td>
						<td class="table-col-hide-sm">
							@if ($data->edad_de_su_madre!=null){{$data->edad_de_su_madre}} @endIf
						</td>
						<td class="table-col-hide-sm">
							@if ($data->edad_de_su_padre!=null){{$data->edad_de_su_padre}} @endIf
						</td>
						<td class=" table-col-hide-sm">
							{{$data->si_fallecieron_indique_la_cambiar}}
						</td>
						<td class="table-col-hide-sm">
							@if ($data->cuantos_hermanos_y_hermanas_tiene!=null){{$data->cuantos_hermanos_y_hermanas_tiene}} @endIf
						</td>
						<td class=" table-col-hide-sm">
							{{$data->edad_actual}}
						</td>
						<td class=" table-col-hide-sm">
							{{$data->si_fallecieron_indique_la_edad_y_cambia}}
						</td>
						<td class="center-text table-col-hide-sm">
							<span class="checkbox-status {{$data->tiene_mdico_de_cabecera == 1?"bg-success":""}}"></span>
						</td>
						<td class=" table-col-hide-sm">
							{{$data->brindenos_su_nombre_telfono_cambiar}}
						</td>
						<td class="center-text table-col-hide-sm">
							<span class="checkbox-status {{$data->tiene_cicatrices == 1?"bg-success":""}}"></span>
						</td>
						<td class=" table-col-hide-sm">
							{{$data->indicar_dnde_y_cmo_fue_provocada}}
						</td>
						<td class="center-text table-col-hide-sm">
							<span class="checkbox-status {{$data->tiene_alguna_condicin_de_salud == 1?"bg-success":""}}"></span>
						</td>
						<td class=" table-col-hide-sm">
							{{$data->explique}}
						</td>
						<td class="center-text table-col-hide-sm">
							<span class="checkbox-status {{$data->ha_tenido_operaciones == 1?"bg-success":""}}"></span>
						</td>
						<td class=" table-col-hide-sm">
							{{$data->explique_1}}
						</td>
						<td class="center-text table-col-hide-sm">
							<span class="checkbox-status {{$data->ha_sido_positivo_covid == 1?"bg-success":""}}"></span>
						</td>
						<td class=" table-col-hide-sm">
							{{$data->indique_fecha_y_sntomas}}
						</td>
						<td class="center-text table-col-hide-sm">
							<span class="checkbox-status {{$data->se_ha_vacunado_contra_el_covid == 1?"bg-success":""}}"></span>
						</td>
						<td class=" table-col-hide-sm">
							{{$data->indique_fecha_y_tipo_de_vacuna}}
						</td>
						<td class="text-nowrap center-text table-col-hide-sm">
							{{$data->created_at?->format(trans("admin/config/date_time.php_date_time_format"))}}
						</td>
						<td class="text-nowrap center-text table-col-hide-sm">
							{{$data->updated_at?->format(trans("admin/config/date_time.php_date_time_format"))}}
						</td>
                        @canany(['informacion_familiar_sobr_edit','informacion_familiar_sobr_delete'])
                        <td class="manage-td">
                            <div class="manage-links">
                                @can('informacion_familiar_sobr_edit')
                                    <a href="{{route("admin.informacion_familiar_sobr.edit", $data->id)}}" class="edit-link" draggable="false">@includeIf("admin/admin_layout/partials/misc/icons/edit_icon")</a>
                            @endcan
                                @can('informacion_familiar_sobr_delete')
                                <a href="#" data-id="{{$data->id}}" class="delete-link js-ak-delete-link" draggable="false">@includeIf("admin/admin_layout/partials/misc/icons/delete_icon")</a>
                                @endcan
                            </div>
                        </td>
                        @endcanany
                    </tr>
                @empty
                    
                @endforelse
                </tbody>
            </table>
            </div>
            <div class="content-footer">
                <div class="left">
                    <div class="change-length js-ak-table-length-DataTable"></div>
                </div>
                <div class="right">
                    <div class="content-pagination">
                        <nav class="pagination-container">
                            <div class="pagination-content">
                                <div class="pagination-info js-ak-pagination-info"></div>
                                <div class="pagination-box-data-table js-ak-pagination-box"></div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
	@endcan

	
	@includeIf("admin.admin_layout.partials.delete_modal_confirm")
@endsection