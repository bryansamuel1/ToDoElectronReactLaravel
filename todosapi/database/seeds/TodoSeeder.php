<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 1;
        while($i <10){
            $string = str_random(100). ' ' .str_random(50) . ' ' . str_random(200);
            DB::table('todos')->insert([
                'content' => $string,
                'completed' => rand(0,1),
                'created_at' => Carbon::create('2000', '01', '01'),
                'updated_at' => Carbon::create('2000', '01', '01')
            ]);
            $i++;
        }
    }
}
