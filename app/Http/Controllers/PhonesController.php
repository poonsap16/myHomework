<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhonesController extends Controller
{

  // public function phonesShow()
  //   {
  //     $items = loadCSV('phones-price');
  //     return view('phones',compact('items'));
  //   }

    public function phonesShow ($title)
        {
            switch ($title) {
                case "price":
                {
                      $items = loadCSV('phones-price');
                      return view('phones',compact('items'));
                }
                break;
                case "sell":
                {
                  $items = loadCSV('phones-sell');
                  return view('sell',compact('items'));
                }
                break;
                default:
                    return "กรุณาระบุชื่อ path ให้ถูกต้อง<br>
                            ชื่อ path ที่สามารถใช้ได้คือ<br>
                            1. phones/price<br>
                            2. phones/sell<br>";
            }
        }

}
