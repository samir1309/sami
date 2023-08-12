<div class="nav-left-sidebar sidebar-dark">
	<div class="menu-list">
		<nav class="navbar navbar-expand-lg navbar-light">
			<a class="d-xl-none d-lg-none" href="#">
				Dashboard
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav flex-column">
					<li class="nav-divider">
						پنل مدیریت
						<a href="{{url('/')}}" target="_blank" rel="noopener noreferrer" class="text-white">
						شرکتی
						</a>
					</li>

                    <a class="nav-link active" href="{{url('/admin')}}">
                        <i class="fa fa-fw fa-user-circle"></i>
                        داشبورد
                    </a>
					<li class="nav-item ">

{{--						<div id="submenu-1" class="collapse submenu" style="">--}}
{{--							<ul class="nav flex-column">--}}
{{--								<li class="nav-item">--}}
{{--									<a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"--}}
{{--										data-target="#submenu-1-2" aria-controls="submenu-1-2">E-Commerce</a>--}}
{{--									<div id="submenu-1-2" class="collapse submenu" style="">--}}
{{--										<ul class="nav flex-column">--}}
{{--											<li class="nav-item">--}}
{{--												<a class="nav-link" href="index.html">E Commerce--}}
{{--													Dashboard</a>--}}
{{--											</li>--}}
{{--											<li class="nav-item">--}}
{{--												<a class="nav-link" href="ecommerce-product.html">Product--}}
{{--													List</a>--}}
{{--											</li>--}}
{{--											<li class="nav-item">--}}
{{--												<a class="nav-link"--}}
{{--													href="ecommerce-product-single.html">Product Single</a>--}}
{{--											</li>--}}
{{--											<li class="nav-item">--}}
{{--												<a class="nav-link"--}}
{{--													href="ecommerce-product-checkout.html">Product--}}
{{--													Checkout</a>--}}
{{--											</li>--}}
{{--										</ul>--}}
{{--									</div>--}}
{{--								</li>--}}
{{--								<li class="nav-item">--}}
{{--									<a class="nav-link" href="dashboard-finance.html">Finance</a>--}}
{{--								</li>--}}
{{--								<li class="nav-item">--}}
{{--									<a class="nav-link" href="dashboard-sales.html">Sales</a>--}}
{{--								</li>--}}
{{--								<li class="nav-item">--}}
{{--									<a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"--}}
{{--										data-target="#submenu-1-1" aria-controls="submenu-1-1">Infulencer</a>--}}
{{--									<div id="submenu-1-1" class="collapse submenu" style="">--}}
{{--										<ul class="nav flex-column">--}}
{{--											<li class="nav-item">--}}
{{--												<a class="nav-link"--}}
{{--													href="dashboard-influencer.html">Influencer</a>--}}
{{--											</li>--}}
{{--											<li class="nav-item">--}}
{{--												<a class="nav-link" href="influencer-finder.html">Influencer--}}
{{--													Finder</a>--}}
{{--											</li>--}}
{{--											<li class="nav-item">--}}
{{--												<a class="nav-link"--}}
{{--													href="influencer-profile.html">Influencer Profile</a>--}}
{{--											</li>--}}
{{--										</ul>--}}
{{--									</div>--}}
{{--								</li>--}}
{{--							</ul>--}}
{{--						</div>--}}
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
							data-target="#submenu-3" aria-controls="submenu-3"><i
								class="fas fa-fw fa-chart-pie"></i>محتوا</a>
						<div id="submenu-3" class="collapse submenu" style="">
							<ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{URL::action('Admin\ArticleController@getArticleCat')}}">
                                            دسته بندی مقالات</a>
                                    </li>
								<li class="nav-item">
									<a class="nav-link"
										href="{{URL::action('Admin\ArticleController@getArticle')}}">
										مقالات</a>
								</li>
								
							</ul>
						</div>
					</li>
                
                    <li class="nav-divider">
                    تنظیمات
                    </li>
                    <li class="nav-item">

                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                            </svg>
                                 تنظیمات
                        </a>
                        <div id="submenu-9" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{URL::action('Admin\SettingController@getEditSetting')}}">تنظیمات</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" href="{{URL::action('Admin\SocialController@get')}}">تنظیمات سوشیال</a>
                                    </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::action('Admin\SloagenController@get')}}">پست های اینستاگرام</a>
                                        </li> -->

                            </ul>
                        </div>
                    </li>

				</ul>
			</div>
		</nav>
	</div>
</div>
