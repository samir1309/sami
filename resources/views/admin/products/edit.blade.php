@extends('layouts.admin.master')
@section('title','ویرایش')
@section('content')
<div class="container-fluid dashboard-content" id="productform">
	<div class="row w-100 m-0">
		<div class="col-xl-9 mx-auto p-1">
			<h3 class="bg-white py-2 px-4 rounded-lg">
				ویرایش
{{@$data->title}}
			</h3>
			  <div class="col-md-1 p-1">
                <a href="{{route('site.product.detail',['id'=>$data->id])}}"
                   target="_blank" type="button"
                   class="btn btn-space btn-primary m-0 w-100"
                   data-toggle="tooltip"
                   title="مشاهده در سایت">
                    <i class="fa fa-eye"></i>
                </a>
            </div>
			<div class="card rounded-lg border-0 p-3">
				<form method="post" action="{{URL::action('Admin\ProductController@postEditProduct',$data->id)}}"
					enctype="multipart/form-data">
					@include('admin.products.form')
				</form>
			</div>
		</div>
        <div class="col-xl-3 mx-auto p-0">
            @include('admin.products.sid')
        </div>
	</div>
</div>
<script>
    new Vue({
        el: '#productform',
        data: function () {
            return {
                oldPrice : @if(isset($data->old_price) ) {{intval($data->old_price)}} @else 0 @endif,
                currentPrice: @if(isset($data->price) ) {{intval($data->price)}} @else 0 @endif,
                msg : 'hettt',
                number :1,
                 title_seo: '{{@$data->title_seo}}',
                description_seo: '{{@$data->description_seo}}',
            }
        },
        methods: {
            checkPrice:function ()  {

                var yourNumber = this.oldPrice;
                var n = yourNumber.toString().split(".");
                n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                this.oldPrice = n.join(".");


                var yourNumber2 = this.currentPrice;
                var n2 = yourNumber2.toString().split(".");
                n2[0] = n2[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                this.currentPrice = n2.join(".");



                console.log(Number(yourNumber.replace(",", "")));
                var compareOldPrice = Number(yourNumber.replace(",", ""));
                var comparePrice = Number(yourNumber2.replace(",", ""));
                console.log(compareOldPrice);
                console.log(comparePrice);

                if(compareOldPrice !== 0){
                    if(compareOldPrice < comparePrice){
                        console.log('ayyyy');
                        swal("",'قیمت فعلی باید کمتر از قیمت قبل تخفیف باشد!','error');
                    }
                    if(compareOldPrice == comparePrice){
                        swal("",'قیمت فعلی باید کمتر از قیمت قبل تخفیف باشد!','error');
                    }
                }

            },
            plusMe: function(){
                this.number = this.number+1;
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
    });
</script>

@stop
@section('js')
@endsection
