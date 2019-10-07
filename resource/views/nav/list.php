<!DOCTYPE html>
<html class="x-admin-sm">
<head>
  <meta charset="UTF-8">
  <title>pay</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport"
        content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi"/>
  <link rel="stylesheet" href="<?php echo __PUBLIC__; ?>/css/font.css">
  <link rel="stylesheet" href="<?php echo __PUBLIC__; ?>/css/xadmin.css">
  <script src="<?php echo __PUBLIC__; ?>/lib/layui/layui.js" charset="utf-8"></script>
  <script type="text/javascript" src="<?php echo __PUBLIC__; ?>/js/xadmin.js"></script>
  <!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<div class="x-nav">
          <span class="layui-breadcrumb">
            <a href="">首页</a>
            <a href="">菜单</a>
            <a>
              <cite>列表</cite></a>
          </span>
  <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()"
     title="刷新">
    <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
</div>
<div class="layui-fluid">
  <div class="layui-row layui-col-space15">
    <div class="layui-col-md12">
      <div class="layui-card">
        <div class="layui-card-header">
          <button class="layui-btn" onclick="xadmin.open('添加菜单','/nav/create',600,600)"><i class="layui-icon"></i>添加
          </button>
        </div>
        <div class="layui-card-body ">
          <table class="layui-table layui-form">
            <thead>
            <tr>
              <th>ID</th>
              <th>名字</th>
              <th>上级</th>
              <th>类型</th>
              <th>Path</th>
              <th>图标</th>
              <th>状态</th>
              <th>操作</th>
            </thead>
            <tbody>
            <?php foreach ($data["list"] as $datum) { ?>
              <tr>
                <td><?php echo $datum['id'] ?? ""; ?></td>
                <td><?php echo $datum['name'] ?? ""; ?></td>
                <td><?php echo $datum['pname'] ?? "顶级菜单"; ?></td>
                <td><?php echo $datum['type'] ?? ""; ?></td>
                <td><?php echo $datum['path'] ?? ""; ?></td>
                <td><i class="layui-icon <?php echo $datum['icon'] ?? ""; ?>"></i></td>
                <td class="td-status"><?php if ($datum['enabled']){
                    echo "<span class=\"layui-btn layui-btn-normal layui-btn-mini\">已启用</span>";
                  }else{
                    echo "<span class=\"layui-btn layui-btn-normal layui-btn-mini layui-btn-disabled\">已停用</span>";
                  } ?></td>
                <td class="td-manage">
                  <a onclick="member_stop(this,<?php echo $datum["id"] ?? ""; ?>)" href="javascript:;" title="<?php if ($datum['enabled']){ echo "启用"; }else{ echo "停用";} ?>">
                    <i class="layui-icon">&#xe601;</i>
                  </a>
                  <a title="编辑" onclick="xadmin.open('编辑','/nav/edit?id=<?php echo $datum["id"] ?? ""; ?>')" href="javascript:;">
                    <i class="layui-icon">&#xe642;</i>
                  </a>
                  <a title="删除" onclick="member_del(this,<?php echo $datum['id'] ?? ""; ?>)" href="javascript:;">
                    <i class="layui-icon">&#xe640;</i>
                  </a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
<script>
    layui.use(['laydate', 'form'], function () {
        var laydate = layui.laydate;
        var form = layui.form;

        //执行一个laydate实例
        laydate.render({
            elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
            elem: '#end' //指定元素
        });
    });

    /*用户-停用*/
    function member_stop(obj, id) {
        layer.confirm('确认要更改吗？', function (index) {
            if ($(obj).attr('title') == '启用') {
                //发异步把用户状态进行更改
                $.ajax({
                    type:"POST",
                    url:"/nav/edit?id="+id,
                    data:{id:id,enabled:0},
                    success:function (status) {
                    }
                });
                $(obj).attr('title', '停用')
                $(obj).find('i').html('&#xe62f;');

                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                layer.msg('已停用!', {icon: 5, time: 1000});

            } else {
                //发异步把用户状态进行更改
                $.ajax({
                    type:"POST",
                    url:"/nav/edit?id="+id,
                    data:{id:id,enabled:1},
                    success:function (status) {
                    }
                });
                $(obj).attr('title', '启用')
                $(obj).find('i').html('&#xe601;');

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                layer.msg('已启用!', {icon: 5, time: 1000});
            }
        });
    }

    /*用户-删除*/
    function member_del(obj, id) {
        layer.confirm('确认要删除吗？', function (index) {
            //发异步删除数据
            $.ajax({
                type:"POST",
                url:"/nav/delete",
                data:{id:id},
                success:function (status) {
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!', {icon: 1, time: 1000});
                }
            });
        });
    }

</script>
</html>
