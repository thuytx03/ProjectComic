<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Comic\CreateComicRequest;
use App\Models\Comic;
use App\Models\Genre;
use App\Models\GenreComic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('admin.comics.index',[
            'title' =>'Trang quản lý truyện',
            'comics'=>Comic::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.comics.add',[
            'title' => 'Trang thêm mới truyện',
            'genres'=>Genre::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'name' =>'required',
            //  'name' =>'required|unique:comics,name',
             'cover_image' => 'required|image',
             'genre_id' => 'required|array',
             'genre_id.*' => 'exists:genres,id',
             'author' => 'required',
             'description' => 'required',
             'status' => 'required',
         ], [
             'name.required' => 'Không được để trống tên truyện',
            //  'name.unique' => 'Tên truyện đã tồn tại, vui lòng nhập tên khác',
             'cover_image.required' => 'Không được để trống ảnh bìa',
             'cover_image.image' => 'Ảnh bìa không đúng định dạng',
             'genre_id.required' => 'Không được để trống thể loại truyện',
             'author.required' => 'Không được để trống tác giả truyện',
             'description.required' => 'Không được để trống mô tả truyện',
             'status.required' => 'Không được để trống trạng thái truyện',
         ]);

         $imagePath = $request->file('cover_image')->store('public/comics');
         $imagePath = str_replace('public/', '', $imagePath);
         $slug = Str::slug($request->name, '-'); // Tạo slug từ tên truyện

         $comic = Comic::create([
             'name' => $validatedData['name'],
             'slug' => $slug,
             'author' => $validatedData['author'],
             'cover_image' => $imagePath,
             'description' => $validatedData['description'],
             'status' => $validatedData['status'],
            //  'vip' => $request->vip,
            //  'price' => $request->price,
         ]);

         $comic->genres()->attach($validatedData['genre_id']);

         return redirect()->route('list.comic')->with('success', 'Thành công thêm mới truyện.');
     }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $comics=Comic::findOrFail($id);
        $genres = Genre::all();
        // $genre_comics=GenreComic::all();
        $genre_comics = GenreComic::where('comic_id', $id)->get();
        return view('admin.comics.edit',[
            'title'=>'Trang cập nhật thông tin truyện',
            'comics'=>$comics,
            'genres'=>$genres,
            'genre_comics'=>$genre_comics

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name'=>'required',
        'cover_image'=>'sometimes|image',
        'genre_id' => 'required|array',
        'genre_id.*' => 'exists:genres,id',
        'author'=>'required',
        'description'=>'required',
        'status'=>'required',
    ],[
        'name.required' => 'Không được để trống tên truyện',
        'cover_image.image' => 'Ảnh bìa không đúng định dạng',
        'genre_id.required' => 'Không được để trống thể loại truyện',
        'author.required' => 'Không được để trống tác giả truyện',
        'description.required' => 'Không được để trống mô tả truyện',
        'status.required' => 'Không được để trống trạng thái truyện',
    ]);

    $comic = Comic::findOrFail($id);

    $imagePath = $comic->cover_image;
    if($request->hasFile('cover_image')) {
        Storage::delete('public/' . $imagePath);
        $imagePath = $request->file('cover_image')->store('public/comics');
        $imagePath = str_replace('public/', '', $imagePath);
    }

    $slug = Str::slug($request->name, '-'); // Tạo slug từ tên truyện

    $comic->update([
        'name' => $validatedData['name'],
        'slug'=> $slug,
        'author' => $validatedData['author'],
        'cover_image' => $imagePath,
        'description' => $validatedData['description'],
        'status' => $validatedData['status'],
        // 'vip'=>$request->vip,
        // 'price'=>$request->price
    ]);

    $comic->genres()->sync($validatedData['genre_id']);

    return redirect()->route('list.comic')->with('success', 'Thành công cập nhật truyện.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comic=Comic::findOrFail($id);
        $comic->delete();
        return redirect()->route('list.comic')->with('success','Thành công xoá truyện');

    }
}
