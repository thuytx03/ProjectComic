<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Genres\CreateGenreRequest;
use App\Http\Requests\Admin\Genres\UpdateGenreRequest;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    public $genre;
    public function __construct()
    {
        $this->genre = new Genre();
    }
    public function index(){
        return view('admin.genres.index',[
            'title'=>'Trang quản lý thể loại truyện',
            'genres'=>Genre::latest()->paginate(5)
        ]);
    }
    public function create(){
        return view('admin.genres.add',[
            'title' => 'Trang thêm mới thể loại'
        ]);
    }
    public function store(CreateGenreRequest $request){
        $genre=$this->genre;
        $genre->name=$request->name;
        $genre->status=$request->status;
        $genre->slug=Str::slug($request->name,'-');
        $genre->save();
        return redirect()->route('add.genre')->with('success','Thành công thêm mới thể loại');

    }
    public function destroy($id){
        $genre=Genre::findOrFail($id);
        $genre->delete();
        return redirect()->route('list.genre')->with('success','Thành công xoá thể loại');
    }
    public function edit($id){
        return view('admin.genres.edit',[
            'title'=>"Trang cập nhật thể loại",
            'genres'=> Genre::findOrFail($id)
        ]);
    }
    public function update(UpdateGenreRequest $request,$id){
        $genre=Genre::find($id);
        $genre->name=$request->name;
        $genre->status=$request->status;
        $genre->slug=Str::slug($request->name,'-');
        $genre->save();
        return redirect()->route('list.genre')->with('success','Thành công cập nhật thể loại '.$request->name);
    }
}
