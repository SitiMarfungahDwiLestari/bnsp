<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    public function run()
    {
        DB::table('bukus')->insert([
            [
                'judul' => 'Harry Potter and the Philosopher\'s Stone',
                'penulis' => 'J.K. Rowling',
                'penerbit' => 'Bloomsbury',
                'tahun_terbit' => '1997',
                'stok' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'judul' => 'To Kill a Mockingbird',
                'penulis' => 'Harper Lee',
                'penerbit' => 'J. B. Lippincott & Co.',
                'tahun_terbit' => '1960',
                'stok' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'judul' => 'The Great Gatsby',
                'penulis' => 'F. Scott Fitzgerald',
                'penerbit' => 'Charles Scribner\'s Sons',
                'tahun_terbit' => '1925',
                'stok' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'judul' => '1984',
                'penulis' => 'George Orwell',
                'penerbit' => 'Secker and Warburg',
                'tahun_terbit' => '1949',
                'stok' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'judul' => 'Pride and Prejudice',
                'penulis' => 'Jane Austen',
                'penerbit' => 'T. Egerton, Whitehall',
                'tahun_terbit' => '1813',
                'stok' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
