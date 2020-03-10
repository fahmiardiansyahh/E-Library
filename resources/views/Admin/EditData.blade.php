<a href="#" name="editPenulis" class="btn btn-sm btn-warning buttonEditPenulis" data-id="{{ $authors->id }}">Edit</a> | &nbsp;
<a href="{{ url()->route('admin.HapusPenulis' , ['id' => $authors->id]) }}" class="btn btn-sm btn-danger buttonHapusPenulis" data-id="{{ $authors->id }}" data-nama="{{ $authors->nama }}" >Hapus</a>


