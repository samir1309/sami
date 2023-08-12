@extends('layouts.admin.master')
@section('title','سوالات')
@section('content')
    <div class="container-fluid  dashboard-content" id="quiz68e">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row w-100 m-0">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0">
                <div class="page-header">
                    <h3 class="bg-white py-2 px-4 rounded-lg">
                        سوالات مربوط به کوییز
                        {{@$question->quiz->title}}
                    </h3>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="container-fluid dashboard-content">
                <div class="row w-100 m-0">
                    <div class="col-lg-12 mx-auto py-1 px-0">
                        <h3 class="bg-white py-2 px-4 rounded-lg">
                            ویرایش سوال
                        </h3>
                        <div class="card rounded-lg border-0 p-3">
                            <form class="form theme-form" action="{{URL::action('Admin\QuizController@postQuestionEdit',@$question->id)}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @include('admin.quiz.questions.form')
                            </form>


                        </div>
                    </div>
                    <div class="col-xl-12 mx-auto py-1 px-0">
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
                                @foreach($answers_sort as $rowSort)
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
                        $.post("{!!URL::action('Admin\QuizController@postSortAnswer')!!} ", order, function (theResponse) {
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
            el: '#quiz68e',
            data: {
                oldanswers:[
                    @foreach($answers as $key=>$answer)
                        @php
                          $tag_ids =  App\Models\Quiz\QuizTaggable::where('taggable_type', 'App\Models\Quiz\QuizAnswer')->where('taggable_id', $answer->id)->pluck('tag_id');
                        @endphp
                    {id:"{{@$answer->id}}", content: "{{@$answer->content}}", icon: "{{@$answer->icon}}", tag_id: {{$tag_ids}}},
                        @endforeach
                ],
                answers: [],
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
                    this.answers.map((item, index) => console.log(index))
                    this.answers = this.answers.filter((item, index) => index !== AnswerIndex);
                    // console.log(this.answers.filter((item, index) => index !== AnswerIndex))

                },
            },
            mounted() {

            },

        })
    </script>

@stop
