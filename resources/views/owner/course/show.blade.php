<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            講座確認
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <section class="text-gray-600 body-font">
                        <div class="container px-5 mx-auto">
                            <div class="w-full mx-auto overflow-auto">
                                <table class="show-table-01 table-auto whitespace-no-wrap">
                                    <tr>
                                        <th>講座名</th>
                                        <td>{{ $course->course_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>基本料金</th>
                                        <td>{{ number_format($course->basic_price) }}円</td>
                                    </tr>
                                    <tr>
                                        <th>エリア</th>
                                        <td>{{ $course->area }}</td>
                                    </tr>
                                    <tr>
                                        <th>会場</th>
                                        <td>{{ $course->venue }}</td>
                                    </tr>
                                    <tr>
                                        <th>ステータス</th>
                                        <td>{{ $course->status_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>リクエスト</th>
                                        <td>{{ $course->request_status }}</td>
                                    </tr>
                                    <tr>
                                        <th>コースの詳細</th>
                                        <td>{{ $course->detail }}</td>
                                    </tr>
                                    <tr>
                                        <th>特記事項</th>
                                        <td>{{ $course->notices }}</td>
                                    </tr>
                                    <tr>
                                        <th>メモ</th>
                                        <td>{{ $course->memo }}</td>
                                    </tr>
                                </table>
                            </div>


                            <a href='{{ route('owner.course.edit', ['course'=> $course->id]) }}' >
                                <button class="flex mx-auto mt-16 text-white bg-purple-500 border-0 py-2 px-8 focus:outline-none hover:bg-purple-300 rounded text-lg">編集</button>
                            </a>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


