@extends('layout')
@section('title')
	Data Departemen | {{env('APP_NAME')}}
@endsection
@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
	<!-- begin:: Subheader -->
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-container  kt-container--fluid ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Master Departemen XX </h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<!-- <div class="kt-subheader__breadcrumbs">
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">
						Pricing Tables 1 </a>

					<span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span>
				</div> -->
			</div>
			
		</div>
	</div>

	<!-- end:: Subheader -->

	<!-- begin:: Content -->
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

		<!--begin::Portlet-->
		<div class="row">
			<div class="col-12">
				<div class="kt-portlet kt-portlet--mobile {{($data == null) ? '' : 'kt-hide'}}" id="data">
					<div class="kt-portlet__head kt-portlet__head--lg">
						<div class="kt-portlet__head-label">
							<span class="kt-portlet__head-icon">
								<i class="kt-font-brand flaticon2-line-chart"></i>
							</span>
							<h3 class="kt-portlet__head-title">
								<span>
									<b>Departemen</b> - Data Departemen
								</span>
							</h3>
						</div>
						<div class="kt-portlet__head-toolbar">
							<div class="kt-portlet__head-wrapper">
								<div class="kt-portlet__head-actions">
									<div class="dropdown dropdown-inline">
										<button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="la la-download"></i> Export
										</button>
										<div class="dropdown-menu dropdown-menu-right">
											<ul class="kt-nav">
												<li class="kt-nav__section kt-nav__section--first">
													<span class="kt-nav__section-text">Choose an option</span>
												</li>
												<li class="kt-nav__item">
													<a href="#" class="kt-nav__link">
														<i class="kt-nav__link-icon la la-print"></i>
														<span class="kt-nav__link-text">Print</span>
													</a>
												</li>
												<li class="kt-nav__item">
													<a href="#" class="kt-nav__link">
														<i class="kt-nav__link-icon la la-copy"></i>
														<span class="kt-nav__link-text">Copy</span>
													</a>
												</li>
												<li class="kt-nav__item">
													<a href="#" class="kt-nav__link">
														<i class="kt-nav__link-icon la la-file-excel-o"></i>
														<span class="kt-nav__link-text">Excel</span>
													</a>
												</li>
												<li class="kt-nav__item">
													<a href="#" class="kt-nav__link">
														<i class="kt-nav__link-icon la la-file-text-o"></i>
														<span class="kt-nav__link-text">CSV</span>
													</a>
												</li>
												<li class="kt-nav__item">
													<a href="#" class="kt-nav__link">
														<i class="kt-nav__link-icon la la-file-pdf-o"></i>
														<span class="kt-nav__link-text">PDF</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
									&nbsp;
									<button class="btn btn-brand btn-elevate btn-icon-sm" id="tambah">
										<i class="la la-plus"></i>
										New Record
									</button>
								</div>
							</div>
						</div>
					</div>
					<div class="kt-portlet__body">
						<table class="table table-striped- table-bordered table-hover table-checkable" id="tabel">
							<thead>
								<tr>
									<th>Kode</th>
									<th>Nama</th>
									<th>Actions</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="kt-portlet kt-portlet--mobile {{($data == null) ? 'kt-hide' : ''}}" id="form">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								<span>
									Form {{($data == null) ? 'Tambah' : 'Edit'}} Departemen
								</span>
							</h3>
						</div>
					</div>
					<div class="kt-portlet__body">
						<div class="kt-section" id="data-departemen">
							<div class="kt-section__content">
								<form class="kt-form kt-form--fit kt-form--label-align-right" method="post" action="{{route('departemen-simpan')}}">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<input type="hidden" name="tipe" value="{{($data == null) ? 1 : 2}}">
									<input type="hidden" name="id" value="{{$data->id or ''}}">
									<div class="form-group kt-form__group row">
										<label class="col-form-label col-md-2">Kode</label>
										<div class="col-md-6">
											<input type="text" class="form-control kt-input kt-input--air" required name="kode" value="{{$data->kode or ''}}">
										</div>
									</div>
									<div class="form-group kt-form__group row">
										<label class="col-form-label col-md-2">Nama</label>
										<div class="col-md-6">
											<input type="text" class="form-control kt-input kt-input--air" required name="nama" value="{{$data->nama or ''}}">
										</div>
									</div>
									<div class="form-group kt-form__group row">
										<label class="col-form-label col-md-2">&nbsp;</label>
										<div class="col-md-6">
											<button type="submit" class="btn btn-success">Simpan</button>
											<a href="{{route('departemen-link')}}"><button type="button" id="kembali" class="btn btn-secondary">Kembali</button></a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end::Portlet-->
	</div>

	<!-- end:: Content -->
</div>
@endsection
@section('css')
<link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<style type="text/css">
	.modal-lg {
	    max-width: 75%;
	}
</style>
@endsection
@section('js')
<!--begin::Page Vendors -->
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#tambah").click(function(){
			$("#data").addClass('kt-hide');
			$("#form").removeClass('kt-hide');
		});
		$('#tabel').DataTable({
	        "processing": true,
	        "serverSide": true,
	        "ajax": "{{ route('departemen-data') }}",
	        "columns": [
	            {data: 'kode'},
	            {data: 'nama'},
	            {data: 'menu', orderable: false, searchable: false}
	        ]
	    });
	});
	function hapus(kode){
		// alert(kode);
		// mApp.block("#tabel",{
		// 	overlayColor:"#000000",
		// 	type:"loader",
		// 	state:"success",
		// 	message:"Please wait...",
		// 	// baseZ: 1000, 
		// });
		$.ajax({
	        type: "POST",
	        url: "{{route('departemen-hapus')}}",
	        data: {id: kode, _token: "{{ csrf_token() }}"},
	        success: function (result)
	        {
	            $('#tabel').DataTable().ajax.reload();
	            // mApp.unblock("#tabel");
	        }
	    });
	}
</script>
@endsection
