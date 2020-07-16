<?php

use App\Student;
use App\StudentMark;
use App\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ClearTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        StudentMark::truncate();
        Student::truncate();
        Subject::truncate();
        Schema::enableForeignKeyConstraints();
    }
}
