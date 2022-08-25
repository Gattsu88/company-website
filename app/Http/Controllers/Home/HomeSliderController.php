<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    public function homeSlider()
    {
        $homeSlider = HomeSlide::find(1);

        return view('admin.home_slider.home_slide_all', compact('homeSlider'));
    }
}
