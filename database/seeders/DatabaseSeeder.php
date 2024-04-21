<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);

        Book::factory(30)->create();
        $bookIds = Book::all()->pluck('id');
        foreach ($bookIds as $id){
            Chapter::factory(20)->create([
                'book_id'=>$id
            ]);
        }

    }
}
