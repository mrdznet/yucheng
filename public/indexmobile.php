<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

//$SERVER_NAME = $_SERVER['SERVER_NAME'];  

//$SERVER_NAME_ARR = explode(".",$SERVER_NAME);

$bind_module_key = "sale"; // 自动执行任务

// 绑定当前访问到index模块
define('BIND_MODULE',$bind_module_key);

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');



// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';

