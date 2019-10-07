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
  <script type="text/javascript" src="<?php echo __PUBLIC__; ?>/nav/iconPicker.js"></script>
  <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
  <!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<div class="layui-fluid">
  <div class="layui-row">
    <form class="layui-form">
      <div class="layui-form-item">
        <label for="name" class="layui-form-label">
          <span class="x-red">*</span>标题
        </label>
        <div class="layui-input-inline">
          <input type="text" id="name" name="name" required="" lay-verify="required" autocomplete="off" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item">
        <label for="type" class="layui-form-label">
          <span class="x-red">*</span>菜单位置</label>
        <div class="layui-input-inline">
          <select name="type">
            <option value="top">顶部</option>
            <option value="middle" selected>左侧</option>
          </select>
        </div>
      </div>
      <div class="layui-form-item">
        <label for="pid" class="layui-form-label">
          <span class="x-red">*</span>上级菜单</label>
        <div class="layui-input-inline">
          <select name="pid">
            <option value="0">顶级菜单</option>
            <?php foreach ($data['navs'] as $datu) {
              echo "<option value=\"{$datu["id"]}\">{$datu["name"]}</option>";
            } ?>
          </select>
        </div>
      </div>
      <div class="layui-form-item">
        <label for="url" class="layui-form-label">
          <span class="x-red">*</span>URL地址</label>
        <div class="layui-input-inline">
          <select name="path">
            <?php foreach ($data['paths'] as $datu) {
              echo "<option value=\"{$datu["path"]}\">{$datu["path"]}</option>";
            } ?>
          </select>
        </div>
      </div>
      <div class="layui-form-item">
        <label for="icons" class="layui-form-label">
          <span class="x-red">*</span>菜单图标</label>
        <div class="layui-input-block">
          <input type="text" id="iconPicker" name="icon" lay-filter="iconPicker" class="layui-input" value="layui-icon-star-fill">
        </div>
      </div>
      <div class="layui-form-item">
        <label for="order" class="layui-form-label">
          <span class="x-red">*</span>排序
        </label>
        <div class="layui-input-inline">
          <input type="text" id="order" name="order" required="" lay-verify="required" autocomplete="off" class="layui-input" value="1">
        </div>
      </div>
      <div class="layui-form-item">
        <label for="L_repass" class="layui-form-label">
        </label>
        <button class="layui-btn" lay-filter="add" lay-submit="">
          增加
        </button>
      </div>
    </form>
  </div>
</div>
<script>
    layui.use(['iconPicker'], function () {
        var iconPicker = layui.iconPicker;

        iconPicker.render({
            // 选择器，推荐使用input
            elem: '#iconPicker',
            // 数据类型：fontClass/unicode，推荐使用fontClass
            type: 'fontClass',
            limit: 300,
            cellWidth: '39px',
            // 是否开启搜索：true/false
            search: false,
            // 点击回调
            click: function (data) {

            }
        });

        /**
         * 选中图标 （常用于更新时默认选中图标）
         * @param filter lay-filter
         * @param iconName 图标名称，自动识别fontClass/unicode
         */
        iconPicker.checkIcon('iconPicker', 'layui-icon-star-fill');
    });

    layui.use(['form', 'layer'],
        function () {
            $ = layui.jquery;
            var form = layui.form,
                layer = layui.layer;


            //监听提交
            form.on('submit(add)',
                function (data) {
                    $.ajax({
                        type: 'POST',
                        url: "/nav/create",
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
        });
</script>
</body>
</html>
