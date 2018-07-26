<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataBaseController extends Controller
{
    //
    public function newQueryInsert()
    {
        for ($i = 0; $i <= 9; $i++) {
            $start = $i * 100000 + 1;
            $end = ($i+1) * 100000;
            if ($i == 9) {
                $end = $end -1;
            }
            $numbers = range($start ,$end);
            shuffle($numbers);
            $data = [];
            foreach($numbers as $number){
                if (strlen($number) < 6) {
                    $number = str_pad($number,6,0,STR_PAD_LEFT);
                }
                $data[]=['randnumber' => $number];
                if(count($data)>1000){
//                    $randnumber = new Randnumber();dd($data);
//                    $randnumber->newQuery()->insert($data);dd()
                    $data = [];
                }
            }
//            $randnumber = new Randnumber();
//            $randnumber->newQuery()->insert($data);
        }
    }
}
