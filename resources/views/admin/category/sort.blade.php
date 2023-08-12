@extends('layouts.admin.master')
@section('title',' دسته بندی محصولات')
@section('content')
<div class="container-fluid  dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row w-100 m-0">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0">
            <div class="page-header">
                <h3 class="bg-white py-2 px-4 rounded-lg">
                    ترتیب دسته بندی محصولات
                </h3>
            </div>
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
                                    <span style="font-size: 10px;">	ترتیب دسته ها  </span>
                                </div>
                                <span style="font-size: 10px;">	ترتیب دسته های صفحه اول  </span>
                                @foreach($firstSort as $fSort)
                                <li class="list-unstyled  my-2 p-3 shadow-sm rounded-lg" id="arrayorder_{!! stripslashes($fSort['id']) !!}"  style="background-color: #333" >{!! stripslashes($fSort['title']) !!}
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
    $(document).ready(function () {
        $('#check-all').change(function () {
            $(".delete-all").prop('checked', $(this).prop('checked'));
        });
    });
</script>
<meta name="csrf-token" content="{!! csrf_token() !!}"/>
<script type="text/javascript">
    $(document).ready(function () {
        function slideout() {
            setTimeout(function () {
                $("#response").slideUp("slow", function () {
                });

            }, 2000);
        }

        $("#response").hide();
        $(function () {
            $("#list ul").sortable({
                opacity: 0.8, cursor: 'move', update: function () {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    var order = $(this).sortable("serialize") + '&update=update' + '&_token=' + CSRF_TOKEN;
                    $.post("{!!URL::action('Admin\CategoryController@postFirstSort')!!} ", order, function (theResponse) {
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
