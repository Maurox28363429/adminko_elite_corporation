@extends("admin.admin_layout.default")
@section('breadcrumbs')
<li class="breadcrumb-item active">DAMAS</li>
@endsection
@section('page-title')
DAMAS
@endsection
@section('page-info')@endsection
@section('page-back-button')@endsection
@section('page-content')

	@can("damas_access")
    <div class="content-layout content-width-full damas-data-content js-ak-DataTable js-ak-delete-container js-ak-content-layout"
        data-id="damas"
        data-delete-modal-action="{{route("admin.damas.delete")}}">
        <div class="content-element">
            <div class="content-header">
                <div class="header">
                    <h3></h3>
                    <p class="info"></p>
                </div>
                <div class="action">
                    <div class="left">
                        <form class="search-container" ><input name="damas_source" value="damas" type="hidden"/><input name="damas_length" value="{{Request()->query("damas_length")}}" type="hidden"/>
                            <div class="search">
                                <input type="text" autocomplete="off" placeholder="{{trans('admin/table.search')}}" name="damas_search" value="{{(Request()->query("damas_source") == "damas")?Request()->query("damas_search")??"":""}}" class="form-input js-ak-search-input">
                                <button class="search-button" draggable="false">
                                    @includeIf("admin/admin_layout/partials/misc/icons/search_icon")
                                </button>
                                @if(Request()->query("damas_source") == "damas" && Request()->query("damas_search"))
                                    <div class="reset-search js-ak-reset-search">
                                        @includeIf("admin/admin_layout/partials/misc/icons/reset_search_icon")
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="right">
                        <a class="button primary-button add-new" style="background-color: #129233" draggable="false" href="/api/exportDamasExcel" target="_blank">
                            Export
                        </a>
                        @canany('damas_create')
                        <a href="{{route('admin.damas.create')}}" class="button primary-button add-new" draggable="false">
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
						<th>Nombre de su ginecólogo</th>
						<th>Dirección de la clínica</th>
						<th class=" table-col-hide-sm">Porque asistió?</th>
						<th class="center-text table-col-hide-sm" data-sort-method="number">Se ha realizado PAP?</th>
						<th class="center-text table-col-hide-sm">Created at</th>
						<th class="center-text table-col-hide-sm">Updated at</th>
                        @canany(['damas_edit','damas_delete'])
                        <th class="no-sort manage-th" data-orderable="false">
                            <div class="manage-links">

                            </div>
                        </th>
                        @endcanany
                    </tr>
                </thead>
                <tbody class="">
                @forelse($damas_list_all as $data)
                    <tr>
						<td>
							{{$data->id}}
						</td>
						<td>
							{{$data->nombre_de_su_gineclogo}}
						</td>
						<td>
							{{$data->direccin_de_la_clnica}}
						</td>
						<td class=" table-col-hide-sm">
							{{$data->porque_asisti}}
						</td>
						<td class="center-text table-col-hide-sm">
							<span class="checkbox-status {{$data->se_ha_realizado_pap == 1?"bg-success":""}}"></span>
						</td>
						<td class="text-nowrap center-text table-col-hide-sm">
							{{$data->created_at?->format(trans("admin/config/date_time.php_date_time_format"))}}
						</td>
						<td class="text-nowrap center-text table-col-hide-sm">
							{{$data->updated_at?->format(trans("admin/config/date_time.php_date_time_format"))}}
						</td>
                        @canany(['damas_edit','damas_delete'])
                        <td class="manage-td">
                            <div class="manage-links">
                                @can('damas_edit')
                                    <a href="{{route("admin.damas.edit", $data->id)}}" class="edit-link" draggable="false">@includeIf("admin/admin_layout/partials/misc/icons/edit_icon")</a>
                            @endcan
                                @can('damas_delete')
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
