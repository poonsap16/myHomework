<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhonesController extends Controller
{

  public function phonesShow()
    {
      $items = loadCSV('phones-price');
      return view('phones',compact('items'));
    }

}
