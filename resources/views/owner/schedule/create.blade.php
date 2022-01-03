<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            スケジュール登録
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <section class="text-gray-600 body-font">
                        <div class="container px-5 mx-auto">
                            講座名 {{ $course->course_name }} のスケジュールを登録する
                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form action='{{ route('owner.schedule.store') }}' method='post'>
                                @csrf
                                <div class='create-form-row' >
                                    <div class='create-form-title' >基本エリア</div>
                                    <div class='create-form-content' >
                                        <?php $prefectureValue = $course->prefectures; ?>
                                        <?php $areaCode = $course->area_code; ?>
                                        <x-select-prefecture :prefectures="$prefectures" :prefectureValue="$prefectureValue" :areaCode="$areaCode" />
                                        <div class='create-form-content-row flex' >
                                            <div class='course-area-wrapper' >
                                                会場
                                            </div>
                                            <div class='course-area-content' >
                                                <?php $venue = (old('venue')) ? old('venue') : $course->venue; ?>
                                                <input type='text' name='venue' class='create-input w-56' value='{{ $venue }}' >
                                            </div>
                                        </div>
                                        <div class='create-form-content-row flex' >
                                            <div class='course-area-wrapper' >
                                                住所
                                            </div>
                                            <div class='course-area-content' >
                                                <?php $address = (old('address')) ? old('address') : $course->address; ?>
                                                <input type='text' name='address' class='create-input w-full' value='{{ $address }}' >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='create-form-row' >
                                    <div class='create-form-title' >料金</div>
                                    <div class='create-form-content' >
                                        <div class='create-form-content-row' >
                                            <?php $basic_price = (old('basic_price')) ? old('basic_price') : $course->basic_price; ?>
                                            <input type='number' name='basic_price' value='{{ $basic_price }}' class='create-input w-4/5' >円
                                        </div>
                                    </div>
                                </div>
                                <div class='create-form-row' >
                                    <div class='create-form-title' >開催形式</div>
                                    <div class='create-form-content' >
                                        <div class='create-form-content-row' >
                                            <?php $held_type = (old('held_type')) ? old('held_type') : $course->held_type; ?>
                                            <label><input type='radio' name='held_type' value='1' class='create-input-radio' <?php if($held_type == 1) echo 'checked="checked" '; ?> >対面</label>
                                            <label><input type='radio' name='held_type' value='2' class='create-input-radio' <?php if($held_type == 2) echo 'checked="checked" '; ?> >オンライン</label>
                                            <label><input type='radio' name='held_type' value='3' class='create-input-radio' <?php if($held_type == 3) echo 'checked="checked" '; ?> >対面&オンライン</label>
                                        </div>
                                    </div>
                                </div>
                                @if($course->num_times >= 2)
                                    <div class='create-form-row' >
                                        <div class='create-form-title' >回数</div>
                                        <div class='create-form-content' >
                                                単発の場合は非表示にする<br>
                                                <div class='create-form-content-row' >
                                                    <?php $num_times = (old('num_times')) ? old('num_times') : $course->num_times; ?>
                                                    <input type='number' name='num_times' value='{{ $num_times }}' class='create-input w-20 mt-2' >回
                                                </div>
                                        </div>
                                    </div>
                                @endif
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

                                <button class="flex mx-auto mt-16 text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-300 rounded text-lg">登録</button>
                            </form>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


