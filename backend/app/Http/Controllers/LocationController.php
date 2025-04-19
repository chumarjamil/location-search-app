<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Search for locations
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $search = $request->input('search', '');

        if (empty($search) || strlen($search) < 2) {
            return response()->json([]);
        }

        $locations = Location::search($search);

        return response()->json($locations);
    }
} 