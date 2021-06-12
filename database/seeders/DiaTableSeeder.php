<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dia')->insert(['descricao' => 'Segunda-feira']);
        DB::table('dia')->insert(['descricao' => 'Terça-feira']);
        DB::table('dia')->insert(['descricao' => 'Quarta-feira']);
        DB::table('dia')->insert(['descricao' => 'Quinta-feira']);
        DB::table('dia')->insert(['descricao' => 'Sexta-feira']);
    }
}
