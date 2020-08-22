<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ResponseObject;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(10);
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->ajax())
        {

                $response = new ResponseObject;
                
                $validator = Validator::make($request->all(), [
                    'title' => 'required|max:100',
                    'long_title' => 'required|max:191',
                    'intro' => 'required|max:250',
                    'body' => 'required',
                    'imageFile.*' => 'nullable|mimetypes:image/jpeg,image/png'
                ]);

                
                if($validator->fails()){
                    
                    $response->success = false;
                    
                    $response->errors = $validator->errors();
        
                    return response()->json($response, 400);
        
                }

                $title = $request->input('title');
                $long_title = $request->input('long_title');
                $body = $request->input('body');
                $intro = $request->input('intro');


            
                if(($request->hasfile('imageFile'))){
                
                
                    // Get File Extension
                    $imageFile = $_FILES['imageFile'];
                    // $mime_type = array_get($imageFile, 'type', 'blob');
        
                //  dd($mime_type);      

                    // MAke a new File Name
                    $filename = 'mnnnews'.'_'.time().'_'.date("Ymd");
            
                    //File Name to Store
                    $fileNameToStore = $filename.'.jpeg';
            
                    $path = $request->file('imageFile')->storeAs('public/img/headlines', $fileNameToStore);
                }
                else{
                    $fileNameToStore = NULL;
                }
            


                
        

            

            $news = new News;         
            $news->title = $title;
            $news->intro = $intro;
            $news->long_title = $long_title;
            $news->image = $fileNameToStore;
            $news->user_id = Auth::user()->id;
            $news->body = $body;
            $news->save();

            $response->success = true;
            $response->message = "Successfully Posted";

            return response()->json($response, 200);
        }
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        if($request->ajax())
        { 

            $response = new ResponseObject;
                
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:100',
                'long_title' => 'required|max:191',
                'intro' => 'required|max:250',
                'body' => 'required',
                'imageFile.*' => 'nullable|mimetypes:image/jpeg,image/png'
            ]);

            
            if($validator->fails()){
                
                $response->success = false;
                
                $response->errors = $validator->errors();
    
                return response()->json($response, 400);
    
            }

            $title = $request->input('title');
            $long_title = $request->input('long_title');
            $body = $request->input('body');
            $intro = $request->input('intro');

         
            if(($request->hasfile('imageFile'))){
               
                $id = Uuid::generate()->string;
                // Get File Extension
                $imageFile = $_FILES['imageFile'];
                
                 // MAke a new File Name
                 $filename = 'mnnnews'.'_'.time().'_'.date("Ymd");
            
                 //File Name to Store
                 $fileNameToStore = $filename.'.jpeg';
        
                $path = $request->file('imageFile')->storeAs('public/img/headlines', $fileNameToStore);
               
              }
             
        

          $news = News::findOrFail($request->id);
          if($request->hasfile('imageFile')){
            if($news->image){
                Storage::delete('public/img/headlines/'.$news->image);
            }          
            $news->image = $fileNameToStore;
          }      
          $news->title = $title;
          $news->long_title = $long_title;       
          $news->body = $body;
          $news->intro = $intro;
          $news->save();

          $response->success = true;
          $response->message = "Successfully Posted";

          return response()->json($response, 200);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
