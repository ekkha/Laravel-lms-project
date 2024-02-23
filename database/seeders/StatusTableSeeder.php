<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'name' => 'Employee application created'
           
        ]);
        Status::create([
            'name' => 'Employee application approved',
          
        ]);
        Status::create([
            'name' => 'Employee application Rejected',
          
        ]);
    }
}
