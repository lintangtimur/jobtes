<?php

namespace App\Services;

use App\Models\User;
use DB;
use Hash;
use Request;
use Spatie\Permission\Models\Role;

class MemberService
{
    /**
     * store
     *
     * @param [type] $editUserRequest
     * @param string $foto_path
     
     */
    public function store($editUserRequest, $foto_path)
    {
        return DB::transaction(function () use ($editUserRequest, $foto_path){
            $u = new User();
            $u->nama_member = $editUserRequest->nama_member;
            $u->email = $editUserRequest->email;
            $u->no_hp = $editUserRequest->no_hp;
            $u->tanggal_lahir = $editUserRequest->tanggal_lahir;
            $u->jenis_kelamin = $editUserRequest->jenis_kelamin;
            $u->no_ktp = $editUserRequest->no_ktp;
            $u->path_foto = $foto_path;
            $u->password = Hash::make($editUserRequest->password);
            $u->save();

            $role = Role::findByName($editUserRequest->role);
            $u->assignRole($role);

            
        });
    }

    public function register_store($editUserRequest, $foto_path)
    {
        return DB::transaction(function () use ($editUserRequest, $foto_path){
            $u = new User();
            $u->nama_member = $editUserRequest->nama_member;
            $u->email = $editUserRequest->email;
            $u->no_hp = $editUserRequest->no_hp;
            $u->tanggal_lahir = $editUserRequest->tanggal_lahir;
            $u->jenis_kelamin = $editUserRequest->jenis_kelamin;
            $u->no_ktp = $editUserRequest->no_ktp;
            $u->path_foto = $foto_path;
            $u->password = Hash::make($editUserRequest->password);
            $u->save();

            $role = Role::findByName('member');
            $u->assignRole($role);

            
        });
    }
    
    /**
     * update data
     *
     * @param [type] $editUserRequest
     * @param string $foto_path
     */
    public function update($editUserRequest, $foto_path)
    {
        
        return DB::transaction(function () use ($editUserRequest, $foto_path){
            
            $u = User::find($editUserRequest->id);
            $u->nama_member = $editUserRequest->nama_member;
            $u->email = $editUserRequest->email;
            $u->no_hp = $editUserRequest->no_hp;
            $u->tanggal_lahir = $editUserRequest->tanggal_lahir;
            $u->jenis_kelamin = $editUserRequest->jenis_kelamin;
            $u->no_ktp = $editUserRequest->no_ktp;
            if($foto_path != null){
                $u->path_foto = $foto_path;
            }
            
            $u->save();

            $u->syncRoles($editUserRequest->role);
        });
    }
}