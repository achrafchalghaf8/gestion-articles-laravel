<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $articles=Article::With("scategories")->get();
            return response()->json($articles);

        }catch(\Exception $e){
            return response()->json("probléme de recuperation");

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    try{
        $article=new Article(["designation"=>$request->input("designation"),"reference"=>$request->input("reference"),"marque"=>$request->input("marque"),"prix"=>$request->input("prix")
        ,"qtestock"=>$request->input("qtestock")
        ,"imageart"=>$request->input("imageart")
        ,"scategorieID"=>$request->input("scategorieID")]);
        $article->save();
        return response()->json($article);

       

    }catch(\Exception $e){
        return response()->json("insertion impossible");

    } }
    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
       
        try{
            $article=Article::with("scategorie")->findOrFail( $id );
            return response()->json($article);
        
    
           
    
        }catch(\Exception $e){
            return response()->json("Récuperation impossible");
    
        } 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request,$id)
    {
        try{
            $article=Article::findOrFail($id);
            $article->update($request->all());
            return request()->json($article);
        
    
           
    
        }catch(\Exception $e){
            return response()->json("Update impossible");
    
        } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try{
            $article=Article::findOrFail($id);
            $article->delete();
            return request()->json($article);
        
    
           
    
        }catch(\Exception $e){
            return response()->json("supression impossible");
    
        } 
    }
    public function showArticlesBySCAT($idscat)
    {
        try{
            $articles=Article::where('scategorieID',$idscat)->with( 'scategorie' )->get;
            return response()->json($articles);
        }catch(\Exception $e){  
            return response()->json('selection impossible');
    }
}


public function paginationPaginate() { $perPage = request()->input('pageSize', 2); // Récupère la valeur dynamique pour la pagination
     $articles = Article::with('scategories')->paginate($perPage); // Retourne le résultat en format JSON API 
     return response()->json([ 'products' => $articles->items(), // Les articles paginés 
     'totalPages' => $articles->lastPage(), // Le nombre de pages
      ]); }  
}
