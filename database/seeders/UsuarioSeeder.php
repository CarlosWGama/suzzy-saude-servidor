<?php

namespace Database\Seeders;

use App\Models\Usuario;
use App\Models\UsuariosExtras;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //
        $usuario = Usuario::create(['nome' => 'Admin', 'email' => 'admin@admin.com', 'senha' => bcrypt('123456')]);
        UsuariosExtras::create(['usuario_id' => $usuario->id]);
    }
}
