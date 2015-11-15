<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    // Setup form fields
    'setup' => [
        'email'            => '电子邮箱',
        'username'         => '用户名',
        'password'         => '密码',
        'site_name'        => '网站名称',
        'site_domain'      => '域名',
        'site_timezone'    => '选择您的时区',
        'site_locale'      => '选择您的语言',
        'enable_google2fa' => '启用谷歌双因素身份验证',
        'cache_driver'     => '缓存驱动',
        'session_driver'   => '会话驱动',
    ],

    // Login form fields
    'login' => [
        'email'         => '电子邮箱',
        'password'      => '密码',
        '2fauth'        => '双因素验证代码',
        'invalid'       => '无效的电子邮件或密码。',
        'invalid-token' => '无效的令牌。',
        'cookies'       => '您必须启用 cookies 来进行登录。',
    ],

    // Incidents form fields
    'incidents' => [
        'name'               => '名称',
        'status'             => '状态',
        'component'          => '组件',
        'message'            => '描述',
        'message-help'       => '您可以使用Markdown语言。',
        'scheduled_at'       => '什么时间安排维护？',
        'incident_time'      => '这次故障是什么时候发生的？',
        'notify_subscribers' => '通知订阅者',
        'visibility'         => '故障的可见性',
        'public'             => '公共可见',
        'logged_in_only'     => '仅登录用户可见',
        'templates'          => [
            'name'     => '故障模板名称',
            'template' => '模板',
            'twig'     => '故障模板可使用 <a href="http://twig.sensiolabs.org/" target="_blank">Twig</a> 模板引擎的语法.',
        ],
    ],

    // Components form fields
    'components' => [
        'name'        => '组件名称',
        'status'      => '组件状态',
        'group'       => '组件分组',
        'description' => '组件描述',
        'link'        => '链接',
        'tags'        => '标签',
        'tags-help'   => '以逗号分隔。',
        'enabled'     => '启用',

        'groups' => [
            'name'        => '组名',
        ],
    ],

    // Metric form fields
    'metrics' => [
        'name'             => '图表名',
        'suffix'           => '后缀',
        'description'      => '描述信息',
        'description-help' => '您可以使用Markdown语言。',
        'display-chart'    => '在状态页上显示图表?',
        'default-value'    => '默认值',
        'calc_type'        => '图表计算方法',
        'type_sum'         => '求和',
        'type_avg'         => '求平均数',
        'places'           => '小数点位数',

        'points' => [
            'value' => '数值',
        ],
    ],

    // Settings
    'settings' => [
        /// Application setup
        'app-setup' => [
            'site-name'              => '网站名称',
            'site-url'               => '网址',
            'display-graphs'         => '是否在状态页上显示图表',
            'about-this-page'        => '关于本页',
            'days-of-incidents'      => '显示多少天的故障？',
            'banner'                 => '横幅图像',
            'banner-help'            => '建议上传文件宽度不大于930像素。',
            'subscribers'            => '允许用户订阅邮件通知吗?',
        ],
        'analytics' => [
            'analytics_google'       => 'Google Analytics 代码',
            'analytics_gosquared'    => 'GoSquared Analytics 代码',
            'analytics_piwik_url'    => '输入Piwik实例的URL(不含http(s)://)',
            'analytics_piwik_siteid' => 'Piwik 网站的 id',
        ],
        'localization' => [
            'site-timezone'          => '系统时区',
            'site-locale'            => '系统语言',
            'date-format'            => '日期格式',
            'incident-date-format'   => '故障的时间显示格式',
        ],
        'security' => [
            'allowed-domains'      => '允许的域',
            'allowed-domains-help' => '以逗号分隔。默认情况下，API跨域请求将自动允许以上已设置的域。',
        ],
        'stylesheet' => [
            'custom-css' => '自定义样式表',
        ],
        'theme' => [
            'background-color'        => '页面背景色',
            'background-fills'        => '区块填充色(组件, 故障, 页尾)',
            'banner-background-color' => '横幅背景色',
            'banner-padding'          => '横幅Padding值',
            'fullwidth-banner'        => '横幅全宽？',
            'text-color'              => '文字颜色',
            'dashboard-login'         => '在页尾显示 管理后台 的入口？',
            'reds'                    => '红 (用于错误类提示)',
            'blues'                   => '蓝 (用于信息类提示)',
            'greens'                  => '绿 (用于成功类提示)',
            'yellows'                 => '黄 (用于警告类提示)',
            'oranges'                 => '橙 (用于通知类提示)',
            'metrics'                 => '图表填充色',
            'links'                   => '链接',
        ],
    ],

    'user' => [
        'username'       => '用户名',
        'email'          => '电子邮箱',
        'password'       => '密码',
        'api-token'      => 'API Token',
        'api-token-help' => '重新生成您的 API Token将阻止现有的应用程序访问Cachet。',
        'gravatar'       => '修改您的 Gravatar 头像。',
        'user_level'     => '用户等级',
        'levels'         => [
            'admin' => '管理员',
            'user'  => '普通用户',
        ],
        '2fa'            => [
            'help' => '启用双因素身份验证会增加您的帐户安全。您将需要下载 <a href="https://support.google.com/accounts/answer/1066447?hl=en">Google Authenticator</a> 或类似的应用到您的移动设备。当您登录时将会要求您提供由应用程序生成的一个短码。',
        ],
        'team' => [
            'description' => '请输入您要邀请的团队成员的邮件地址：',
            'email'       => 'Email #:id',
        ],
    ],

    // Buttons
    'add'    => '增加',
    'save'   => '保存​​',
    'update' => '更新',
    'create' => '创建',
    'edit'   => '编辑',
    'delete' => '删除',
    'submit' => '提交',
    'cancel' => '取消',
    'remove' => '移除',
    'invite' => '邀请',
    'signup' => '注册',

    // Other
    'optional' => '* 可选',
];
