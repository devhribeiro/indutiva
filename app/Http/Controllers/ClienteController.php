<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
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
        $today = date("Y-m-d");

        $opts = array(
            'http'=>array(
              'method'=>"GET",
              'header'=>"X-API-KEY: " . auth()->user()->safe2pay_token
            )
          );

        $context = stream_context_create($opts);
        $result = file_get_contents("https://api.safe2pay.com.br/v2/Customer/List", false, $context);
        if ($result === FALSE) { /* Handle error */ }

        return view('clientes', [
            'result' => json_decode($result)
        ]);
    }
}
