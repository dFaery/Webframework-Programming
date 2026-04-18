<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use App\Models\Doctor;
use App\Models\Transaction;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $services = Service::all();
        $transactions = Transaction::all();
        $doctors = Doctor::all();

        $dataTables = [
            'categories' => $categories,
            'services' => $services,
            'transactions' => $transactions,
            'doctors' => $doctors,
        ];

        return view('pages.home', compact('dataTables'));
    }
}
