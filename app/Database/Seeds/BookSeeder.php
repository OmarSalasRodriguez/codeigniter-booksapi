<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        log_message('debug', 'Authors seeding started.');
        $authorsData = [
            ["name" => "Juan Perez"],
            ["name" => "Raul Lopez"],
            ["name" => "Maria Garcia"],
        ];

        $this->db->table('authors')->insertBatch($authorsData);

        $authors = $this->db->table('authors')->get()->getResultArray();

        $authorsByName = array_column($authors, 'id', 'name');
        // [ "Juan Perez" => 1, "Raul Lopez" => 2, "Maria Garcia" => 3" ]

        $booksData = [
            [
                "title" => "Spanish",
                "author_id" => $authorsByName["Juan Perez"],
                "year" => 2020,
            ],
            [
                "title" => "English",
                "author_id" => $authorsByName["Raul Lopez"],
                "year" => 2021,
            ],
            [
                "title" => "French",
                "author_id" => $authorsByName["Maria Garcia"],
                "year" => 2022,
            ]
        ];

        log_message('debug', "AUTHORS DATA:");
        log_message('debug', print_r($authorsData, true));

        log_message('debug', "BOOKS DATA:");
        log_message('debug', print_r($booksData, true));

        $this->db->table('books')->insertBatch($booksData);
        log_message('debug', 'Authors seeded successfully.');
    }
}
