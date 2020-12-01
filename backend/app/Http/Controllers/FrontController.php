<?php

namespace App\Http\Controllers;

use App\Ch_Event;
use App\Ch_News;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('front/index');
    }

    public function whats_on()
    {
        $news_ch_list = Ch_News::orderBy('sort', 'asc')->take(4)->get();
        $events_ch_list = Ch_Event::all();
        return view('front/whats_on', compact('news_ch_list','events_ch_list'));
    }

    public function whats_on_en()
    {
        return view('front/whats_on_en');
    }

    public function booking()
    {
        return view('front.booking');
    }
}
