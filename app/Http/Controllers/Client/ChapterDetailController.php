<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\ChapterImage;
use App\Models\ChapterUser;
use App\Models\Comic;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChapterDetailController extends Controller
{
    public function index($slug, $id, $chapter_id)
    {
        $comic = Comic::where('slug', $slug)->where('id', $id)->first();
        $chapters = Chapter::where('id', $chapter_id)->first();
        $listChapter = Chapter::where('comic_id', $id)->orderBy('number_chapter', 'desc')->get(); //lấy danh sachs chapter có cùng id truyện
        // Chức năng khoá chapter
        $user = Auth::user();
        $chapterUser = ChapterUser::where('user_id', $user->id)->where('chapter_id', $chapters->id)->first();
        if (!$chapterUser || !$chapterUser->unlocked) {
            if ($chapters->coin_required > 0 && $user->coins < $chapters->coin_required) {
                return redirect()->back()->with('error', 'Số Coins của bạn không đủ để mở khoá chapter. Vui lòng nạp Coins để có thể mở khoá chapter!!! ');
            }
            $chapterUser = ChapterUser::updateOrCreate(
                ['user_id' => $user->id, 'chapter_id' => $chapters->id],
                ['unlocked' => true]
            );
            $user->coins -= $chapters->coin_required; // Trừ Coins khi user mở khoá chapter
            $user->save();
        }
        //End chức năng khoá chapter

        $nextChapter = Chapter::where('comic_id', $chapters->comic_id)
            ->where('number_chapter', '>', $chapters->number_chapter)
            ->orderBy('number_chapter', 'asc')
            ->first(); //next chapter

        $prevChapter = Chapter::where('comic_id', $chapters->comic_id)
            ->where('number_chapter', '<', $chapters->number_chapter)
            ->orderBy('number_chapter', 'desc')
            ->first(); //prev chapter

        $chapters->view++;  //tự động tăng view khi có người click
        $chapters->save();

        return view('client.chapters.detail', [
            'title' => 'Chap ' . $chapters->number_chapter . '-' . $chapters->comic->name,
            'chapters' => $chapters,
            'comic' => $comic,
            'chapterImage' => ChapterImage::all(),
            'nextChapter' => $nextChapter,
            'prevChapter' => $prevChapter,
            'listChapter' => $listChapter,
            'genres' => Genre::all(),

        ]);
    }
}
