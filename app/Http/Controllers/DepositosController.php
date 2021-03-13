<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepositosController extends Controller
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
          
          $result = file_get_contents('https://api.safe2pay.com.br/v2/CheckingAccount/GetListDeposits?month=12&year=2021', false, $context);
          
          if ($result === FALSE) { /* Handle error */ }
          
        //   var_dump($result);

        $dpconfirmado = 0;
        $dppendente = 0;
        $dptotais = 0;

        foreach(json_decode($result)->ResponseDetail->Deposits as $Deposit)
        {
            if($Deposit->IsTransferred)
            {
                if($Deposit->HashConfirmation != null)
                {
                    $dpconfirmado += $Deposit->Amount;
                }
                else
                {
                    $dppendente += $Deposit->Amount;
                }

                $dptotais++;
            }
        }

        return view('depositos', [
            'result' => json_decode($result),
            'dpconfirmado' => $dpconfirmado,
            'dppendente' => $dppendente,
            'dptotais' => $dptotais,
        ]);
    }
}
