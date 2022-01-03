<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\{Course, CourseDetail, Prefectures};
use Illuminate\Http\Request;

class CourseController extends Controller
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
        $userId = \Auth::user()->id;

        // 自分の講座を取得する
        $courses = Course::get_ownerCourse($userId);
        $courses = $this->setCourseServices($courses);

        // 講座に紐づく詳細を取得する
        $coursesIdList = array_column($courses->toArray(), 'id');
        $courseDetails = CourseDetail::getByCourseId($coursesIdList);

        return view('owner.course.index', compact('courses', 'courseDetails') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prefectures = Prefectures::get();

        return view('owner.course.create', compact('prefectures') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $userId = \Auth::user()->id;
            Course::create([
                'owner_id' => $userId,
                'detail' => $request->detail,
                'basic_price' => $request->basic_price,
                'area_code' => $request->area_code,
                'held_type' => $request->held_type,
                'venue' => $request->venue,
                'notices' => $request->notices,
                'status' => $request->status,
                'request_accept' => $request->request_accept,
                'memo' => $request->memo,
                'course_name' => $request->course_name,
            ]);

            session()->flash('msg_success', '講座を新しく登録しました');
            return redirect()->route('owner.course.index');

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
        try {
            $userId = \Auth::user()->id;
            $course = Course::findOrFail($id);

            if(empty($course)) throw new \Exception("対象の講座は存在しません");
            if($course->owner_id <> $userId) throw new \Exception("不正な画面遷移です<br>あなたの講座ではありません");

            $course = $this->setCourseService($course);

            return view('owner.course.show', compact('course') );

        } catch (\Throwable $e) {
            session()->flash('msg_danger',$e->getMessage() );
            return redirect()->back();    // 前の画面へ戻る
        }

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
        try {
            $userId = \Auth::user()->id;
            $course = Course::findOrFail($id);

            if(empty($course)) throw new \Exception("対象の講座は存在しません");
            if($course->owner_id <> $userId) throw new \Exception("不正な画面遷移です<br>あなたの講座ではありません");

            $course->delete_flag = 1;
            $course->save();

            session()->flash('msg_success', '削除しました');
            return redirect()->back();    // 前の画面へ戻る
        } catch (\Throwable $e) {
            session()->flash('msg_danger',$e->getMessage() );
            return redirect()->back();    // 前の画面へ戻る
        }

    }

    /**
     *
     */
    public function setCourseServices($courses){
        foreach($courses as $course){
            $course = $this->setCourseService($course);
        }
        return $courses;
    }

    /**
     * 対象データのステータスやリクエスト受付状況を
     */
    public function setCourseService($course){
        if(!is_null($course->status)){
            switch ($course->status) {
                case 0:
                    $course->status_name = '非公開';
                    break;
                case 1:
                    $course->status_name = '公開中';
                    break;
                case 9:
                    $course->status_name = 'キャンセル';
                    break;
                default:
                    $course->status_name = '未設定';
                    break;
            }
        }

        if(!is_null($course->request_accept)){
            switch ($course->request_accept) {
                case 0:
                    $course->request_status = '受け付けない';
                    break;
                case 1:
                    $course->request_status = '受け付ける';
                    break;
                default:
                    $course->request_status = '未設定';
                    break;
            }
        }

        switch ($course->num_times) {
            case 0:
                $course->course_type = '未設定';
                break;
            case 1:
                $course->course_type = '単発開催';
                break;
            default:
                $course->course_type = 'コース開催';
                break;
        }

        return $course;
    }

}