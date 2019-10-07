<!DOCTYPE html>
<html class="x-admin-sm">
<head>
  <meta charset="UTF-8">
  <title>pay</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
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
            <a href="">演示</a>
            <a>
              <cite>导航元素</cite></a>
          </span>
  <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
    <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
</div>
<div class="layui-fluid">
  <div class="layui-row layui-col-space15">
    <div class="layui-col-md12">
      <div class="layui-card">
        <div class="layui-card-body ">
          <table class="layui-table" lay-data="{url:'/role/list',page:true,toolbar: '#toolbarDemo',id:'datalist'}" lay-filter="datalist">
            <thead>
            <tr>
              <th lay-data="{field:'id', width:80, sort: true}">ID</th>
              <th lay-data="{field:'name', width:120, sort: true, edit: 'text'}">名称</th>
              <th lay-data="{field:'enabled', width:120,templet: '#switchTpl'}">状态</th>
              <th lay-data="{field:'desc', edit: 'text', minWidth: 150}">备注</th>
              <th lay-data="{field:'id', minWidth: 150,templet: '#editTpl'}">操作</th>
            </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
<script type="text/html" id="toolbarDemo">
  <div class = "layui-btn-container" >
    <div class="layui-btn" onclick="xadmin.open('添加角色','/role/create',800,800)"><i class="layui-icon"></i>添加</div>
  </div >
</script>
<script type="text/html" id="switchTpl">
  <input type="checkbox" name="enabled" value="{{d.id}}" lay-skin="switch" lay-text="开启|关闭" lay-filter="enabled" {{d.enabled==1?'checked':''}}>
</script>
<script type="text/html" id="editTpl">
  <a title="编辑" onclick="xadmin.open('编辑','/role/edit?id={{d.id}}',700,600)" href="javascript:;">
    <i class="layui-icon">&#xe642;</i>
  </a>
  <a title="删除" onclick="member_del(this,'{{d.id}}')" href="javascript:;">
    <i class="layui-icon">&#xe640;</i>
  </a>
</script>
<script>
    layui.use(['laydate','form'], function(){
        var laydate = layui.laydate;
        var form = layui.form;
        $ = layui.jquery;

        form.on('switch(enabled)', function(data){
            $.ajax({
                url:"/role/edit?id="+data.value,
                type:"POST",
                data:{enabled:data.elem.checked?1:0}
            });
        });
    });

    /*用户-删除*/
    function member_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type:"POST",
                url:"/role/delete",
                data:{id:id},
                success:function (status) {
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                }
            });
        });
    }

</script>
<script>
    layui.use('table',
        function () {
            var table = layui.table;

            //监听单元格编辑
            table.on('edit(datalist)',
                function (obj) {
                    var value = obj.value //得到修改后的值
                        ,
                        data = obj.data //得到所在行所有键值
                        ,
                        field = obj.field; //得到字段
                    $.ajax({
                        url: "/role/edit?id=" + data.id,
                        type: "POST",
                        data: {[field]: value}
                    });
                });
        });
</script>
</html>
