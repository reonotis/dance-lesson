<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            講座一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <section class="text-gray-600 body-font">
                        <div class="container px-5 mx-auto">
                            <div class="w-full mx-auto overflow-auto">

                                <button onclick="location.href='{{ route('owner.course.create') }}'" class="flex mb-4 text-white bg-purple-500 border-0 py-2 px-8 focus:outline-none hover:bg-purple-300 rounded text-lg">新規作成</button>
                                <div class='courses-area'>
                                    @foreach($courses as $course)
                                        <div class='course-box' >
                                            <div class='myCourseWrapper' >
                                                <div class='myCourseTitle' >
                                                    <div class='myCourseName' >{{ $course->course_name }}</div>
                                                    <div class='flex' >
                                                        <div class='myCourseStatus myCourseStatus_{{ $course->status }}' >{{ $course->status_name }}</div>
                                                        <div class='myCourse-numTimes numTimes-{{ $course->num_times }}' >{{ $course->course_type }}</div>
                                                    </div>
                                                </div>
                                                <div class='myCourseLinkArea' >
                                                    <a href='{{ route('owner.course.show', ['course'=> $course->id]) }}' >確認</a>
                                                    <a class='a-delete' href='#' data-id='{{ $course->id }}' onclick='deletePost(this)' >削除</a>
                                                    <form id='delete_{{ $course->id }}' method='post' action='{{ route('owner.course.destroy', ['course'=> $course->id]) }}' >
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </div>
                                            </div>
                                            <div class='myCourseContent' >
                                                <div class='myCourseArea' >開催エリア<span class='myCourseAreaValue' >{{ $course->prefectures }}</span></div>
                                                <div class='myCoursePrice' >基本料金<span class='myCoursePriceValue' >{{ number_format($course->basic_price) }}</span>円</div>
                                                <div class='myCourseRequest' >リクエスト<span class='myCourseRequestValue' >{{ $course->request_status }}</span></div>
                                            </div>
                                            <!-- <div class='myCourseReview' >レビューがあった場合の詳細が入ります</div>
                                            <div class='myCourseReview' >受講者や、申し込み者の詳細が入ります</div> -->
                                            <div class='myCourseSchedule' >
                                                <div class='flex mb-2' >
                                                    <span class='course-detail-wrapper'>スケジュール</span>
                                                    <a href='{{ route('owner.course_details.createById', ['course_id'=> $course->id]) }}' >新規作成</a>
                                                </div>
                                                @if($courseDetails)
                                                    <?php $count = 0; ?>
                                                    @foreach($courseDetails as $courseDetail)
                                                        @if($courseDetail->course_id == $course->id)
                                                            <?php $count ++; ?>
                                                            <div class='course-detail' >
                                                                ID : {{ $courseDetail->id }} の詳細が入ります
                                                                <div class='' ><a href='{{ route('owner.course_details.edit', ['course_id'=> $course->id]) }}' >編集</a></div>
                                                            </div>
                                                        @endif
                                                        @endforeach
                                                        @if($count == 0)
                                                            <span class='support-span' >まだスケジュールが登録されていません</span>
                                                        @endif
                                                @endif

                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
<script>
    function deletePost(e){
        'use strict';
        if(confirm('本当に削除しますか？')){
            console.log(e.dataset.id)
            document.getElementById('delete_' + e.dataset.id).submit();
        }
    }
</script>

</x-app-layout>

