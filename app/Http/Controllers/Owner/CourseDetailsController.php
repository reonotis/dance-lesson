<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\{Course, Prefectures};
use Illuminate\Http\Request;

class CourseDetailsController extends Controller
{

    public  function __construct()
    {
        $this->middleware('auth:owners');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createById($course_id)
    {
        try {
            $prefectures = Prefectures::get();

            $ownerId = \Auth::user()->id;
            $course = Course::select('*')
                ->leftJoin('prefectures', 'courses.area_code', '=', 'prefectures.code')
                ->findOrFail($course_id);

            if(empty($course)) throw new \Exception("対象の講座は存在しません");
            if($course->owner_id <> $ownerId) throw new \Exception("不正な画面遷移です<br>あなたの講座ではありません");

            return view('owner.schedule.create', compact('course', 'prefectures'));

        } catch (\Throwable $e) {
            session()->flash('msg_danger',$e->getMessage() );
            return redirect()->back();    // 前の画面へ戻る
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            throw new \Exception("強制終了");

            $ownerId = \Auth::user()->id;
            $course = Course::findOrFail($course_id);
            if(empty($course)) throw new \Exception("対象の講座は存在しません");
            if($course->owner_id <> $ownerId) throw new \Exception("不正な画面遷移です<br>あなたの講座ではありません");

            return view('owner.schedule.create', compact('course'));

        } catch (\Throwable $e) {
            session()->flash('msg_danger',$e->getMessage() );
            return redirect()->back()->withInput();    // 前の画面へ戻る
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
