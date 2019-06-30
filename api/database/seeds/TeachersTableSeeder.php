<?php

use Illuminate\Database\Seeder;
use App\Teachers;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objTeacher = new Teachers();
        $objTeacher->name = 'Emily';
        $objTeacher->save();
        
        
        $objTeacher = new Teachers();
        $objTeacher->name = 'Isabella';
        $objTeacher->save();
                
    }
}
