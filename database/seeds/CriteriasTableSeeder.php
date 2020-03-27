<?php

use Illuminate\Database\Seeder;

class CriteriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
        		'name' => 'processor', 
        		'value' => 'Quadcore 2,3 GHz', 
        		'score' => '15', 
        		'product_id' => '1', 
        		'created_at' => date('Y-m-d H:i:s')
        	], [
        		'name' => 'resolution', 
        		'value' => 'full HD', 
        		'score' => '10', 
        		'product_id' => '1', 
        		'created_at' => date('Y-m-d H:i:s')
        	], [
        		'name' => 'ram', 
        		'value' => '16 Gb', 
        		'score' => '10', 
        		'product_id' => '1', 
        		'created_at' => date('Y-m-d H:i:s')
        	], [
        		'name' => 'certificate', 
        		'value' => 'energy star 100 certified', 
        		'score' => '5', 
        		'product_id' => '1', 
        		'created_at' => date('Y-m-d H:i:s')
        	], [
        		'name' => 'price', 
        		'value' => '2500', 
        		'score' => 60, 
        		'product_id' => '1', 
        		'created_at' => date('Y-m-d H:i:s')
        	]
        ];

        DB::table('criterias')->insert($data);
    }
}
