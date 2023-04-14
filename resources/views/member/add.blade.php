@extends('adminlte::page')

@section('title', 'Add Member')

@section('content_header')
<h3 class="display-3">
    User
    <p class="lead">
        
      </p>
  </h3>
  
@stop

@section('content')    
<div class="row">
    <div class="col-sm-8">
        @if ($errors->any())
        <x-adminlte-alert theme="danger" title="Danger" dismissable>
            
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            
        </x-adminlte-alert>
        @endif

        @if (\Session::has('message'))
        <x-adminlte-alert theme="success" title="Success" dismissable>
            {{Session::get('message')}}
        </x-adminlte-alert>
        
    @endif
        

        <x-adminlte-card title="Form add user" theme="lightblue" theme-mode="outline"
            icon="fas fa-lg fa-envelope" header-class="text-uppercase rounded-bottom border-info"
            >
            <form action="{{route('member.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label" for="project">Nama</label>
                    <input class="form-control {{ $errors->has('nama_member') ? 'is-invalid' : '' }}" value="{{old('nama_member')}}" type="text" name="nama_member" id="nama_member">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="project">Password</label>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" value="{{old('password')}}" type="password" name="password" id="password">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="project">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="">Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="member">Member</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="project">E-mail</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{old('email')}}" type="email" name="email" id="email">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="project">No HP</label>
                    <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" value="{{old('no_hp')}}" type="text" name="no_hp" id="no_hp">
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="project">No KTP</label>
                    <input class="form-control {{ $errors->has('no_ktp') ? 'is-invalid' : '' }}" value="{{old('no_ktp')}}" type="text" name="no_ktp" id="no_ktp">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="project">Foto</label>
                    <input required class="form-control {{ $errors->has('foto') ? 'is-invalid' : '' }}" value="{{'foto'}}" type="file" name="foto" id="foto">
                </div>

                <div class="form-group mb-3">
                    <div class="col-md-4">
                        <label class="form-label" for="jp">Jenis Kelamin</label>
                        <select class="form-control {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                
        
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label" for="waktu">Tanggal Lahir</label>
                            <input class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}" value="{{old('tanggal_lahir')}}" type="date" name="tanggal_lahir" id="tanggal_lahir">
                        </div>
                    </div>
                </div>
    
                
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </x-adminlte-card>
        
    </div>
</div>
@stop


@section('plugins.Select2', true)
@section('plugins.tempusdominus', true)
@section('js')


<script>
    $('#jenis_kelamin').select2();


    
</script>
@stop