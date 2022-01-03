@props(['prefectures', 'prefectureValue','areaCode' ])

<div class='create-form-content-row flex' >
    <div class='course-area-wrapper' >
        都道府県
    </div>
    <div class='course-area-content' >
        <select name='prefecture' id='prefecture' class='create-input w-56' >
            <option value='' >都道府県を選択</option>
                @foreach($prefectures as $prefecture)
                    @if($prefecture->municipalities == NULL)
                        <option value='{{ $prefecture->prefectures }}' <?php if( $prefecture->prefectures == $prefectureValue ) echo ' selected="selected"'; ?> >{{ $prefecture->prefectures }}</option>
                    @endif
                @endforeach
            <option value="九州・沖縄">九州・沖縄</option>
        </select>
    </div>
</div>

<div class='create-form-content-row flex' >
    <div class='course-area-wrapper' >
        市区町村
    </div>
    <div class='course-area-content' >
        <select name='area_code' id='area_code' class='create-input w-56' disabled >
            <option value="" selected="selected">市区町村を選択</option>
            @foreach($prefectures as $prefecture)
                @if($prefecture->municipalities <> NULL)
                    <option value="{{ $prefecture->code }}" data-val='{{ $prefecture->prefectures }}' <?php if( $prefecture->code == $areaCode ) echo ' selected="selected"'; ?>  >{{ $prefecture->municipalities }}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>



<script>
    var $area_code = $('#area_code');
    var original = $area_code.html();

    // 既にエリアコードが選択されていたら disabled を外す
    if($area_code.val()){
        $area_code.removeAttr('disabled');
    }

    $('#prefecture').change(function() {
        // 変更した値を取得
        var val1 = $(this).val();

        $area_code.html(original).find('option').each(function() {
            var val2 = $(this).data('val');
            if (val1 != val2) {
                $(this).not(':first-child').remove();
            }
        });

        if ($(this).val() == "") {
            $area_code.attr('disabled', 'disabled');
        } else {
            $area_code.removeAttr('disabled');
        }
    });
</script>