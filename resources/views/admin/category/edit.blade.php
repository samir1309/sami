@extends('layouts.admin.master')
@section('title','ویرایش')
@section('content')
<div class="container-fluid dashboard-content" id="cat68">
	<div class="row w-100 m-0">
		<div class="col-lg-12 mx-auto py-1 px-0">
			<h3 class="bg-white py-2 px-4 rounded-lg">
                ویرایش
			</h3>
			<div class="card rounded-lg border-0 p-3">
                <form method="post" action="{{URL::action('Admin\CategoryController@postEditCategory',$data->id)}}"
                    enctype="multipart/form-data">
                    @include('admin.category.form')
                </form>
			</div>
		</div>
	</div>
</div>
<script>
    var app = new Vue({
        el: '#cat68',
        data: {


            title_seo: '{{@$data->title_seo}}',
            description_seo: '{{@$data->description_seo}}',
        },
        watch : {
            title_seo: function (val) {
                if (val.length > 71) {
                    toastr.error('تعداد کاراکتر عنوان سئو باید کمتر از ۷۰ باشد');
                }

            },
            description_seo: function (val) {
                if (val.length > 171) {
                    toastr.error('تعداد کاراکتر توضیحات سئو باید کمتر از ۱۷۰ باشد');
                }

            }
        }
    })
</script>
@stop
