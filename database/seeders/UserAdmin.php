<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'sebastina.aguilera@indivisual.cl')->first()?? new User;
        $user->name = 'Sebastián Aguilera';
        $user->email = 'sebastina.aguilera@indivisual.cl';
        $user->password = bcrypt('31739869');
        $user->email_verified_at = now();
        $user->save();

        $user = User::where('email', 'luis.chavez@indivisual.cl')->first()?? new User;
        $user->name = 'Luis Chavez';
        $user->email = 'luis.chavez@indivisual.cl';
        $user->password = bcrypt('61796366');
        $user->email_verified_at = now();
        $user->save();

        $user = User::where('email', 'web-admin@lakitasdearica.cl')->first()?? new User;
        $user->name = 'web-admin';
        $user->email = 'web-admin@lakitasdearica.cl';
        $user->password = bcrypt('4690094226');
        $user->email_verified_at = now();
        $user->save();
    }
}
