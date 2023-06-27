<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Comic;
use App\Models\Genre;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Elasticsearch\ClientBuilder;


class IndexController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        $currentDate = Carbon::now();

        // $comics = Comic::latest()->paginate(16);

        $comics = Comic::query();
            if (request('search')) {
                $comics->where('name', 'Like', '%' . request('search') . '%');
            }

        // Lấy chapter mới nhất cho mỗi truyện
        $latestChapters = Chapter::whereIn('id', function ($query) {
            $query->selectRaw('MAX(id)')
                ->from('chapters')
                ->groupBy('comic_id');
        })->with('comic')->get();

        // Lấy top 10 truyện có số lượt xem cao nhất
        $topComics = Comic::orderBy('view', 'desc')
            ->take(10)
            ->get();


        return view('client.comics.index', [
            'title' => 'Đọc truyện tranh miễn phí - Truyện gì cũng có - XuanThuy',
            'comics' => $comics->orderBy('id', 'DESC')->paginate(16),
            'comicVip' => Comic::all(),
            'latestChapters' => $latestChapters,
            'users' => $user,
            'genres' => Genre::all(),
            'topComics' => $topComics,

        ]);
    }


}
