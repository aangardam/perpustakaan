<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = [
    		[
    			'name' => 'super_admin',
    			'display_name' => 'Administration',
    			'description' => 'Only one and only admin',
    		]
    	];
    	foreach ($roles as $key => $value) {
    		Role::create($value);
    	}
//add user
    	$users = [
    		[
    			'name' => 'Administrator',
    			'email' => 'admin@local.local',
    			'password' => bcrypt('111'),
    		],
    	];
    	$n=1;
    	foreach ($users as $key => $value) {
    		$user=User::create($value);
    		$user->attachRole($n);
    		$n++;
    	}
    }
}
