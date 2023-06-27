<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Comic;
use App\Models\Genre;
use App\Models\GenreComic;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ComicDetailController extends Controller
{
    public function index($slug, $id)
    {
        $comic = Comic::where('slug', $slug)->where('id', $id)->first();
        $chapters = Chapter::where('comic_id', $id)->orderBy('created_at', 'desc')->get(); // lấy thời gian đăng chapter
        $totalViews = Chapter::where('comic_id', $id)->sum('view'); // tổng view
        // $user = Auth::user();
        $timeAgo = [];// lấy thời gian đăng chapter
        foreach ($chapters as $chapter) {
            $timeAgo[$chapter->id] = $chapter->created_at->diffForHumans();
        } // lấy thời gian đăng chapter



        $comic->view = $totalViews;
        $comic->save();

        return view('client.comics.detail', [
            'title' => 'Truyện ' . $comic->name,
            'chapters' => $chapters,
            'comic' => $comic,
            'genre_comics' => GenreComic::all(),
            'timeAgo' => $timeAgo,
            'totalViews' => $totalViews,
            'genres' => Genre::all(),


        ]);
    }


}
