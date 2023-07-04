<?php

namespace Database\Seeders;


use App\Models\User;
use Carbon\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createAdminUser();
        $this->createUser();
    }


    private function createAdminUser()
    {

        $user = User::factory()->make([
            'type' => User::TYPE_ADMIN,
            'name' => 'مدیر اصلی',
            'email' => 'admin@gmail.com',
            'mobile' => '+989111111111'
        ]);

        $user->save();


        $this->command->info('کاربر ادمین اصلی سایت ایجاد شد');

    }
    private function createUser()
    {

        $user = User::factory()->make([
            'name' => 'کاربر یک',
            'email' => 'user@gmail.com',
            
        ]);

        $user->save();


        $this->command->info('یک کاربر پیش فرض هم به سیستم اضافه شد');

    }
}