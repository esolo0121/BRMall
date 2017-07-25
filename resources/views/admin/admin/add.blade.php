@extends('admin.layouts.main')
@section('content')
<link href="{{asset('css/page-all.css')}}" rel="stylesheet" type="text/css">
<div class="wrapper">
	<div class="public-tittle">
		<a href="admin-list.html" class="come-back fl"><i class="iconfont icon-fanhui01"></i></a>
		<div class="r-box fl">
			<p>管理员-编辑管理员</p>
			<span>网站系统管理员列表</span>
		</div>
	</div>
	<div class="admin-edit">
		<form class="layui-form" method="POST" action="{{ url('admin/admins/store')}}">
			{{ csrf_field() }}
			<div class="layui-form-item">
				<label class="layui-form-label">账号</label>
				<div class="layui-input-block">
					<input type="text" name="account" lay-verify="account" autocomplete="off" placeholder="请输入用户名" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">姓名</label>
				<div class="layui-input-block">
					<input type="text" name="realname" lay-verify="realname" autocomplete="off" placeholder="请输入真实姓名" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">手机号</label>
				<div class="layui-input-block">
					<input type="text" name="mobile" lay-verify="mobile" autocomplete="off" placeholder="请输入手机号" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">邮箱</label>
				<div class="layui-input-inline">
					<input type="text" name="email" lay-verify="email" autocomplete="off" placeholder="请输入邮箱" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">登陆密码</label>
				<div class="layui-input-inline">
					<input type="password" name="password" lay-verify="pass" placeholder="请输入登陆密码" autocomplete="off" class="layui-input">
				</div>

			</div>
			<div class="layui-inline">
				<label class="layui-form-label">所属角色</label>
				<div class="layui-input-inline">
					<select name="modules" lay-verify="required" lay-search="">
						<option value=""></option>
						<option value="1">超级管理员</option>
						<option value="2">超级管理员</option>
						<option value="3">超级管理员</option>

					</select>
				</div>
				<div class="layui-form-item">
					<button class="layui-btn" lay-submit="" lay-filter="demo2">确认提交</button>
				</div>
			</div>
		</form>

	</div>
</div>

<script>
	layui.use(['form', 'layedit', 'laydate'], function() {
		var form = layui.form(),
			layer = layui.layer,
			layedit = layui.layedit,
			laydate = layui.laydate;

        // @if(count($errors)>0)
        //       layer.msg('{{$errors->first()}}', {
        //       icon: 1,
        //       time: 2000 //2秒关闭（如果不配置，默认是3秒）
        //     });
        // @endif

		//创建一个编辑器
		var editIndex = layedit.build('LAY_demo_editor');

		//自定义验证规则
		form.verify({
			account: function(value) {
				if(value.length < 5) {
					return '用户名至少得5个字符啊';
				}
			},
			pass: [/(.+){6,12}$/, '密码必须6到12位'],
			pass: function(value) {
				layedit.sync(editIndex);
			},

			// required:function(value) {
			// 	if(value.length == 0) {
			// 		return '所属角色不能为空';
			// 	}
			//  }

		});



		// //监听提交
		// form.on('submit(demo1)', function(data) {
		// 	layer.alert(JSON.stringify(data.field), {
		// 		title: '最终的提交信息'
		// 	})
		// 	return false;
		// });

	});
</script>
@endsection