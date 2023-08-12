
{{ csrf_field() }}
<div class="box-body" >
    <div class="form-group">
        <div class="row w-100 m-0">
            <div class="col-xl-6 col-sm-12 col-xs-12 p-2">
                <select class="form-control" name="specification_type_id" v-model="selectedFilter"
                        @change="setSpcs(selectedFilter)">
                    <option value=""> انتخاب کنید</option>
                    @foreach($types as $key=>$row2)
                        <option value="{{$row2->id}}" >
                            {{$row2->title}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-xl-6 col-sm-12 col-xs-12 p-2">
                <select class="form-control" v-model="selectedSpc"
                        name="specification_value_id">
                    <option value=""> انتخاب کنید</option>
                    <option v-for="spc in spcs" :value="spc.id">
                        @{{spc.title}}
                    </option>
                </select>
            </div>
        </div>
        <hr>



    </div>
    <button type="submit" class="btn btn-space btn-success m-0 px-5" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">ذخیره</button>
</div>





