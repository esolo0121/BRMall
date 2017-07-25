<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>
        <!-- Styles -->
        <link href="{{ asset('layui/css/layui.css') }}" rel="stylesheet" type="text/css" media="all">
        <link href="{{ asset('css/public.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css">
        <!--[if lte IE 8]>
        <style>
            .login {
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#c8ffffff, endColorstr=#c8ffffff);
            }
        </style>

         <![endif]-->
    </head>

    <body>

        <div class="login">
            <div class="login-img">
                <img src="{{ asset('images/login-logo.png') }}" />
            </div>
            <p class="login-tittle">管理中心</p>

            <form class="layui-form" role="form" method="POST" action="{{ url('admin/login') }}">
                {{ csrf_field() }}
                <div class="layui-form-item">
                    <label class="layui-form-label">用户名</label>
                    <div class="layui-input-block">
                        <input type="text" name="account" lay-verify="account" placeholder="请输入用户名" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">密码</label>
                    <div class="layui-input-inline">
                        <input type="password" name="password" lay-verify="pass" placeholder="请输入密码" class="layui-input">
                    </div>

                </div>

                <div class="check-word">
                    <label class="layui-form-label">验证码</label>
                    <div class="layui-input-inline p-box">
                        <input type="text" name="captcha" lay-verify="captcha" placeholder="请输入验证码"  class="layui-input check-input">
                        <img src="{{ captcha_src() }}" onclick="this.src='{{ captcha_src() }}'+Math.random()" style="cursor:pointer;">
                    </div>
                </div>
                <div class="layui-form-item save-btn">
                    <label class="layui-form-label">保存信息</label>
                    <div class="layui-input-block">
                        <input type="checkbox" name="is_remember" {{ old('is_remember') ? 'checked' : '' }} lay-skin="switch" lay-text="ON|OFF">
                        <div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>OFF</em><i></i></div>
                    </div>
                </div>

                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </form>
        </div>
        <script typet="text/javascript" src="{{ asset('layui/layui.js') }}"></script>

        <script>

            layui.use(['form', 'layedit', 'laydate'], function() {
                var form = layui.form(),
                    layer = layui.layer,
                    layedit = layui.layedit,
                    laydate = layui.laydate;

                @if(count($errors)>0)
                      layer.msg('{{$errors->first()}}', {
                      icon: 1,
                      time: 2000 //2秒关闭（如果不配置，默认是3秒）
                    });
                @endif


                //创建一个编辑器
                var editIndex = layedit.build('LAY_demo_editor');

                //自定义验证规则
                form.verify({
                    account: function(value) {
                        if(value.length < 4) {
                            return '用户名至少得4个字符啊';
                        }
                    },
                    pass: [/(.+){6,12}$/, '密码必须6到12位'],
                    content: function(value) {
                        layedit.sync(editIndex);
                    },
                    captcha: function(value) {
                        if(value.length != 5) {
                            return '验证码为5个字符';
                        }
                    }
                });

                //监听指定开关
                form.on('switch(switchTest)', function(data) {
                    layer.msg('开关checked：' + (this.checked ? 'true' : 'false'), {
                        offset: '6px'
                    });
                    layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
                });

                //监听提交
                // form.on('submit(demo1)', function(data) {
                //     layer.alert(JSON.stringify(data.field), {
                //         title: '最终的提交信息'
                //     })
                //     return false;
                // });

            });
        </script>

    </body>

</html>


