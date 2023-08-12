@extends('layouts.admin.master')
@section('title') {{'شعارها '}} @endsection
@section('content')
<div class="container-fluid  dashboard-content">
    	<!-- ============================================================== -->
	<!-- pageheader -->
	<!-- ============================================================== -->
	<div class="row w-100 m-0">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0 bg-white d-flex align-items-center justify-content-between">
			<div class="page-header m-0">
				<h3 class="bg-white px-2 my-0 rounded-lg">
                    {{'شعارها '}}
				</h3>
			</div>

		</div>
	</div>
	<br>
	<div class="card">
        @include('admin.sloagen.add')
		<form method="post" action="{{url('/admin/sloagen/delete')}}" style="float: left">
			{{ csrf_field() }}
			<div class="px-2 py-3">
				<button type="submit" onclick="return confirm('آیا از حذف اطلاعات مطمئن هستید؟');"
					data-toggle="tooltip" data-original-title="Delete selected items"
					class="btn btn-space btn-secondary">
                    	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
						class="bi bi-trash me-2" viewBox="0 0 16 16">
						<path
							d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
						<path fill-rule="evenodd"
							d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
					</svg>
					حذف انتخاب شده ها
				</button>
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
{{--						<h5 class="card-header">--}}
{{--                                {{'سوالات متداول '.$product->title}}--}}
{{--                            </h5>--}}
						<div class="card-body px-1">
							<div class="table-responsive">
								<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
{{--									<div class="row w-100 m-0">--}}
{{--                                        		<div class="col-sm-12 col-md-6">--}}
{{--											<div id="DataTables_Table_0_filter" class="dataTables_filter">--}}
{{--												<label>--}}
{{--													<input type="search"--}}
{{--														class="form-control form-control-sm"--}}
{{--														aria-controls="DataTables_Table_0"--}}
{{--														placeholder="جستجو ...">--}}
{{--												</label>--}}
{{--											</div>--}}
{{--										</div>--}}
{{--									</div>--}}
									<div class="row w-100 m-0">
										<div class="col-sm-12">
											<table class="table table-striped table-bordered first dataTable"
												id="DataTables_Table_0" role="grid"
												aria-describedby="DataTables_Table_0_info">
												<thead>
													<tr role="row">
														<th class="sorting_asc" tabindex="0"
															aria-controls="DataTables_Table_0"
															rowspan="1" colspan="1"
															aria-sort="ascending"
															aria-label="Name: activate to sort column descending">
															<input id="check-all"
																style="opacity: 1;position:static;"
																type="checkbox" class="me-1" />
															انتخاب همه
														</th>
														<th class="sorting_asc" tabindex="0"
															aria-controls="DataTables_Table_0"
															rowspan="1" colspan="1"
															aria-sort="ascending"
															aria-label="Name: activate to sort column descending">
															ردیف
														</th>

														<th class="sorting_asc" tabindex="0"
															aria-controls="DataTables_Table_0"
															rowspan="1" colspan="1"
															aria-sort="ascending"
															aria-label="Name: activate to sort column descending">
                                                            			عنوان
														</th>
														<th class="sorting_asc" tabindex="0"
															aria-controls="DataTables_Table_0"
															rowspan="1" colspan="1"
															aria-sort="ascending"
															aria-label="Name: activate to sort column descending">
															تصویر
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
													@foreach($sloagens as $key=> $sloagen)
													<tr role="row" class="odd">
														<td class="sorting_1">
															<input style="opacity: 1;position:static;"
																name="deleteId[]" class="delete-all"
																type="checkbox"
																value="{{$sloagen->id}}" />
														</td>
														<td class="sorting_1">{{$key+1}}</td>
														<td class="sorting_1">{{@$sloagen->title}}</td>
														<td class="sorting_1">
															<img src="{{asset('assets/uploads/content/sloagen/'.$sloagen->image)}}" width="60">
														</td>
														<td>
															<a href="{{URL::action('Admin\SloagenController@getEdit',$sloagen->id)}}"
																type="button"
																class="btn btn-space btn-warning"
																data-toggle="tooltip" title="ویرایش">
																<i class="fa fa-edit"> </i>
															</a>
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
											<div class="pagii">
												@if(count($sloagens))
													{!! $sloagens->appends(Request::except('page'))->render()
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
		</form>
	</div>
</div>


@stop
@section('js')
    <script src="{{asset('asset/site/js/lodash.min.js')}}"></script>
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <script src="https://unpkg.com/element-ui/lib/umd/locale/fa.js"></script>
    <script>
        var app = new Vue({
            el: '#app34534567',
            data:{
                number :1
            },
            methods: {
                plusMe: function(){
                    this.number = this.number+1;
                }
            }
        })
    </script>
    <script type="text/javascript">
        $(function() {
            var opts = $('#optlist option').map(function(){
                return [[this.value, $(this).text()]];
            });

            $('#someinput').keyup(function(){
                var rxp = new RegExp($('#someinput').val(), 'i');
                var optlist = $('#optlist').empty();
                opts.each(function(){
                    if (rxp.test(this[1])) {
                        optlist.append($('<option/>').attr('value', this[0]).text(this[1]));
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#check-all').change(function () {
                $(".delete-all").prop('checked', $(this).prop('checked'));
            });
        });
    </script>

@stop
