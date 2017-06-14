<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $this->call(LevelTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(FakultasTableSeeder::class);
        $this->call(JurusanTableSeeder::class);
        $this->call(KelasTableSeeder::class);
        $this->call(MatakuliahTableSeeder::class);
        $this->call(JamTableSeeder::class);
        $this->call(MahasiswaTableSeeder::class);
        $this->call(DosenTableSeeder::class);
        $this->call(adminTableSeeder::class);
        $this->call(jadwalTableSeeder::class);
        $this->call(NilaiTableSeeder::class);
        $this->call(KHSTableSeeder::class);
        $this->call(KRSTableSeeder::class);
    }
}
