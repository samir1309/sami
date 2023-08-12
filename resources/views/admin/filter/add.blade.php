@extends('layouts.admin.master')
@section('title','فیلتر جدید')
@section('content')
<div class="container-fluid dashboard-content">
	<div class="row w-100 m-0">
		<div class="col-lg-12 mx-auto py-1 px-0">
            <a href="{{url('admin/filter/list/'.@$parent_id)}}" class="btn btn-default btn-info" style="float: left" data-toggle="tooltip" data-placement="top" title="" data-original-title="بازگشت">  بازگشت
            </a>
			<h3 class="bg-white py-2 px-4 rounded-lg">

                @if($parent_id != null)
                    @php $parent = \App\Models\ProductSpecificationType::find($parent_id); @endphp
                    {{'   اضافه کردن فیلتر جدید'.' '.$parent->title}}
                @else
                    اضافه کردن فیلتر جدید
                @endif

			</h3>
            @include('admin.filter.main')

		</div>
	</div>
</div>
@endsection

