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
 							<thead class="text-center">
 								<tr>
 									<th scope="col">#</th>
 									<th scope="col">Nama</th>
 									<th scope="col">Aksi</th>
 								</tr>
 							</thead>
 							<tbody class="text-center">
 								<tr>
 			
 								</tr>
 							</tbody>
 						</table>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>


<form action="" method="post" id="hapusForm">
	@method('delete')
	@csrf
	<button type="submit" class="btn btn-danger" style="display: none;">Submit</button>
</form>

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
	      	<form action="{{ route('admin.penulis') }}" method="POST" id="formTambahPenulis" class="formPenulisTambah">
				        	@csrf
				<div class="form-group">
				    <label for="nama">Nama</label>
				       	<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Penulis..." autocomplete="off">
				    <div class="invalid-feedback"></div>
				</div>
	      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
		        <button type="submit" class="btn btn-primary simpanUbahData" name="simpan">Simpan</button>
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
				{data : 'DT_RowIndex'},
				{data : 'nama'},
				{data : 'aksi'}
			]
		});

		$('button[data-dismiss=modal]').on('click' , function() {
			$('input[value=put]').remove();
			$('input[name=id]').remove();
		})


		$('#tambahPenulisModal').on('click' , function(){

					$('.modal-title').html('Tambah Data Penulis');
		 			$('.invalid-feedback').fadeOut();
					$('#nama').removeClass('is-invalid');
					$('#nama').val('');
		 			$('.simpanUbahData').html('Tambah');
		 			$('.modal').removeAttr('id');
					$('.modal').attr('id' , 'modalTambahPenulis');
		 			$('.simpanUbahData').removeAttr('id');
					$('.simpanUbahData').attr('id' , 'tombolTambahPenulis');
		 			$('#modalTambahPenulis').modal({
							show : true,
							keyboard : false,
							backdrop : 'static'
					});

					$('#modalTambahPenulis').on("shown.bs.modal", function() {
        				$('#nama').focus();
    				});

			    	// ajax simpan
			    $('.modal-footer').on('click', '#tombolTambahPenulis' , function(e) {
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

			    					$('#modalTambahPenulis').modal('hide')

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

									  // data table refresh
								    	$('.dataTable').DataTable().ajax.reload();
									// refresh end

			    				}
			    			}
			    		});
			    	});

		});

		

    	// edit data penulis
    	$('#tableDataPenulis').on('click' , '.buttonEditPenulis' , function(e) {
	 		e.preventDefault();

	 			$('.modal-title').html('Ubah Data Penulis');
	 			$('.invalid-feedback').fadeOut();
				$('#nama').removeClass('is-invalid');
	 			$('.simpanUbahData').html('Ubah');
	 			$('.modal').removeAttr('id');
				$('.modal').attr('id' , 'modalUbahPenulis');
	 			$('.simpanUbahData').removeAttr('id');
				$('.simpanUbahData').attr('id' , 'tombolUbahPenulis');
	 			$('#modalUbahPenulis').modal({
						show : true,
						keyboard : false,
						backdrop : 'static'
				});

	 			// Masukan element Id 
	 			$('#nama').before(`
				<input type="hidden" name="id" value=`+ $(this).data('id')+`>
			 	`)
				// Masukan Method Put
			 	$('input[name=_token]').after(`
				<input type="hidden" name="_method" value="put">
			 	`)
			 	

	 			// Id
	 			const id = $(this).data('id');
	 			// console.log(id);

				$.ajax({
					url : '{{ route('admin.TampilPenulis') }}' ,
					dataType : 'JSON',
					method : 'POST' ,
					data : { 
					'_token' : $('input[name=_token]').val(),
					'id' : id } ,
					success : function(value) {
						// console.log(value)
						value.forEach(function(data) {
							$('input[name=nama]').val(data.nama);
							$('input[name=nama]').focus();
						} ) 
						
					}

				});
	
	 	});


	 	// Hapus data penulis
    	$('#tableDataPenulis').on('click' , '.buttonHapusPenulis' , function(e) {
	 		e.preventDefault();
	 		// console.log('ok')
	 		Swal.fire({
			  title: 'Yakin ?',
			  text: "Data " + $(this).data('nama') + " Akan Dihapus!",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Ya, Hapus !'
			}).then((result) => {
			  if (result.value) {
			    // Hapus
			    // console.log($(this).attr('href'));
			    const href = $(this).attr('href');
			    const idPenulis = $(this).data('id');
			    // console.log(idPenulis);
			    $.ajax({
			    	url : href , 
			    	method : 'DELETE',
			    	dataType : 'JSON',
			    	data : {'id' : idPenulis ,
			    	'_token' : $('input[name=_token]').val()
			    	} ,
			    	success : function(data) {
			    		// console.log(data);
			    		const Alert = Swal.mixin({
										toast: true,
										position: 'top-end',
										showConfirmButton: false,
											timer: 5000
										});

										Alert.fire({
											type: 'success',
											title: data.error
										});

			    	}
			    })

				    // data table refresh
				    	$('.dataTable').DataTable().ajax.reload();
					// refresh end

			   
			  }
			})

	 	});


	 		// Ubah Ajax
		    $('.modal-footer').on('click', '#tombolUbahPenulis' , function(e) {
			 		e.preventDefault();
			 		// console.log($('input[name=id]').val())

			 		// Ajax Ubah
			 		$.ajax({
			 			url : '{{ route('admin.EditPenulis') }}' ,
 						method : 'PUT' ,
 						dataType :'JSON' ,
 						data : {
 							'_token' : $('input[name=_token]').val(),
 							'id' : $('input[name=id]').val(),
 							'nama' : $('#nama').val()
 						},
 						success : function(data) {
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
			    					

			    					$('#modalUbahPenulis').modal('hide')

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

									// data table refresh
			    					 $('.dataTable').DataTable().ajax.reload();
									// refresh end

			    				}
 						}
			 		});

			} ) ;
			 		

	 
	});
</script>

@endpush