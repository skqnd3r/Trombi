<?php

namespace Database\Seeders;

use JeroenZwart\CsvSeeder\CsvSeeder;
use Database\Seeders\DB;


class UserSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/public/seeders/users.csv';
        $this->mapping = ['login', 'rights', 'email', 'nom', 'prenom', 'phone', 'tags', 'service'];
        $this->delimiter = ',';
        $this->timestamps = '2021-01-01 00:00:00';
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Recommended when importing larger CSVs
        // DB::disableQueryLog();
        parent::run();
    }
}