@extends("admin.admin_layout.default")
@section('breadcrumbs')
<li class="breadcrumb-item active">DATOS PERSONALES</li>
@endsection
@section('page-title')
DATOS PERSONALES
@endsection
@section('page-info')@endsection
@section('page-back-button')@endsection
@section('page-content')

	@can("datos_personales_access")
    <div class="content-layout content-width-full datos-personales-data-content js-ak-DataTable js-ak-delete-container js-ak-content-layout"
        data-id="datos_personales"
        data-delete-modal-action="{{route("admin.datos_personales.delete")}}">
        <div class="content-element">
            <div class="content-header">
                <div class="header">
                    <h3></h3>
                    <p class="info"></p>
                </div>
                <div class="action">
                    <div class="left">
                        <form class="search-container" ><input name="datos_personales_source" value="datos_personales" type="hidden"/><input name="datos_personales_length" value="{{Request()->query("datos_personales_length")}}" type="hidden"/>
                            <div class="search">
                                <input type="text" autocomplete="off" placeholder="{{trans('admin/table.search')}}" name="datos_personales_search" value="{{(Request()->query("datos_personales_source") == "datos_personales")?Request()->query("datos_personales_search")??"":""}}" class="form-input js-ak-search-input">
                                <button class="search-button" draggable="false">
                                    @includeIf("admin/admin_layout/partials/misc/icons/search_icon")
                                </button>
                                @if(Request()->query("datos_personales_source") == "datos_personales" && Request()->query("datos_personales_search"))
                                    <div class="reset-search js-ak-reset-search">
                                        @includeIf("admin/admin_layout/partials/misc/icons/reset_search_icon")
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="right">
                        @canany('datos_personales_create')
                        <a href="{{route('admin.datos_personales.create')}}" class="button primary-button add-new" draggable="false">
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
						<th>Dirección Residencial</th>
						<th class="center-text" data-sort-method="number">Consume Tabaco</th>
						<th class="table-col-hide-sm">Teléfono Residencial</th>
						<th class="table-col-hide-sm">Correo electrónico</th>
						<th class="table-col-hide-sm">Cambiar</th>
						<th class="center-text table-col-hide-sm">Fecha de creación</th>
						<th class="center-text table-col-hide-sm">Ultima actualización</th>
                        @canany(['datos_personales_edit','datos_personales_delete'])
                        <th class="no-sort manage-th" data-orderable="false">
                            <div class="manage-links">
                                
                            </div>
                        </th>
                        @endcanany
                    </tr>
                </thead>
                <tbody class="">
                @forelse($datos_personales_list_all as $data)
                    <tr>
						<td>
							{{$data->id}}
						</td>
						<td>
							{{$data->direccin_residencial}}
						</td>
						<td class="center-text">
							<span class="checkbox-status {{$data->consume_tabaco == 1?"bg-success":""}}"></span>
						</td>
						<td class="table-col-hide-sm">
							@if ($data->telfono_residencial!=null){{$data->telfono_residencial}} @endIf
						</td>
						<td class="table-col-hide-sm">
							@if ($data->correo_electrnico)<a href="mailto:{{$data->correo_electrnico}}">{{$data->correo_electrnico}}</a>@endIf
						</td>
						<td class="table-col-hide-sm">
							{!!Str::limit(strip_tags($data["cambiar"]), 50, "...")!!}
						</td>
						<td class="text-nowrap center-text table-col-hide-sm">
							{{$data->created_at?->format(trans("admin/config/date_time.php_date_time_format"))}}
						</td>
						<td class="text-nowrap center-text table-col-hide-sm">
							{{$data->updated_at?->format(trans("admin/config/date_time.php_date_time_format"))}}
						</td>
                        @canany(['datos_personales_edit','datos_personales_delete'])
                        <td class="manage-td">
                            <div class="manage-links">
                                @can('datos_personales_edit')
                                    <a href="{{route("admin.datos_personales.edit", $data->id)}}" class="edit-link" draggable="false">@includeIf("admin/admin_layout/partials/misc/icons/edit_icon")</a>
                            @endcan
                                @can('datos_personales_delete')
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