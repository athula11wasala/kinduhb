<?php

use Illuminate\Database\Seeder;
use App\Classes;

class ClassesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $objClass = new Classes();
        $objClass->name = 'A';
        $objClass->save();

        $objClass = new Classes();
        $objClass->name = 'B';
        $objClass->save();

        $objClass = new Classes();
        $objClass->name = 'C';
        $objClass->save();
    }

}
