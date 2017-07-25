@extends('admin.layouts.main')
@section('content')
<div class="wrapper">
  <div class="public-box">
    <div class="public-tittle">
      <p>管理员管理</p>
      <span>网站系统管理员列表</span>
    </div>
    <div class="public-tip">
      <a href="javascript:void(0);" class="tip-tittle"><i class="iconfont icon-caozuo"></i>操作提示</a>
      <div class="tip-list">
        <p><span>▶</span>点击查看操作将显示订单（包括订单物品）的详细信息细信息</p>
        <p><span>▶</span>点击查看操作将显示订单（包括订单物品）的详细信息</p>
        <p><span>▶</span>点击查看操作将显示订单（包括订单物品）的详细信息</p>
      </div>
    </div>
  </div>
  <div class="main-tittle">
    <div class="tittle-left fl">
      <span>管理员列表</span>
      <u>(共{{$admins->count()}}条记录)</u>
      <i class="iconfont icon-shuaxin"></i>
    </div>
    <div class="tittle-right fr">
      <form>
        <input type="text" size="30" name="keywords" class="qsbox" placeholder="搜索相关数据...">
        <a href="javascript:void(0);" class="btn-search">搜索</a>
      </form>
    </div>
  </div>

  <div class="form-box">
    <a href="{{url('admin/admins/create')}}" class="edit-btn"><i class="iconfont icon-tianjia"></i>添加管理员</a>
      <div class="layui-form">

      <table class="layui-table" lay-even="" lay-skin="row">
        <colgroup>
          <col width="50">
          <col width="150">
          <col width="150">
          <col width="200">
          <col width="300">
          <col width="200">
        </colgroup>
        <thead>
          <tr class="head-t">
            <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></th>
            <th>账号</th>
            <th>手机号</th>
            <th>邮箱</th>
            <th>真实姓名</th>
            <th>加入时间</th>
            <th>登录时间</th>
            <th>登录IP</th>
            <th>锁定</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
          @inject('AdminPresenter','App\Repositories\Presenters\AdminPresenter')
          @foreach($admins as $admin)
          <tr>
            <td><input type="checkbox" name="" lay-skin="primary"></td>
            <td>{{$admin->account}}</td>
            <td>{{$admin->mobile}}</td>
            <td>{{$admin->email}}</td>
            <td>{{$admin->realname}}</td>
            <td>{{$admin->created_at}}</td>
            <td>{{$admin->updated_at}}</td>
            <td>{{$admin->last_ip}}</td>
            <td>{{ $AdminPresenter->getState($admin->is_lock) }}</td>
            <td class="site-demo-button">
              <a href="{{ url('admins/del')}}/{{$admin->id}}" class="layui-btn lay-change"><i class="iconfont icon-iconfontcolor32"></i></a>
              <a href="javascript:void(0);" class="layui-btn lay-change layui-btn-danger" data-id="{{$admin->id}}" data-method="offset" data-type="auto"><i class="iconfont icon-delete"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
        {{ $admins->links() }}
    </div>

  </div>
</div>
<script type="text/javascript">

  layui.use('form', function() {
    var $ = layui.jquery,
    form = layui.form();

    //全选
    form.on('checkbox(allChoose)', function(data) {
      var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]');
      child.each(function(index, item) {
        item.checked = data.elem.checked;
      });
      form.render('checkbox');
    });

    $('.site-demo-button .layui-btn').on('click', function() {
      var othis = $(this),
      id = othis.data('id');

      layer.confirm('您确定要删除这条数据吗？', {
          btn: ['确定','取消'] //按钮
      }, function(){

          $.ajax({
              url: "{{url('admin/admins/del/')}}",
              type: "POST",
              data:{"id":id,"_token":"{{csrf_token()}}"},
              dataType: "json",
              success: function(data){
              if(data.state==1){
                layer.msg(data.msg,{icon: 1});
              }else{
                layer.msg(data.msg,{icon: 2});
              }
              window.location.reload();
            }
          });
          // layer.closeAll();
        })
      });

  });
</script>
<script type="text/javascript">



// //单个删除
// function del(id){
//   layer.confirm('您确定要删除这条数据吗？', {
//     btn: ['确定','取消'] //按钮
//   }, function(){
//     $.ajax({
//         url: "{{url('admin/admins/del/')}}",
//         type: "POST",
//         data:{"id":id,"_token":"{{csrf_token()}}"},
//         dataType: "json",
//         success: function(data){
//         //  console.log(data);
//         if(data.state==1){
//             alert('aaaaaa');
//         // location.href = location.href;
//         // layer.msg(data.msg, {icon: 6});
//         }else{
//         // layer.msg(data.msg, {icon: 5});
//         }
//       }
//     });
//   })
// }
</script>
@endsection


