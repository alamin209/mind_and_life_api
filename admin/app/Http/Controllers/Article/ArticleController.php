<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleImage;
use DataTables;
use App\Models\Category;
use App\User;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\ArticleTag;
use Session;
use Hash;
use Auth;
use File;
use DB;

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

        //return $data = Article::with('articleImages','author', 'category')->get();
        if ($request->ajax()) {

            $data = Article::with('articleImages','author', 'category')->where('is_published',1)->get();

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
                    $url = (count($row->articleImages) > 0)?asset($row->articleImages[0]['image_url']):'';
                    //$url = asset($row->articleImages[0]['image_url']);
                    return $url;
                })

                ->addColumn('is_published', function ($row) {
                    if ($row->is_published == 1) {
                        return 'Publisehd';
                    } else {
                        return 'Unpublished';
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

                   if($row->is_published == 1){
                        $btn4 = '<a class="btn btn-info waves-effect waves-light mr-3" href="'. route('article.status',$row->id) .'">
                                Unpublish
                            </a>';
                   }else{
                        $btn4 = '<a class="btn btn-info waves-effect waves-light mr-3" href="'. route('article.status',$row->id) .'">
                                Publish
                            </a>';
                   }



                    return  $btn . '' . $btn3 . '' . $btn4 . '' . $btn2;

                    // <i class="bx bx-pencil  font-size-16 align-right "   ></i>
                })


                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin/article/articles', compact('title'));
    }



    public function status($id){
        $article   =  Article::find($id);

        $article->update([
            'is_published' => ($article['is_published'] == 1)?0:1,
        ]);
        try {
            $this->successfullymessage('Article Publish Status Changed ');
            return redirect()->back();
        } catch (\Exception $e) {
            $this->failmessage($e->getMessage());
            return redirect()->back();
        }
    }


    public function pending(Request $request){

        $title = 'Article List';

        //return $data = Article::with('articleImages','author', 'category')->get();
        if ($request->ajax()) {

            $data = Article::with('articleImages','author', 'category')->where('is_published',0)->get();

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
                    $url = (count($row->articleImages) > 0)?asset($row->articleImages[0]['image_url']):'';
                    //$url = asset($row->articleImages[0]['image_url']);
                    return $url;
                })

                ->addColumn('is_published', function ($row) {
                    if ($row->is_published == 1) {
                        return 'Publisehd';
                    } else {
                        return 'Unpublished';
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

                    if($row->is_published == 1){
                        $btn4 = '<a class="btn btn-info waves-effect waves-light mr-3" href="'. route('article.status',$row->id) .'">
                                Unpublish
                            </a>';
                   }else{
                        $btn4 = '<a class="btn btn-info waves-effect waves-light mr-3" href="'. route('article.status',$row->id) .'">
                                Publish
                            </a>';
                   }
                    return  $btn . '' . $btn3 . '' . $btn4 . '' . $btn2;

                    // <i class="bx bx-pencil  font-size-16 align-right "   ></i>
                })


                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin/article/articles_pending', compact('title'));

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


        $data = $request->validate([
            // 'image_path'            => 'required | image |  mimes:jpeg,png,jpg,gif,JPEG | max:40248',
            'user_id'               => 'required | integer',
            'category_id'           => 'required | integer',
            'title'                 => 'required | string',
            'post_date'             => 'nullable | date',
            'description'           => 'nullable | string',
        ]);


        $userData = Auth::guard()->user();
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
                $data['is_published'] = ($userData['user_type'] == "admin")?1:0;
                $created_id = Article::create($data);
            }
        } else {
            $data['is_published'] = ($userData['user_type'] == "admin")?1:0;
            $created_id = Article::create($data);
            if($request->file('article_image')){
                foreach($request->article_image as $key => $image){
                    $coverPhoto = $request->article_image[$key];
                    $getExt = $coverPhoto->getClientOriginalExtension();
                    $modifiedName = 'img_'.time().'_'.uniqid().'.'.$getExt;
                    $destination ='public/article-images/';
                    $article_image = $destination.$modifiedName;
                    $coverPhoto->move( $destination ,$modifiedName );
                    ArticleImage::create([
                        'article_id' => $created_id->id,
                        'image_url' => $article_image,
                    ]);
                }
            }
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

        $title = ' Article';
        $categories = Category::where('type', 'article')->where('status', 1)->get();
        $users     = User::whereNotNull('user_type')->get();

        $article   =  Article::with('articleImages','article_tags','author','category')->find($id);
        return view('admin/article/view', compact('categories', 'users', 'title', 'article'));
    }



    public function edit($id)
    {
        $category =   Category::find($id);
        $title = 'Edit Article';
        $categories = Category::where('type', 'article')->where('status', 1)->get();
        $users     = User::whereNotNull('user_type')->get();
       $article   =  Article::with('articleImages','article_tags')->find($id);
        return view('admin/article/update', compact('categories', 'users', 'title', 'article'));
    }

    public function articleImageDelete(Request $request){
        $id = $request->id;
        $imageExistance = ArticleImage::find($id);
        if($imageExistance){
            if($imageExistance->image_url != '' && $imageExistance->image_url != null){
                $old_file = $imageExistance->image_url;
                if(file_exists($old_file)){
                    File::delete($old_file);
                }
            }
            $imageExistance->delete();
            $status = [
                'success' => 1,
            ];
        }else{
            $status = [
                'success' => 0,
            ];
        }
        return $status;
    }


    public function update(Request $request, $id)
    {

        $data = $request->validate([
            // 'image_path'            => 'required | image |  mimes:jpeg,png,jpg,gif,JPEG | max:40248',
            'user_id'               => 'required | integer',
            'category_id'           => 'required | integer',
            'title'                 => 'required | string',
            'post_date'             => 'nullable | date',
            'description'           => 'nullable | string',
        ]);

        $userData = Auth::guard()->user();
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
                $data['is_published'] = ($userData['user_type'] == "admin")?1:0;
                $old_article->update($data);
            }
        } else if ($request->hasFile('image_path') == '') {
            $data['is_published'] = ($userData['user_type'] == "admin")?1:0;
            $old_article->update($data);
            if($request->file('article_image')){
                foreach($request->article_image as $key => $image){
                    $coverPhoto = $request->article_image[$key];
                    $getExt = $coverPhoto->getClientOriginalExtension();
                    $modifiedName = 'img_'.time().'_'.uniqid().'.'.$getExt;
                    $destination ='public/article-images/';
                    $article_image = $destination.$modifiedName;
                    $coverPhoto->move( $destination ,$modifiedName );
                    ArticleImage::create([
                        'article_id' => $id,
                        'image_url' => $article_image,
                    ]);
                }
            }
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
