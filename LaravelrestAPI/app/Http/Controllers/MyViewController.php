<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;



class MyViewController extends Controller
{
    
   

   
    public function index()
    {
        return view('studentInfo.index');
    }
    
    


}
?>
