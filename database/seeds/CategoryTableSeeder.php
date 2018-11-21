<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		foreach(['上单','打野','中单','AD','辅助'] as $v){
			DB::table('categories')
				->insert([
					'title' => $v,
					'icon' => 'fa fa-bar-chart-o',
				]);
		}
    }
}
