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
  <script type="text/javascript" src="<?php echo __PUBLIC__; ?>/lib/layui/layui.js" charset="utf-8"></script>
  <script type="text/javascript" src="<?php echo __PUBLIC__; ?>/js/xadmin.js"></script>
  <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
  <!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
<div class="layui-fluid">
  <div class="layui-row">
    <form action="" method="post" class="layui-form layui-form-pane">
      <div class="layui-form-item">
        <label for="name" class="layui-form-label">
          <span class="x-red">*</span>角色名
        </label>
        <div class="layui-input-inline">
          <input type="text" id="name" name="name" required="" lay-verify="required"
                 autocomplete="off" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item layui-form-text">
        <label for="desc" class="layui-form-label">
          描述
        </label>
        <div class="layui-input-block">
          <textarea placeholder="请输入内容" id="desc" name="desc" class="layui-textarea"></textarea>
        </div>
      </div>
      <div class="layui-form-item">
        <button class="layui-btn" lay-submit="" lay-filter="add">增加</button>
      </div>
    </form>
  </div>
</div>
<script>
    layui.use(['form', 'layer'], function () {
        $ = layui.jquery;
        var form = layui.form
            , layer = layui.layer;

        //监听提交
        form.on('submit(add)',
            function (data) {
                $.ajax({
                    type: 'POST',
                    url: "/role/create",
                    data: data.field,
                    success: function (status) {
                        return false;
                    }

                });
                layer.alert("增加成功", {
                        icon: 6
                    },
                    function () {
                        //关闭当前frame
                        xadmin.close();

                        // 可以对父窗口进行刷新
                        xadmin.father_reload();
                    });
                return false;
            });


        form.on('checkbox(father)', function (data) {

            if (data.elem.checked) {
                $(data.elem).parent().siblings('td').find('input').prop("checked", true);
                form.render();
            } else {
                $(data.elem).parent().siblings('td').find('input').prop("checked", false);
                form.render();
            }
        });


    });
</script>
</body>
</html>
