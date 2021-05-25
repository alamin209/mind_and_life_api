<?php

namespace App\Http\Controllers\Video;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use DataTables;
use App\Models\Category;
use App\User;
use Illuminate\Support\Str;
use App\Models\ArticleTag;
use App\Libraries\AdRecursionHelper;
use Intervention\Image\ImageManagerStatic as Image;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Videos List';

        if ($request->ajax()) {

            $data = Video::with('author', 'category')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('category_name', function ($row) {
                    return $row->category->name ?? '';
                })
                ->addColumn('author_name', function ($row) {
                    return $row->author->username ?? '';
                })
                ->addColumn('video_type', function ($row) {
                    return $row->type ?? '';
                })
                ->addColumn('video', function ($row) {
                    if ($row->type == 'directly') {
                        $url = asset($row->video_path);
                        return $url;
                    } else {
                        return $row->youtube_link;
                    }
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return 'Active';
                    } else {
                        return 'Inactive';
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn = '<button type="button"  class="btn btn-success waves-effect waves-light"style="margin-right:20px">
                    <a href="videos/' . $row->id . '/edit"> Edit </a>
                   </button> ';

                    $btn3 = '<button type="button"   onclick="selectid2(' . $row->id . ')"
                   class="btn btn-primary waves-effect waves-light"style="margin-right:20px"   data-toggle="modal" data-target="#updatecategory">
                    View
                   </button>';

                    $btn2 = '<button type="button" data-panel-id="' . $row->id . '"   onclick="delete_ad(' . $row->id . ')"
                   class="btn btn-danger waves-effect waves-light"   data-toggle="modal" data-target="#">
                   Delete
                   </button>';

                    return $btn . '' . $btn3 . '' . $btn2;

                    // <i class="bx bx-pencil  font-size-16 align-right "   ></i>
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin/video/videos', compact('title'));
    }

    public function create()
    {

        $title = 'New Video';
        $categories = Category::where('type', 'video')->where('status', 1)->get();
        $users = User::whereNotNull('user_type')->get();
        return view('admin/video/create', compact('categories', 'users', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'video_path' => 'nullable|mimes:mp4,avi,mpeg,ogx,oga,ogv,ogg,webm| max:25600',
            'user_id' => 'required | integer',
            'category_id' => 'required | integer',
            'title' => 'required | string',
            'post_date' => 'nullable | date',
            'description' => 'nullable | string',
            'youtube_link' => 'nullable | string',
        ]);


        if ($request->check_type == 1) {

            $data['type'] = 'link';
        }

        $data['post_date'] = $request->post_date ?? date('Y-m-d');

        if ($request->hasFile('video_path') != '') {

            $art_video = $request->file('video_path');
            $ad_video_name = uniqid('ar_') . Str::random('10') . '.' . $art_video->getClientOriginalExtension();
            $created_id = 0;
            if ($art_video->isValid()) {
                $fileName = $ad_video_name;
                $foldername = '/article';
                $name = $fileName;
                $video_path = $art_video->storeAs($foldername, $name, 'public');

                $data['youtube_link'] = null;
                $data['type'] = 'directly';
                $data['video_path'] = 'public/' . $video_path;
                $created_id = Video::create($data);
            }
        } else {

            $created_id = Video::create($data);
        }
        if ($request->filled('tag_name')) {
            if ($created_id) {
                $last_inserted_id = $created_id->id;
                foreach ($request->tag_name as $tag_name) {
                    $data2 = ([
                        'video_id' => $last_inserted_id,
                        'tag_name' => $tag_name
                    ]);
                    $created_id = ArticleTag::create($data2);
                }
            }
        }
        try {
            $this->successfullymessage('Video  Addedd successfully ');
            return redirect()->back();
        } catch (\Exception $e) {
            $this->failmessage($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = ' Video';
        $categories = Category::where('type', 'video')->where('status', 1)->get();
        $users = User::whereNotNull('user_type')->get();

        $video = Video::with('article_tags', 'author', 'category')->find($id);
        return view('admin/video/view', compact('categories', 'users', 'title', 'video'));
    }

    public function edit($id)
    {

        $title = 'Edit Video';
        $categories = Category::where('type', 'video')->where('status', 1)->get();
        $users = User::whereNotNull('user_type')->get();
        $video = Video::with('article_tags')->find($id);
        return view('admin/video/update', compact('categories', 'users', 'title', 'video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'video_path' => 'nullable|mimes:mp4,avi,mpeg,ogx,oga,ogv,ogg,webm| max:25600',
            'user_id' => 'required | integer',
            'category_id' => 'required | integer',
            'title' => 'required | string',
            'post_date' => 'nullable | date',
            'description' => 'nullable | string',
            'youtube_link' => 'nullable | string',
        ]);


        if ($request->check_type == 1) {

            $data['type'] = 'link';
        }

        $data['post_date'] = $request->post_date ?? date('Y-m-d');

        $old_video = Video::find($id);

        if ($request->hasFile('video_path') != '') {

            $art_video = $request->file('video_path');
            $ad_video_name = uniqid('ar_') . Str::random('10') . '.' . $art_video->getClientOriginalExtension();

            if ($art_video->isValid()) {
                if (isset($old_video->video_path)) {
                    $files_old = $old_video->video_path;
                    if ($files_old) {
                        unlink($files_old);
                    }
                }

                $fileName = $ad_video_name;
                $foldername = '/article';
                $name = $fileName;
                $video_path = $art_video->storeAs($foldername, $name, 'public');

                $data['youtube_link'] = null;
                $data['type'] = 'directly';
                $data['video_path'] = 'public/' . $video_path;
                $old_video->update($data);
            }
        } else if ($request->hasFile('image_path') == '') {
            $old_video->update($data);
        }

        try {
            $this->successfullymessage('Video  Update  successfully ');
            return redirect()->back();
        } catch (\Exception $e) {
            $this->failmessage($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old_video = Video::findOrFail($id);
        if (isset($old_video->video_path)) {
            $files_old = $old_video->video_path;
            if ($files_old) {
                if (file_exists($files_old))
                    unlink($files_old);
            }
        }
        $old_video->article_tags()->delete();
        $old_video->delete();
    }
}
