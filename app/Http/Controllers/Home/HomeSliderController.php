<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Image;
use Flasher\Prime\FlasherInterface;

class HomeSliderController extends Controller
{
    public function homeSlider()
    {
        $homeSlider = HomeSlide::find(1);

        return view('admin.home_slider.home_slide_all', compact('homeSlider'));
    }

    public function storeSlider(Request $request, FlasherInterface $flasher)
    {
        $slider_id = $request->id;
        if ($request->file('home_slide')) {
            $image = $request->file('home_slide');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(636, 852)->save('upload/home_slider/'.$imageName);
            $save_url = 'upload/home_slider/'.$imageName;

            HomeSlide::findOrFail($slider_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $save_url
            ]);

            $flasher->addSuccess('Home slide successfully updated with image.');

            return back();
        } else {
            HomeSlide::findOrFail($slider_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url
            ]);

            $flasher->addSuccess('Home slide successfully updated without image.');

            return back();
        }
    }
}
