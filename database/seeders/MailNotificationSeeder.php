<?php

namespace Database\Seeders;

use App\Models\MailNotification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MailNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MailNotification::factory(20)->create();
    }
}
