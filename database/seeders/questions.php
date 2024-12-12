<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class questions extends Seeder
{
    /**
     * Run the database seeds.
     */

        public function run()
    {
        // Caminho do arquivo SQL
        $path = database_path('sql/questions.sql');
        
        // Verifica se o arquivo existe
        if (File::exists($path)) {
            $sql = File::get($path);
            DB::unprepared($sql);
        } else {
            echo "Arquivo SQL não encontrado.";
        }
    }
 }

