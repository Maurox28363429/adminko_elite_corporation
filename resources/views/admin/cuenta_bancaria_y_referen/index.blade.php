@extends("admin.admin_layout.default")
@section('breadcrumbs')
<li class="breadcrumb-item active">CUENTA BANCARIA Y REFERENCIAS</li>
@endsection
@section('page-title')
CUENTA BANCARIA Y REFERENCIAS
@endsection
@section('page-info')@endsection
@section('page-back-button')@endsection
@section('page-content')

	@can("cuenta_bancaria_y_referen_access")
    <div class="content-layout content-width-full cuenta-bancaria-y-referen-data-content js-ak-DataTable js-ak-delete-container js-ak-content-layout"
        data-id="cuenta_bancaria_y_referen"
        data-delete-modal-action="{{route("admin.cuenta_bancaria_y_referen.delete")}}">
        <div class="content-element">
            <div class="content-header">
                <div class="header">
                    <h3></h3>
                    <p class="info"></p>
                </div>
                <div class="action">
                    <div class="left">
                        <form class="search-container" ><input name="cuenta_bancaria_y_referen_source" value="cuenta_bancaria_y_referen" type="hidden"/><input name="cuenta_bancaria_y_referen_length" value="{{Request()->query("cuenta_bancaria_y_referen_length")}}" type="hidden"/>
                            <div class="search">
                                <input type="text" autocomplete="off" placeholder="{{trans('admin/table.search')}}" name="cuenta_bancaria_y_referen_search" value="{{(Request()->query("cuenta_bancaria_y_referen_source") == "cuenta_bancaria_y_referen")?Request()->query("cuenta_bancaria_y_referen_search")??"":""}}" class="form-input js-ak-search-input">
                                <button class="search-button" draggable="false">
                                    @includeIf("admin/admin_layout/partials/misc/icons/search_icon")
                                </button>
                                @if(Request()->query("cuenta_bancaria_y_referen_source") == "cuenta_bancaria_y_referen" && Request()->query("cuenta_bancaria_y_referen_search"))
                                    <div class="reset-search js-ak-reset-search">
                                        @includeIf("admin/admin_layout/partials/misc/icons/reset_search_icon")
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="right">
                        @canany('cuenta_bancaria_y_referen_create')
                        <a href="{{route('admin.cuenta_bancaria_y_referen.create')}}" class="button primary-button add-new" draggable="false">
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
						<th>Forma de pago</th>
						<th>Nombre del banco</th>
						<th class="table-col-hide-sm">Número de cuenta bancaria</th>
						<th class="table-col-hide-sm">Adjuntar confirmacion de su cuenta</th>
						<th class=" table-col-hide-sm">Referencia personal 1</th>
						<th class=" table-col-hide-sm">Referencia personal 2</th>
						<th class=" table-col-hide-sm">Referencia personal 3</th>
						<th class=" table-col-hide-sm">Referencia comercial</th>
						<th class="center-text table-col-hide-sm">Created at</th>
						<th class="center-text table-col-hide-sm">Updated at</th>
                        @canany(['cuenta_bancaria_y_referen_edit','cuenta_bancaria_y_referen_delete'])
                        <th class="no-sort manage-th" data-orderable="false">
                            <div class="manage-links">
                                
                            </div>
                        </th>
                        @endcanany
                    </tr>
                </thead>
                <tbody class="">
                @forelse($cuenta_bancaria_y_referen_list_all as $data)
                    <tr>
						<td>
							{{$data->id}}
						</td>
						<td>
							{{$data->forma_de_pago}}
						</td>
						<td>
							{{$data->nombre_del_banco}}
						</td>
						<td class="table-col-hide-sm">
							@if ($data->nmero_de_cuenta_bancaria!=null){{$data->nmero_de_cuenta_bancaria}} @endIf
						</td>
						<td class="table-col-hide-sm">
							@if ($data->adjuntar_confirmacion_de_su_cuenta)
                                <a href="{{ $data->adjuntar_confirmacion_de_su_cuenta }}" target="_blank">
                                    {{$data->getRawOriginal("adjuntar_confirmacion_de_su_cuenta")}}
                                </a>@endIf
						</td>
						<td class=" table-col-hide-sm">
							{{$data->referencia_personal_1}}
						</td>
						<td class=" table-col-hide-sm">
							{{$data->referencia_personal_2}}
						</td>
						<td class=" table-col-hide-sm">
							{{$data->referencia_personal_3}}
						</td>
						<td class=" table-col-hide-sm">
							{{$data->referencia_comercial}}
						</td>
						<td class="text-nowrap center-text table-col-hide-sm">
							{{$data->created_at?->format(trans("admin/config/date_time.php_date_time_format"))}}
						</td>
						<td class="text-nowrap center-text table-col-hide-sm">
							{{$data->updated_at?->format(trans("admin/config/date_time.php_date_time_format"))}}
						</td>
                        @canany(['cuenta_bancaria_y_referen_edit','cuenta_bancaria_y_referen_delete'])
                        <td class="manage-td">
                            <div class="manage-links">
                                @can('cuenta_bancaria_y_referen_edit')
                                    <a href="{{route("admin.cuenta_bancaria_y_referen.edit", $data->id)}}" class="edit-link" draggable="false">@includeIf("admin/admin_layout/partials/misc/icons/edit_icon")</a>
                            @endcan
                                @can('cuenta_bancaria_y_referen_delete')
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