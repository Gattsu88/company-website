<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Image;
use Flasher\Prime\FlasherInterface;

class AboutController extends Controller
{
    public function aboutPage()
    {
        $aboutPage = About::find(1);

        return view('admin.about_page.about_page_all', compact('aboutPage'));
    }

    public function storeAbout(Request $request, FlasherInterface $flasher)
    {
        $about_id = $request->id;
        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(523, 605)->save('upload/home_about/'.$imageName);
            $save_url = 'upload/home_about/'.$imageName;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url
            ]);

            $flasher->addSuccess('About page successfully updated with image.');

            return back();
        } else {
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            $flasher->addSuccess('About page successfully updated without image.');

            return back();
        }
    }

    public function homeAbout()
    {
        $aboutPage = About::find(1);

        return view('frontend.about', compact('aboutPage'));
    }
}
