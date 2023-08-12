<div class="row w-100 m-0">
    {{ csrf_field() }}
    <div class="col-lg-4 form-group">
        <label for="title" class="col-form-label">عنوان</label>
        <input id="title" name="title" type="text" class="form-control" value="@if(isset($data->title)){{$data->title}}@endif">
    </div>
    <div class="col-lg-4 form-group">
        <label for="parent_id" class="col-form-label">دسته</label>
        <input id="someinput">      <select id="optlist" class="form-control" name="parent_id" value="@if(isset($data->parent_id)) {{$data->parent_id}} @endif">
            <option value="">انتخاب دسته : </option>
            @foreach($categories as $row)
                <option value="{{$row['id']}}"
                        @if(isset($data->parent_id))
                        @if($data->parent_id==$row['id']) selected @endif
                    @endif
                >{{$row['title']}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-3 form-group">
 <label>   تصویر کاور(حداکثر حجم 30kb و سایز آپلود: ۳۵۰*۳۵۰) </label>
        <input class="form-control" type="file" name="cover">
        @if(isset($data->cover)) <img src="{{asset('assets/uploads/content/cat/'.$data->cover)}}" style="height: 150px; width: 100%"> @endif


    </div>
    <div class="col-lg-1 form-group py-4">
        <a type="button" class="btn btn-secondary"  href="{{asset('assets/uploads/help/kajshop.wmv')}}" target="_blank">راهنما</a>
    </div>

    <div class="col-lg-12 p-2">
        <div class="form-group">
            <label>توضیحات</label>
            <textarea class="form-control ckeditor" type="text" name="description">@if(isset($data->description)){!! $data->description !!}@endif</textarea>
        </div>
    </div>

      <div class="col-lg-4 p-2">
        <div class="form-group">
            <label>توضیحات سئو</label>
            <textarea class="form-control" v-model="description_seo"  id="description_seo" name="description_seo" rows="4">@if(isset($data->description_seo)){!!$data->description_seo !!}@endif</textarea>
            <p> کاراکتر باقی مانده: @{{ 170-description_seo.length }}</p></div>
    </div>
    <div class="col-lg-4 p-2">
        <div class="form-group">
            <label>عنوان سئو</label>
            <input id="title_seo" v-model="title_seo" required  oninvalid='Command: toastr["error"]("وارد کردن عنوان سئو اجباریست", "خطا")' name="title_seo" type="text" class="form-control" value="@if(isset($data->title_seo)){{$data->title_seo}}@endif">
            <p> کاراکتر باقی مانده: @{{ 70-title_seo.length }}</p></div>
    </div>
     <div class="col-lg-4 form-group">
        <label for="specification_title" class="col-form-label">نام مشخصه</label>
        <input id="specification_title" name="specification_title" type="text" class="form-control" value="@if(isset($data->specification_title)){{$data->specification_title}}@endif">
    </div>
    <div class="col-lg-3 form-group">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">
            نمایش
        </label>
        <div class="col-12 col-sm-8 col-lg-6 pt-1">
            <div class="switch-button switch-button-yesno">
                <input type="checkbox" value="1" @if(isset($data->status) && $data->status == 1) checked="checked" @endif name="status" id="status">
                <span>
                    <label for="status"></label>
                </span>
            </div>
        </div>
    </div>
        <div class="col-lg-3 form-group">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">
            noindex
        </label>
        <div class="col-12 col-sm-8 col-lg-6 pt-1">
            <div class="switch-button switch-button-yesno">
                <input type="checkbox" value="1" @if(isset($data->noindex) && $data->noindex == 1) checked="checked" @endif name="noindex" id="noindex">
                <span>
                    <label for="noindex"></label>
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-12 p-2">
        <div class="form-group">
                 <button type="submit" class="btn btn-space btn-success m-0 px-5" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">ذخیره</button>
        </div>
    </div>
</div>

@section('js')
    <script type="text/javascript">
        $(function() {
            var opts = $('#optlist option').map(function(){
                return [[this.value, $(this).text()]];
            });

            $('#someinput').keyup(function(){
                var rxp = new RegExp($('#someinput').val(), 'i');
                var optlist = $('#optlist').empty();
                opts.each(function(){
                    if (rxp.test(this[1])) {
                        optlist.append($('<option/>').attr('value', this[0]).text(this[1]));
                    }
                });
            });
        });
    </script>
@endsection
