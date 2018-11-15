<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//DB::table('users')->insert([
		//	'name' => str_random(10),
		//	'email' => str_random(10).'@gmail.com',
		//	'password' => bcrypt('secret'),
		//]);
		//factory(App\User::class, 20)->create()->each(function ($u) {
		//	$u->posts()->save(factory(App\Post::class)->make());
		//});
		//调用模型工厂一次性填充30个数据
		factory(\App\User::class,30)->create();
		//修改第一个数据为管理员
		$user = \App\User::find(1);
		$user->name = '胜哥';
		$user->email = '714438134@qq.com';
		$user->password = bcrypt('123456');
		$user->is_admin = 1;
		$user->save();
    }
}
