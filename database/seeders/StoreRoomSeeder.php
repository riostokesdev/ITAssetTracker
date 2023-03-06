<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class StoreRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee = Employee::create([
            'name' => 'StoreRoom',
            'job_title' => 'StoreRoom',
            'manager' => 'StoreRoom',
            'office' => 'StoreRoom'
        ]);

    }
}
