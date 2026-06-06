@extends('layouts.adminlte4')
@section('title')
<title>Categories</title>
@endsection
@section('content')
<!-- <div class="container">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>
</div> -->
<div class="container">
    <h1>CATEGORIRES TABLE</h1>
    <a href="categories/create" class="btn btn-primary"> + New category</a>

    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#btnFormModal">
        + New Category (with Modals)
    </button>

    <p>The <a href="#" onclick="showInfo()">.table</a> class adds basic styling (light padding and only horizontal dividers) to a table:</p>
    <div id="showInfo"></div>
</div>
<div class="container">
    @if(@session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(@session('status'))
    <div class="alert alert-warning">
        {{ session('status') }}
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Number of Services</th>
                <th>Show images</th>
                <th>Services</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr id="tr_{{ $category->id }}">
                <td>{{ $category->id }}</td>
                <td id="td_name_{{ $category->id }}">{{ $category->name }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#imageModal-{{ $category->id }}">
                        Show
                    </button>
                </td>
                <td>{{ $category->services->count() }}</td>
                <td>
                    <ul>
                        @foreach ($category->services as $service)
                        <li>{{ $service->name }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <a class="btn btn-warning" href="{{ route('categories.edit', $category->id)}}">Edit</a>
                    <a class="btn btn-warning" href="#modalEditA" data-bs-toggle="modal" onclick="getEditForm('{{ $category->id }}')">Edit Type A</a>
                    <a class="btn btn-primary" href="#modalEditB" data-bs-toggle="modal" onclick="getEditFormB('{{ $category->id }}')">Edit Type B</a>
                    <a href="#" value="DeleteNoReload" class="btn btn-danger" onclick="if(confirm('Are you sure to delete {{ $category->id }} - {{ $category->name }} ?')) deleteDataRemove('{{ $category->id }}')">Delete without Reload</a>
                    <form action="{{ route('categories.destroy', $category->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure to delete {{ $category->id }} - {{ $category->name }}')">
                    </form>
                </td>
            </tr>
            @push ('modal')
            <div class="modal fade" id="imageModal-{{ $category->id }}" tabindex="-1" aria-labelledby="imageModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="imageModalLabel">Gambar untuk Kategori {{$category->id}} </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex flex-column">
                                <span>{{ $category->id }} - {{ $category->name }}</span>
                                <img class="img-fluid mt-2" style="max-height:250px;" src="{{ asset('storage/' . $category->image) }}" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            @endpush
            @endforeach
        </tbody>
    </table>
</div>

@push("script")
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    function showInfo() {
        $.ajax({
            type: 'POST',
            url: '{{ route("category.showInfo") }}',
            data: '_token=<?php echo csrf_token(); ?>',
            success: function(data) {
                $('#showInfo').html(data.msg);
            }
        });
    }
</script>
@endpush

@push('script')
<script>
    function getEditForm(id) {
        // Kosongkan atau beri loading text setiap kali tombol diklik agar data lama hilang
        $('#modalContent').html('<div class="text-center p-3"><p>Loading data...</p></div>');

        $.ajax({
            type: 'POST',
            url: "{{ route('category.getEditForm') }}",
            data: {
                '_token': "{{ csrf_token() }}", // Menggunakan sintaks Blade murni
                'id': id
            },
            success: function(data) {
                if (data.msg) {
                    $('#modalContent').html(data.msg);
                } else {
                    $('#modalContent').html('<div class="alert alert-danger">Respon data kosong dari server.</div>');
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                $('#modalContent').html('<div class="alert alert-danger">Gagal memuat data. Silahkan cek log server.</div>');
            }
        });
    }
</script>
@endpush
@push('script')
<script>
    function getEditFormB(id) {
        $.ajax({
            type: 'POST',
            url: "{{ route('category.getEditFormB') }}",
            data: {
                '_token': '<?php echo csrf_token(); ?>',
                'id': id
            },
            success: function(data) {
                $('#modalContentB').html(data.msg)
            }
        });
    }
</script>
@endpush
@push('script')
<script>
    function saveDataUpdate(id) {
        var name = $('#cname').val();

        console.log(name); //debug->print to browser console
        $.ajax({
            type: 'POST',
            url: '{{ route("category.saveDataUpdate") }}',
            data: {
                '_token': '<?php echo csrf_token(); ?>',
                'id': id,
                'name': name,
            },
            success: function(data) {
                if (data.status == "oke") {
                    $('#td_name_' + id).html(name);
                    $('#modalEditB').modal('hide');
                }
            }
        })
    }
</script>
@endpush
@push('script')
<script>
    function deleteDataRemove(id) {
        $.ajax({
            type: 'POST',
            url: '{{ route("category.deleteData") }}',
            data: {
                '_token': '<?php echo csrf_token(); ?>',
                'id': id
            },
            success: function(data) {
                if (data.status == "oke") {
                    $('#tr_' + id).remove();
                }
            }
        });
    }
</script>
@endpush

@push('modals')
<div class="modal fade" id="btnFormModal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Category</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                            placeholder="Enter Category Name">
                        <small id="name" class="form-text text-muted">Please write down Category Name here.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endpush
@push('modals')
<div class="modal fade" id="modalEditA" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-wide">
        <div class="modal-content">
            <div class="modal-body" id="modalContent">
                <div class="text-center p-3">

                </div>
            </div>
        </div>
    </div>
</div>
@endpush
@push('modals')
<div class="modal fade" id="modalEditB" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Your Category</h4>
            </div>
            <div class="modal-body" id="modalContentB">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endpush
@endsection