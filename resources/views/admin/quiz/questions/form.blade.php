<div class="card-body row w-100 m-0" data-repeater-list="reports">
    <div class="page-header col-12">
        <div class="row align-items-center">
            <div class="border-0 m-0">
                <div
                    class="card-header pb-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <div class="col-lg-12 col-sm-6 col-xs-12 p-2">

                        <div class="input-group shadow-sm sd">

                            <input type="text" name="content" id="question_contents" class="form-control" value="@if(isset($question)) {{@$question->content}} @else {{old('content')}} @endif" required
                                   placeholder=" سوال "/>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a @click="addAnswer()" class="btn btn-default btn-success">
            <span class="fa fa-plus-circle"> بیشتر</span>
        </a>

        <div class="row w-100 m-0">
            <div class="col-lg-6 col-sm-6 col-xs-12 border rounded-3 bg-light p-2" v-for="(oldanswer,index) in oldanswers">
                <div class="input-group shadow-sm sd">
                    <input type="hidden" id="oldanswer_ids" class="form-control"
                           :name="'oldanswers['+index+'][id]'"
                           v-model="oldanswer.id"
                           placeholder=" پاسخ "/>
                    <input type="text" id="oldanswer_contents" class="form-control"
                           :name="'oldanswers['+index+'][content]'"
                           v-model="oldanswer.content"
                           placeholder=" پاسخ "/>
                </div>
                <div class="input-group shadow-sm sd">
                    <input type="file" id="oldanswer_icons" class="form-control"
                           :name="'oldanswers['+index+'][icon]'"
                    />
                    <img :src="'https://www.kajshop.com/assets/uploads/content/answer/'+oldanswer.icon" class="m-2"
                         width="40">
                </div>
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
                                                <input type="checkbox" value="{{$tag['id']}}"
                                                       :name="'oldanswers['+index+'][tag_id][]'"
                                                       v-model="oldanswer.tag_id"
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
                <a :href="'https://www.kajshop.com/admin/question-answer/delete/'+oldanswer.id" class="btn btn-default btn-danger">
                    <span class="fa fa-minus-circle"> حذف</span>
                </a>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12 border rounded-3 bg-light p-2" v-for="(answer,index) in answers">
                <div class="input-group shadow-sm sd">
                    <input type="text" id="answer_contents" class="form-control"
                           :name="'answers['+index+'][content]'"
                           v-model="answer.content"
                           placeholder=" پاسخ "/>
                </div>
                <div class="input-group shadow-sm sd">
                    <input type="file" id="answer_icons" class="form-control" required
                           :name="'answers['+index+'][icon]'"
                    />
                </div>
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
                                                <input type="checkbox" value="{{$tag['id']}}"
                                                       :name="'answers['+index+'][tag_id][]'"
                                                       v-model="answer.tag_id"
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
                <a @click="removeAnswer(index)" class="btn btn-default btn-danger">
                    <span class="fa fa-minus-circle"> حذف</span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="card-body pt-0 row w-100 m-0">
    <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6 col-12 ms-auto p-3">
        <button class="btn btn-space btn-success m-0 px-5" type="submit">
            ذخیره
        </button>
    </div>
</div>

