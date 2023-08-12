<div class="row m-0">
    <div class="alert alert-danger" role="alert">
        <p> اطلاعات مربوط به صفحه کوئیز</p>
    </div>
    <div class="col-lg-4 form-group">
        <label for="title" class="col-form-label">عنوان</label>
        <input id="title" name="title" type="text" class="form-control" required
               oninvalid='Command: toastr["error"]("وارد کردن عنوان  اجباریست", "خطا")'
               value="@if(isset($data->title)){{$data->title}}@endif">
    </div>
    <div class="col-lg-4 form-group">
        <label for="h1" class="col-form-label">h1</label>
        <input id="h1" name="h1" type="text" class="form-control"
               value="@if(isset($data->h1)){{$data->h1}}@endif">
    </div>
    <div class="col-lg-4 form-group">
        <label for="url" class="col-form-label">url</label>
        <input id="url" name="url" type="text" class="form-control" required
               oninvalid='Command: toastr["error"]("وارد کردن  url اجباریست", "خطا")'
               value="@if(isset($data->url)){{$data->url}}@endif">
    </div>


    <div class="col-lg-4 form-group">
        <label class="col-form-label"> تصویر داخل لیست(حداکثر حجم ۴۰ کیلو بایت ) </label>
        <input class="form-control" type="file" name="image">
        @if(isset($data->image))
            <img src="{{asset('assets/uploads/content/quiz/medium/'.$data->image)}}" class="w-50">
        @endif
    </div>
    <div class="col-lg-4 form-group">
        <label class="col-form-label"> تصویر(حداکثر حجم ۴۰ کیلو بایت ) </label>
        <input class="form-control" type="file" name="image2">
        @if(isset($data->image2))
            <img src="{{asset('assets/uploads/content/quiz/medium/'.$data->image2)}}" class="w-50">
        @endif
    </div>
    <div class="col-lg-4 form-group">
        <label for="alt_image" class="col-form-label">عنوان عکس</label>
        <input id="alt_image" name="alt_image" type="text" class="form-control"
               value="@if(isset($data->alt_image)){{$data->alt_image}}@endif">
    </div>


    <div class="form-group">
        <label for="description" class="col-form-label">توضیحات </label>
        <textarea class="form-control ckeditor" id="description" name="description" rows="3">
            @if(isset($data->description)){!!$data->description !!}@endif</textarea>
    </div>
    <div class="col-lg-6 form-group">
        <label for="lead" class="col-form-label">توضیحات کوتاه در لیست</label>
        <textarea class="form-control" id="lead" name="lead"
                  rows="4">@if(isset($data->lead)){!!$data->lead !!}@endif</textarea>
    </div>
    <div class="col-lg-6 form-group">
        <label for="title_seo" class="col-form-label">عنوان سئو </label>
        <input id="title_seo" v-model="title_seo" required
               oninvalid='Command: toastr["error"]("وارد کردن عنوان سئو اجباریست", "خطا")' name="title_seo" type="text"
               class="form-control" value="@if(isset($data->title_seo)){{$data->title_seo}}@endif">
        <p> کاراکتر باقی مانده: @{{ 70-title_seo.length }}</p>
    </div>
    <div class="col-lg-6 form-group">
        <label for="description_seo" class="col-form-label">توضیحات سئو</label>
        <textarea class="form-control" v-model="description_seo" id="description_seo" name="description_seo"
                  rows="4">@if(isset($data->description_seo)){!!$data->description_seo !!}@endif</textarea>
        <p> کاراکتر باقی مانده: @{{ 170-description_seo.length }}</p>
    </div>
</div>


