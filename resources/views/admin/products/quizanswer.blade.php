@extends('layouts.admin.master')
@section('title','جدید')
@section('content')

    <div class="container-fluid dashboard-content" id="quiz68">
        <div class="row w-100 m-0">
            <div class="col-lg-12 mx-auto py-1 px-0">
                <a href="{{url('admin/products/')}}" class="btn btn-default btn-info m-0 rounded-0" style="float: left"
                   data-toggle="tooltip" data-placement="top" title="" data-original-title="بازگشت">
                    بازگشت
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-arrow-left-circle ms-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                </a>

                <h3 class="bg-white py-2 px-4 rounded-lg">
                    اختصاص تگ کوئیز به {{@$product->title}}
                </h3>

                <div class="card rounded-lg border-0 p-3">
                    <form method="post" action="{{URL::action('Admin\QuizController@postProduct')}}"
                          enctype="multipart/form-data">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="card-body m-0 bg-light">
                                <div class="col-lg-12 p-2 form-group">
                                    <div class=" p-1">
                                        <label for="tag_id" class="col-form-label">
                                            انتخاب تگ :
                                        </label>
                                        <div class="bg-light p-3">
                                            <div class="sd-checkbox  h-auto">
                                                <ul class="p-0 row w-100 m-0" style="list-style-type:none">

                                                    @foreach($tags as $key=>$tag)
                                                        <li class="col-3">
                                                            <label class="custom-ch">
                                                                {{$tag['title']}}
                                                                <input type="checkbox"
                                                                       value="{{$tag['id']}}"
                                                                       @if(in_array($tag['id'],$tag_product)) checked="checked"
                                                                       @endif
                                                                       name="edit_tag_id[]"
                                                                       class="form-control" multiple>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @if(count($selected_tag) > 0)
                                    <div class="border p-1">
                                        تگ انتخاب شده:
                                        @foreach($selected_tag as $st)
                                            <label for="" class="col-form-label">
                                                {!! @$st->title !!}
                                                @if(!$loop->last)
                                                    ,
                                                @endif
                                            </label>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-12 p-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-space btn-success m-0 px-5">ذخیره</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
