<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Highlight;
use Illuminate\Http\Request;

class PageController extends Controller
{


    public function index() {
        $highlights = Highlight::with('product')->get();

        $categories = Category::with('children')
        ->where('parent_id', '=', 2)
        ->orderBy('order')
        ->get();

        // dd($categories);

        return view("welcome", [
            "highlights"=> $highlights,
            "categories"=> $categories
        ]);
    }

    public function dashboard() {
        return view("admin.dashboard");
    }

}
