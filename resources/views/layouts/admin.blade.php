<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Code Hacking</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}} " />
		<link rel="stylesheet" href="{{asset('font-awesome/4.5.0/css/font-awesome.min.css')}}" />
		<!-- page specific plugin styles -->
		<!-- text fonts -->
		<link rel="stylesheet" href="{{asset('css/fonts.googleapis.com.css')}}" />
		<!-- ace styles -->
		<link rel="stylesheet" href="{{asset('css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style"/>
	</head>
	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Code hacking
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="" alt="" />
								<span class="user-info">
									<small>Welcome,</small>
									Ahtasham
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="#">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<div id="sidebar" class="sidebar responsive ace-save-state">
				<ul class="nav nav-list">
					<li class="">
						<a href="index.html">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="{{ Request::is( 'admin/user') ? 'active open' : '' }}">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-user"></i>

							<span class="menu-text">
								Users
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu ">
							<li class="{{ Request::is( 'admin/user/create') ? 'active' : '' }}">
								<a href="{{route("admin.user.create")}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Create Users
								</a>
								<b class="arrow"></b>
							</li>
							<li class="{{ Request::is( 'admin/user') ? 'active' : '' }}">
								<a href="{{route("admin.user.index")}}">
									<i class="menu-icon fa fa-caret-right"></i>
									View Users
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="{{ Request::is( 'admin/post') ? 'active open' : '' }}">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-file-o"></i>

							<span class="menu-text">
								Posts
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="{{ Request::is( 'admin/post/create') ? 'active' : '' }}">
								<a href="{{route("admin.post.create")}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Create Posts
								</a>

								<b class="arrow"></b>
							</li>

							<li class="{{ Request::is( 'admin/post') ? 'active' : '' }}">
								<a href="{{route("admin.post.index")}}">
									<i class="menu-icon fa fa-caret-right"></i>
									View Posts
								</a>
								<b class="arrow"></b>
							</li>
						</ul>

					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-file-o"></i>

							<span class="menu-text">
								Categories
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="">
									<i class="menu-icon fa fa-caret-right"></i>
									Insert Category
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="">
									<i class="menu-icon fa fa-caret-right"></i>
									View Category
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="page-header">
							<h1>
								@yield('title')
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									@yield('subDesc')
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								@yield('content')
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Code Hacking</span>
							Application &copy; 2017-2018
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<!-- ace scripts -->
		<script src="{{asset('js/ace-elements.min.js')}}"></script>
		<script src="{{asset('js/ace.min.js')}}"></script>
	</body>
</html>