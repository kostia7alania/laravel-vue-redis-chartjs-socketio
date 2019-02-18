<?php

namespace App\Http\Controllers;

use Illuminate\Http\Resuests;

class StartController extends Controller {
    public function index(){
        $url_data = [
                        ['title'=>'titlleeeeeee',   'url'=>'https://sex.ru'],
                        ['title'=>'TTTT 2222',      'url'=>'https://2222.ru']
                    ];

                    dd($url_data);
                    return view( 'start', [ 'url_data'=>$url_data ]);
    }
}

?>