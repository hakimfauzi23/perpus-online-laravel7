@extends('adminlte::page')
@include('sweetalert::alert')

@section('title', 'Tambah Anggota')

@section('content_header')
<h1>Tambah Anggota Perpustakaan</h1>
@stop

@section('content')
@include('sweetalert::alert')
<div class="card mt-4">
                <div class="card-body">
                    
                    <form method="post" enctype ="multipart/form-data" action="{{route('store.members')}}">
 
                        {{ csrf_field() }}
 
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama Anggota .." value="{{old('name')}}">
 
                            @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                            @endif
                        </div>
 
                        <div class="form-group">
                            <label>Jenis Kelamin </label>
                            <select name="gender" class="form-control" >
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                             @if($errors->has('gender'))
                                <div class="text-danger">
                                    {{ $errors->first('gender')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Tanggal Lahir </label>
                            <input type="date" name="birth_day" class="form-control" value="{{old('birth_day')}}">
 
                             @if($errors->has('birth_day'))
                                <div class="text-danger">
                                    {{ $errors->first('birth_day')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Tempat Lahir </label>
                            <input type="text" name="birth_place" class="form-control" placeholder="Tempat lahir .." value="{{old('birth_place')}}">
 
                             @if($errors->has('birth_place'))
                                <div class="text-danger">
                                    {{ $errors->first('birth_place')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Nomor Handphone </label>
                            <input type="text" name="phone_number" class="form-control" placeholder="Nomor Handphone" value="{{old('phone_number')}}">
 
                             @if($errors->has('phone_number'))
                                <div class="text-danger">
                                    {{ $errors->first('phone_number')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>File Foto 3x4 </label>
                            <input type="file" name="imgupload" class="form-control" value="{{old('imgupload')}}" >                             
                            @if($errors->has('imgupload'))
                                <div class="text-danger">
                                    {{ $errors->first('imgupload')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Alamat </label>
                            <textarea class="form-control" name="address" rows="3"></textarea> 
                             @if($errors->has('address'))
                                <div class="text-danger">
                                    {{ $errors->first('address')}}
                                </div>
                            @endif
                        </div>


 
                        <div class="form-group">
                            <a href="/books" class="btn btn-primary">Kembali</a>
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