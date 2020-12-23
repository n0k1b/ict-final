<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\main_table;
use App\Models\chapter;
use App\Models\topic;
use App\Models\content;

class AdminController extends Controller
{
    
    public function index()
    {
        return view('admin.layout.app');
    }

    //Homepage Content Start

    public function show_homepage_content()
    {
        $all_table = main_table::get();
        $i = 1;
        foreach ($all_table as $content)
        {
            $content['sl_no'] = $i++;
        }
        return view('admin.homepage_content', ['contents' => $all_table]);
    }
    public function add_homepage_content_interface()
    {
        return view('admin.add_homepage_content');

    }

    public function add_homepage_content(Request $request)
    {

        $request->validate(['main_topic_name' => 'required', 'main_topic_button_text' => 'required', 'main_topic_description' => 'required', 'image' => 'required'

        ]);
        $image = time() . '.' . request()
            ->image
            ->getClientOriginalExtension();

        $request
            ->image
            ->move(public_path('../image/main_topic_image') , $image);
        $request['main_topic_image'] = "image/main_topic_image/" . $image;
        //file_put_contents('test.txt',$request['main_topic_image']);
        main_table::create($request->except('image'));

        return redirect()
            ->route('homepage_content')
            ->with('success', "Content Added Successfully");

    }

    public function edit_homepage_content_interface(Request $request)
    {
        $id = $request->id;
        $all_table = main_table::where('id', $id)->first();
        return view('admin.edit_homepage_content', ['content' => $all_table]);

    }

    public function edit_homepage_image_interface(Request $request)
    {
        $id = $request->id;
        $all_table = main_table::where('id', $id)->first();
        return view('admin.edit_homepage_image', ['content' => $all_table]);

    }
    public function edit_homepage_content(Request $request)
    {

        $request->validate(['main_topic_name' => 'required', 'main_topic_button_text' => 'required', 'main_topic_description' => 'required',

        ]);

        //file_put_contents('test.txt',$request['main_topic_image']);
        $id = $request->id;
        main_table::where('id', $id)->update(['main_topic_name' => $request->main_topic_name, 'main_topic_button_text' => $request->main_topic_button_text, 'main_topic_description' => $request->main_topic_description]);

        return redirect()
            ->route('homepage_content')
            ->with('success', "Content Updated Successfully");

    }

    public function home_page_content_active_status_update(Request $request)
    {
        $id = $request->id;
        $status = main_table::where('id', $id)->first()->status;
        if ($status == 1)
        {
            main_table::where('id', $id)->update(['status' => 0]);
        }
        else
        {
            main_table::where('id', $id)->update(['status' => 1]);
        }

    }
    public function edit_homepage_image(Request $request)
    {

        //file_put_contents('test.txt',$request['main_topic_image']);
        $id = $request->id;
        $image_url = main_table::where('id', $id)->first()->main_topic_image;
        unlink(public_path('../' . $image_url));
        $image = time() . '.' . request()
            ->image
            ->getClientOriginalExtension();

        $request
            ->image
            ->move(public_path('../image/main_topic_image') , $image);
        $main_topic_image = "image/main_topic_image/" . $image;
        main_table::where('id', $id)->update(['main_topic_image' => $main_topic_image]);

        return redirect()->route('homepage_content')
            ->with('success', "Content Updated Successfully");

    }

    public function home_page_content_delete(Request $request)
    {
        $id = $request->id;
        main_table::where('id', $id)->delete();

    }

    //Homepage Content End


    //Chapter Start

    public function show_chapter_content()
    {
        $all_table = chapter::get();
        $i = 1;
        foreach ($all_table as $content)
        {
            $content['sl_no'] = $i++;
        }
        return view('admin.all_chapter', ['contents' => $all_table]);
    }
    public function add_chapter_content_interface()
    {
        return view('admin.add_chapter_content');

    }

    public function add_chapter_content(Request $request)
    {

        $request->validate(['chapter_name' => 'required', 'chapter_description' => 'required', 'image' => 'required'

        ]);
        $image = time() . '.' . request()
            ->image
            ->getClientOriginalExtension();

        $request
            ->image
            ->move(public_path('../image/chapter_image') , $image);
        $request['chapter_image'] = "image/chapter_image/" . $image;
        //file_put_contents('test.txt',$request['main_topic_image']);
        chapter::create($request->except('image'));

        return redirect()
            ->route('chapter_content')
            ->with('success', "Content Added Successfully");

    }

    public function edit_chapter_content_interface(Request $request)
    {
        $id = $request->id;
        $all_table = chapter::where('id', $id)->first();
        return view('admin.edit_chapter_content', ['content' => $all_table]);

    }

    public function edit_chapter_image_interface(Request $request)
    {
        $id = $request->id;
        $all_table = chapter::where('id', $id)->first();
        return view('admin.edit_chapter_image', ['content' => $all_table]);

    }
    public function edit_chapter_content(Request $request)
    {

        $request->validate(['main_topic_name' => 'required', 'main_topic_button_text' => 'required', 'main_topic_description' => 'required',

        ]);

        //file_put_contents('test.txt',$request['main_topic_image']);
        $id = $request->id;
        chapter::where('id', $id)->update(['main_topic_name' => $request->main_topic_name, 'main_topic_button_text' => $request->main_topic_button_text, 'main_topic_description' => $request->main_topic_description]);

        return redirect()
            ->route('chapter_content')
            ->with('success', "Content Updated Successfully");

    }

    public function chapter_content_active_status_update(Request $request)
    {
        $id = $request->id;
        $status =chapter::where('id', $id)->first()->status;
        if ($status == 1)
        {
            chapter::where('id', $id)->update(['status' => 0]);
        }
        else
        {
            chapter::where('id', $id)->update(['status' => 1]);
        }

    }
    public function edit_chapter_image(Request $request)
    {

        //file_put_contents('test.txt',$request['main_topic_image']);
        $id = $request->id;
        $image_url = chapter::where('id', $id)->first()->main_topic_image;
        unlink(public_path('../' . $image_url));
        $image = time() . '.' . request()
            ->image
            ->getClientOriginalExtension();

        $request
            ->image
            ->move(public_path('../image/main_topic_image') , $image);
        $main_topic_image = "image/main_topic_image/" . $image;
        chapter::where('id', $id)->update(['main_topic_image' => $main_topic_image]);

        return redirect()->route('chapter_content')
            ->with('success', "Content Updated Successfully");

    }

    public function chapter_content_delete(Request $request)
    {
        $id = $request->id;
        chapter::where('id', $id)->delete();

    }

    //Chapter End
}

