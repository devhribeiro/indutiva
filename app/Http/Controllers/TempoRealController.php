<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TempoRealController extends Controller
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
        $result = file_get_contents("https://api.safe2pay.com.br/v2/Transaction/List?PageNumber=1&RowsPerPage=1000&CreatedDateInitial=".$today."&CreatedDateEnd=".$today, false, $context);
        if ($result === FALSE) { /* Handle error */ }

        $pgconfirmado = 0;
        $pgpendente = 0;
        $pgrecusado = 0;

        foreach(json_decode($result)->ResponseDetail->Objects as $Object)
        {
            // var_dump($Object);
            if($Object->Message === 'Autorizado')
            {
                $pgconfirmado += $Object->Amount;
            }

            if($Object->Message === 'Pendente')
            {
                $pgpendente += $Object->Amount;
            }

            if($Object->Message === 'Recusado')
            {
                $pgrecusado += $Object->Amount;
            }

        }

        return view('tempo-real', [
            'result' => json_decode($result),
            'pgconfirmado' => str_replace('.', ',', $pgconfirmado),
            'pgpendente' => str_replace('.', ',', $pgpendente),
            'pgrecusado' => str_replace('.', ',', $pgrecusado)
        ]);
    }
}
