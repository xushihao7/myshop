<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
 header('content-type:text/html;charset=utf-8');
return [
    // +----------------------------------------------------------------------
    // | 应用设置
    // +----------------------------------------------------------------------

    // 应用命名空间
    'app_namespace'          => 'app',
    // 应用调试模式
    'app_debug'              => true,
    // 应用Trace
    'app_trace'              => false,
    // 应用模式状态
    'app_status'             => '',
    // 是否支持多模块
    'app_multi_module'       => true,
    // 入口自动绑定模块
    'auto_bind_module'       => false,
    // 注册的根命名空间
    'root_namespace'         => [],
    // 扩展函数文件
    'extra_file_list'        => [THINK_PATH . 'helper' . EXT],
    // 默认输出类型
    'default_return_type'    => 'html',
    // 默认AJAX 数据返回格式,可选json xml ...
    'default_ajax_return'    => 'json',
    // 默认JSONP格式返回的处理方法
    'default_jsonp_handler'  => 'jsonpReturn',
    // 默认JSONP处理方法
    'var_jsonp_handler'      => 'callback',
    // 默认时区
    'default_timezone'       => 'PRC',
    // 是否开启多语言
    'lang_switch_on'         => false,
    // 默认全局过滤方法 用逗号分隔多个
    'default_filter'         => '',
    // 默认语言
    'default_lang'           => 'zh-cn',
    // 应用类库后缀
    'class_suffix'           => false,
    // 控制器类后缀
    'controller_suffix'      => false,

    // +----------------------------------------------------------------------
    // | 模块设置
    // +----------------------------------------------------------------------

    // 默认模块名
    'default_module'         => 'index',
    // 禁止访问模块
    'deny_module_list'       => ['common'],
    // 默认控制器名
    'default_controller'     => 'Index',
    // 默认操作名
    'default_action'         => 'index',
    // 默认验证器
    'default_validate'       => '',
    // 默认的空控制器名
    'empty_controller'       => 'Error',
    // 操作方法后缀
    'action_suffix'          => '',
    // 自动搜索控制器
    'controller_auto_search' => false,

    // +----------------------------------------------------------------------
    // | URL设置
    // +----------------------------------------------------------------------

    // PATHINFO变量名 用于兼容模式
    'var_pathinfo'           => 's',
    // 兼容PATH_INFO获取
    'pathinfo_fetch'         => ['ORIG_PATH_INFO', 'REDIRECT_PATH_INFO', 'REDIRECT_URL'],
    // pathinfo分隔符
    'pathinfo_depr'          => '/',
    // URL伪静态后缀
    'url_html_suffix'        => 'html',
    // URL普通方式参数 用于自动生成
    'url_common_param'       => false,
    // URL参数方式 0 按名称成对解析 1 按顺序解析
    'url_param_type'         => 0,
    // 是否开启路由
    'url_route_on'           => true,
    // 路由使用完整匹配
    'route_complete_match'   => false,
    // 路由配置文件（支持配置多个）
    'route_config_file'      => ['route'],
    // 是否强制使用路由
    'url_route_must'         => false,
    // 域名部署
    'url_domain_deploy'      => false,
    // 域名根，如thinkphp.cn
    'url_domain_root'        => '',
    // 是否自动转换URL中的控制器和操作名
    'url_convert'            => true,
    // 默认的访问控制器层
    'url_controller_layer'   => 'controller',
    // 表单请求类型伪装变量
    'var_method'             => '_method',
    // 表单ajax伪装变量
    'var_ajax'               => '_ajax',
    // 表单pjax伪装变量
    'var_pjax'               => '_pjax',
    // 是否开启请求缓存 true自动缓存 支持设置请求缓存规则
    'request_cache'          => false,
    // 请求缓存有效期
    'request_cache_expire'   => null,
    // 全局请求缓存排除规则
    'request_cache_except'   => [],

    // +----------------------------------------------------------------------
    // | 模板设置
    // +----------------------------------------------------------------------

    'template'               => [
        // 模板引擎类型 支持 php think 支持扩展
        'type'         => 'Think',
        // 模板路径
        'view_path'    => '',
        // 模板后缀
        'view_suffix'  => 'html',
        // 模板文件名分隔符
        'view_depr'    => DS,
        // 模板引擎普通标签开始标记
        'tpl_begin'    => '{',
        // 模板引擎普通标签结束标记
        'tpl_end'      => '}',
        // 标签库标签开始标记
        'taglib_begin' => '{',
        // 标签库标签结束标记
        'taglib_end'   => '}',
    ],

    // 视图输出字符串内容替换
    'view_replace_str'       => [],
    // 默认跳转页面对应的模板文件
    'dispatch_success_tmpl'  => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl',
    'dispatch_error_tmpl'    => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl',

    // +----------------------------------------------------------------------
    // | 异常及错误设置
    // +----------------------------------------------------------------------

    // 异常页面的模板文件
    'exception_tmpl'         => THINK_PATH . 'tpl' . DS . 'think_exception.tpl',

    // 错误显示信息,非调试模式有效
    'error_message'          => '页面错误！请稍后再试～',
    // 显示错误信息
    'show_error_msg'         => false,
    // 异常处理handle类 留空使用 \think\exception\Handle
    'exception_handle'       => '',

    // +----------------------------------------------------------------------
    // | 日志设置
    // +----------------------------------------------------------------------

    'log'                    => [
        // 日志记录方式，内置 file socket 支持扩展
        'type'  => 'File',
        // 日志保存目录
        'path'  => LOG_PATH,
        // 日志记录级别
        'level' => [],
    ],

    // +----------------------------------------------------------------------
    // | Trace设置 开启 app_trace 后 有效
    // +----------------------------------------------------------------------
    'trace'                  => [
        // 内置Html Console 支持扩展
        'type' => 'Html',
    ],

    // +----------------------------------------------------------------------
    // | 缓存设置
    // +----------------------------------------------------------------------

    'cache'                  => [
        // 驱动方式
        'type'   => 'File',
        // 缓存保存目录
        'path'   => CACHE_PATH,
        // 缓存前缀
        'prefix' => '',
        // 缓存有效期 0表示永久缓存
        'expire' => 0,
    ],

    // +----------------------------------------------------------------------
    // | 会话设置
    // +----------------------------------------------------------------------

    'session'                => [
        'id'             => '',
        // SESSION_ID的提交变量,解决flash上传跨域
        'var_session_id' => '',
        // SESSION 前缀
        'prefix'         => 'think',
        // 驱动方式 支持redis memcache memcached
        'type'           => '',
        // 是否自动开启 SESSION
        'auto_start'     => true,
    ],

    // +----------------------------------------------------------------------
    // | Cookie设置
    // +----------------------------------------------------------------------
    'cookie'                 => [
        // cookie 名称前缀
        'prefix'    => '',
        // cookie 保存时间
        'expire'    => 0,
        // cookie 保存路径
        'path'      => '/',
        // cookie 有效域名
        'domain'    => '',
        //  cookie 启用安全传输
        'secure'    => false,
        // httponly设置
        'httponly'  => '',
        // 是否使用 setcookie
        'setcookie' => true,
    ],

    //分页配置
    'paginate'               => [
        'type'      => 'bootstrap',
        'var_page'  => 'page',
        'list_rows' => 15,
    ],
    //验证码
    'captcha'  => [
           // 验证码字符集合
           'codeSet'  => '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY', 
           // 验证码字体大小(px)
              'fontSize' => 25, 
           // 是否画混淆曲线
           'useCurve' => true, 
            // 验证码图片高度
              'imageH'   => 50,
               // 验证码图片宽度
            'imageW'   => 180, 
               // 验证码位数
            'length'   => 2, 
            // 验证成功后是否重置        
            'reset'    => true
    ],
    //支付宝
    'alipay_config'=>[
        //应用ID,您的APPID。
		'app_id' => "2016092200571805",

		//商户私钥
	   'merchant_private_key' => "MIIEpAIBAAKCAQEA2MFVjwvYMoghki1dZLj08Rq6F11Y+QXzgrpYDpfnPNtj/z+t0HawLuF8hWoymamr4t8lbgch/Ph/rfFtzgGu4mWBNqIm888Na59Zc1adaqJXVQK8a0OQDygGihj2N9BCgimANQQyzp2I+h7UaCxxpRqVKoFiXymSgbMLYTRtJQDZflkxgHlcAILBbCSB2UG6W67AArIZMbK4PIHO8u7T9YHRcmkDWuypcvBIl/9yPCXMqAKh0GdBI0lWby+9WEnrG2Q93tSn23bLrDeFQ0kAYvUMnZg3sszw1xGXvIxVqZ0AsOishO4i/Sdw7gMPKvGBmlQqA5Frsaa9/O+FPYVMswIDAQABAoIBAH02ullHS15tm48ZG8GKwxzhBq1mpHY+xNw5D5NmlxNl3Y9fVuZ9GewLIGbl4VM5W+1UYQf9oNnFJ+Tw+jCucjugzZMk+wGPE76fMApb99XY8EBQs033mqnWwmhWYS3+5dzRYpm90iffg3iSBLwlKIVrJM6ILa6xkkvQhXti0MY1djTl2LpBec68EnN5MtEPD0VMzJqaZ9EqLHu12OJkgDWSYaYzo+RGNnlqlx4/LJ2IKrP5ZdKCKhzD4BqkH9mS0RHato02NV9CMjc/XJ7FRi9DcwWkW6lFEQKC2Y+2eUFnsE1EW5uo7QwtSf+gr3VB3aZh8JmzW3ZEToQ58YscYKkCgYEA8NhnzodQFvuW3rmGu4tMlpsQrZajIJvlRorGIAzIZYM92MRfXdoz8qn9C+kD5rwq74HqSo9a3RmsrEVNu6bVTz7M9hSPHCaWkDFzGnlY+wKoTBmGrHm1XalbDUk4wmOdVLruVUYorZi4vpFn70KjzlJY5oVj93lvGju5F4oF8ccCgYEA5mThFgyBdw5cpXHHTDWWofYhhI+QuREEvSNPoxPZ9qNQBQllbPJT+7LFRAxiGOoJGlflYmDLtyfbsY0IEPM84tuA9OA1gKJUslg1uk0uPp56bwb4X7ZmOJeBInR2VPMT2DRYcoy9U3Cg78thz1bizu3VjW4m7Xho8T/oZ3WjzbUCgYEAiS6qSg/2xXB+adSA8rgQYsRmRonD1uIVQQ3wdfbx+ig8BQktTNbpufGrKaqKx1Usm4mDOv7WgZOLMAC1mwoW+/FIa24gaadtISqZZl3yGd9Unyv28qzMalH5g+LOCqMUzVtAP6AbsW2I5TsLWVO62905t+wImcA4UVftQIQkiKcCgYBK/gMV/jQV4KLfZ02LzNWfGlKGp4Rf+N4mAlxlpIyJ71aYjRpqf+Y+Q05ae/1iRqt326xafU9R6rNj85fwjHwBC5nKG0DPAge3lWbHoV+wGj2X7hjibqiPOyFZabcqp4SKF1/CyXTGuB5qbzUDHDDvUhL02inpmgvumvK22l/bEQKBgQDL+2tgO3ljelTiZ4ejnWeCvA2el+E+65s/jpa2gaCwhV8pKgQS3GE9NqRZUwle5LzZRYtAUfFLTHYGbfAOGhS0MvjusPDnWzR4FXYD5/2a9GfjcL0EoKIIh4IpwQlM/ediVKcWLfONLMcuyrtFmiaMcwilAq61lR+s/lOCnmSiFA==",
		
		//异步通知地址
		'notify_url' => "http://188.131.171.12/index.php/Order/notify",
		
		//同步跳转
		'return_url' => "http://188.131.171.12/index.php/Order/paysuccess",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAvvcg9eWizilZyME4m7zxifv1hsvsq3xqnwrgz9+SS7CA9nXMxL7wz11dDjeY3mP5TyTnlt5bjhUM1u8z2Q5vDZBk0dEHc8cUJNAO36dp/1BQVKCx3DWHGExjUu9lya2HFfKGMvcWlBVBH5jNYVg6llmpYImRM65NFz3VIF4KdEqSE2+3DjT+Ltr1S2Thev1qjz7cLg7Z/2SYMLSg1QInEUIazQO5FhzWCzcG52H7MTqTMZYW4O6QX1IY7R1Xkb28OvUemkBCyP6TpLpPNxTUxnW1yfl782wmW2GXzi5rWCWkN2xTgwfJymeL2Eebl6Epadq2NkO1/XeD1fPMhYbfIQIDAQAB",
    ]
        
];
