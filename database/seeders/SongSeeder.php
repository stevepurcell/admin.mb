<?php

namespace Database\Seeders;

use App\Models\Song;
use App\Models\Member;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create(['name' => 'New', 'style' => 'info']);
        Status::create(['name' => 'In Process', 'style' => 'warning']);
        Status::create(['name' => 'Ready', 'style' => 'primary']);
        Status::create(['name' => 'Wish List', 'style' => 'success']);


        Member::create(['name'	=> 'Steve R.']);
        Member::create(['name'	=> 'Luke']);
        Member::create(['name'	=> 'Jason']);
        Member::create(['name'	=> 'Steve P.']);
        Member::create(['name'	=> 'Luke/Steve']);
        Member::create(['name'	=> 'TBD']);
        Member::create(['name'	=> 'N/A']);

        User::create(['id' => 1, 'name' => 'Steve P',   'email' => 'smp103@gmail.com',              'password' => '$2y$10$WwelQOMECP9MbiXKlV/BcOd8EY26q.MV71dnXbcSCqr1CsxC2kC56']);
        User::create(['id' => 2, 'name' => 'Luke',	    'email' => 'lucaskemm@hotmail.com',         'password' => '$2y$10$WwelQOMECP9MbiXKlV/BcOd8EY26q.MV71dnXbcSCqr1CsxC2kC56']);
        User::create(['id' => 3, 'name' => 'Steve R',	'email' => 'stephen.rosseter@charter.net',  'password' => '$2y$10$WwelQOMECP9MbiXKlV/BcOd8EY26q.MV71dnXbcSCqr1CsxC2kC56']);
        User::create(['id' => 4, 'name' => 'Jason',	    'email' => 'jaytshepard@gmail.com',         'password' => '$2y$10$WwelQOMECP9MbiXKlV/BcOd8EY26q.MV71dnXbcSCqr1CsxC2kC56']);
        User::create(['id' => 5, 'name' => 'Admin',	    'email' => 'admin@admin.com',               'password' => '$2y$10$WwelQOMECP9MbiXKlV/BcOd8EY26q.MV71dnXbcSCqr1CsxC2kC56']);

        Song::create(['name' => 'Hot Cross Buns',       'artist' => 'Tokyo Drifters',               'created_by' => 1, 'status_id' => 1]);
        Song::create(['name' => 'Row Row Row',	        'artist' => 'Camelback Quartet',            'created_by' => 2, 'status_id' => 4]);
        Song::create(['name' => 'Twinkle Twinkle',	    'artist' => 'Junction Singers',             'created_by' => 3, 'status_id' => 3]);
        Song::create(['name' => 'Rain Rain Go Away',    'artist' => 'Stoughton 3rd Grade Choir',    'created_by' => 4, 'status_id' => 2]);
        Song::create(['name' => 'Happy Birthday',	    'artist' => 'Billy Ray Cyrus',              'created_by' => 1, 'status_id' => 2]);

    }
}
