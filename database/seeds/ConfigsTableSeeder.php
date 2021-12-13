<?php

use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Config::insert([
            ['name' => 'site_name', 'value' => 'Ahmed Shahin Blog'],
            ['name' => 'site_title', 'value' => 'Ahmed Shahin Blog'],
            ['name' => 'copyright_owner', 'value' => 'Ahmed Shahin Blog'],
            ['name' => 'admin_email', 'value' => 'ahmedshahin388@gmail.com'],
        ]);
    }
}
