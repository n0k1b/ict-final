<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\main_table;
use App\Models\chapter;
use App\Models\topic;
use App\Models\content;
use App\Models\subjective_question;
use App\Models\objective_question;


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

        $request->validate(['chapter_name' => 'required',  'chapter_description' => 'required',

        ]);

        //file_put_contents('test.txt',$request['main_topic_image']);
        $id = $request->id;
        chapter::where('id', $id)->update(['chapter_name' => $request->chapter_name, 'chapter_description' => $request->chapter_description]);

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
        $image_url = chapter::where('id', $id)->first()->chapter_image;
        unlink(public_path('../' . $image_url));
        $image = time() . '.' . request()
            ->image
            ->getClientOriginalExtension();

        $request
            ->image
            ->move(public_path('../image/chapter_image') , $image);
        $chapter_image = "image/chapter_image/" . $image;
        chapter::where('id', $id)->update(['chapter_image' => $chapter_image]);

        return redirect()->route('chapter_content')
            ->with('success', "Content Updated Successfully");

    }

    public function chapter_content_delete(Request $request)
    {
        $id = $request->id;
        chapter::where('id', $id)->delete();

    }


    //Chapter End

    //Topic Start


    public function show_topic_content()
    {
        $all_table = topic::orderBy('chapter_id')->get();
        $i = 1;
        foreach ($all_table as $content)
        {
            $content['sl_no'] = $i++;
        }
        return view('admin.all_topic', ['contents' => $all_table]);
    }
    public function add_topic_content_interface()
    {
        $all_table = chapter::get();
        return view('admin.add_topic_content',['contents' => $all_table]);

    }

    public function add_topic_content(Request $request)
    {

        $request->validate(['topic_name' => 'required', 'topic_description' => 'required',

        ]);
        

      
        topic::create($request->all());

        return redirect()
            ->route('topic_content')
            ->with('success', "Content Added Successfully");

    }

    public function edit_topic_content_interface(Request $request)
    {
        $id = $request->id;
        $all_table = topic::where('id', $id)->first();
        $all_chapter = chapter::get();
        return view('admin.edit_topic_content', ['content' => $all_table,'chapters'=>$all_chapter]);

    }

    public function edit_topic_image_interface(Request $request)
    {
        $id = $request->id;
        $all_table = topic::where('id', $id)->first();
        $all_chapter = chapter::get();
       // return view('admin.edit_topic_image', ['content' => $all_table,'chaptes'=>$all_chapter]);

    }
    public function edit_topic_content(Request $request)
    {

        $request->validate(['topic_name' => 'required',  'topic_description' => 'required',

        ]);

        //file_put_contents('test.txt',$request['main_topic_image']);
        $id = $request->id;
        topic::where('id', $id)->update(['topic_name' => $request->topic_name, 'topic_description' => $request->topic_description]);

        return redirect()
            ->route('topic_content')
            ->with('success', "Content Updated Successfully");

    }

    public function topic_content_active_status_update(Request $request)
    {
        $id = $request->id;
        $status =topic::where('id', $id)->first()->status;
        if ($status == 1)
        {
            topic::where('id', $id)->update(['status' => 0]);
        }
        else
        {
            topic::where('id', $id)->update(['status' => 1]);
        }

    }
    public function edit_topic_image(Request $request)
    {

        //file_put_contents('test.txt',$request['main_topic_image']);
        $id = $request->id;
        $image_url = topic::where('id', $id)->first()->topic_image;
        unlink(public_path('../' . $image_url));
        $image = time() . '.' . request()
            ->image
            ->getClientOriginalExtension();

        $request
            ->image
            ->move(public_path('../image/topic_image') , $image);
        $topic_image = "image/topic_image/" . $image;
        topic::where('id', $id)->update(['topic_image' => $topic_image]);

        return redirect()->route('topic_content')
            ->with('success', "Content Updated Successfully");

    }

    public function topic_content_delete(Request $request)
    {
        $id = $request->id;
        topic::where('id', $id)->delete();

    }

    public function save_order_priority(Request $request)
    {
        $id = $request->id;
        $order_no = $request->order_no;
        topic::where('id', $id)->update(['order_priority'=>$order_no]);

    }
    //Topic End

    //content start
     
        public function content_home()
        {
            return view('admin.content_home');
        }

        public function get_chapter()
        {
            $chapters = chapter::get();
            $data = '<option>Select Chapter</option>';
            foreach($chapters as $chapter)
            {

                $data.='<option value='.$chapter->id.'>'.$chapter->chapter_name.'</option>';
            }
            return $data;
        }
        public function get_topic(Request $request)
        {
            $chapter_id = $request->chapter_id;
            $topics = topic::where('chapter_id',$chapter_id)->get();
            $data = '';
            foreach($topics as $topic)
            {
                $data.='<option value='.$topic->id.'>'.$topic->topic_name.'</option>';
            }
            return $data;
        }

        public function show_content(Request $request)
        {
           $topic_id = $request->topic_id;
           return view('admin.content_main',['topic_id'=>$topic_id]);
        }

        public function get_content(Request $request)
        {
            $topic_id = $request->topic_id;
            //file_put_contents("tes.txt",$topic_id);
            $contents = content::where('topic_id',$topic_id)->orderBy('priority','ASC')->get();
            
            $data = '';
            if(sizeof($contents)>0)
            {
            foreach($contents as $content)
            {
                $order_priority = $content->priority;
                if($content->type=="header")
                {
                    $type = 1;
                    $value='<h4><b>'.$content->value.'</b></h4>';
                }
                else if($content->type=="text")
                { 
                    $type = 2;
                    $value='<p>'.$content->value.'</p>';

                }

                else if($content->type=="image")
                { 
                    $type = 3;
                    $image = '../'.$content->value;
                    $value='<img src="'.$image.'" height="200px" width="300px">';

                }
                
                $data.='<div class="col-xl-10 col-sm-10 col-xxl-10 col-lg-10" >
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="card-body">
                        <div class="content_body">
                           '.$value.'
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-2 col-sm-2 col-xxl-2 col-lg-2" >
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="card-body">
                        <div class="content_action">
                        <a  href="javascript:void(0);" class="btn btn-sm btn-primary" onclick="add_content_modal('.$order_priority.')"><i class="la la-plus"></i></a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary" onclick="edit_content_modal('.$content->id.','.$type.')"><i class="la la-pencil"></i></a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="delete_content('.$content->id.')"><i class="la la-trash-o"></i></a>
                        </div>
                    </div>
                </div>
            </div>';
            }
        }
        else
        {
            $order_priority = 0;
            $data.='<div class="col-xl-10 col-sm-10 col-xxl-10 col-lg-10" >
           
                     </div>
        
        <div class="col-xl-2 col-sm-2 col-xxl-2 col-lg-2" >
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
                </div>
                <div class="card-body">
                    <div class="content_action">
                    <button type="button" class="btn btn-primary" onclick="add_content_modal('.$order_priority.')" >Add Content</button>
                  
                </div>
            </div>
        </div>';
        }
            return $data;

        }

        public function add_content_text(Request $request)


        {
            $contents = content::where('topic_id',$request->topic_id)->where('priority','>',$request->order_no)->get();
            foreach($contents as $content)
            {
                $priority = $content->priority;
                content::where('id',$content->id)->update(['priority'=>$priority+1]);
            }
            content::create(['topic_id'=>$request->topic_id,'type'=>'text','value'=>$request->content_text,'priority'=>$request->order_no+1]);
            

             //file_put_contents('test.txt',$request->topic_id." ".$request->content_text." ".$request->order_no);
        }

        public function add_content_image(Request $request)


        {
           
            $contents = content::where('topic_id',$request->topic_id)->where('priority','>',$request->order_no)->get();
            foreach($contents as $content)
            {
                $priority = $content->priority;
                content::where('id',$content->id)->update(['priority'=>$priority+1]);
            }
            $image = time().'.'.request()->file->getClientOriginalExtension();
            $image = 'image/content_image/'.$image;
            // /file_put_contents('test.txt',$request->topic_id." ".$request->order_no." ".$image);
           
            $request->file->move(public_path('../image/content_image') , $image);
  
            content::create(['topic_id'=>$request->topic_id,'type'=>'image','value'=>$image,'priority'=>$request->order_no+1]);
            

             //file_put_contents('test.txt',$request->topic_id." ".$request->content_text." ".$request->order_no);
        }

        public function add_content_header(Request $request)


        {
            $contents = content::where('topic_id',$request->topic_id)->where('priority','>',$request->order_no)->get();
            foreach($contents as $content)
            {
                $priority = $content->priority;
                content::where('id',$content->id)->update(['priority'=>$priority+1]);
            }
            content::create(['topic_id'=>$request->topic_id,'type'=>'header','value'=>$request->content_header,'priority'=>$request->order_no+1]);
            

             //file_put_contents('test.txt',$request->topic_id." ".$request->content_text." ".$request->order_no);
        }
        
        public function delete_content(Request $request)
        {
            $id = $request->id;
            //file_put_contents('test.txt',$id);
            
           $content_query = content::where('id',$id)->first();
           $order_no = $content_query->priority;
          // file_put_contents('test.txt',$order_no);
           if($content_query->type =="text")
           {
               $value = $content_query->value;
             
               unlink(public_path('../' . $value));

           }
           
            $contents = content::where('topic_id',$request->topic_id)->where('priority','>',$order_no)->get();
            foreach($contents as $content)
            {
                $priority = $content->priority;
                content::where('id',$content->id)->update(['priority'=>$priority-1]);
            }
            content::where('id',$id)->delete();
        }

        public function edit_content_text(Request $request)
        {
            $id = $request->id;
            $content_text= $request->content_text;
            content::where('id',$id)->update(['value'=>$content_text]);
        }

        public function edit_content_header(Request $request)
        {
            $id = $request->id;
            $content_text= $request->content_text;
            content::where('id',$id)->update(['value'=>$content_text]);
        }

        public function edit_content_image(Request $request)
        {
            $id = $request->id;
            $image = time().'.'.request()->file->getClientOriginalExtension();
            $content_text = 'image/content_image/'.$image;
            // /file_put_contents('test.txt',$request->topic_id." ".$request->order_no." ".$image);
           
            $request->file->move(public_path('../image/content_image') , $image);
         
            content::where('id',$id)->update(['value'=>$content_text]);
        }
        public function get_content_for_update(Request $request)
        {
            $id = $request->id;
            $data = content::where('id',$id)->first()->value;
            return $data;
        }
     
      
    //Content End

    //subjective question start

        public function subjective_question_home()
        {
            return view('admin.subjective_question_home');
        }

        public function show_subjective_question()
        {
          
            $contents = subjective_question::get();
            $i=1;
                foreach ($contents as $content)
            {
                $content['sl_no'] = $i++;
            }
           return view('admin.all_subjective_question',['contents'=>$contents]);
        }
        
        public function add_subjective_question_interface()
        {
            return view('admin.add_subjective_question');
        }

        public function add_subjective_question_text(Request $request)
        {
            subjective_question::create($request->all());
            return redirect()
            ->route('subjective_question_home')
            ->with('success', "Content Added Successfully");
        }

        public function add_subjective_question_image(Request $request)
        {
            $image = time() . '.' . request()
            ->image
            ->getClientOriginalExtension();

        $request
            ->image
            ->move(public_path('../image/question_image') , $image);
         $request['paragraph'] = "image/question_image/" . $image;
            subjective_question::create($request->except('image'));
            return redirect()
            ->route('subjective_question_home')
            ->with('success', "Content Added Successfully");
        }
        
        public function subjective_question_delete(Request $request)
        {
            $id = $request->id;
            subjective_question::where('id',$id)->delete();
        }

    //subjective question end

    //objective question start
    public function objective_question_home()
    {
        return view('admin.objective_question_home');
    }

    public function show_objective_question()
    {
      
        $contents = objective_question::get();
        $i=1;
            foreach ($contents as $content)
        {
            $content['sl_no'] = $i++;
        }
       return view('admin.all_objective_question',['contents'=>$contents]);
    }
    
    public function add_objective_question_interface()
    {
        return view('admin.add_objective_question');
    }

    public function add_objective_question_text(Request $request)
    {
        objective_question::create($request->all());
        return redirect()
        ->route('objective_question_home')
        ->with('success', "Content Added Successfully");
    }

    public function add_objective_question_image(Request $request)
    {
        $image = time() . '.' . request()
        ->image
        ->getClientOriginalExtension();

    $request
        ->image
        ->move(public_path('../image/question_image') , $image);
     $request['paragraph'] = "image/question_image/" . $image;
        objective_question::create($request->except('image'));
        return redirect()
        ->route('objective_question_home')
        ->with('success', "Content Added Successfully");
    }
    
    public function objective_question_delete(Request $request)
    {
        $id = $request->id;
        objective_question::where('id',$id)->delete();
    }

    //objective question end


}

