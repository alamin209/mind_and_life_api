<?php

namespace App\Http\Controllers\Point;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Point;
use DataTables;
use Illuminate\Support\Str;
use Session;
use Hash;
use Auth;
use File;
use DB;
use Intervention\Image\ImageManagerStatic as Image;

class PointController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Point List';

        $data = Point::get();
        if ($request->ajax()) {

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('referral_point', function ($row) {
                    return $row->referral_point ?? '';
                })

                ->addColumn('article_share__point', function ($row) {
                    return $row->article_share__point ?? '';
                })

                ->addColumn('article_like_point', function ($row) {
                    return $row->article_like_point ?? '';
                })

                ->addColumn('article_bookmark_point', function ($row) {
                    return $row->article_bookmark_point ?? '';
                })

                // ->addColumn('article_read_point', function ($row) {
                //     return $row->article_read_point ?? '';
                // })

                // ->addColumn('share_video_point', function ($row) {
                //     return $row->share_video_point ?? '';
                // })

                // ->addColumn('video_like_point', function ($row) {
                //     return $row->video_like_point ?? '';
                // })

                // ->addColumn('video_bookmark_point', function ($row) {
                //     return $row->video_bookmark_point ?? '';
                // })

                // ->addColumn('video_watch_point', function ($row) {
                //     return $row->video_watch_point ?? '';
                // })

                // ->addColumn('share_coupon_point', function ($row) {
                //     return $row->share_coupon_point ?? '';
                // })

                // ->addColumn('download__coupon_point', function ($row) {
                //     return $row->download__coupon_point ?? '';
                // })

                // ->addColumn('redeem_coupon_point', function ($row) {
                //     return $row->redeem_coupon_point ?? '';
                // })

                // ->addColumn('share_quiz_point', function ($row) {
                //     return $row->share_quiz_point ?? '';
                // })

                // ->addColumn('doing_quiz_point', function ($row) {
                //     return $row->doing_quiz_point ?? '';
                // })

                // ->addColumn('quiz_point', function ($row) {
                //     return $row->quiz_point ?? '';
                // })

                // ->addColumn('daily_login_point', function ($row) {
                //     return $row->daily_login_point ?? '';
                // })

                //  ->addColumn('image_path', function ($row) {
                //     return $row->image_path ?? '';
                // })
                ->addColumn('action', function ($row) {
                    $btn = '<button type="button"   onclick="delete(' . $row->id . ')"
                     class="btn btn-success waves-effect waves-light"style="margin-right:20px" >
                      <a href="' . route('point.show', $row->id) . '">Edit</a>
                     </button>';

                    $btn2 = '<button type="button"   onclick="delete(' . $row->id . ')"
                     class="btn btn-danger waves-effect waves-light"style="margin-right:20px" >
                      Delete
                     </button>';
                    return $btn . '' . $btn2;

                    // <i class="bx bx-pencil  font-size-16 align-right "   ></i>
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin/point/index', compact('title', 'data'));
    }


    public function create(Request $request)
    {
        $title = 'Point Create';
        return view('admin.point.create', compact('title'));
    }
    public function store(Request $request)
    {

        $data = $request->validate([
            'referral_point'         => 'nullable|integer',
            'article_share__point'   => 'nullable|integer',
            'article_like_point'     => 'nullable|integer',
            'article_bookmark_point' => 'nullable|integer',
            'article_read_point'     => 'nullable|integer',
            'share_video_point'      => 'nullable|integer',
            'video_like_point'       => 'nullable|integer',
            'video_bookmark_point'   => 'nullable|integer',
            'video_watch_point'      => 'nullable|integer',
            'share_coupon_point'     => 'nullable|integer',
            'download__coupon_point' => 'nullable|integer',
            'redeem_coupon_point'    => 'nullable|integer',
            'share_quiz_point'       => 'nullable|integer',
            'doing_quiz_point'       => 'nullable|integer',
            'quiz_point'             => 'nullable|integer',
            'daily_login_point'       => 'nullable|integer',
            'image_path'              => 'nullable | image |  mimes:jpeg,png,jpg,gif | max:8240',
        ]);
        if ($request->hasFile('image_path') != '') {

            $qQimage = $request->file('image_path');
            $qQimage_name =  uniqid('qtype_') . Str::random('10') . '.' . $qQimage->getClientOriginalExtension();
            $qQimage_resize = Image::make($qQimage->getRealPath());
            // $qQimage_resize->resize(200, 200);
            if ($qQimage->isValid()) {

                $qQimage_resize->save(public_path('point/' . $qQimage_name));

                $qQimage_path = 'public/point/' . $qQimage_name;
                $data['image_path'] = $qQimage_path;

                Point::create($data);
            }
        } else {

            Point::create($data);
        }

        try {
            $this->successfullymessage('Point  Addedd successfully ');
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
        $title = "Edit Point";
        $point = Point::find($id);

        return view('admin/point/update', compact('point', 'title'));
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
            'referral_point'          => 'nullable|integer',
            'article_share__point'    => 'nullable|integer',
            'article_like_point'       => 'nullable|integer',
            'article_bookmark_point'   => 'nullable|integer',
            'article_read_point'       => 'nullable|integer',
            'share_video_point'        => 'nullable|integer',
            'video_like_point'         => 'nullable|integer',
            'video_bookmark_point'     => 'nullable|integer',
            'video_watch_point'        => 'nullable|integer',
            'share_coupon_point'       => 'nullable|integer',
            'download__coupon_point'   => 'nullable|integer',
            'redeem_coupon_point'      => 'nullable|integer',
            'share_quiz_point'         => 'nullable|integer',
            'doing_quiz_point'         => 'nullable|integer',
            'quiz_point'               => 'nullable|integer',
            'daily_login_point'        => 'nullable|integer',
            'image_path'               => 'nullable | image |  mimes:jpeg,png,jpg,gif | max:8240',

        ]);

        $point = Point::findOrFail($id);

        if ($request->hasFile('image_path') != '') {

            $qQimage = $request->file('image_path');
            $qQimage_name =  uniqid('ad_') . Str::random('10') . '.' . $qQimage->getClientOriginalExtension();
            $qQimage_resize = Image::make($qQimage->getRealPath());
            // $qQimage_resize->resize(200, 200);

            if ($qQimage->isValid()) {

                if (isset($point->image_path)) {
                    $files_old = $point->image_path;
                    if ($files_old) {
                        unlink($files_old);
                    }
                }

                $qQimage_resize->save(public_path('point/' . $qQimage_name));
                $image_path = 'public/point/' . $qQimage_name;
                $data['image_path'] = $image_path;

                $point->update($data);
            }
        } else if ($request->hasFile('image_path') == '') {
            $point->update($data);
        }

        try {
            $point->update($data);
            $this->successfullymessage('Point Updated successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            $this->failmessage($e->getMessage());
            return redirect()->back()->with('error', 'Failed to update Point!');
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
        //
    }
}
