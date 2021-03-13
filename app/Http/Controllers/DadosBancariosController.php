<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DadosBancariosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $opts = array(
            'http'=>array(
              'method'=>"GET",
              'header'=>"X-API-KEY: 94632FD5DFC74A2E9CB7DF66B41EA7FB"
            )
          );
          
          $context = stream_context_create($opts);
          
          $result = file_get_contents('https://api.safe2pay.com.br/v2/MerchantBankData/Get', false, $context);
          
          if ($result === FALSE) { /* Handle error */ }
          
        //   var_dump($result);

        return view('dados-bancarios', ['result' => json_decode($result)]);
    }
}
