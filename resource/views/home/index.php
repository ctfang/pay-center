<!doctype html>
<html class="x-admin-sm">
<head>
  <meta charset="UTF-8">
  <title>支付中心</title>
  <meta name="renderer" content="webkit|ie-comp|ie-stand">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport"
        content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi"/>
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <link rel="stylesheet" href="<?php echo __PUBLIC__; ?>/css/font.css">
  <link rel="stylesheet" href="<?php echo __PUBLIC__; ?>/css/xadmin.css">
  <!-- <link rel="stylesheet" href="<?php echo __PUBLIC__; ?>/css/theme5.css"> -->
  <script src="<?php echo __PUBLIC__; ?>/lib/layui/layui.js" charset="utf-8"></script>
  <script type="text/javascript" src="<?php echo __PUBLIC__; ?>/js/xadmin.js"></script>
  <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
  <!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script>
      // 是否开启刷新记忆tab功能
      // var is_remember = false;
  </script>
</head>
<body class="index">
<!-- 顶部开始 -->
<div class="container">
  <div class="logo">
    <a href="<?php echo __PUBLIC__; ?>/index.html">支付 - 订单中心</a></div>
  <div class="left_open">
    <a><i title="展开左侧栏" class="iconfont">&#xe699;</i></a>
  </div>
  <ul class="layui-nav left fast-add" lay-filter="">
    <?php foreach ($data['top'] as $datum) { ?>
      <li class="layui-nav-item">
        <a onclick="xadmin.add_tab('<?php echo $datum['name']; ?>','<?php echo $datum['path']; ?>')">
          <i class="layui-icon left-nav-li <?php echo $datum['icon']; ?>"
             lay-tips="<?php echo $datum['name']; ?>"></i>
          <cite><?php echo $datum['name']; ?></cite>
        </a>
        <?php if (!isset($datum['_child']) || !$datum['_child']) {
          continue;
        } ?>
        <dl class="layui-nav-child">
          <?php foreach ($datum['_child'] as $item) { ?>
            <a onclick="xadmin.add_tab('<?php echo $item['name']; ?>','<?php echo $item['path']; ?>')">
              <i class="layui-icon <?php echo $item['icon']; ?>"></i>
              <cite><?php echo $item['name']; ?></cite>
            </a>
          <?php } ?>
          </dd>
      </li>
    <?php } ?>
  </ul>
  <ul class="layui-nav right" lay-filter="">
    <li class="layui-nav-item">
      <a href="javascript:;">admin</a>
      <dl class="layui-nav-child">
        <!-- 二级菜单 -->
        <dd>
          <a onclick="xadmin.open('个人信息','http://www.baidu.com')">个人信息</a></dd>
        <dd>
          <a onclick="xadmin.open('切换帐号','http://www.baidu.com')">切换帐号</a></dd>
        <dd>
          <a href="<?php echo __PUBLIC__; ?>/login.html">退出</a></dd>
      </dl>
    </li>
    <li class="layui-nav-item to-index">
      <a href="/">前台首页</a></li>
  </ul>
</div>
<!-- 顶部结束 -->
<!-- 中部开始 -->
<!-- 左侧菜单开始 -->
<div class="left-nav">
  <div id="side-nav">
    <ul id="nav">
      <?php foreach ($data['left'] as $datum) { ?>
        <li>
          <a onclick="xadmin.add_tab('<?php echo $datum['name']; ?>','<?php echo $datum['path']; ?>')">
            <i class="layui-icon left-nav-li <?php echo $datum['icon']; ?>"
               lay-tips="<?php echo $datum['name']; ?>"></i>
            <cite><?php echo $datum['name']; ?></cite>
            <?php if (isset($datum['_child'])) {
              echo "<i class=\"iconfont nav_right\">&#xe697;</i>";
            } ?></a>
          <?php if (!isset($datum['_child']) || !$datum['_child']) {
            continue;
          } ?>
          <ul class="sub-menu">
            <?php foreach ($datum['_child'] as $item) { ?>
              <li>
                <a onclick="xadmin.add_tab('<?php echo $item['name']; ?>','<?php echo $item['path']; ?>')">
                  <i class="layui-icon <?php echo $item['icon']; ?>"></i>
                  <cite><?php echo $item['name']; ?></cite>
                  <?php if (isset($item['_child'])) {
                    echo "<i class=\"iconfont nav_right\">&#xe697;</i>";
                  } ?></a>
                <?php if (!isset($item['_child']) || !$item['_child']) {
                  continue;
                } ?>
                <ul class="sub-menu">
                  <?php foreach ($item['_child'] as $value) { ?>
                    <li>
                      <a onclick="xadmin.add_tab('<?php echo $value['name']; ?>','<?php echo $value['path']; ?>')">
                        <i class="layui-icon <?php echo $value['icon']; ?>"></i>
                        <cite><?php echo $value['name']; ?></cite>
                    </li>
                  <?php } ?>
                </ul>
              </li>
            <?php } ?>
          </ul>
        </li>
      <?php } ?>
    </ul>
  </div>
</div>
<!-- <div class="x-slide_left"></div> -->
<!-- 左侧菜单结束 -->
<!-- 右侧主体开始 -->
<div class="page-content">
  <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
    <ul class="layui-tab-title">
      <li class="home">
        <i class="layui-icon">&#xe68e;</i>我的桌面
      </li>
    </ul>
    <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
      <dl>
        <dd data-type="this">关闭当前</dd>
        <dd data-type="other">关闭其它</dd>
        <dd data-type="all">关闭全部</dd>
      </dl>
    </div>
    <div class="layui-tab-content">
      <div class="layui-tab-item layui-show">
        <iframe src='/home' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
      </div>
    </div>
    <div id="tab_show"></div>
  </div>
</div>
<div class="page-content-bg"></div>
<style id="theme_style"></style>
<!-- 右侧主体结束 -->
<!-- 中部结束 -->
</body>
</html>
