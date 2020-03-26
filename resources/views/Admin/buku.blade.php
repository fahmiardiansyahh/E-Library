@extends('templates.default')

@section('TitlePage' , 'Data Buku')


@section('contents')

	<!-- Menu Page -->
	<div class="row">
 		<div class="col">
 			<div class="card shadow">
 				<div class="card-header border-0">
					  <?php $urlCurrent = Route::currentRouteName(); 
				        $urls = explode('.', $urlCurrent);
				        $url = end($urls);
				       ?>
						@if($url == "penulis") 
						<div class="row">
	 						<div class="col-12">
	 							<nav aria-label="breadcrumb">
								  <ol class="breadcrumb float-left">
								    <li class="breadcrumb-item"><a href="{{ url()->route('admin.dashboard') }}">Home</a></li>
								    <li class="breadcrumb-item active" aria-current="page">{{ ucwords($url) }}</li>
								  </ol>
								</nav>
	 						</div>
 						</div>
 						@elseif($url == "buku")
 						<div class="row">
	 						<div class="col-12">
	 							<nav aria-label="breadcrumb">
								  <ol class="breadcrumb float-left">
								    <li class="breadcrumb-item"><a href="{{ url()->route('admin.dashboard') }}">Home</a></li>
								    <li class="breadcrumb-item active" aria-current="page">{{ ucwords($url) }}</li>
								  </ol>
								</nav>
	 						</div>
 						</div>
 						@endif
 					<div class="row">
	 					<div class="col-6">
	 						<h1 class="m-0">Data {{ ucwords($url)  }}</h1>
	 					</div>
	 					<div class="col-6 text-right my-2">
	 						<button id="tambahBukuModal" class="btn btn-primary btn-sm" type="button">Tambah Data {{ ucwords($url) }}</button>
	 					</div>	
 					</div>
 					<div class="table-responsive">
 					<hr>
 					<div class="table-responsive">
 						<table id="tableDataBuku" class="table table-striped table-bordered" style="width: 100%">
 							<thead class="text-center">
 								<tr>
 									<th scope="col">#</th>
 									<th scope="col">Cover</th>
 									<th scope="col">Nama Author</th>
 									<th scope="col">Judul Buku</th>
 									<th scope="col">Deskripsi</th>
 									<th scope="col">Qty</th>
 									<th scope="col">Aksi</th>
 								</tr>
 							</thead>
 							<tbody class="text-justify">
 								<tr>
 			
 								</tr>
 							</tbody>
 						</table>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>

<!-- sections menu pages -->

<!-- Hapus -->
<form action="" method="post" id="hapusFormBuku">
	@method('delete')
	@csrf
	<button type="submit" class="btn btn-danger" style="display: none;">Submit</button>
</form>
<!-- Hapus  -->

