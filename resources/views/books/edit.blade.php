@extends('adminlte::page')
@include('sweetalert::alert')

@section('title', 'Edit Data Buku')

@section('content_header')
<h1>Edit Data Buku Perpustakaan</h1>
@stop

@section('content')
<div class="card mt-4">
                <div class="card-body">
                    
                <?php $encyrpt=Crypt::encryptString($book->id) ?>
                    <form method="post" action="{{route('books.update',$encyrpt)}}">
 
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
 
                        <div class="form-group">
                            <label>Pengarang/Author</label>
                            <input type="text" name="author" class="form-control" placeholder="Nama Pengarang .." value=" {{ $book->author }}">
 
                            @if($errors->has('author'))
                                <div class="text-danger">
                                    {{ $errors->first('author')}}
                                </div>
                            @endif
 
                        </div>
 
                        <div class="form-group">
                            <label>Judul </label>
                            <input type="text" name="title" class="form-control" placeholder="Judul Buku .." value=" {{ $book->title }}">
 
                             @if($errors->has('title'))
                                <div class="text-danger">
                                    {{ $errors->first('title')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <label>Kategori </label>
                            <input type="text" name="category" class="form-control" placeholder="Kategori/Genre Buku .." value=" {{ $book->category }}">
 
                             @if($errors->has('category'))
                                <div class="text-danger">
                                    {{ $errors->first('category')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <label>Penerbit </label>
                            <input type="text" name="publisher" class="form-control" placeholder="Penerbit Buku .." value=" {{ $book->publisher }}">
 
                             @if($errors->has('publisher'))
                                <div class="text-danger">
                                    {{ $errors->first('publisher')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <label>Tahun Release </label>
                            <input type="text" name="year_released" class="form-control" placeholder="Tahun Terbit Buku .." value=" {{ $book->year_released }}">
 
                             @if($errors->has('year_released'))
                                <div class="text-danger">
                                    {{ $errors->first('year_released')}}
                                </div>
                            @endif
 
                        </div>

 
                        <div class="form-group">
                            <a href="{{route('books.index')}}" class="btn btn-primary">Kembali</a>
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>
 
                    </form>
 
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
@stop