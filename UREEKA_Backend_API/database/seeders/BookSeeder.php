<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\BookFactory;
use App\Models\Book;

class BookSeeder extends Seeder
{

    public function run(): void
    {
        Book::factory(BookFactory::class)->create([
            'judul' => 'dummy book',
            'isbn' => '1234567654321',
            'penulis' => 'dummy author',
            'tahun_terbit' => 2024
        ]);
        
        Book::factory(BookFactory::class)->count(10)->create();
    }
}
