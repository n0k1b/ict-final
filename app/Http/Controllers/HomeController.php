<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\main_table;
use App\Models\chapter;
use App\Models\topic;
use App\Models\content;

class HomeController extends Controller
{
    //
  
    public function get_main_page_content(Request $request)
    {
        $web_url = 'http://www.quiz-hunt.com/';
        $all_table = main_table::where('status',1)->get();
        foreach($all_table as $all)
        {
            $all['image'] = $web_url.$all->image;
        }
  
        $all_chapter = chapter::where('status',1)->get();

        foreach($all_chapter as $all)
        {
            $all['image'] = $web_url.$all->image;
        }
      
        $all_topic = topic::where('status',1)->get();

        foreach($all_topic as $all)
        {
            $all['image'] = $web_url.$all->image;
        }

        $all_content = content::where('status',1)->get();

        foreach($all_content as $all)
        {
            $all['image'] = $web_url.$all->image;
        }
       
        $main_table = array('database_update'=>'true','main_tables'=>$all_table,'chapters'=>$all_chapter,'topics'=>$all_topic,'contents'=>$all_content);
      
        return response()->json($main_table);

    }
}
