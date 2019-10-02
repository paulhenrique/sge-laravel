<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class create_admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'FabSoftware',
            'email' => 'fabsoftware@ifsp.com',
            'password' => Hash::make('FabsoftwareIFSP'),
            'CPF' =>  '12345678912',
            'tipoUser' =>  'admin',
        ]);
    }
}
