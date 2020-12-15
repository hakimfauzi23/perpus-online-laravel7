@extends('adminlte::page')
@include('sweetalert::alert')

@section('title', 'Details Anggota')

@section('content_header')
<!-- <h1>Details Anggota Perpustakaan</h1> -->
@stop

@section('content')
    <div class="card mt-4">
        <div class="card-body">
            <div class="card-header"> 
                 <div class="text-center">
                 <h1>Details Anggota</h1>
                 </div> 
            </div>
            <div class="mt-5"></div>
            <table>
            <tr >
                    @php $path =Storage::url('images/'.$member->path); @endphp
                    <img src="{{ url ($path)}}" class="rounded mx-auto d-block" width="226px" height="302px"  alt="">
                </tr>
            </table>
                <div class="mt-5"></div>

            <div class="d-flex justify-content-center">
            <table class="table " style="width:650px">
                
                <tr>
                    <td style="text-align:right"> ID Anggota</td>
                    <td style="text-align:right">:</td>
                    <td >&emsp;&emsp; {{$member->id}} </td>
                </tr>

                <tr>
                    <td style="text-align:right">Nama Lengkap</td>
                    <td style="text-align:right">:</td>
                    <td> &emsp;&emsp;{{$member->name}}</td>
                </tr>

                <tr>
                    <td style="text-align:right">Jenis Kelamin</td>
                    <td style="text-align:right">:</td>
                    <td> &emsp;&emsp;{{$member->gender}}</td>
                </tr>

                <tr>
                    <td style="text-align:right">Tempat Lahir</td>
                    <td style="text-align:right">:</td>
                    <td> &emsp;&emsp;{{$member->birth_place}}</td>
                </tr>

                <tr>
                    <td style="text-align:right">Tanggal Lahir</td>
                    <td style="text-align:right">:</td>
                    <td> &emsp;&emsp;{{$member->birth_day}}</td>
                </tr>

                <tr>
                    <td style="text-align:right">Alamat</td>
                    <td style="text-align:right">:</td>
                    <td> &emsp;&emsp;{{$member->address}}</td>
                </tr>

                <tr>
                    <td style="text-align:right">No Handphone</td>
                    <td style="text-align:right">:</td>
                    <td> &emsp;&emsp;{{$member->phone_number}}</td>
                </tr>
            </table>
            </div>

            <div class="d-flex justify-content-around mx-auto" >
                <table>
                    <tr>
                    <?php $encyrpt=Crypt::encryptString($member->id) ?>                                                
                        <td>
                        <form class="delete" action="{{ route('members.destroy',$encyrpt) }}" method="GET">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <a href="{{ route('members.index') }}" class="btn btn-primary">Kembali</a>
                            <a href="{{ route('members.edit',$encyrpt) }}" class="btn btn-warning">Edit</a>
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>

                    </tr>
                </table>
            </div>
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
    $(".delete").on("submit", function(){
        return confirm("Apakah anda yakin?");
    });

</script>
@stop