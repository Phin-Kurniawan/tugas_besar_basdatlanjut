<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Event;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $featuredEvents = Event::where('featured', 'true')->get();
        $featuredArticle = Articles::where('featured', 'true')->get();
        return view('home', ['events' => $featuredEvents, 'articles' => $featuredArticle]);
    }
}
