@extends('layouts.admin.master')
@section('title',' تصاویر')
@section('content')
<div class="container-fluid  dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row w-100 m-0">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0">
            <div class="page-header">
                <h3 class="bg-white py-2 px-4 rounded-lg">

                    ترتیب تصاویر
                    {!! @$specification->product->title.' '.@$specification->productSpecificationValue->title !!}
                </h3>
            </div>
            <a href="{{url('admin/product-specification-price/list/'.@$specification->product_id)}}" class="btn btn-default btn-info m-0 rounded-0" style="float: left" data-toggle="tooltip" data-placement="top" title="" data-original-title="بازگشت">
                بازگشت
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle ms-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
            </a>
        </div>
    </div>
    <div class="card">

            <div class="py-5">

                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row w-100 m-0">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-lg-4" style="margin:auto">
                        <div id="list">
                            <div class="alert alert-info alert-dismissable rounded-lg" style="direction: rtl; margin: 0px auto;">
                                <i class="fa fa-check"></i>
                                <span style="font-size: 14px;">	با درگ کردن ترتیب مورد نظر را انتخاب نمایید.  </span>
                            </div>

                            <div id="response"></div>

                            <ul>
                                <hr>
                                <div class="alert alert-primary alert-dismissable rounded-lg" style="direction: rtl; margin: 0px auto;">
                                    <i class="fa fa-arrow-circle-down"></i>
                                    <span style="font-size: 10px;">	ترتیب تصاویر  </span>
                                </div>
                                <span style="font-size: 10px;">	ترتیب   تصاویر</span>
                                @foreach($data as $rowSort)
                                    <li class="list-unstyled  my-2 p-3 shadow-sm rounded-lg" id="arrayorder_{!! stripslashes($rowSort['id']) !!}"  style="background-color: #333" >
                                        <img src="{{asset('assets/uploads/content/pro/big/'.$rowSort['file'])}}" class="w-100" style="width: 100%;height: 70px">
                                        <div class="clear"></div>
                                    </li>
                                    <div class="clear"></div>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            {{--		</form>--}}
    </div>
</div>

@stop

@section('css')
<style>
    ul {
        padding: 0px;
        margin: 0px;
    }

    #response {
        padding: 10px;
        background-color: #9F9;
        border: 2px solid #396;
        margin-bottom: 20px;
    }

    #list li {
        margin: 0 0 3px;
        padding: 8px;
        background-color: #3d3f5d;
        color: #fff;
        list-style: none;
    }
</style>
@stop

@section('js')

    <script>
        $(document).ready(function() {
            $('#check-all').change(function() {
                $(".delete-all").prop('checked', $(this).prop('checked'));
            });
        });
    </script>

    <meta name="csrf-token" content="{!! csrf_token() !!}" />
    <script type="text/javascript">
        $(document).ready(function() {
            function slideout() {
                setTimeout(function() {
                    $("#response").slideUp("slow", function() {});

                }, 2000);
            }

            $("#response").hide();
            $(function() {
                $("#list ul").sortable({
                    opacity: 0.8,
                    cursor: 'move',
                    update: function() {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        var order = $(this).sortable("serialize") + '&update=update' +
                            '&_token=' + CSRF_TOKEN;
                        $.post("{!!URL::action('Admin\ProductController@postSortImage')!!} ",
                            order,
                            function(theResponse) {
                                $("#response").html(theResponse);
                                $("#response").slideDown('slow');
                                slideout();
                            });

                    }
                });
            });

        });
    </script>


@stop
