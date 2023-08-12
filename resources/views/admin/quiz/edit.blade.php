@extends('layouts.admin.master')
@section('title','ویرایش')
@section('content')
<div class="container-fluid dashboard-content" id="quiz68">
	<div class="row w-100 m-0">
		<div class="col-lg-12 mx-auto py-1 px-0">
			<h3 class="bg-white py-2 px-4 rounded-lg">
            ویرایش
			</h3>
			<div class="card rounded-lg border-0 p-3">
                <form method="post" name="quizForm" action="{{URL::action('Admin\QuizController@postEdit',$data->id)}}"
                    enctype="multipart/form-data" onsubmit="return (validateForm())">
                    @include('admin.quiz.form')
                </form>
			</div>
		</div>
	</div>
</div>
<script>
    function validateForm(e) {
        e.preventDefault();
        const title_seo_val = document.forms["quizForm"]["title_seo"].value;

        const description_seo_val = document.forms["quizForm"]["description_seo"].value;


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
        el: '#quiz68',
        data: {
            title_seo: '{{@$data->title_seo}}',
            description_seo: '{{@$data->description_seo}}',
            number :1,
            number2 :[0],

        },
        methods:{
            plusMe: function(){
                this.number = this.number+1;
                this.number2.push(0)
            }
            ,minusMe: function(){
                if (this.number> 0){
                    this.number = this.number-1;
                    this.number2.pop()
                }
            },
            plusMe2: function(id){
                this.number2[id] = this.number2[id]+1;
                app.$forceUpdate()
            }
            ,minusMe2: function(id){
                this.number2[id] = this.number2[id]-1;
                this.number2.splice(id,1)
                app.$forceUpdate()
            }
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
