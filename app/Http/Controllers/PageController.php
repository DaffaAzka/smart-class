<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{


    public function index() {
        $highlights = [
            [
                "title"=> "Touch Board",
                "img"=> "https://touchboard.io",
            ],
            [
                "title"=> "Touch Softwares",
                "img"=> "",
            ],
            [
                "title"=> "Touch OPS",
                "img"=> "",
            ],
            [
                "title"=> "Touch Accessory",
                "img"=> "",
            ],
        ];

        $categories = Category::with('children')
            ->where('type','=','link')
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
