<?php

// Enable CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

// Get the request URI
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';

// Handle API routes
if (strpos($requestUri, '/api/locations') === 0) {
    $search = $_GET['search'] ?? '';
    
    if (empty($search) || strlen($search) < 2) {
        echo json_encode([]);
        exit;
    }
    
    // Comprehensive data for Indonesia's locations
    $locations = [
        // Jawa Barat
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
            'id' => 3273020003,
            'kecamatan' => 'Coblong',
            'kota' => 'Kota Bandung',
            'provinsi' => 'Jawa Barat'
        ],
        [
            'id' => 3273030004,
            'kecamatan' => 'Bojong Loa Kaler',
            'kota' => 'Kota Bandung',
            'provinsi' => 'Jawa Barat'
        ],
        [
            'id' => 3217010011,
            'kecamatan' => 'Cimahi Selatan',
            'kota' => 'Kota Cimahi',
            'provinsi' => 'Jawa Barat'
        ],
        [
            'id' => 3217020012,
            'kecamatan' => 'Cimahi Tengah',
            'kota' => 'Kota Cimahi',
            'provinsi' => 'Jawa Barat'
        ],
        [
            'id' => 3201010013,
            'kecamatan' => 'Ciawi',
            'kota' => 'Kabupaten Bogor',
            'provinsi' => 'Jawa Barat'
        ],
        
        // DKI Jakarta
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
            'id' => 3172010014,
            'kecamatan' => 'Tanjung Priok',
            'kota' => 'Jakarta Utara',
            'provinsi' => 'DKI Jakarta'
        ],
        [
            'id' => 3172020015,
            'kecamatan' => 'Pademangan',
            'kota' => 'Jakarta Utara',
            'provinsi' => 'DKI Jakarta'
        ],
        [
            'id' => 3175010016,
            'kecamatan' => 'Matraman',
            'kota' => 'Jakarta Timur',
            'provinsi' => 'DKI Jakarta'
        ],
        
        // Jawa Timur
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
            'id' => 3578030018,
            'kecamatan' => 'Rungkut',
            'kota' => 'Kota Surabaya',
            'provinsi' => 'Jawa Timur'
        ],
        [
            'id' => 3578040019,
            'kecamatan' => 'Wonokromo',
            'kota' => 'Kota Surabaya',
            'provinsi' => 'Jawa Timur'
        ],
        [
            'id' => 3573010020,
            'kecamatan' => 'Sukun',
            'kota' => 'Kota Malang',
            'provinsi' => 'Jawa Timur'
        ],
        
        // Jawa Tengah
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
            'id' => 3374030021,
            'kecamatan' => 'Pedurungan',
            'kota' => 'Kota Semarang',
            'provinsi' => 'Jawa Tengah'
        ],
        [
            'id' => 3372010022,
            'kecamatan' => 'Laweyan',
            'kota' => 'Kota Surakarta',
            'provinsi' => 'Jawa Tengah'
        ],
        
        // Sumatera Utara
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
            'id' => 1271030023,
            'kecamatan' => 'Medan Helvetia',
            'kota' => 'Kota Medan',
            'provinsi' => 'Sumatera Utara'
        ],
        
        // Sumatera Barat
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
        [
            'id' => 1371030024,
            'kecamatan' => 'Padang Utara',
            'kota' => 'Kota Padang',
            'provinsi' => 'Sumatera Barat'
        ],
        
        // Bali
        [
            'id' => 5171010025,
            'kecamatan' => 'Denpasar Barat',
            'kota' => 'Kota Denpasar',
            'provinsi' => 'Bali'
        ],
        [
            'id' => 5171020026,
            'kecamatan' => 'Denpasar Timur',
            'kota' => 'Kota Denpasar',
            'provinsi' => 'Bali'
        ],
        [
            'id' => 5171030027,
            'kecamatan' => 'Denpasar Selatan',
            'kota' => 'Kota Denpasar',
            'provinsi' => 'Bali'
        ],
        
        // Sulawesi Selatan
        [
            'id' => 7371010028,
            'kecamatan' => 'Makassar',
            'kota' => 'Kota Makassar',
            'provinsi' => 'Sulawesi Selatan'
        ],
        [
            'id' => 7371020029,
            'kecamatan' => 'Mariso',
            'kota' => 'Kota Makassar',
            'provinsi' => 'Sulawesi Selatan'
        ],
        [
            'id' => 7371030030,
            'kecamatan' => 'Tamalate',
            'kota' => 'Kota Makassar',
            'provinsi' => 'Sulawesi Selatan'
        ],
    ];
    
    // Filter locations based on search term
    $filteredLocations = array_filter($locations, function($location) use ($search) {
        return stripos($location['kecamatan'], $search) !== false || 
               stripos($location['kota'], $search) !== false || 
               stripos($location['provinsi'], $search) !== false;
    });
    
    echo json_encode(array_values($filteredLocations));
    exit;
}

// Default response for other routes
header('Content-Type: text/html');
echo "Location Search API Server"; 