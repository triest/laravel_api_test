<?php

namespace App\Http\Controllers;

use App\Services\HttpClient;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index(Request $request)
    {
        $response = app(HttpClient::class)->send($request->toArray());
        $data = json_decode( $response->getBody()->getContents(),true);
        return response()->json(
                $data,
                $response->getStatusCode()
        );
    }
}
