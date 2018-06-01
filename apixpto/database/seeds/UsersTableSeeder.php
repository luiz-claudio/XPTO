<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $senha = bcrypt('testejc');
        
     
        DB::insert('insert into users
    (name,email,password)
    values (?,?,?)',array('TesteJc','jc@teste.com.br',$senha));

    }
}
