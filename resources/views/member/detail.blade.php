@extends('adminlte::page')

@section('title', 'Edit Member')

@section('content_header')
<h3 class="display-3">
    User
    <p class="lead">
        ID: {{$user->id}}
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
        

        <x-adminlte-card title="Form edit user" theme="lightblue" theme-mode="outline"
            icon="fas fa-lg fa-envelope" header-class="text-uppercase rounded-bottom border-info"
            >
            <form action="{{route('member.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="mb-3">
                    <label class="form-label" for="project">Nama</label>
                    <input class="form-control {{ $errors->has('nama_member') ? 'is-invalid' : '' }}" value="{{$user->nama_member}}" type="text" name="nama_member" id="nama_member">
                </div>

                <div class="form-group mb-3">
                    <div class="col-md-4">
                        <label class="form-label" for="jp">Role</label>
                        <select class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}" name="role" id="role">
                            @if ($user->roles->pluck('name')[0] == "admin")
                            <option value="admin" selected>Admin</option>    
                            <option value="member">Member</option>
                            @else
                            <option value="admin" >Admin</option>    
                            <option value="member" selected>Member</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="project">E-mail</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{$user->email}}" type="email" name="email" id="email">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="project">No HP</label>
                    <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" value="{{$user->no_hp}}" type="text" name="no_hp" id="no_hp">
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="project">No KTP</label>
                    <input class="form-control {{ $errors->has('no_ktp') ? 'is-invalid' : '' }}" value="{{$user->no_ktp}}" type="text" name="no_ktp" id="no_ktp">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="project">Foto</label>
                    <input class="form-control {{ $errors->has('foto') ? 'is-invalid' : '' }}" value="{{$user->foto}}" type="file" name="foto" id="foto">
                </div>

                <div class="form-group mb-3">
                    <div class="col-md-4">
                        <label class="form-label" for="jp">Jenis Kelamin</label>
                        <select class="form-control {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}" name="jenis_kelamin" id="jenis_kelamin">
                            @if ($user->jenis_kelamin == "L")
                            <option value="L" selected>Laki-Laki</option>    
                            <option value="P">Perempuan</option>
                            @else
                            <option value="L">Laki-Laki</option>    
                            <option value="P" selected>Perempuan</option>
                            @endif
                            
                            
                        </select>
                    </div>
                </div>
                
        
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label" for="waktu">Tanggal Lahir</label>
                            <input class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}" value="{{old('tanggal_lahir', $user->tanggal_lahir)}}" type="date" name="tanggal_lahir" id="tanggal_lahir">
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
    // moment().tz("Asia/Jakarta").format();
    // tempusDominus.extend(window.tempusDominus.plugins.customDateFormat);
    // tempusDominus.extend(window.tempusDominus.plugins.moment_parse,'DD/MM/yyyy HH:mm:ss');
    
    // const datetimepicker1 = new tempusDominus.TempusDominus(document.getElementById('mulai'),
    // {
    //     display:{
    //         sideBySide: true,
    //     },
        
    //     localization: {
    //     /**
    //      * This is only used with the customDateFormat plugin
    //      */
    //     ordinal: (n) => n,
    //     /**
    //      * This is only used with the customDateFormat plugin
    //      */
    //     format: 'dd-MM-yyyy HH:mm:ss'
    // }
    // });

    // datetimepicker1.dates.setFromInput  = function(date){
        
    //     moment(date).format('DD/MM/yyyy HH:mm:ss')
    //     console.log(date);
    // } 

    // const datetimepicker2 = new tempusDominus.TempusDominus(document.getElementById('akhir'),
    // {
    //     localization: {
    //     /**
    //      * This is only used with the customDateFormat plugin
    //      */
    //     ordinal: (n) => n,
    //     /**
    //      * This is only used with the customDateFormat plugin
    //      */
    //     format: 'dd-MM-yyyy HH:mm:ss'
    // }
    // });

    // datetimepicker2.dates.formatInput = date => moment(date).format('yyyy-MM-dd HH:mm:ss')

    
</script>
@stop