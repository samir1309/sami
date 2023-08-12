@extends ("layouts.admin.master")
@section('title',' تیکت')
@section('part',' تیکت')
@section('content')
<div class="container-fluid dashboard-content">
	<div class="row w-100 m-0">
		<div class="col-lg-12 mx-auto py-1 px-0">
            <a href="{{url('admin/tickets/')}}" class="btn btn-default btn-info" style="float: left" data-toggle="tooltip" data-placement="top" title="" data-original-title="بازگشت">
                بازگشت
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle ms-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
            </a>

            <h3 class="bg-white py-2 px-4 rounded-lg">
				 تیکت به
                {{@$user->name . ' ' .@$user->family}}
			</h3>
			<div class="card rounded-lg border-0 px-0 py-3">
				<div class="row w-100 m-0">
					<div class="col-md-12">
						<div class="box box-primary">

							<form action="{{route('admin.ticket.add')}}" enctype="multipart/form-data"
								method="POST" class="m-0" style="position:relative;">
								<input name="user_id" value="{{$user->id}}" type="hidden" />
								{{ csrf_field() }}
                                <div class="row">
								<div class="col-lg-8">
									<textarea class="form-control" name="message" id="comment" rows="1"
										placeholder="پیام خود را بنویسید..."></textarea>
								</div>
                                <div class="col-lg-4">
                                    <input type="file" name="file" class="form-control" id="fileinput" placeholder="" value="">
                                </div>
                                </div>
								<div class="">
									<button type="submit" class="btn btn-success rounded-0">
										ارسال تیکت
									</button>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('css')

@stop

@section('js')

@endsection
