@extends('layouts.adminlte4')
@section('title')
    <title>Articles</title>
@endsection
@section('content')
    <div class="container">
        <h1>Articles TABLE</h1>
        <a href="{{ route('articles.create') }}" class="btn btn-primary">+ Add new Article</a>
    </div>
    <div class="container">
        @if (@session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (@session('status'))
            <div class="alert alert-warning">
                {{ session('status') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Doctor id - Name</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th>Views</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr id="tr_{{ $article->id }}">
                        <td>{{ $article->id }}</td>
                        <td>
                            {{ $article->doctor_id }}
                            @if ($article->doctor)
                                - {{ $article->doctor->name }}
                            @endif
                        </td>
                        <td>{{ $article->title }}</td>
                        <td>
                            {{ Str::limit($article->content, 100) }}
                        </td>
                        <td>{{ $article->status }}</td>
                        <td>{{ $article->views_count }}</td>
                        <td>
                            <a class="btn btn-warning" data-toggle="modal" data-target="#modalEdit"
                                onclick="getEditForm({{ $article->id }})">Edit with modal</a>
                            <a class="btn btn-danger" href="#"
                                onclick="if(confirm('Delete this data?')) deleteDataRemove('{{ $article->id }}')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('modals')
    <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-wide">
            <div class="modal-content">
                <div class="modal-body" id="modalContent">
                    {{-- Animasi loading bisa diletakkan di sini --}}
                </div>
            </div>
        </div>
    </div>
@endpush
@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        function getEditForm(id) {
            $('#modalContent').html('Memuat data...');

            $.ajax({
                type: 'POST',
                url: "{{ route('article.getEditForm') }}",
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id
                },
                success: function(data) {
                    $('#modalContent').html(data.msg);
                },
                error: function() {
                    $('#modalContent').html('Gagal memuat data.');
                }
            });
        }
    </script>
@endpush
@push('script')
    <script>
        function deleteDataRemove(id){
            $.ajax({
                type: 'POST',
                url: "{{ route('article.deleteData') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: function(data) {
                    if (data.status == "oke") {
                        $('#tr_' + id).remove();
                    }
                }
            })
        }
    </script>
@endpush
