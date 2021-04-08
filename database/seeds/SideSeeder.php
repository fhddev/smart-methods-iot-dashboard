<?php

use Illuminate\Database\Seeder;
use App\Side;

class SideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $items = [
            [
                'name' => 'Right'
            ],
            [
                'name' => 'Left'
            ],
            [
                'name' => 'Forward'
            ],
            [
                'name' => 'Backward'
            ],
        ];

        foreach ($items as $item)
        {
            $exists = Side::where('name', $item['name'])->first();
            if ($exists === null)
            {
                $newRecord = new Side;
                
                $newRecord->name = $item['name'];
                
                $newRecord->save();
            }
        }
    }
}
