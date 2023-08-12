
<!-- import CSS -->
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
<!-- import JavaScript -->
<script src="https://unpkg.com/element-ui/lib/index.js"></script>
<div class="container-fluid dashboard-content" id="porto">
	<div class="row w-100 m-0">
		<div class="col-lg-6 mx-auto py-1 px-0">
			<h3 class="bg-white py-2 px-4 rounded-lg">
				اضافه کردن
			</h3>
			<div class="card rounded-lg border-0 p-3">
                <template>

                    <el-upload
                        class="upload-demo"
                        action="{{URL::action('Admin\ProductSpecificationPriceController@postAddImage',@$specification->id)}}"
                        name="images[]"
                        :on-change="uploadSuccess"
                        multiple
                        :limite="3"
                        :file-list="imgList"
                        list-type="picture-card"
                    >
                        <el-button type="primary" size="small">بارگذاری تصاویر</el-button>
                    </el-upload>

                </template>

			</div>
            <button type="button"
                    class="btn btn-space btn-success" onClick="window.location.reload();"   style="float: left;
                                                                                    padding: 0px !important;
                                                                                    height: 22px;
                                                                                    width: 100%;
                                                                                    margin-bottom: 6px;" class="btn btn-success px-5"
            >
                رفرش صفحه جهت مشاهده
            </button>

		</div>
	</div>
</div>
