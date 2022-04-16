<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = "Joe";
        $admin->email = "joe@admin.com";
        $admin->admin = True;
        $admin->email_verified_at = now();
        $admin->password= bcrypt("admin");
        $admin->remember_token = "sdfsdfdsgdfse";
        $admin->save();
        User::factory()->count(5)->create();
    }
}
