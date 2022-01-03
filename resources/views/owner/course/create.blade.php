<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            新規講座登録
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <section class="text-gray-600 body-font">
                        <div class="container px-5 mx-auto">
                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form action='{{ route('owner.course.store') }}' method='post'>
                                <div class='create-form-row' >
                                    <div class='create-form-title' >講座名</div>
                                    <div class='create-form-content' >
                                        <input type='text' name='course_name' value='{{ old('course_name') }}' class='create-input w-full' >
                                    </div>
                                </div>
                                <div class='create-form-row' >
                                    <div class='create-form-title' >基本料金</div>
                                    <div class='create-form-content' >
                                        <div class='create-form-content-row' >
                                            <input type='number' name='basic_price' value='{{ old('basic_price') }}' class='create-input w-56' >円
                                        </div>
                                    </div>
                                </div>
                                <div class='create-form-row' >
                                    <div class='create-form-title' >開催形式</div>
                                    <div class='create-form-content' >
                                        <div class='create-form-content-row' >
                                            <label><input type='radio' name='held_type' value='1' class='create-input-radio' <?php if(old('held_type') == 1) echo 'checked="checked" '; ?> >対面</label>
                                            <label><input type='radio' name='held_type' value='2' class='create-input-radio' <?php if(old('held_type') == 2) echo 'checked="checked" '; ?> >オンライン</label>
                                            <label><input type='radio' name='held_type' value='3' class='create-input-radio' <?php if(old('held_type') == 3) echo 'checked="checked" '; ?> >対面&オンライン</label>
                                        </div>
                                    </div>
                                </div>
                                <div class='create-form-row' >
                                    <div class='create-form-title' >回数</div>
                                    <div class='create-form-content' >
                                        <div class='create-form-content-row' >
                                            <label><input type='radio' name='num_type' value='1' class='create-input-radio' <?php if(old('num_type') == 1) echo 'checked="checked" '; ?> >単発開催</label>
                                            <label><input type='radio' name='num_type' value='2' class='create-input-radio' <?php if(old('num_type') == 2) echo 'checked="checked" '; ?> >コース開催</label>
                                            <div class='' id='num_times' style='display:none;' >
                                                <?php $num_times = (old('num_times')) ? old('num_times') : 2; ?>
                                                <input type='number' name='num_times' value='<?= $num_times; ?>' class='create-input w-20 mt-2' >回
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='create-form-row' >
                                    <div class='create-form-title' >基本エリア</div>
                                    <div class='create-form-content' >
                                        <?php $prefectureValue = (old('prefecture')) ? old('prefecture') : ''; ?>
                                        <?php $areaCode = (old('area_code')) ? old('area_code') : ''; ?>
                                        <x-select-prefecture :prefectures="$prefectures" :prefectureValue="$prefectureValue" :areaCode="$areaCode" />
                                        <span class='support-span' >※スケジュール登録の際に引き継がれます。</span>
                                    </div>
                                </div>
                                <div class='create-form-row' >
                                    <div class='create-form-title' >基本会場</div>
                                    <div class='create-form-content' >
                                    <input type='text' name='venue' class='create-input w-full' >
                                    </div>
                                </div>
                                <div class='create-form-row' >
                                    <div class='create-form-title' >ステータス</div>
                                    <div class='create-form-content' >
                                        <div class='create-form-content-row' >
                                            <label><input type='radio' name='status' value='0' class='create-input-radio' <?php if(old('status') == 0) echo 'checked="checked" '; ?> >未公開</label>
                                            <label><input type='radio' name='status' value='1' class='create-input-radio' <?php if(old('status') == 1) echo 'checked="checked" '; ?> >公開</label>
                                        </div>
                                    </div>
                                </div>
                                <div class='create-form-row' >
                                    <div class='create-form-title' >リクエスト</div>
                                    <div class='create-form-content' >
                                        <div class='create-form-content-row' >
                                            <label><input type='radio' name='request_accept' value='0' class='create-input-radio' <?php if(old('request_accept') == 0) echo 'checked="checked" '; ?> >受け付けない</label>
                                            <label><input type='radio' name='request_accept' value='1' class='create-input-radio' <?php if(old('request_accept') == 1) echo 'checked="checked" '; ?> >受け付ける</label>
                                        </div>
                                    </div>
                                </div>
                                <div class='create-form-row' >
                                    <div class='create-form-title' >コースの詳細</div>
                                    <div class='create-form-content' >
                                        <textarea name='detail' class='create-input w-full' ></textarea>
                                    </div>
                                </div>
                                <div class='create-form-row' >
                                    <div class='create-form-title' >特記事項</div>
                                    <div class='create-form-content' >
                                        <textarea name='notices' class='create-input w-full' ></textarea>
                                    </div>
                                </div>
                                <div class='create-form-row' >
                                    <div class='create-form-title' >メモ</div>
                                    <div class='create-form-content' >
                                        <textarea name='memo' class='create-input w-full' ></textarea>
                                    </div>
                                </div>

                                @csrf
                                <button class="flex mx-auto mt-16 text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-300 rounded text-lg">登録</button>
                            </form>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>

    <script>

        window.onload = function () {
            num_type_val = $('input:radio[name="num_type"]:checked').val()
            if( num_type_val == 1){
                $('#num_times').slideUp(0);
            }else if( num_type_val == 2){
                $('#num_times').slideDown(0);
            }
        };

        $('input[name="num_type"]').change(function () {
            if( $(this).val() == 1){
                $('#num_times').slideUp( 300 );
            }else if( $(this).val() == 2){
                $('#num_times').slideDown( 300 );
            }
        });
    </script>
</x-app-layout>


