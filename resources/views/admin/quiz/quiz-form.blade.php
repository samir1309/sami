<div class="row m-0">
    <div class="alert alert-primary" role="alert">
        <p> وارد کردن سوالات و پاسخ های جدید</p>
    </div>
    <div class="card border p-1">
        <div class="row justify-content-between m-0 w-100">
            <div class="card-header d-flex justify-content-between  m-0 w-100">
              <h3>
                  اضافه کردن سوال
              </h3>

                <div>
                    <a @click="plusMe()" class="btn btn-default btn-success">
                        <span class="fa fa-plus-circle"> بیشتر</span>
                    </a>
                    <a @click="minusMe()" class="btn btn-default btn-danger">
                        <span class="fa fa-minus-circle"> کمتر</span>
                    </a>

                </div>

            </div>

        </div>

        <div class="row w-100 m-0 bg-light p-2" v-for="(me,index) in number">
            <div class="col-lg-12 p-2 form-group">
                <div class="row w-100 m-0"
                     style="background: #0f0c2936;border-radius: 11px;padding: 13px;margin-bottom: 11px !important;">
                    <div class="col-lg-12 col-sm-6 col-xs-12 p-2">

                        <div class="input-group shadow-sm sd">

                            <input type="text" name="question_contents[]" id="question_contents" class="form-control"
                                   placeholder=" سوال "/>
                        </div>

                    </div>
                    اضافه کردن پاسخ
                    <div>
                        <a @click="plusMe2(index)" class="btn btn-default btn-success">
                            <span class="fa fa-plus-circle"> بیشتر</span>
                        </a>
                        <a @click="minusMe2(index)" class="btn btn-default btn-danger">
                            <span class="fa fa-minus-circle"> کمتر</span>
                        </a>
                        <div class="row w-100 m-0" >
                            <div class="col-lg-6 col-sm-6 col-xs-12 border rounded-3 bg-light p-2" v-for="(me2,index2) in number2[index]">

                                <div class="input-group shadow-sm sd">
                                    <input type="text" id="answer_contents" class="form-control"
                                           :name="'answer_contents['+index+'][]'"
                                           placeholder=" پاسخ "/>
                                </div>
                                <div class="input-group shadow-sm sd">
                                    <input type="file" id="answer_icons" class="form-control" required
                                           :name="'answer_icons['+index+']['+index2+'][]'"
                                    />
                                </div>
                                <div class="col-lg-12 p-2 form-group">
                                    <div class=" p-1">
                                        <label for="category_id" class="col-form-label">
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
                                                                       :name="'tag_id['+index+']['+index2+'][]'"
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
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>


    </div>
</div>


