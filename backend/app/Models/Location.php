<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'kecamatan',
        'kota',
        'provinsi',
    ];

    /**
     * Search for locations based on search term
     *
     * @param string $search
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function search($search)
    {
        return self::where('kecamatan', 'like', "%{$search}%")
            ->orWhere('kota', 'like', "%{$search}%")
            ->orWhere('provinsi', 'like', "%{$search}%")
            ->get();
    }
} 