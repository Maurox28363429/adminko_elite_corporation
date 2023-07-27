@extends("admin.admin_layout.default")
@section('breadcrumbs')
<li class="breadcrumb-item active">DATOS LABORALES</li>
@endsection
@section('page-title')
DATOS LABORALES
@endsection
@section('page-info')@endsection
@section('page-back-button')@endsection
@section('page-content')

	@can("datos_laborales_access")
    <div class="content-layout content-width-full datos-laborales-data-content js-ak-DataTable js-ak-delete-container js-ak-content-layout"
        data-id="datos_laborales"
        data-delete-modal-action="{{route("admin.datos_laborales.delete")}}">
        <div class="content-element">
            <div class="content-header">
                <div class="header">
                    <h3></h3>
                    <p class="info"></p>
                </div>
                <div class="action">
                    <div class="left">
                        <form class="search-container" ><input name="datos_laborales_source" value="datos_laborales" type="hidden"/><input name="datos_laborales_length" value="{{Request()->query("datos_laborales_length")}}" type="hidden"/>
                            <div class="search">
                                <input type="text" autocomplete="off" placeholder="{{trans('admin/table.search')}}" name="datos_laborales_search" value="{{(Request()->query("datos_laborales_source") == "datos_laborales")?Request()->query("datos_laborales_search")??"":""}}" class="form-input js-ak-search-input">
                                <button class="search-button" draggable="false">
                                    @includeIf("admin/admin_layout/partials/misc/icons/search_icon")
                                </button>
                                @if(Request()->query("datos_laborales_source") == "datos_laborales" && Request()->query("datos_laborales_search"))
                                    <div class="reset-search js-ak-reset-search">
                                        @includeIf("admin/admin_layout/partials/misc/icons/reset_search_icon")
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="right">
                        @canany('datos_laborales_create')
                        <a href="{{route('admin.datos_laborales.create')}}" class="button primary-button add-new" draggable="false">
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
						<th>Nombre de la empresa donde labora</th>
						<th>Dirección de la empresa</th>
						<th class=" table-col-hide-sm">Antigüedad en la empresa u ocupación</th>
						<th class=" table-col-hide-sm">Cargo dentro de la empresa</th>
						<th class=" table-col-hide-sm">Ingreso mensual</th>
						<th class=" table-col-hide-sm">De cuanto es su patrimonio?</th>
						<th class="center-text table-col-hide-sm">Created at</th>
						<th class="center-text table-col-hide-sm">Updated at</th>
                        @canany(['datos_laborales_edit','datos_laborales_delete'])
                        <th class="no-sort manage-th" data-orderable="false">
                            <div class="manage-links">
                                
                            </div>
                        </th>
                        @endcanany
                    </tr>
                </thead>
                <tbody class="">
                @forelse($datos_laborales_list_all as $data)
                    <tr>
						<td>
							{{$data->id}}
						</td>
						<td>
							{{$data->nombre_de_la_empresa_donde_labora}}
						</td>
						<td>
							{{$data->direccin_de_la_empresa}}
						</td>
						<td class=" table-col-hide-sm">
							{{$data->antigedad_en_la_empresa_u_ocupacin}}
						</td>
						<td class=" table-col-hide-sm">
							{{$data->cargo_dentro_de_la_empresa}}
						</td>
						<td class=" table-col-hide-sm">
							{{$data->ingreso_mensual}}
						</td>
						<td class=" table-col-hide-sm">
							{{$data->de_cuanto_es_su_patrimonio}}
						</td>
						<td class="text-nowrap center-text table-col-hide-sm">
							{{$data->created_at?->format(trans("admin/config/date_time.php_date_time_format"))}}
						</td>
						<td class="text-nowrap center-text table-col-hide-sm">
							{{$data->updated_at?->format(trans("admin/config/date_time.php_date_time_format"))}}
						</td>
                        @canany(['datos_laborales_edit','datos_laborales_delete'])
                        <td class="manage-td">
                            <div class="manage-links">
                                @can('datos_laborales_edit')
                                    <a href="{{route("admin.datos_laborales.edit", $data->id)}}" class="edit-link" draggable="false">@includeIf("admin/admin_layout/partials/misc/icons/edit_icon")</a>
                            @endcan
                                @can('datos_laborales_delete')
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