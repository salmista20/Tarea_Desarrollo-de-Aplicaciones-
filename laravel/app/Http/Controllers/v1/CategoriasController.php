<?php
 
namespace App\Http\Controllers\v1;
 
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
 
class CategoriasController extends Controller
{
  
    public function getAll()
    {
        $response = new \stdClass();

        $categoria = Categoria::all();

        $response->success=true;
        $response->data=$categoria;


        return response()->json($response,200);
    }
    public function getItem($id)
    {
        $response = new \stdClass();

        $categoria = Categoria::find($id);

        $response->data = $categoria;
        $response->success=true;

        return response()->json($response,200);

    }
    public function store(Request $request)
    {
        $response = new \stdClass();

        $categoria = new Categoria();
        $categoria->codigo=$request->codigo;
        $categoria->nombre=$request->nombre;
        $categoria->save();       

        
        $response->data = $categoria;
        $response->success=true;
        return response()->json($response,200);
    }

    public function update (Request $request,$id)
    {
        $response = new \stdClass();
        
        $categoria = Categoria::find($id);
        $categoria->codigo=$request->codigo;
        $categoria->nombre=$request->nombre;
        $categoria->save();

        
        $response->data=$categoria;
        $response->success=true;


        return response()->json($response,200);
    }

    public function pachUpdate(Request $request,$id)
    {
        $response = new \stdClass();
        
        $categoria = Categoria::find($id);

        if($request->codigo!=null)
        {
            $categoria->codigo=$request->codigo;
        } 
        if($request->codigo!=null)
        {
            $categoria->nombre=$request->nombre;
        } 
                
        $categoria->save();
        
        $response->data=$categoria;
        $response->success=true;


        return response()->json($response,200);



    }
    
    public function delete($id)
    {
        
        $response = new \stdClass();
        $categoria = Categoria::find($id);
        $categoria->delete();

        $response->succes=true;
        return response()->json($response,200);

    }
    
    
}