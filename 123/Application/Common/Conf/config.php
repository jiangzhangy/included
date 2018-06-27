<?php
return array(
	'URL_MODEL'             =>  2,    
	'DEFAULT_M_LAYER'       =>  'Model', // 默认的模型层名称
	'DEFAULT_C_LAYER'       =>  'Action', // 默认的控制器层名称
	'DEFAULT_V_LAYER'       =>  'Tpl', // 默认的视图层名称
	'DEFAULT_LANG'          =>  'zh-cn', // 默认语言
	'DEFAULT_THEME'         =>  '', // 默认模板主题名称
	'DEFAULT_MODULE'        =>  'Home',  // 默认模块
	'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
	'DEFAULT_ACTION'        =>  'index', // 默认操作名称
	'DEFAULT_CHARSET'       =>  'utf-8', // 默认输出编码
	'DEFAULT_AJAX_RETURN'   =>  'JSON',  // 默认AJAX 数据返回格式,可选JSON XML ...
	'URL_CASE_INSENSITIVE'  =>  true, 
	'URL_HTML_SUFFIX'       =>  '.html',  // URL伪静态后缀设置
	'TMPL_L_DELIM'          =>  '{jasxun',
	'TMPL_R_DELIM'          =>  '}',
	'SESSION_AUTO_START'    =>  true,    // 是否自动开启Session
	'SITE_URL'              =>  'http://www.jasxun.com',
	'LOAD_EXT_CONFIG'       =>  'db,route,site', 
	'URL_ROUTER_ON'   		=>   true,//开启路由
	
    //页面Trace功能对调试
    // 'SHOW_PAGE_TRACE'       =>true,
);