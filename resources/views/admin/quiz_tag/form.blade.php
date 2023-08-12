{{ csrf_field() }}
<div class="row">
    <div class="col-lg-4 m-auto form-group">
        <label for="title" class="col-form-label">عنوان</label>
        <input id="title" name="title" type="text" class="form-control"
               value="@if(isset($data->title)){{$data->title}}@endif">
        <div class="col-lg-12 p-0 mt-3">
            <div class="form-group">
                <button type="submit" class="btn btn-space btn-success w-100 rounded-3 m-0 px-5">ذخیره</button>
            </div>
        </div>
    </div>
</div>

