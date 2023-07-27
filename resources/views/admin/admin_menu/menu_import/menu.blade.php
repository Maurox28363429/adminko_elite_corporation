{{--IMPORTANT: Any modifications made to this file will be lost during updates.!!! --}}

<div class="item{{ $menu['item'] === "home" ? " active" : "" }}">
	<a draggable="false" class="link" href="{{route("admin.home")}}">
		<div class="icon">
			<div class="font-awesome-icon">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
			</div>
		</div>
		<div class="title">Home</div>
	</a>
</div>
@canany(['datos_personales_access','datos_laborales_access','informacion_familiar_sobr_access','damas_access','cuenta_bancaria_y_referen_access'])
	<div class="dropdown js-ak-dropdown{{ $menu['folder'] == "formularios" ? " open" : "" }}">
		<div class="dropdown-item js-ak-dropdown-item">
			<div class="item">
				<a draggable="false" class="link" href="">
					<div class="icon">
						<div class="font-awesome-icon">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M384 480h48c11.4 0 21.9-6 27.6-15.9l112-192c5.8-9.9 5.8-22.1 .1-32.1S555.5 224 544 224H144c-11.4 0-21.9 6-27.6 15.9L48 357.1V96c0-8.8 7.2-16 16-16H181.5c4.2 0 8.3 1.7 11.3 4.7l26.5 26.5c21 21 49.5 32.8 79.2 32.8H416c8.8 0 16 7.2 16 16v32h48V160c0-35.3-28.7-64-64-64H298.5c-17 0-33.3-6.7-45.3-18.7L226.7 50.7c-12-12-28.3-18.7-45.3-18.7H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H87.7 384z"/></svg>
						</div>
					</div>
					<div class="title">Formularios</div>
					<div class="icon action-icon">
						<div class="font-awesome-icon">
							<svg focusable="false" data-prefix="fas" data-icon="angle-right" class="svg-inline--fa fa-angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
								<path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path>
							</svg>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="dropdown-container" {!! $menu['folder'] == "formularios" ? ' style="display:block"' : '' !!}>
			<div class="dropdown-menu-list">
			@canany(['datos_personales_access'])
				<div class="item{{ $menu['item'] === "datos_personales" ? " active" : "" }}">
					<a draggable="false" class="link" href="{{route("admin.datos_personales.index")}}">
						<div class="icon">
							<div class="font-awesome-icon">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z"/></svg>
							</div>
						</div>
						<div class="title">DATOS PERSONALES</div>
					</a>
				</div>
			@endcanany
			@canany(['datos_laborales_access'])
				<div class="item{{ $menu['item'] === "datos_laborales" ? " active" : "" }}">
					<a draggable="false" class="link" href="{{route("admin.datos_laborales.index")}}">
						<div class="icon">
							<div class="font-awesome-icon">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z"/></svg>
							</div>
						</div>
						<div class="title">DATOS LABORALES</div>
					</a>
				</div>
			@endcanany
			@canany(['informacion_familiar_sobr_access'])
				<div class="item{{ $menu['item'] === "informacion_familiar_sobr" ? " active" : "" }}">
					<a draggable="false" class="link" href="{{route("admin.informacion_familiar_sobr.index")}}">
						<div class="icon">
							<div class="font-awesome-icon">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z"/></svg>
							</div>
						</div>
						<div class="title">INFORMACION FAMILIAR, SOBRE SEGUROS Y CONDICIONES DE SALUD</div>
					</a>
				</div>
			@endcanany
			@canany(['damas_access'])
				<div class="item{{ $menu['item'] === "damas" ? " active" : "" }}">
					<a draggable="false" class="link" href="{{route("admin.damas.index")}}">
						<div class="icon">
							<div class="font-awesome-icon">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z"/></svg>
							</div>
						</div>
						<div class="title">DAMAS</div>
					</a>
				</div>
			@endcanany
			@canany(['cuenta_bancaria_y_referen_access'])
				<div class="item{{ $menu['item'] === "cuenta_bancaria_y_referen" ? " active" : "" }}">
					<a draggable="false" class="link" href="{{route("admin.cuenta_bancaria_y_referen.index")}}">
						<div class="icon">
							<div class="font-awesome-icon">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z"/></svg>
							</div>
						</div>
						<div class="title">CUENTA BANCARIA Y REFERENCIAS</div>
					</a>
				</div>
			@endcanany
			</div>
		</div>
	</div>
@endcanany