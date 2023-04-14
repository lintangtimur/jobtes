<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = DB::table('users')->insert([
            'nama_member'=>'lintang',
            'email'=> 'lintang@gmail.com',
            'no_hp'=> '085156714855',
            'password'=> Hash::make('12345678'),
            'tanggal_lahir'=> Carbon::createFromDate(1997,5,24,"Asia/Jakarta"),
            'jenis_kelamin'=>"L",
            "no_ktp"=>"3374132405970001",
            "path_foto"=> "111111"
        ]);

        $u = DB::table('users')->insert([
            'nama_member'=>'member',
            'email'=> 'member@gmail.com',
            'no_hp'=> '085156714851',
            'password'=> Hash::make('12345678'),
            'tanggal_lahir'=> Carbon::createFromDate(1997,5,24,"Asia/Jakarta"),
            'jenis_kelamin'=>"P",
            "no_ktp"=>"3374132405970002",
            "path_foto"=> "111111"
        ]);

        
    }
}
