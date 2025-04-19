<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data for Indonesia's locations
        $locations = [
            [
                'id' => 3273160005,
                'kecamatan' => 'Kiaracondong',
                'kota' => 'Kota Bandung',
                'provinsi' => 'Jawa Barat'
            ],
            [
                'id' => 3273010001,
                'kecamatan' => 'Bandung Kulon',
                'kota' => 'Kota Bandung',
                'provinsi' => 'Jawa Barat'
            ],
            [
                'id' => 3204010002,
                'kecamatan' => 'Bandung Barat',
                'kota' => 'Kabupaten Bandung',
                'provinsi' => 'Jawa Barat'
            ],
            [
                'id' => 3171020006,
                'kecamatan' => 'Tebet',
                'kota' => 'Jakarta Selatan',
                'provinsi' => 'DKI Jakarta'
            ],
            [
                'id' => 3171010007,
                'kecamatan' => 'Kebayoran Baru',
                'kota' => 'Jakarta Selatan',
                'provinsi' => 'DKI Jakarta'
            ],
            [
                'id' => 3173010008,
                'kecamatan' => 'Tanah Abang',
                'kota' => 'Jakarta Pusat',
                'provinsi' => 'DKI Jakarta'
            ],
            [
                'id' => 3173020009,
                'kecamatan' => 'Menteng',
                'kota' => 'Jakarta Pusat',
                'provinsi' => 'DKI Jakarta'
            ],
            [
                'id' => 3578010010,
                'kecamatan' => 'Sukolilo',
                'kota' => 'Kota Surabaya',
                'provinsi' => 'Jawa Timur'
            ],
            [
                'id' => 3578020011,
                'kecamatan' => 'Gubeng',
                'kota' => 'Kota Surabaya',
                'provinsi' => 'Jawa Timur'
            ],
            [
                'id' => 3374010012,
                'kecamatan' => 'Tembalang',
                'kota' => 'Kota Semarang',
                'provinsi' => 'Jawa Tengah'
            ],
            [
                'id' => 3374020013,
                'kecamatan' => 'Candisari',
                'kota' => 'Kota Semarang',
                'provinsi' => 'Jawa Tengah'
            ],
            [
                'id' => 1271010014,
                'kecamatan' => 'Medan Amplas',
                'kota' => 'Kota Medan',
                'provinsi' => 'Sumatera Utara'
            ],
            [
                'id' => 1271020015,
                'kecamatan' => 'Medan Denai',
                'kota' => 'Kota Medan',
                'provinsi' => 'Sumatera Utara'
            ],
            [
                'id' => 1371010016,
                'kecamatan' => 'Padang Barat',
                'kota' => 'Kota Padang',
                'provinsi' => 'Sumatera Barat'
            ],
            [
                'id' => 1371020017,
                'kecamatan' => 'Padang Timur',
                'kota' => 'Kota Padang',
                'provinsi' => 'Sumatera Barat'
            ],
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
} 