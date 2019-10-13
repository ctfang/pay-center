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
  <div class="eleTree ele1"></div>
</div>
<script>
    layui.use(['form', 'layer'], function () {
        $ = layui.jquery;
        var form = layui.form
            , layer = layui.layer
            , eleTree = layui.eleTree;


        eleTree.render({
            elem: '.ele1',
            data: [
                {
                    id: 1,
                    label: "安徽省",
                    children: [
                        {
                            id: 2,
                            label: "马鞍山市",
                            disabled: true,
                            children: [
                                {
                                    id: 3,
                                    label: "和县",
                                },
                                {
                                    id: 4,
                                    label: "花山区",
                                }
                            ]
                        }
                    ]
                },
                {
                    id: 5,
                    label: "河南省",
                    children: [
                        {
                            id: 6,
                            label: "郑州市"
                        }
                    ]
                }
            ],
            showCheckbox: true,
        });
    });
</script>
</body>
</html>
