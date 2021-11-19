<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Facture;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

class ChartController extends Controller
{
  public function index(){
      
      
      return view('welcome');
  }
}
