<?php

namespace App\Http\Controllers\Article;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use DataTables;
use App\Models\Category;
use App\User;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\ArticleTag;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Article List';

        if ($request->ajax()) {

            $data = Article::with('author', 'category')->get();

            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('category_name', function ($row) {
                    return $row->category->name ?? '';
                })

                ->addColumn('author_name', function ($row) {
                    return $row->author->username ?? '';
                })


                ->addColumn('title', function ($row) {
                    return Str::limit($row->title, 50) ?? '';
                })


                ->addColumn('image', function ($row) {
                    $url = asset($row->image_path);
                    return $url;
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
                    <a href="article/' . $row->id . '/edit"> Edit </a>
                   </button> ';

                    $btn3 = '<button type="button"   onclick="selectid2(' . $row->id . ')"
                   class="btn btn-primary waves-effect waves-light"style="margin-right:20px"   data-toggle="modal" data-target="#updatecategory">
                    View
                   </button>';

                    $btn2 = '<button type="button" data-panel-id="' . $row->id . '"   onclick="delete_ad(' . $row->id . ')"
                   class="btn btn-danger waves-effect waves-light"   data-toggle="modal" data-target="#">
                   Delete
                   </button>';

                    return  $btn . '' . $btn3 . '' . $btn2;

                    // <i class="bx bx-pencil  font-size-16 align-right "   ></i>
                })


                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin/article/articles', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title = 'New Article';
        $categories = Category::where('type', 'article')->where('status', 1)->get();
        $users     = User::whereNotNull('user_type')->get();
        return view('admin/article/create', compact('categories', 'users', 'title'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $data = $request->validate([
            'image_path'            => 'required | image |  mimes:jpeg,png,jpg,gif,JPEG | max:40248',
            'user_id'               => 'required | integer',
            'category_id'           => 'required | integer',
            'title'                 => 'required | string',
            'post_date'             => 'nullable | date',
            'description'           => 'nullable | string',
        ]);


        $data['post_date'] = $request->post_date ?? date('Y-m-d');

        if ($request->hasFile('image_path') != '') {

            $ad_image = $request->file('image_path');
            $ad_image_name = uniqid('ar_') . Str::random('10') . '.' . $ad_image->getClientOriginalExtension();
            $ad_image_resize = Image::make($ad_image->getRealPath());
            // $ad_image_resize->resize(200, 200);

            $created_id = 0;
            if ($ad_image->isValid()) {
                $ad_image_resize->save(public_path('article/' . $ad_image_name));
                $ad_image_path = 'public/article/' . $ad_image_name;
                $data['image_path'] = $ad_image_path;
                $created_id = Article::create($data);
            }
        } else {

            $created_id = Article::create($data);
        }
        if ($request->filled('tag_name')) {
            if ($created_id) {
                $last_inserted_id = $created_id->id;
                foreach ($request->tag_name as $tag_name) {
                    $data2 = ([
                        'article_id' => $last_inserted_id,
                        'tag_name'   => $tag_name
                    ]);
                    $created_id = ArticleTag::create($data2);
                }
            }
        }
        try {
            $this->successfullymessage('Article  Addedd successfully ');
            return redirect()->back();
        } catch (\Exception $e) {
            $this->failmessage($e->getMessage());
            return redirect()->back();
        }
    }

    public function show($id)
    {


        $category =   Category::find($id);
        $title = ' Article';
        $categories = Category::where('type', 'article')->where('status', 1)->get();
        $users     = User::whereNotNull('user_type')->get();

        $article   =  Article::with('article_tags','author','category')->find($id);
        return view('admin/article/view', compact('categories', 'users', 'title', 'article'));
    }



    public function edit($id)
    {
        $category =   Category::find($id);
        $title = 'Edit Article';
        $categories = Category::where('type', 'article')->where('status', 1)->get();
        $users     = User::whereNotNull('user_type')->get();
        $article   =  Article::with('article_tags')->find($id);
        return view('admin/article/update', compact('categories', 'users', 'title', 'article'));
    }


    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'image_path'            => 'required | image |  mimes:jpeg,png,jpg,gif,JPEG | max:40248',
            'user_id'               => 'required | integer',
            'category_id'           => 'required | integer',
            'title'                 => 'required | string',
            'post_date'             => 'nullable | date',
            'description'           => 'nullable | string',
        ]);


        $old_article  =  Article::find($id);
        if ($request->hasFile('image_path') != '') {

            $ad_image = $request->file('image_path');
            $ad_image_name =  uniqid('ar_') . Str::random('10') . '.' . $ad_image->getClientOriginalExtension();
            $ad_image_resize = Image::make($ad_image->getRealPath());


            if ($ad_image->isValid()) {

                if (isset($old_article->image_path)) {
                    $files_old = $old_article->image_path;
                    if ($files_old) {
                        unlink($files_old);
                    }
                }

                $ad_image_resize->save(public_path('article/' . $ad_image_name));
                $ad_image_path = 'public/article/' . $ad_image_name;
                $data['image_path'] = $ad_image_path;
                $old_article->update($data);
            }
        } else if ($request->hasFile('image_path') == '') {

            $old_article->update($data);
        }



        try {
            $this->successfullymessage('Article  Update  successfully ');
            return redirect()->back();
        } catch (\Exception $e) {
            $this->failmessage($e->getMessage());
            return redirect()->back();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old_article = Article::findOrFail($id);
        if (isset($old_article->image_path)) {
            $files_old = $old_article->image_path;
            if ($files_old) {
                unlink($files_old);
            }
        }
        $old_article->article_tags()->delete();
        $old_article->delete();
    }
}
