<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Chapters\CreateChapterRequest;
use App\Http\Requests\Admin\Chapters\UpdateChapterResquest;
use App\Models\Chapter;
use App\Models\ChapterImage;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ChapterController extends Controller
{
    public function index(Request $request)
    {
        // $chapter_id=ChapterImage::all();
        $chapterImageCounts = ChapterImage::select('chapter_id', ChapterImage::raw('count(*) as count'))->groupBy('chapter_id')->get();
        // foreach ($chapterImageCounts as $chapterImageCount) {
        //     $chapter_id = $chapterImageCount->chapter_id;
        //     $count = $chapterImageCount->count;
        //     // Thực hiện xử lý với $chapter_id và $count ở đây
        // }

        return view('admin.chapters.index', [
            'title' => 'Trang quản lý chapter truyện',
            'chapters' => Chapter::latest()->paginate(5),
            // 'chapterImage'=>ChapterImage::where('chapter_id',$chapter_id)->count()
            'chapterImageCounts' => $chapterImageCounts
        ]);
    }
    public function create()
    {
        return view('admin.chapters.add', [
            'title' => 'Trang thêm mới chapter',
            'comics' => Comic::all()
        ]);
    }
    public function store(CreateChapterRequest $request)
    {
        $chapter = new Chapter();
        $chapter->comic_id = $request->comic_id;
        $chapter->name = $request->name;
        $chapter->coin_required = $request->coin_required;
        $slug = $request->name . '-' . $request->comic_id;
        $chapter->slug = Str::slug($slug, '-');
        $chapter->number_chapter = $request->number_chapter;
        $chapter->status = $request->status;
        $chapter->save();
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('public/chapters', $filename);

                $chapterImage = new ChapterImage();
                $chapterImage->chapter_id = $chapter->id;
                $chapterImage->image = $filename;

                $chapterImage->save();
            }
        }
        return redirect()->route('list.chapter')->with('success', 'Thành công thêm mới chapter!');
    }

    public function destroy($id)
    {
        $chapters = Chapter::findOrFail($id);
        $chapters->delete();
        return redirect()->route('list.chapter')->with('success', 'Thành công xoá chapter!');
    }

    public function edit($id)
    {
        $chapters = Chapter::findOrFail($id);
        return view('admin.chapters.edit', [
            'title' => 'Trang cập nhật chapter',
            'chapters' => $chapters,
            'comics' => Comic::all()
        ]);
    }

    public function update(Request $request, Chapter $chapter, $id)
    {
        $chapter = Chapter::find($id);
        $chapter->comic_id = $request->comic_id;
        $chapter->name = $request->name;
        $chapter->coin_required = $request->coin_required;
        $slug = $request->name . '-' . $request->comic_id;
        $chapter->slug = Str::slug($slug, '-');
        $chapter->number_chapter = $request->number_chapter;
        $chapter->status = $request->status;
        $chapter->save();
        if ($request->hasFile('images')) {
            // Xóa hình ảnh cũ

            foreach ($chapter->chapterImages as $image) {
                Storage::delete('public/chapters/' . $image->image);
                $image->delete();
            }

            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('public/chapters', $filename);
                $chapterImage = new ChapterImage();
                $chapterImage->chapter_id = $chapter->id;
                $chapterImage->image = $filename;
                $chapterImage->save();
            }
        }
        return redirect()->route('list.chapter')->with('success', 'Thành công cập nhật chapter!');
    }
}
