<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>{{ config('app.name') }}</title>

		<link href="{{asset('css/public.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('css/frame.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('css/icon/iconfont.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('layui/css/layui.css')}}" rel="stylesheet" type="text/css" media="all">
		@yield('css')
		<script typet="text/javascript" src="{{asset('layui/layui.js')}}"></script>
		<script typet="text/javascript" src="{{asset('js/jquery-1.9.0.js')}}"></script>
		<script typet="text/javascript" src="{{asset('js/frame.js')}}"></script>
		@yield('js')
	</head>

	<body>
		<div class="admin-box">

			<div class="admin-header">
				<a href="javascript:void(0);" class="logo-img fl">
					<img src="{{asset('images/logo.png')}}" />
				</a>
				<a href="javascript:void(0);" title="展开/收起侧边导航" class="nav-a fl">

				</a>
				<div class="system-box fl">
					<a href="javascript:void(0);" class="system-tittle">系统</a>
					<span></span>
					<a href="javascript:void(0);" class="system-tittle">商城</a>
					<span></span>
					<a href="javascript:void(0);" class="system-tittle">插件</a>
					<span></span>
					<a href="javascript:void(0);" class="system-tittle">APP管理</a>
				</div>
				<div class="fr-box fr" style="overflow: hidden;">
					<div class="edition fl">
						<p>{{ config('app.name') }}</p>
						<p>Laravel框架的购物商城</p>
					</div>
					<div class="admin fl">
						<p>{{ Auth::guard('admin')->user()->realname }}</p>
						<p>管理员</p>
					</div>
					<i class="iconfont icon-guanliyuan"></i>
					<div class="drop-down fl">
						<a href="javascript:void(0);" title="快捷管理" class="hide-a">
							<i class="iconfont icon-sanjiao"></i>
							<i class="iconfont icon-sanjiao-copy1"></i>
						</a>

					</div>
					<a href="javascript:void(0);" title="新窗口打开商城首页" class="close-a fl">
						<i class="iconfont icon-shouye_shouye"></i>
					</a>
					<a href="{{ url('admin/logout ') }}" title="安全退出管理中心" class="close-a fl" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
						<i class="iconfont icon-guanbi"></i>
					</a>
					<form id="logout-form" action="{{ url('admin/logout ') }}" method="POST" style="display: none;">{{csrf_field()}}</form>
				</div>
			</div>



			@include('admin.layouts.menu')
		</div>
		<!--状态管理-->
		<div class="quick-manage">
			<div class="quick-tittle">
				<span>最后登录</span>
				<a href="javascript:void(0);">修改密码</a>
			</div>
			<p class="time">{{ Auth::guard('admin')->user()->updated_at }}</p>
			<p class="ip">(IP:{{ Auth::guard('admin')->user()->last_ip }})</p>
		</div>

		<!--修改密码-->
		<!--弹窗-->
		<div class="now-alert">
			<div class="change-box">
				<div class="change-tittle">
					修改密码
				</div>
				<div class="change-main">
					<form class="form-margin">
						<div class="login-list">
							<p class="message-tip regist-tip"></p>
							<p class="in-box"><span><u>*</u>原密码</span><input type="password" placeholder="请输入原密码" class="regist-in" /></p>

						</div>
						<div class="login-list">
							<p class="message-tip regist-tip"></p>
							<p class="in-box"><span><u>*</u>新密码</span><input type="password" placeholder="请输入新密码" class="regist-in" /></p>
						</div>

						<div class="login-list">
							<p class="message-tip regist-tip"></p>
							<p class="in-box"><span><u>*</u>确认密码</span><input type="password" placeholder="请确认密码" class="regist-in" /></p>

						</div>
						<div class="change-bottom">
							<a href="javascript:void(0);" class="confirm">确认</a>
							<a href="javascript:void(0);" class="cancel">取消</a>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="page">
		@yield('content')
		</div>

	</body>

</html>