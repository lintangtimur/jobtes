@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h3 class="display-3">
    Dashboard
    <p class="lead">
        Role: {{$user->roles->pluck('name')[0]}}
      </p>
  </h3>
  
@stop

@section('content')    
    <x-adminlte-card  theme="lightblue" theme-mode="outline"
            >
            <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                    
                </thead>
                <tbody>
                    <tr>
                        <td width=150px>Nama</td>
                        <td>{{$user->nama_member}}</td>
                    </tr>
                    <tr>
                        <td>No Telp</td>
                        <td>{{$user->no_hp}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>{{$user->tanggal_lahir}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>{{$user->jenis_kelamin}}</td>
                    </tr>
                    <tr>
                        <td>No. KTP</td>
                        <td>{{$user->no_ktp}}</td>
                    </tr>
                    <tr>
                        <td>Path Foto</td>
                        <td>
                            <img src="{{asset('storage').'/'.$foto}}" alt="foto" width="10%">
                        </td>
                    </tr>
                    
                    
                </tbody>
            </table>
            </div>
        </x-adminlte-card>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop