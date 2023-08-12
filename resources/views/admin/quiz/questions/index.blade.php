@extends('layouts.admin.master')
@section('title','سوالات')
@section('content')
    <div class="container-fluid  dashboard-content" id="quiz68">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row w-100 m-0">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0">
                <div class="page-header">
                    <h3 class="bg-white py-2 px-4 rounded-lg">
                        سوالات مربوط به کوییز
                        {{@$quiz->title}}
                    </h3>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="container-fluid dashboard-content">
                <div class="row w-100 m-0">
                    <div class="col-lg-12 mx-auto py-1 px-0">
                        <h3 class="bg-white py-2 px-4 rounded-lg">
                            اضافه کردن سوال جدید
                        </h3>
                        <div class="card rounded-lg border-0 p-3">
                            <form class="form theme-form" action="{{URL::action('Admin\QuizController@postQuestion')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="quiz_id" value="{{@$quiz->id}}">
            @include('admin.quiz.questions.form')
                            </form>


                        </div>
                    </div>
                </div>
            </div>
            {{--		<form method="post" action="{{url('/admin/articles/delete')}}">--}}
            {{--			{{ csrf_field() }}--}}
            <div class="py-3 px-2">
                {{--				<button type="submit" onclick="return confirm('آیا از حذف اطلاعات مطمئن هستید؟');"--}}
                {{--					data-toggle="tooltip" data-original-title="Delete selected items"--}}
                {{--					class="btn btn-space btn-secondary">--}}
                {{--                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"--}}
                {{--						class="bi bi-trash me-2" viewBox="0 0 16 16">--}}
                {{--						<path--}}
                {{--							d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />--}}
                {{--						<path fill-rule="evenodd"--}}
                {{--							d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />--}}
                {{--					</svg>--}}
                {{--					حذف انتخاب شده ها--}}
                {{--				</button>--}}
            </div>
        </div>
        <br>
        <div class="card">
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            @if(count($questions) > 0)
                <div class="row w-100 m-0">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            {{--						<h5 class="card-header">کوئیزها</h5>--}}
                            <div class="card-body px-1">
                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        {{--									<div class="row w-100 m-0">--}}
                                        {{--                                        <div class="col-sm-12 col-md-6">--}}
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
                                                            سوال
                                                        </th>
                                                        <th class="sorting_asc" tabindex="0"
                                                            aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1"
                                                            style="width: 213.75px;"
                                                            aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending">
                                                            پاسخ ها
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
                                                    @foreach($questions as $key=> $question)
                                                        <tr role="row" class="odd">

                                                            <td class="sorting_1">{{$key+1}}</td>
                                                            <td class="sorting_1">{{@$question->content}}</td>
                                                            <td class="sorting_1">

                                                                @foreach($question->answers  as $answer)
                                                                    <span
                                                                        style="background: orange;color: white; border-radius: 5px;font-size: 20px;margin-left:8px;">
{{@$answer->content}}</span>
                                                                @endforeach
                                                            </td>


                                                            <td>
                                                                <a href="{{URL::action('Admin\QuizController@questionEdit',$question->id)}}"
                                                                   type="button"
                                                                   class="btn btn-space btn-warning"
                                                                   data-toggle="tooltip" title="ویرایش">
                                                                    <i class="fa fa-edit"> </i>
                                                                </a>
                                                                <a href="{{URL::action('Admin\QuizController@questionDelete',$question->id)}}"
                                                                   type="button"
                                                                   onclick="return confirm('آیا از حذف اطلاعات مطمئن هستید؟');"
                                                                   class="btn btn-space btn-danger"
                                                                   data-toggle="tooltip" title="حذف">
                                                                    <i class="fa fa-trash"> </i>
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
                                                    @if(count($questions))
                                                        {!! $questions->appends(Request::except('page'))->render()
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
                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
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
                                    <span style="font-size: 10px;">	ترتیب  ها  </span>
                                </div>
                                @foreach($question_sort as $rowSort)
                                    <li class="list-unstyled  my-2 p-3 shadow-sm rounded-lg" id="arrayorder_{!! stripslashes($rowSort['id']) !!}"  style="background-color: #333" >{!! stripslashes($rowSort['content']) !!}
                                        <div class="clear"></div>
                                    </li>

                                @endforeach
                                <hr>
                            </ul>
                        </div>

                        {{--        <div id="list">--}}
                        {{--            <div class="alert alert-info alert-dismissable rounded-lg" style="direction: rtl; margin: 0px auto;">--}}
                        {{--                <i class="fa fa-check"></i>--}}
                        {{--                <span style="font-size: 14px;">	</span>--}}
                        {{--            </div>--}}


                        {{--            <ul>--}}
                        {{--                @foreach($categorySort2 as $rowSort2)--}}

                        {{--                    <li class="list-unstyled  my-2 p-3 shadow-sm rounded-lg" id="arrayorder_{!! stripslashes($rowSort2['id']) !!}">{!! stripslashes($rowSort2['title']) !!}--}}
                        {{--                        <div class="clear"></div>--}}
                        {{--                    </li>--}}

                        {{--                @endforeach--}}
                        {{--            </ul>--}}
                        {{--        </div>--}}
                    </div>
                </div>
            @else
                <p class="p-5 text-center ismb">شما سوالی ثبت نکردید</p>

            @endif
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
            background-color: #333;
            color: #fff;
            list-style: none;
        }
    </style>
@stop
@section('js')
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
                        $.post("{!!URL::action('Admin\QuizController@postSortQuestion')!!} ", order, function (theResponse) {
                            $("#response").html(theResponse);
                            $("#response").slideDown('slow');
                            slideout();
                        });

                    }
                });
            });

        });
    </script>
    <script>
        var app = new Vue({
            el: '#quiz68',
            data: {
                answers: [],
                oldanswers: [],
                answerTagId: [],
                answerContent: "",
                answerIcon: "",

            },
            methods: {
                addAnswer() {
                    let data = {content: "", icon: "", tag_id: []};
                    this.answers.push(data)
                },
                removeAnswer(AnswerIndex) {
                    console.log(this.answers)
                    this.answers.map((item, index) => console.log(index))
                    this.answers = this.answers.filter((item, index) => index !== AnswerIndex);
                    // console.log(this.answers.filter((item, index) => index !== AnswerIndex))

                },
            },
            mounted() {
                this.addAnswer();
            },

        })
    </script>

@stop
