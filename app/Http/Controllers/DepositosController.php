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
            'http' => array(
                'method' => "GET",
                'header' => "X-API-KEY: " . auth()->user()->safe2pay_token
            )
        );

        $context = stream_context_create($opts);

        $result = file_get_contents('https://api.safe2pay.com.br/v2/CheckingAccount/GetListDeposits?month=3&year=2021', false, $context);

        if ($result === FALSE) { /* Handle error */
        }

        // var_dump(json_decode($result)->ResponseDetail);

        $data = [];

        foreach (json_decode($result)->ResponseDetail->Deposits as $key => $deposito) {
            if ($deposito->IsTransferred) {
                $data[$key] = [
                    "title" => "".$deposito->Message . ", R$ " . str_replace(".", ",", $deposito->Amount) . " Pagamento de numero: " . $deposito->PaymentNumber,
                    "allDay" => true,
                    "start" => $deposito->DepositDate,
                    "url" => $deposito->HashConfirmation,
                    "display" => 'list-item'
                ];
            } else
            {
                $data[$key] = [
                    "title" => $deposito->Message,
                    "allDay" => true,
                    "start" => $deposito->DepositDate
                ];
            }
        }

        // var_dump();

        return view('depositos', [
            'result' => json_decode($result),
            'initialDate' => date('Y-m-d', strtotime(str_replace("/", "-", json_decode($result)->ResponseDetail->InitialDate))),
            'depositos' => $data
        ]);
    }
}
