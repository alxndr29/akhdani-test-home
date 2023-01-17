<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerdinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getDistanceBetweenTwoPoints($point1, $point2)
    {
        // array of lat-long i.e  $point1 = [lat,long]
        $earthRadius = 6371;  // earth radius in km
        $point1Lat = $point1[0];
        $point2Lat = $point2[0];
        $deltaLat = deg2rad($point2Lat - $point1Lat);
        $point1Long = $point1[1];
        $point2Long = $point2[1];
        $deltaLong = deg2rad($point2Long - $point1Long);
        $a = sin($deltaLat / 2) * sin($deltaLat / 2) + cos(deg2rad($point1Lat)) * cos(deg2rad($point2Lat)) * sin($deltaLong / 2) * sin($deltaLong / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earthRadius * $c;
        return $distance;    // in km

        // try {
        //     $client = new GuzzleHttp\Client();
        //     $request = new \GuzzleHttp\Psr7\Request('GET', 'https://maps.googleapis.com/maps/api/distancematrix/json?origins=' . $latitude_origin . '%2C' . $longitude_destination . '&destinations=' . $value->latitude . '%2C' . $value->longitude . '&key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k');
        //     $promise = $client->sendAsync($request)->then(function ($response) use ($value) {
        //         $result = json_decode($response->getBody());
        //         $value->jarak = $result->rows[0]->elements[0]->distance->text;
        //     });
        //     $promise->wait();
        // } catch (\Exception $e) { }
    }
}
