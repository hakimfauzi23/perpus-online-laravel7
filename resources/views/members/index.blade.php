@extends('adminlte::page')


@section('title', 'Data Anggota Perpustakaan')

@section('content_header')
<h1>Data Anggota Perpustakaan</h1>
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
            <a href="{{route('create.members')}}" class="btn btn-primary">Tambah Anggota</a>
            <div class="mb-3"></div>
            <table style="text-align:center" class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>@sortablelink('id','ID MEMBER')</th>
                                            <th>@sortablelink('name','NAMA')</th>
                                            <th>@sortablelink('phone_number','NO HP')</th>
                                            <th>@sortablelink('address','ALAMAT')</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($members->count())
                                        @foreach($members as $key => $p)
                                        <tr>
                                            <td>{{ $p->id }}</td>
                                            <td>{{ $p->name }}</td>
                                            <td>{{ $p->phone_number }}</td>
                                            <td>{{ $p->address }}</td>
                                            <td>
                                        

                                                <?php $encyrpt=Crypt::encryptString($p->id) ?>                                                
                                                <a href="{{ route('details.member',$encyrpt) }}" class="btn btn-success">Details</a>

                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                
                                <br/>
                                Page : {{ $members->currentPage() }} 
                                || Total Data : {{ $members->total() }} 
                                {!! $members->appends(\Request::except('page'))->render() !!}

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