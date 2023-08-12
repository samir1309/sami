@extends('layouts.admin.master')
@section('title','جدید')
@section('content')

<div class="container-fluid dashboard-content" id="blog68">
	<div class="row w-100 m-0">
		<div class="col-lg-12 mx-auto py-1 px-0">
			<h3 class="bg-white py-2 px-4 rounded-lg">
				اضافه کردن مقاله
			</h3>
			<div class="card rounded-lg border-0 p-3">
				<form method="post" name="blogForm" action="{{URL::action('Admin\ArticleController@postAddArticle')}}"
					enctype="multipart/form-data" onsubmit="return (validateForm())">
					@include('admin.article.form')
				</form>
			</div>
		</div>
	</div>
</div>
<script>
    function validateForm(e) {
        e.preventDefault();
        const title_seo_val = document.forms["blogForm"]["title_seo"].value;

        const description_seo_val = document.forms["blogForm"]["description_seo"].value;


        if (title_seo_val.length > 71) {
            toastr.error('تعداد کاراکتر عنوان سئو باید کمتر از ۷۰ باشد');
            return false;

        }
        if (description_seo_val.length > 171) {
            toastr.error('تعداد کاراکتر توضیحات سئو باید کمتر از ۱۷۰ باشد');
            return false;

        }
    }
</script>


    <script>
        var app = new Vue({
            el: '#blog68',
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
