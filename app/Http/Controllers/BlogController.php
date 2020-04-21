<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Blog;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datafor = DB::select('SELECT * FROM blogs');
        return view('/admin.blogmanage',compact('datafor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {





        $blog = new Blog();
       
        $blog->title= $request->input('title');
        $blog->content = $request->input('content');
      
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalName();
            $filename = $extension;
            $image->move('uploads/image/',$filename);
            $blog->image = $filename;
        }

           

         
        $detail=$request->content;
        $dom = new \domdocument();
        $dom->loadHtml('<?xml encoding="UTF-8">'.$detail);
     
        $images = $dom->getelementsbytagname('img');
       
        foreach($images as $k => $img){
        $data = $img->getattribute('src');
        list($type, $data) = explode(';', $data);
        list(, $data)= explode(',', $data);
        $data = base64_decode($data);
     
        $image_name= time().$k.'.png';
      
        $path = public_path() .'/uploads/image_content/'. $image_name;
      
        file_put_contents($path, $data);
        $img->removeattribute('src');
        $img->setattribute('src',"../uploads/image_content/". $image_name);
        }
        $detail = $dom->savehtml();
        
        $blog->content = $detail;
        $blog->save();
        return redirect('/admin.blogmanage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datafor = DB::select('SELECT * FROM blogs WHERE id=?',[$id]);
        return view('readmore',compact('datafor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datafor = DB::select('SELECT * FROM blogs WHERE id=?',[$id]);
        return view('admin.crudblog.edit',compact('datafor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $title = $request->input('title');
        $content = $request->input('content');
       

        $blog = new Blog();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalName();
            $filename = $extension;
            $image->move('uploads/image/',$filename);
         $image_blog= $blog->imageg = $filename;
           
         DB::update('UPDATE blogs SET image=?,title=?,content=? WHERE id=?',[$image_blog,$title,$content,$id]);
         
        }else{

            DB::update('UPDATE blogs SET title=?,content=? WHERE id=?',[$title,$content,$id]);
         
        }
        

        return redirect('/admin.blogmanage');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM blogs WHERE id=?',[$id]);
        return redirect('/admin.blogmanage');
    }
}
