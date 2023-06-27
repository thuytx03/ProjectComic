<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Comic;
use App\Models\Follow;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function index(Request $request)
    {
        $follows = Follow::where('user_id', auth()->user()->id)
            ->with('comic')
            ->get();

        $latestChapters = Chapter::whereIn('id', function ($query) {
            $query->selectRaw('MAX(id)')
                ->from('chapters')
                ->groupBy('comic_id');
        })->with('comic')->get();

        return view('client.comics.follow', [
            'title' => 'Danh sách truyện theo dõi',
            'comics' => Comic::all(),
            'follows' => $follows,
            'latestChapters' => $latestChapters,
            'genres' => Genre::all(),

        ]);
    }



    public function followComic(Request $request, $comicId)
    {
        $user = $request->user();

        // tìm kiếm một bản ghi trong bảng follows có trường user_id bằng $user->id
        //và trường comic_id bằng $comicId
        $follow = Follow::where('user_id', $user->id)->where('comic_id', $comicId)->first();
        if (!$follow) {
            // Nếu không tìm thấy bản ghi nào thỏa mãn điều kiện trên, chúng
            // ta tạo mới một bản ghi Follow với các trường user_id
            // và comic_id tương ứng là $user->id và $comicId, sau đó lưu bản ghi này vào
            // cơ sở dữ liệu bằng phương thức save().
            $follow = new Follow();
            $follow->user_id = $user->id;
            $follow->comic_id = $comicId;
            $follow->save();
        }
        return redirect()->back()->with('success', 'Follow truyện thành công');
    }

    public function unfollowComic(Request $request, $comicId)
    {
        $user = $request->user();
        $follow = Follow::where('user_id', $user->id)->where('comic_id', $comicId)->first();
        if ($follow) {
            $follow->delete();
        }
        return redirect()->back()->with('success', 'Hủy theo dõi truyện thành công');
    }
}
