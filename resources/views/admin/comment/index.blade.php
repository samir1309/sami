@extends('layouts.admin.master')
@section('title','کامنت ها ')
@section('content')
<div class="container-fluid  dashboard-content">
	<!-- ============================================================== -->
	<!-- pageheader -->
	<!-- ============================================================== -->
	<div class="row w-100 m-0">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0">
			<div class="page-header">
				<h3 class="bg-white py-2 px-4 rounded-lg">
                    کامنت ها
                </h3>
			</div>
		</div>
	</div>
	<div class="card">

			<div class="">
  <div class="col-lg-8">
                <a type="button" href="{{URL::action('Admin\CommentController@getTrash')}}" class="btn-success btn btn-danger">
                    <i class="fa fa-trash"></i>
                    سطل زباله
                </a>
                </div>

				<!-- ============================================================== -->
				<!-- end pageheader -->
				<!-- ============================================================== -->
				<div class="row w-100 m-0">
					<!-- ============================================================== -->
					<!-- basic table  -->
					<!-- ============================================================== -->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">

							<div class="card-body px-1">
								<div class="table-responsive">
									<div id="DataTables_Table_0_wrapper"
										class="dataTables_wrapper dt-bootstrap4">

										<div class="row w-100 m-0">
											<div class="col-sm-12">
												<table
													class="table table-striped table-bordered first dataTable"
													id="DataTables_Table_0" role="grid"
													aria-describedby="DataTables_Table_0_info">
													<thead>
														<tr role="row">

															<th class="sorting_asc" tabindex="0"
																aria-controls="DataTables_Table_0"
																rowspan="1" colspan="1"
																style="width: 80.0667px;"
																aria-sort="ascending"
																aria-label="Name: activate to sort column descending">
																ردیف
															</th>
															<th class="sorting_asc" tabindex="0"
																aria-controls="DataTables_Table_0"
																rowspan="1" colspan="1"
																style="width: 213.75px;"
																aria-sort="ascending"
																aria-label="Name: activate to sort column descending">
                                                                متعلق به
															</th>
															<th class="sorting" tabindex="0"
																aria-controls="DataTables_Table_0"
																rowspan="1" colspan="1"
																style="width: 80.0667px;"
																aria-label="Position: activate to sort column ascending">
                                                                نام
															</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0"
                                                                rowspan="1" colspan="1"
                                                                style="width: 80.0667px;"
                                                                aria-label="Position: activate to sort column ascending">
                                                                تاریخ
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0"
                                                                rowspan="1" colspan="1"
                                                                style="width: 80.0667px;"
                                                                aria-label="Position: activate to sort column ascending">
                                                      وضعیت
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0"
                                                                rowspan="1" colspan="1"
                                                                style="width: 80.0667px;"
                                                                aria-label="Position: activate to sort column ascending">
                                                                نمایش در صفحه
                                                            </th>
															<th class="sorting" tabindex="0"
																aria-controls="DataTables_Table_0"
																rowspan="1" colspan="1"
																style="width: 155.217px;"
																aria-label="Age: activate to sort column ascending">
																عملیات
															</th>

														</tr>
													</thead>
													<tbody>
														@foreach($data as $key=> $row)
														<tr role="row" class="odd">
															<td class="sorting_1">
                                                                {{($data->appends(Request::except('page'))->currentPage() - 1) *
                                              ($data->appends(Request::except('page'))->perPage()) + $key+1}}
                                                            </td>
                                                            @php $com = \App\Models\Comment::where('id', $row->parent_id)->first(); @endphp
                                                            <td class="sorting_1">  @if($row->commentable_type == 'App\Models\Product') محصول: {{@$row->product->title}}  @elseif($row->commentable_type == 'App\Models\Content') مقاله: {{@$row->blog->title}} @endif @if(isset($row->parent_id))/پاسخ کامنت {{@$com->user->name}} @endif</td>
															<td class="sorting_1"> {{@$row->user->name.' '.@$row->user->family}}</td>

															<td class="sorting_1">{{jdate('Y/m/d H:i',$row->created_at->timestamp)}} </td>
															<td class="sorting_1">@if($row->readat==1)
                                                                    <span class='label label-success'>خوانده شده</span>
                                                                @else
                                                                    <span class='label label-danger'>خوانده نشده</span>
                                                                @endif
                                                                          <span class='label label-primary mt-3'>{{$row->star . 'ستاره'}}</span>
                                                                </td>

															<td class="sorting_1">  @if($row->status==1)
                                                                    <span class='label label-success'>تایید شده</span>
                                                                @else
                                                                    <span class='label label-danger'>تایید نشده</span>
                                                                @endif
                                                                </td>

															<td>
                                                                <a href="{{URL::action('Admin\CommentController@getDelete',$row->id)}}" type="button" class="btn btn-danger my-1 btn-circle"><i class="fa fa-trash"> </i></a>
                                                                <a href="{{URL::action('Admin\CommentController@getStatus',$row->id)}}" type="button" @if($row->status == 1 ) class="btn btn-success my-1 btn-circle" @else class="btn btn-warning my-1 btn-circle" @endif><i class="fa fa-clipboard"> </i>{{@$row->status == 1 ? ' تغییر وضعیت به تایید نشده': ' تغییر وضعیت به تایید شده'}}</a>
@if($row->commentable_type == 'App\Models\Product')
                                                                <a href="{{url('/pro/'.@$row->commentable_id)}}" target="_blank" type="button" class="btn btn-primary my-1 btn-circle"><i class="fa fa-eye"> </i> مشاهده درسایت</a>
                                                                @else
                                                                    <a href="{{url('/blog-detail/'.@$row->commentable_id)}}" target="_blank" type="button" class="btn btn-primary my-1 btn-circle"><i class="fa fa-eye"> </i> مشاهده درسایت</a>
@endif

                                                                    <a href="#" data-toggle="modal"
                                                                   data-target="#messageModal{{$row->id}}"
                                                                   data-original-title="مشاهده سریع"
                                                                   title="مشاهده سریع"
                                                                   class="btn btn-space btn-info"><i
                                                                        class="fa fa-eye"></i></a>
                                                            @include('admin.comment.modal')
      @foreach($row->user->orders as $order)

                                                                    @foreach($order->orderItems as $item)

                                                                        @if($row->commentable_type == 'App\Models\Product' && $row->commentable_id == $item->product_id)

                                                                            <i class="fa fa-check"> </i>
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
															</td>
														</tr>

														@endforeach
													</tbody>
												</table>
												<div class="pagii">
													@if(count($data))
													{!!
													$data->appends(Request::except('page'))->render()
													!!}
													@endif
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

	</div>
</div>

@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#check-all').change(function () {
                $(".delete-all").prop('checked', $(this).prop('checked'));
            });
        });
    </script>
@stop
