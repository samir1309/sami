<div class="card rounded-lg border-0 p-3"  id="app34534567">
    @if($parent_id == null)
        <form method="post"
              action="{{URL::action('Admin\FilterController@postAddMain',$parent_id)}}"
              class="form-horizontal form-label-left">
            <div class="row">
                {{ csrf_field() }}
                <div class="col-lg-4 offset-3 p-2">
                    <div class="form-group">
                        <label>عنوان  فیلتر </label>
                        <input class="form-control" type="text"   name="title_main" />
                    </div>
                </div>

            </div>
            <div class="row">
                {{ csrf_field() }}
                <div class="col-lg-12" style="text-align: center;">
                    <button type="button" @click="plusMe()" class="btn btn-default btn-success" style="font-size: 9px; margin-right: 42%; margin-bottom: -2%;">
                        اضافه کردن مقدار<span class="fa fa-plus"></span></button></div>
                <div class="col-lg-6 offset-3 p-2"  v-for="me in number" >
                    <div class="form-group">
                        <label>عنوان مقادیر </label>
                        <input class="form-control" type="text"   name="title[]" />

                    </div>
                </div>


                <div class="col-lg-12 p-2">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">ذخیره</button>
                    </div>
                </div>
            </div>
        </form>
    @else
        <form method="post"
              action="{{URL::action('Admin\FilterController@postAdd',$parent_id)}}"
              class="form-horizontal form-label-left">
            <div class="row">
                {{ csrf_field() }}
                <div class="col-lg-12" style="text-align: center;">
                    <a @click="plusMe()" class="btn btn-default btn-success" style="font-size: 9px; margin-right: 42%; margin-bottom: -2%;">
                        اضافه کردن مقدار<span class="fa fa-plus"></span></a></div>
                <div class="col-lg-6 offset-3 p-2"  v-for="me in number" >
                    <div class="form-group">
                        <label>عنوان فیلتر </label>
                        <input class="form-control" type="text"   name="title[]" />
                    </div>
                </div>


                <div class="col-lg-12 p-2">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">ذخیره</button>
                    </div>
                </div>
            </div>
        </form>
    @endif
</div>
@section('js')
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
@endsection
