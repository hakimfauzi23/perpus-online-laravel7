@extends('adminlte::page')


@section('title', 'Data Buku')

@section('content_header')
<h1>Data Buku Perpustakaan</h1>
@stop
@section('plugins.Sweetalert2', true)
@section('content')
    <div class="card mt-4">
    <div class="card-body">
            @if (session('success_message'))
                <div class="alert alert success">
                {{session('success_message')}}
                </div>
            @endif
            <a href="{{route('create.books')}}" class="btn btn-primary">Tambah Buku</a>
            <div class="mb-3"></div>
            <table style="text-align:center" class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>@sortablelink('id','ID BUKU')</th>
                                            <th>@sortablelink('author','PENGARANG')</th>
                                            <th>@sortablelink('title','JUDUL')</th>
                                            <th>@sortablelink('category','GENRE')</th>
                                            <th>@sortablelink('publisher','PENERBIT')</th>
                                            <th>@sortablelink('year_released','THN RILIS')</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($books->count())
                                        @foreach($books as $key => $p)
                                        <tr>
                                            <td>{{ $p->id }}</td>
                                            <td>{{ $p->author }}</td>
                                            <td>{{ $p->title }}</td>
                                            <td>{{ $p->category }}</td>
                                            <td>{{ $p->publisher }}</td>
                                            <td>{{ $p->year_released }}</td>
                                            <td>
                                        

                                                <?php $encyrpt=Crypt::encryptString($p->id) ?>                                                

                                                    <form class="delete" action="{{ route('books.destroy',$encyrpt) }}" method="GET">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        {{ csrf_field() }}
                                                        <a href="{{ route('books.edit',$encyrpt) }}" class="btn btn-warning">Edit</a>
                                                        <input class="btn btn-danger" type="submit" value="Delete">
                                                    </form>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                
                                <br/>
                                Page : {{ $books->currentPage() }} 
                                || Total Data : {{ $books->total() }} 
                                {!! $books->appends(\Request::except('page'))->render() !!}

    </div>

    </div>


    
@include('sweetalert::alert')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>

<script>
    $(".delete").on("submit", function(){
        return confirm("Apakah anda yakin?");
    });
</script>
@stop