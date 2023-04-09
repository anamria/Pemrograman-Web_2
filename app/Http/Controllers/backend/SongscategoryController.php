<?php

namespace App\Http\Controllers\backend;

use App\Models\Songscategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class SongscategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
        	
    public function SongsCategoryList(Request $request)
    {
        $list = DB::table('songscategories')->get();
        return view('backend.songscategory.list_songscategory',compact('list'));
    }


    public function SongsCategoryAdd()
    {
        $all = DB::table('songscategories')->get();
        return view('backend.songscategory.create_songscategory',compact('all'));
    }

    

    public function SongsCategoryInsert(Request $request)
    {

        $this->validate($request, [
            'judul'     => 'required|min:1',
            'penyanyi'   => 'required|min:1',
            'cover'     => 'required|image|mimes:jpeg,jpg,png'
        ]);

        //upload image
        $cover = $request->file('cover');
        $cover->storeAs('public/posts', $cover->hashName());

        //create post
        Songscategory::create([
            'judul'     => $request->judul,
            'penyanyi'   => $request->penyanyi,
            'cover'     => $cover->hashName()
        ]);

        //redirect to index
        return Redirect()->route('songscategory.index')->with('success','Songs Category created successfully!');
    }

    public function SongsEditCategory ($id)
    {
        $edit=DB::table('songscategories')
             ->where('id',$id)
             ->first();
        return view('backend.songscategory.edit_songscategory', compact('edit'));     
    }

    public function SongsUpdateCategory(Request $request,$id)
    {
      
        $this->validate($request, [
            'judul'     => 'required|min:1',
            'penyanyi'   => 'required|min:1',
            'cover'     => 'image|mimes:jpeg,jpg,png',
        ]);

        //get post by ID
        $post = Songscategory::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('cover')) {

            //upload new image
            $cover = $request->file('cover');
            $cover->storeAs('public/posts', $cover->hashName());

            //delete old image
            Storage::delete('public/posts/'.$post->cover);

            //update post with new image
            $post->update([
                'judul'     => $request->judul,
                'penyanyi'   => $request->penyanyi,
                'cover'     => $cover->hashName(),
            ]);

        } else {

            //update post without image
            $post->update([
                'judul'     => $request->judul,
                'penyanyi'   => $request->penyanyi
            ]);
        }

        //redirect to index
        return Redirect()->route('songscategory.index')->with('success','Songs Category Updated Successfully!');                     
    
    }

    public function SongsDeleteCategory ($id)
    {
    
        $delete = DB::table('songscategories')->where('id', $id)->delete();
        if ($delete)
                            {
                            $notification=array(
                            'messege'=>'Successfully Songs Category Deleted ',
                            'alert-type'=>'success'
                            );
                            return Redirect()->back()->with($notification);                      
                            }
             else
                  {
                  $notification=array(
                  'messege'=>'error ',
                  'alert-type'=>'error'
                  );
                  return Redirect()->back()->with($notification);

                  }

      }
}
