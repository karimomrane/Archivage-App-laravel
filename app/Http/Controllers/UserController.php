<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $facture = Facture::get();

        return view('welcome')->with('factures',$facture);
    }
}
