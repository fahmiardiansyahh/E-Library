@extends('templates.default')

@section('TitlePage' , 'Data Penulis')

@section('contents')

 	<div class="row">
 		<div class="col">
 			<div class="card shadow">
 				<div class="card-header border-0">
 					<div class="row">
	 					<div class="col-6">
	 						<h1 class="m-0">Data Penulis</h1>
	 					</div>
	 					<div class="col-6 text-right my-2">
	 						<button id="tambahPenulisModal" class="btn btn-primary btn-sm" type="button">Tambah Data Penulis</button>
	 					</div>	
 					</div>
 					<div class="table-responsive">
 					<hr>
 					<div class="table-responsive">
 						<table id="tableDataPenulis" class="table table-striped table-bordered" style="width: 100%">
 							<thead>
 								<tr>
 									<th scope="col">#</th>
 									<th scope="col">Nama</th>
 								</tr>
 							</thead>
 							<!-- <tbody>
 								<tr>
 									<th scope="row">
 									</th>	
 								</tr>
 							</tbody> -->
 						</table>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>

 	<!-- Modal tambah Data Penulis -->
	<div class="modal fade" id="modalTambahPenulis" tabindex="-1" role="dialog" 	aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	      	<div class="row">
	      		<div class="col-6">
	      			 <img class="h-100 w-50 img-fluid" src="{{ asset('assets/img/brand/library.jpg') }}">
	      		</div>
	      		<div class="col-6">
	      			 <h3 class="modal-title text-right my-2" id="exampleModalLongTitle">Tambah Data Penulis</h3>
	      		</div>
	      	</div>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<form action="{{ route('admin.penulis') }}" method="POST" id="formTambahPenulis">
				        	@csrf
				<div class="form-group">
				    <label for="nama">Nama</label>
				       	<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Penulis..." autocomplete="off">
				    <div class="invalid-feedback"></div>
				</div>
	      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
		        <button type="submit" class="btn btn-primary" name="simpan" id="tombolSimpanPenulis">Simpan</button>
		      </div>
	     	</form>
	    </div>
	  </div>
	</div>
 	<!-- Akhir Modal -->

@endsection



@push('scripts')

<script>
	$(function() {
		$('#tableDataPenulis').DataTable({
			serverside : true,
			ajax :'{{ route('admin.data.penulis') }}',
			columns : [
				{data : 'id'},
				{data : 'nama'}
			]
		});
		$('#tambahPenulisModal').on('click' , function(){
			$('.invalid-feedback').fadeOut();
			$('#nama').removeClass('is-invalid');
			$('#nama').val('');
			$('#modalTambahPenulis').modal({
				show : true,
				keyboard : false,
				backdrop : 'static'
			});
		});
		$('#modalTambahPenulis').on("shown.bs.modal", function() {
        	$('#nama').focus();
    	});

    	// ajax simpan
    	$('#formTambahPenulis').on('submit' , function(e) {
    		// ajax
    		e.preventDefault();
    		$.ajax({
    			url : '{{ route('admin.tambahPenulis') }}',
    			data : {
    				'_token' : $('input[name=_token]').val(),
    				'nama' : $('#nama').val()
    			} ,
    			method : 'POST',
    			dataType : 'JSON',
    			success : function (data) {
    				// console.log(data);
    				// salah
    				if (data.errorStatus == 0) {
    					$('#nama').addClass('is-invalid');
    					$('.invalid-feedback').html(''+ data.error[0]);
    					$('.invalid-feedback').fadeIn('slow');
    					$('#nama').focus();
    				} else {
    					// Sukses
    					// swall
    					document.location.href = '{{ route('admin.penulis') }}'

    					const Toast = Swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 5000
						});

						Toast.fire({
							type: 'success',
							title: data.error
						});

    				}
    			}
    		});
    	});

	});
</script>

@endpush