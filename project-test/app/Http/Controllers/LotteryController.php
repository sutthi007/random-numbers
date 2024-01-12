<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LotteryController extends Controller
{
    public function index()
    {
        return view('lottery');
    }

    public function draw(Request $request)
    {
        // โค้ดสุ่มรางวัลในนี้
        // $winners = ...

        // return response()->json(['winners' => $winners]);
    }
}
