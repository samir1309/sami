<div>
    <div class="alert alert-warning" role="alert">
        <p> سوالات و پاسخ های اضافه شده</p>
    </div>
    <div class="card border p-1">

        <div class="row w-100 m-0 bg-light p-2">
            <div class="col-lg-12 p-2 form-group">
                <div class="row w-100 m-0"
                     style="background: #0f0c2936;border-radius: 11px;padding: 13px;margin-bottom: 11px !important;">
                    @foreach($data->questions as $q)
                        <div class="input-group shadow-sm sd">

                            <input type="text" name="questions[{{$q->id}}]" value="{{@$q->content}}"
                                   id="question_contents" class="form-control"
                                   placeholder=" سوال "/>
                        </div>
                        @foreach($q->answers as $a)
                            <div class="input-group shadow-sm sd">

                                <input type="text" name="answers[{{$a->id}}]" value="{{@$a->content}}"
                                       id="answer_contents" class="form-control"
                                       placeholder=" پاسخ "/>
                            </div>
                            <div class="input-group shadow-sm sd">
                                <div class="w-100">
                                    <input type="file" name="icons[{{$a->id}}]" class="form-control "/>
                                    @if($a->icon != null)
                                        <img src="{{asset('assets/uploads/content/answer/'.@$a->icon)}}" class="m-2"
                                             width="40">
                                    @endif
                                </div>
                            </div>
                            @php
                                $tag_answer = App\Models\Quiz\QuizTaggable::where('taggable_id', @$a->id)->where('taggable_type','App\Models\Quiz\QuizAnswer')->pluck('tag_id')->toArray();
               $selected_tag = App\Models\Quiz\QuizTag::whereIn('id',@$tag_answer)->get();
                            @endphp
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
                                                                   @if(isset($data) and in_array($tag['id'],$tag_answer)) checked="checked"
                                                                   @endif
                                                                   name="edit_tag_id[{{$a['id']}}][]"
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
                        @endforeach
                    @endforeach
                </div>

            </div>
        </div>

    </div>


</div>
