# Logica del proyecto

-- Este proyecto se realiza bajo el framework de laravel 

Se crea el controlador PhotosController.php para consumir la api https://jsonplaceholder.typicode.com/posts


// returnamos los datos a la vista photos


    public function index(){
        
        $client = new \GuzzleHttp\Client();
        
        // obtenemos los datos de la api
        $request = $client->get('https://jsonplaceholder.typicode.com/photos');
        
        // obtenemos el body y lo almacenamos en la variable response
        $response = $request->getBody();
        
        // le damos formato a los datos almacenados a json
        $response = \json_decode($response);
        
        // retornamos los datos en la vista photos 
        return view('photos', ['data'=>$response]);
    }


// creacion de nueva photos para almacenar en la api

 public function create(Request $r)
    {   
      //obtenmos la ruta donde se crearan los datos en la api
      
        $response = Http::post('https://jsonplaceholder.typicode.com/photos', [
        
        // Se envian los datos obtenidos del resquest 
            'title' => $r->title,
            'url' => $r->url,
            'thumbnailUrl'=>$r->thurl,
        ]);
        return response()->json(json_decode($response));

    }

// Actualizacion las photos en la api

    public function patch(Request $r){
    
      //obtenmos la ruta donde se actualizaran los datos en la api con el id a almacenar
      
        $response = Http::patch('https://jsonplaceholder.typicode.com/photos/'.$r->mdid, [
        
         // Se envian los nuevos datos obtenidos del resquest 
         
            'title' => $r->mdtitle,
            'url' => $r->mdurl,
            'thumbnailUrl'=>$r->mdthurl,
        ]);
        return response()->json(json_decode($response));
    }
    
    // almacenamiento de las photos en la api
    public function store($id)
    {
      // Se obtiene la ruta donde se almacenaran los datos con el id a almacenar
    
        $response = Http::get('https://jsonplaceholder.typicode.com/photos/'.$id);
        
        return response()->json(json_decode($response));
    }
    
       // eliminacion de las photos en la api
    
    public function destroy($id)
    {
        // Se obtiene la ruta donde se eliminaron los datos con el id a almacenar
        
        $response = Http::delete("https://jsonplaceholder.typicode.com/photos/".$id);
       
        return response()->json(json_decode($response));
    }






