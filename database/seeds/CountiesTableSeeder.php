<?php

use Illuminate\Database\Seeder;

class CountiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $counties = ['Harjumaa', 'Pärnumaa', 'Tartumaa'];
        foreach($counties as $name) {
            $county = new \App\County();
            $county->county = $name;
            $county->save();
        }
    }
}
