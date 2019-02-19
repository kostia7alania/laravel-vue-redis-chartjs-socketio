<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests; //либо так объявлять "пространства имен" О_о


class StartController extends Controller {
    
        public $url_data = [
            ['title'=>'titlleeeeeee', 'url'=>'https://sex.ru'],
            ['title'=>'TTTT 2222',    'url'=>'https://2222.ru']
        ];

    public function index(){ 
                    //dd($url_data);
                    return view( 'start', [ 'url_data'=>$this->url_data ]);
                }


    public function getJson() { return $this->url_data; }

    public function chartData(){
        return [
            'labels'=>['Март', 'Апрель', 'май', 'июнь'],
            'datasets'=>[ [
                    'label'=>'Продажи',
                    'backgroundColor'=>['#F26202','#926202','#336202','#546202','#A26302'],
                    'data'=>[15000,5000,10000,30000],
                ] ]
                ];
    }
    public function randomChart(){
        return [
            'labels'=>['Март', 'Апрель', 'май', 'июнь'],
            'datasets'=>[
                    [
                        'label'=>'Продажи',
                        'backgroundColor'=>'#F26202',
                        'data'=>[rand(0,40000),rand(0,40000),rand(0,40000),rand(0,40000)],
                    ],
                    [
                        'label'=>'Прошлый год',
                        'backgroundColor'=>'#026202',
                        'data'=>[rand(0,40000),rand(0,40000),rand(0,40000),rand(0,40000)],                        
                    ],
                ]
                ];
    }

    public function newEvent(\Illuminate\Http\Request $request){
        $result =  [
            'labels'=>['Март', 'Апрель', 'май', 'июнь'],
            'datasets'=>[ [
                    'label'=>'Продажи',
                    'backgroundColor'=>['#F26202'],
                    'data'=>[rand(0,40000),rand(0,40000),rand(0,40000),rand(0,40000)],                        
                    ] ]
            ];
            if($request->has('label')){
                $result['labels'][] = $request->input('label');
                $result['datasets'][0]['data'][] = (integer)$request->input('sale');

                if ($request->has('realtime')) {
                    
                    if (filter_var($request->input('realtime'), FILTER_VALIDATE_BOOLEAN)) { //if($request->input('realtime') == 'true')
                        event (new \App\Events\NewEvent($result));
                    }
            }
            
        }
        return $result;
    }
}

?>