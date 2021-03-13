<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransacoesController extends Controller
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
        $result = file_get_contents("https://api.safe2pay.com.br/v2/Transaction/List?PageNumber=1&RowsPerPage=1000", false, $context);
        if ($result === FALSE) { /* Handle error */ }
        
        $pgconfirmado = 0;
        $pgpendente = 0;
        $pnrecusado = 0;

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
                $pgpendente += $Object->Amount;
            }
            
        }

        return view('transacoes', [
            'result' => json_decode($result), 
            'pgconfirmado' => str_replace('.', ',', $pgconfirmado),
            'pgpendente' => str_replace('.', ',', $pgpendente),
            'pnrecusado' => str_replace('.', ',', $pnrecusado)
        ]);
    }
}
