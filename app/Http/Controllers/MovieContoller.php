<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MovieContoller extends Controller
{
    public function index()
    {
        $movies = Movie::orderBy('id','desc')->paginate(4);
        return view('movie.list' , ['movies'=>$movies]);
    }

    public function create()
    {
        return view('movie.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'movie_name' => 'required',
            'movie_description' => 'required',
            'movie_gener' => 'required',
            'movie_img' => 'sometimes|image:gif,png,jpeg,jpg',
        ]);

        if ($validator->passes()) {
            // save data here
            $movie = new Movie();
            $movie->movie_name = $request->movie_name;
            $movie->movie_description = $request->movie_description;
            $movie->movie_gener = $request->movie_gener;
            // $movie->movie_img = $request->movie_img;
            $movie->save();
            
            if($request->movie_img){

                $ext = $request->movie_img->getClientOriginalExtension();
                $newFileName = time().'.'.$ext;
                $request->movie_img->move(public_path().'/uploads/movies/',$newFileName); // This will save file in a folder

                $movie->movie_img = $newFileName;
                $movie->save();
            }

            $request->session()->flash('success', 'Movie added successfully');
            return redirect()->route('movies.index');
        } else {
            // return with error
            return redirect()->route('movies.create')->withErrors($validator)->withInput();
        }
    }

    public function edit($id){
        $movie = Movie::findOrFail($id);
        // if(!$movie){
        //     abort("404");
        // }

        // dd($movie);

        return view('movie.edit', ['movie'=>$movie]);
    }

    public function update($id ,Request $request ){
        $validator = Validator::make($request->all(), [
            'movie_name' => 'required',
            'movie_description' => 'required',
            'movie_gener' => 'required',
            'movie_img' => 'sometimes|image:gif,png,jpeg,jpg',
        ]);

        if ($validator->passes()) {

            // uodate data here
            $movie = Movie::find($id);
            $movie->movie_name = $request->movie_name;
            $movie->movie_description = $request->movie_description;
            $movie->movie_gener = $request->movie_gener;
            // $movie->movie_img = $request->movie_img;
            $movie->save();
            if($request->movie_img){
                $oldImage = $movie->movie_img;
                $ext = $request->movie_img->getClientOriginalExtension();
                $newFileName = time().'.'.$ext;
                $request->movie_img->move(public_path().'/uploads/movies/',$newFileName); // This will save file in a folder

                $movie->movie_img = $newFileName;
                $movie->save();

                File::delete(public_path().'/uploads/movies/'.$oldImage);
            }

            // $request->session()->flash('success', 'Movie added successfully');
            return redirect()->route('movies.index');
        } else {
            // return with error
            return redirect()->route('movies.edit',$id)->withErrors($validator)->withInput();
        }

    }

    public function destroy($id ,Request $request ){
        $movie = Movie::findOrFail($id);
        File::delete(public_path().'/uploads/movies/'.$movie->movie_img);
        $movie->delete();

            $request->session()->flash('success', 'Movie removed successfully');
            return redirect()->route('movies.index');
    }

}