<!-- Modal -->

		<div class="modal fade" id="modalTambahUbahBuku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable" role="document">
				    <div class="modal-content">
						    <div class="modal-header">
							    <div class="row">
							      	<div class="col-6">
							      		<img class="h-100 w-50 img-fluid" src="{{ asset('assets/img/brand/library.jpg') }}">
							      	</div>
							      	<div class="col-6">
							      		<h3 class="modal-title text-right my-2" id="titleModalBuku"> </h3>
							      	</div>
							    </div>
								    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								    	<span aria-hidden="true">&times;</span>
								    </button>
						    </div>

						    <div class="modal-body">
						      	<form action="" name="formTambahUbahBuku" method="POST" enctype="multipart/form-data">

									    @csrf

									<div class="form-group">
										<label for="author_id">Nama Author</label>
									   	<select name="author_id" id="author_id" class="form-control custom-select">
									   		<option value="" class="defaultAuthor">Pilih Author</option>
											@foreach ($buku as $dataBuku) 
											
											<option value="{{ $dataBuku->id }}"> {{ $dataBuku->nama }}</option>	
										
											@endforeach	
											
									   	</select>
									    <div class="invalid-feedback MassageAuthor">
								        	<!-- Massage From Js -->
								      	</div>
									</div>
									
									<div class="form-group">
										<label for="judul_buku">Judul Buku</label>
										<input type="text" name="judul_buku" id="judul_buku" class="form-control" placeholder="Judul Buku" autocomplete="off">
									  	<div class="invalid-feedback MassageJudulBuku">
								        	<!-- Massage From Js -->
								      	</div>
									</div>

									<div class="form-group">
										<label for="deskripsi_buku">Deskripsi</label>
										<textarea name="deskripsi_buku" id="deskripsi_buku" class="form-control" rows="5" placeholder="Deskripsi Buku" autocomplete="on"></textarea>
										<div class="invalid-feedback MassageDeskripsi">
								        	<!-- Massage From Js -->
								      	</div>
									</div>

									<div class="form-group">
										<label for="qty_buku">QTY</label>
										<input type="text" name="qty_buku" id="qty_buku" class="form-control" placeholder="QTY" autocomplete="off">
									  <div class="invalid-feedback MassageQty">
								        	<!-- Massage From Js -->
								      </div>
									</div>


									<div class="form-group">
										<label for="gambar_buku">Gambar Buku</label>
										<div class="custom-file">
										    <input type="file" name="gambar_buku" class="custom-file-input" id="gambar_buku">
										    <label class="custom-file-label" for="gambar_buku">Pilih Gambar...</label>
										     <div class="invalid-feedback MassageGambarBuku">
								        	<!-- Massage From Js -->
								      		</div>
  										</div>

									</div>

						    </div>

						      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							        <button type="submit" class="btn btn-primary simpanUbahDataBuku" name="simpan"></button>
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

			//data buku 
			$('#tableDataBuku').DataTable({
			serverside : true,
			processing : true,
			ajax :'{{ route('admin.data.buku') }}',
				columns : [
					{data : 'DT_RowIndex'},
					{data : 'cover'},
					{data : 'NamaAuthor'},
					{data : 'title'},
					{data : 'description'},
					{data : 'qty'},
					{data : 'aksi'}
				]
			});

			// Setting name buat type input file
			$('.custom-file-input').on('change' , function(){
				let fileName = $(this).val().split('\\').pop();
				$(this).next('.custom-file-label').addClass("selected").html(fileName);
			});


			//tambah data buku
			$('#tambahBukuModal').click(function() {

				// modal tambah buku
				$('#modalTambahUbahBuku').modal({
					show : true,
					keyboard : false,
					backdrop : 'static',
				});



				// Title Modal 
				$('#titleModalBuku').html('Tambah Data Buku');

				// Button Modal
				$('.simpanUbahDataBuku').html('Tambah');

				// Tambah attr id tambah buku
				$('form[name=formTambahUbahBuku]').attr('id', 'TambahBuku');

				// on show bs modal
				$('#modalTambahUbahBuku').on("shown.bs.modal", function() {
					// remove selected
					$('.defaultAuthor').removeAttr('selected');
					// refresh Modal
					$('#author_id option[value=""]').attr('selected', 'selected');
					$('#judul_buku').val('');
					$('#deskripsi_buku').val('');
					$('#qty_buku').val('');
					$('#gambar_buku').val('');
					$('.custom-file-label').html(`
						 <label class="custom-file-label" for="gambar_buku">Pilih Gambar...</label>
					`);
	        	
	    		});

				// Ajax tambah data buku
				$('.modal-body').on('submit' , '#TambahBuku' , function(e) {

					e.preventDefault();

					// ajax
					$.ajax({
					url : '{{ route('admin.tambahBuku') }}' ,
					method : 'POST' ,
					contentType : false ,
					cache : false ,
					processData : false ,
					data : new FormData(this) ,
					dataType : 'JSON',
					success :function(data) {

						// Cek Validasi 

						// Validasi Error
						if(data.error == 1) {

							// Cek 1 per 1 field
							if(data.author_id !== "") {
								// Ada Error

								// Tambahkan is-invalid class
								$('#author_id').addClass('is-invalid');

								// Tambahkan Pesan
								$('.MassageAuthor').html(data.author_id);


							} else {
								// Error Not Found for author

								//  Remove Class
								$('#author_id').removeClass('is-invalid');

								// Hapus Pesan
								$('.MassageAuthor').html(data.author_id);

							}

							// Judul Buku

							if(data.judul_buku !== "") {
								// Ada Error

								// Tambahkan is-invalid class
								$('#judul_buku').addClass('is-invalid');

								// Tambahkan Pesan
								$('.MassageJudulBuku').html(data.judul_buku);


							} else {
								// Error Not Found for judul Buku

								//  Remove Class
								$('#judul_buku').removeClass('is-invalid');

								// Hapus Pesan
								$('.MassageAuthor').html(data.judul_buku);

							}

							// Deskripsi Buku

							if(data.deskripsi_buku !== "") {
								// Ada Error

								// Tambahkan is-invalid class
								$('#deskripsi_buku').addClass('is-invalid');

								// Tambahkan Pesan
								$('.MassageDeskripsi').html(data.deskripsi_buku);


							} else {
								// Error Not Found for deskripsi Buku

								//  Remove Class
								$('#deskripsi_buku').removeClass('is-invalid');

								// Hapus Pesan
								$('.MassageDeskripsi').html(data.deskripsi_buku);

							}

							// Qty

							if(data.qty_buku !== "") {
								// Ada Error

								// Tambahkan is-invalid class
								$('#qty_buku').addClass('is-invalid');

								// Tambahkan Pesan
								$('.MassageQty').html(data.qty_buku);


							} else {
								// Error Not Found for QTY
								//  Remove Class
								$('#qty_buku').removeClass('is-invalid');

								// Hapus Pesan
								$('.MassageQty').html(data.qty_buku);

							}

							// Gambar

							if(data.gambar_buku !== "") {
								// Ada Error

								// Tambahkan is-invalid class
								$('#gambar_buku').addClass('is-invalid');

								// Tambahkan Pesan
								$('.MassageGambarBuku').html(data.gambar_buku);


							} else {
								// Error Not Found for Gambar Buku

								//  Remove Class
								$('#gambar_buku').removeClass('is-invalid');

								// Hapus Pesan
								$('.MassageGambarBuku').html(data.gambar_buku);

							}

							


						} else {
								
							// Tidak Ada Error Dari Semua 

								// kondisi default
								$('#author_id').removeClass('is-invalid');
								$('.MassageAuthor').html('');

								$('#judul_buku').removeClass('is-invalid');
								$('.MassageAuthor').html('');

								$('#deskripsi_buku').removeClass('is-invalid');
								$('.MassageDeskripsi').html('');

								$('#qty_buku').removeClass('is-invalid');
								$('.MassageQty').html('');

								$('#gambar_buku').removeClass('is-invalid');
								$('.MassageGambarBuku').html('');


								// Close The Modal

								$('#modalTambahUbahBuku').modal('hide');

								// Swall Fade In
								const Toast = Swal.mixin({
										toast: true,
										position: 'top-end',
										showConfirmButton: false,
										timer: 5000
									});

									Toast.fire({
										type: 'success',
										title: data.msg
									});

								// Ajax Reload
								$('#tableDataBuku').DataTable().ajax.reload();









						}







							







					}


				});


				});
				

			});

			// Hapus Data Buku 
			$('#tableDataBuku').on('click' , '.HapusDataBuku' , function(e) {

				e.preventDefault();

				// Take the id
				const id =  $(this).data('id');
				const href = $(this).attr('href');

				Swal.fire({
				  title: 'Yakin ?',
				  text: "Data Buku" + $(this).data('name')  +  " Akan Dihapus!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Ya, Hapus !'
				}).then((result) => {
				if (result.value) {
				  	
				  	$.ajax({

				  		url : href,
				  		method : 'DELETE',
				  		dataType : 'JSON',
				  		data : {id : id ,
				  			'_token' : $('input[name=_token]').val() } , 
				  		success : function(data) {
				  			// success
				  			const Alert = Swal.mixin({
										toast: true,
										position: 'top-end',
										showConfirmButton: false,
											timer: 5000
										});

										Alert.fire({
											type: 'success',
											title: data.msg
										});

				  		}


				  	});

				  	// Ajax Reload
					$('#tableDataBuku').DataTable().ajax.reload();



				}

				});


			})



		});


</script>


@endpush