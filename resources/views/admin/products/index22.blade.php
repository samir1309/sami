@extends('layouts.admin.master2')
@section('title','محصولات')
@section('content')
    <div class="container-fluid dashboard-content">
        <div class="row w-100 m-0">
            <div class="col-xl-12 col-lg-8 col-md-12 col-sm-12 col-12 px-0">
                <div class="page-header">
                    <h3 class="bg-white py-2 px-4 rounded-lg">
                        محصولات
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card col-lg-12">

                <div class="px-2 py-3">
                
                </div>

                <div class="row w-100 m-0">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body px-1">
                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row w-100 m-0">
                                            <div class="col-sm-12 col-md-6">


                                                <!-- The Modal -->
                                           

                                            </div>
                                        </div>
                                        <div class="row w-100 m-0">
                                            <div class="col-sm-12">
                                                <table class="table table-striped table-bordered first dataTable"
                                                       id="DataTables_Table_0" role="grid"
                                                       aria-describedby="DataTables_Table_0_info">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc text-center">
                                                            {{--															<input id="check-all"--}}
                                                            {{--																style="opacity: 1;position:static;"--}}
                                                            {{--																type="checkbox" class="me-1" />--}}
                                                            ردیف
                                                        </th>
                                                        <th class="sorting_asc text-center">
                                                            کد محصول
                                                        </th>
                                                        <th class="sorting_asc text-center">
                                                            عنوان
                                                        </th>

                                                        <th class="sorting_asc text-center">
                                                            کد سفارش
                                                        </th>
                                                        <th class="sorting text-center">
                                                            تعداد ورودی
                                                        </th>
                                                          <th class="sorting text-center">
                                                            تعداد خروجی
                                                        </th>
                                                             <th class="sorting text-center">
                                                            تفاوت
                                                        </th>
                                                     
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($data as $key=> $product)
                                                @php     
            $order_items = \App\Models\OrderItem::where('product_id',$product->id)->pluck('order_id');
            $orders = \App\Models\Order::whereIn('id',$order_items)->where('created_at', '>', \Carbon\Carbon::parse('2021-11-25'))->where('created_at', '<', \Carbon\Carbon::parse('2021-11-28'))->whereIn('order_status_id',[4,5])->get();

        $stock_in = \App\Models\InventoryReceipt::where('product_id',$product->id)->orderBy('id','DESC')->In()->sum('count');
        $stock_out = \App\Models\InventoryReceipt::where('product_id',$product->id)->orderBy('id','DESC')->Out()->withTrashed()->whereHas('product',function($q){
            $q->whereHas('orderItems',function($q2){
                $q2->whereHas('order',function($q3){
                    $q3->whereIn('order_status_id',[4,5]);
                });
            });
        })->sum('count');
        @endphp
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1 text-center">
                                                                {{--															<input style="opacity: 1;position:static;"--}}
                                                                {{--																name="deleteId[]" class="delete-all"--}}
                                                                {{--																type="checkbox"--}}
                                                                {{--																value="{{$product->id}}" />--}}
                                                                {{$key+1}}
                                                            </td>
                                                            <td class="sorting_1 text-center">
                                                                {{@$product->id}}
                                                            </td>
                                                            <td class="sorting_1 text-center">
                                                                {{@$product->title}}
                                                            </td>
                                                            <td class="sorting_1 text-center">
                                                  @foreach($orders as $order)
                                                    {{@$order->id}},
                                                  @endforeach
                                                            </td>
                                                            <td class="sorting_1 text-center">
                                                         {{$stock_in}}
                                                            </td>
                                                              <td class="sorting_1 text-center">
                                                         {{$stock_out}}
                                                            </td>
                                                               <td class="sorting_1 text-center">
                                                         {{$stock_out - $stock_in}}
                                                            </td>
                                                         
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row w-100 m-0">
                                            <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info" id="DataTables_Table_0_info"
                                                     role="status" aria-live="polite">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-7">
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{--        temporary disable--}}
            {{--        <div class="col-lg-4">--}}
            {{--            <div id="list">--}}
            {{--                <div class="alert alert-info alert-dismissable rounded-lg" style="direction: rtl; margin: 0px auto;">--}}
            {{--                    <i class="fa fa-check"></i>--}}
            {{--                    <span style="font-size: 14px;">	با درگ کردن ترتیب مورد نظر را انتخاب نمایید.  </span>--}}
            {{--                </div>--}}
            {{--    --}}
            {{--                <div id="response"></div>--}}
            {{--                <ul>--}}
            {{--                    @foreach($categorySort as $rowSort)--}}
            {{--    --}}
            {{--                        <li class="list-unstyled  my-2 p-3 shadow-sm rounded-lg" id="arrayorder_{!! stripslashes($rowSort['id']) !!}">{!! stripslashes($rowSort['title']) !!}--}}
            {{--                            <div class="clear"></div>--}}
            {{--                        </li>--}}
            {{--    --}}
            {{--                    @endforeach--}}
            {{--                </ul>--}}
            {{--            </div>--}}
            {{--        </div>--}}
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
            background-color: #333;
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
                    opacity: 0.8,
                    cursor: 'move',
                    update: function () {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        var order = $(this).sortable("serialize") + '&update=update' +
                            '&_token=' + CSRF_TOKEN;
                        $.post("",
                            order,
                            function (theResponse) {
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
