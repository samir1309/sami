{{ csrf_field() }}
<div class="row">
    <div class="card-body m-0 bg-light">
   @include('admin.quiz.main-form')
    </div>

    <div class="col-lg-12 p-2">
        <div class="form-group">
            <button type="submit" class="btn btn-space btn-success m-0 px-5">ذخیره</button>
        </div>
    </div>
</div>

