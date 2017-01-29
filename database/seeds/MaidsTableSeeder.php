<?php

use Illuminate\Database\Seeder;

class MaidsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Maid::class, 50)->create()->each(function ($u) {
            for($i = 0; $i<=6; $i++) {
                $workHour = factory(App\WorkHours::class)->make();
                $workHour->day = $i;
                $u->workHours()->save($workHour);
            }
            for($i = rand(1,3); $i<=rand(1,3); $i++) {
               $u->counties()->attach($i);
            }
        });
    }
}
