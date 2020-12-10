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
        $all_table = main_table::where('status',1)->get();
  
        $all_chapter = chapter::where('status',1)->get();
      
        $all_topic = topic::where('status',1)->get();

        $all_content = content::where('status',1)->get();
       
        $main_table = array('database_update'=>'true','main_tables'=>$all_table,'chapters'=>$all_chapter,'topics'=>$all_topic,'contents'=>$all_content);
      
        return response()->json($main_table);

    }
}
