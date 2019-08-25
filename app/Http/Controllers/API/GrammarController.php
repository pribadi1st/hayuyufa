<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Grammar;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use StanfordNLP\POSTagger;
use Illuminate\Support\Facades\DB;
use Response;
use Validator;

class GrammarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Response::json(array(
            'status'   =>  200,
            'message'  =>  'OK'
        ), 200);
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
        $validator = Validator::make($request->all(), [
            'grammar' => 'required|max:255',
            'bab' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'status'   =>  422,
                'error'    => true,
                'message'  =>  $validator->messages(),
                
            ), 200);
        }

        $client = new Client(); //GuzzleHttp\Client
        $result = $client->post('http://nlp.stanford.edu:8080/parser/index.jsp', [
         'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Referer'     => 'http://nlp.stanford.edu:8080/parser/',
         ],
         'form_params' => [
             //Ini yang bakal di lempar nanti
             //Note : ini cuman contoh ya
                'query' => $request->grammar,
                'parserSelect' => 'Chinese'
         ]
        ]);
        $response = ''.$result->getBody();
        $crawler = new Crawler($response);
        //looping crawler
        $nodeValues = $crawler->filter('body > div:nth-child(3) > div:nth-child(7)')->each(function (Crawler $node ,$I) {
         //get text
         $item = $node->text();
         return $item;
        });
        $node = str_replace(" ","",$nodeValues[0]);
        $node = explode("\n",$node);
        $node = array_filter($node);
        
        $nodeValues =[];
        $tags = [];
        foreach($node as $key => $value){
           array_push($tags,explode('/',$value)[1]) ;
           array_push($nodeValues,explode('/',$value)[0]) ;
        }
        $bab = $request->bab;
        $query_create="CREATE TEMPORARY TABLE patterns ( pattern varchar(20) )";
        $query_insert = "insert into patterns VALUES "; 
        $count=0;
        foreach ($tags as $value) {
             $count+=1;
             if($count<count($tags)){
                 $query_insert.= "('%".$value."%'),";
             }else{
                 $query_insert.= "('%".$value."%');";    
             }
                            
         }
         $query_data ="select k.GrammarID,
                   k.Struct,
                   COUNT(k.GrammarID) AS Total
                 FROM(
                     SELECT a.*,p.pattern FROM Grammars a JOIN patterns p ON (a.Struct LIKE p.pattern)
                     )as k".
                 " where k.bab =".$bab.
                 " GROUP BY k.GrammarID ORDER BY Total DESC LIMIT 1";
         $query_drop = "drop TEMPORARY TABLE patterns";
         $res = DB::select($query_create);
         $res = DB::select($query_insert);
         $res_final = DB::select($query_data);
         $res = DB::select($query_drop);
         $res_final=explode(" ",$res_final[0]->Struct);
         $flags =array_fill(0,count($tags), 0); 
         foreach($res_final as $value){
             $key = array_search($value, $tags);
             $flags[$key]=1;
         };

        return Response::json(array(
            'status'   =>  200,
            'message'  =>  'OK',
            'result'   =>  (object)[
                'flag' => $flags,
                'values' => $nodeValues,
                'tag' => $tags
            ]
        ), 200);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grammar  $grammar
     * @return \Illuminate\Http\Response
     */
    public function show(Grammar $grammar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grammar  $grammar
     * @return \Illuminate\Http\Response
     */
    public function edit(Grammar $grammar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grammar  $grammar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grammar $grammar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grammar  $grammar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grammar $grammar)
    {
        //
    }
}
