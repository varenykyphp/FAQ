<?php

namespace VarenykyFaq\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use VarenykyFaq\Models\Categories;

class FrontendController extends Controller
{
    public function index(): View
    {
        $categories = Categories::orderBy('sort_order')->get();
        return view('faq', compact('categories'));
    }
}
