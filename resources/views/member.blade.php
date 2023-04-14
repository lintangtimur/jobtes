@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
<h3 class="display-3">
    Users/Members
    <p class="lead">
        {{-- Role: {{$user->roles->pluck('name')[0]}} --}}
      </p>
  </h3>
  
@stop

@section('content')

    @if (\Session::has('message'))
    <x-adminlte-alert theme="success" title="Success" dismissable>
        {{Session::get('message')}}
    </x-adminlte-alert>
    @endif

    @can('create member')
    <a href="{{route('member.add')}}" class="btn btn-info mb-2">Tambah User</a>
    @endcan
    

    <x-adminlte-card  theme="lightblue" theme-mode="outline"
            >
            <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>No KTP</th>
                    <th>Tgl Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>{{$item->nama_member}}</td>
                        <td>{{$item->roles->first()->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->no_hp}}</td>
                        <td>{{$item->no_ktp}}</td>
                        <td>{{$item->tanggal_lahir}}</td>
                        <td>{{$item->jenis_kelamin}}</td>
                        <td>
                            @can('edit member')
                            <a href="{{URL::signedRoute('member.show', $item->id)}}" class="btn-sm btn-info">Edit</a>
                            @endcan
                            @can('delete member')
                            <a href="{{URL::signedRoute('member.destroy', $item->id)}}" class="btn-sm btn-danger">Delete</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
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