<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'email' => 'admin@gmail.com',
                'phone_number' => '111222333',
                'avatar_url' => null,
                'is_active' => true,
                'is_admin' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'jan_kowalski',
                'password' => Hash::make('haslo123'),
                'email' => 'jan@o2.pl',
                'phone_number' => '999888777',
                'avatar_url' => null,
                'is_active' => true,
                'is_admin' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);

        DB::table('categories')->insert([
            ['name' => 'Motoryzacja', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Elektronika', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Nieruchomości', 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('listings')->insert([
            [
                'title' => 'Sprzedam Opla Astrę',
                'description' => 'Niemiec płakał jak sprzedawał. Stan igła.',
                'photo_url' => 'opel.jpg',
                'category_id' => 1,
                'author_id' => 2,
                'price' => 15000.00,
                'location' => 'Warszawa',
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Laptop Dell XPS',
                'description' => 'Idealny do programowania w Laravelu.',
                'photo_url' => 'dell.jpg',
                'category_id' => 2,
                'author_id' => 1,
                'price' => 4500.50,
                'location' => 'Kraków',
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);

        DB::table('favourites')->insert([
            [
                'user_id' => 2,
                'listing_id' => 2
            ]
        ]);

        DB::table('messages')->insert([
            [
                'sender_id' => 2,
                'receiver_id' => 1,
                'listing_id' => 2,
                'message_content' => 'Czy cena podlega negocjacji?',
                'is_read' => false,
                'created_at' => $now,
            ]
        ]);

        $this->call(CitiesSeeder::class);

    }
}
