<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PhotosController extends Controller
{
// returnamos los datos a la vista photos
    public function index(){
        
        $client = new \GuzzleHttp\Client();
        // obtenemos los datos de la api
        $request = $client->get('https://jsonplaceholder.typicode.com/photos');
        $response = $request->getBody();
        $response = \json_decode($response);
        
        return view('photos', ['data'=>$response]);
    }
    public function create(Request $r)
    {   
        $response = Http::post('https://jsonplaceholder.typicode.com/photos', [
            'title' => $r->title,
            'url' => $r->url,
            'thumbnailUrl'=>$r->thurl,
        ]);
        return response()->json(json_decode($response));

    }

    public function patch(Request $r){
        $response = Http::patch('https://jsonplaceholder.typicode.com/photos/'.$r->mdid, [
            'title' => $r->mdtitle,
            'url' => $r->mdurl,
            'thumbnailUrl'=>$r->mdthurl,
        ]);
        return response()->json(json_decode($response));
    }
    public function store($id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/photos/'.$id);
        return response()->json(json_decode($response));
    }
    public function destroy($id)
    {
        $response = Http::delete("https://jsonplaceholder.typicode.com/photos/".$id);
        return response()->json(json_decode($response));
    }
}
