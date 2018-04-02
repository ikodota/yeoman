<?php
/**=======================================
 * @author ikodota <28341847@qq.com>
 * @datetime 2016-10-31 17:34
 *=======================================*/

return [
    'bool'  => [
        'yes' => '是',
        'no'=>'否',
    ],
    'common'    => [
        'button'               => [
            'submit'    => '提交',
            'cancel'    => '取消',
            'reset'     => '重置',
            'save'      => '保存',
            'edit'      => '编辑',
            'upload'    => '上传',
            'back'      => '返回',
            'delete'    => '删除',

        ],
        'option'                =>[
            'close'     => '关闭',
            'open'      => '开启',
            'on'        => '开',
            'off'       => '关',
            'start'     => '开启',
            'stop'      => '停止',
            'enable'    => '启用',
            'disable'   => '禁用',
            'yes'       => '是',
            'no'        => '否',
        ],
        'data'               => [
            'no_record'    => '没有数据',

        ],
        'text'                  =>[
            'tag'       => '新增标签',
            'operation' => '操作'
        ]
    ],
    'menu'  => [
        'menu_list' => '菜单列表',
        'menu_name' =>'菜单名称',
        'icon' =>'菜单图标',
        'url' =>'菜单链接',
        'visit_permission' =>'访问权限',
        'is_system' =>'系统菜单',
        'is_display' =>'是否显示',
        'create_menu' => '创建菜单',
        'edit_menu' => '编辑菜单',
        'parent_menu'  => '父级菜单'
    ],
    'system'    => [
        'menu'          => [
            'create'                => '创建菜单',
        ],
        'success'       => [
            'give_role_permissions'         => '角色权限更新成功.',
            'attach_permission_to_roles'    => '成功附加权限到指定的角色'
        ]
    ],
    'setting'   => [
        'website'               => [
            'title'                     => '站点设置',
            'setting'                   => '网站设置',
            'base_info'                 => '基础信息',
            'status'                    => '网站状态',
            'name'                      => '网站名称',
            'domain'                    => '网站域名',
            'logo'                      => '网站LOGO',
            'intro'                     => '网站简介',
            'keywords'                  => '关键词',
            'description'               => '关键词描述',
            'favorite_icon'             => '网站ICON',
            'code'                      => '全局统计代码',
            'verify_code'               => '验证码选项',
            'reg_verify_code'           => '注册启用验证码',
            'login_verify_code'         => '登陆启用验证码',
        ],
        'attachment'            => [
            'setting'                   => '附件设置',
            'php_env'                   => 'PHP 环境',
            'php_env_desc'              => 'PHP 环境说明',
            'thumbnail'                 => '附件缩略设置',
            'if_thumbnail'              => '是否启用缩略图',
            'thumbnail_max_width'       => '缩略图尺寸限制',
            'image_attachment'          => '图片附件设置',
            'media_attachment'          => '音视频附件设置',
            'width'                     => '宽',
            'height'                    => '高',
            'px'                        => 'px',
            'kb'                        => 'KB',
            'mb'                        => 'MB',
            'extension_filename'        => '可用文件后缀',
            'attachment_maxsize'        => '附件限制大小',
            'extension_filename_tips'   => '换行输入, 一行一个后缀.',
            'remote_attachment'         => '附件服务器设置',
            'remote_server_type'        => '附件服务器类型',
            'remote_server_config'      => '远程服务器配置',
            'remote_local'              => '本地',
            'remote_ftp'                => 'FTP服务器',
            'remote_alioss'             => '阿里云OSS',
            'remote_qiniu'              => '七牛云存储',
            'test_remote_server'        => '测试配置',
            'ftp'           =>      [
                'if_ssl'                => '是否启用SSL连接',
                'if_ssl_tips'           => '注意：选择是后，FTP 服务器必须开启了 SSL，一般情况选择否即可',
                'ftp_addr'              => 'FTP服务器地址',
                'ftp_addr_tips'         => '可以是 FTP 服务器的 IP 地址或域名',
                'ftp_port'              => '服务器端口',
                'ftp_account'           => 'FTP帐号',
                'ftp_account_tips'      => '该帐号必须具有以下权限：读取文件、写入文件、删除文件、创建目录、子目录继承',
                'ftp_password'          => 'FTP密码',
                'ftp_password_tips'     => '基于安全考虑将只显示 FTP 密码的第一位和最后一位，中间显示八个 * 号',
                'if_pasv'               => '被动模式(pasv)连接：',
                'if_pasv_tips'          => '一般情况下非被动模式即可，如果存在上传失败问题，可尝试打开此设置',
                'remote_path'           => '远程附件目录',
                'remote_path_tips'      => '远程附件目录的绝对路径或相对于 FTP 主目录的相对路径，结尾不要加斜杠 "/" , 例如：/attachment',
                'remote_url'            => '远程访问URL',
                'remote_url_tips'       => '支持 HTTP 和 FTP 协议，结尾不要加斜杠 "/" ; 例如：http://mydomin.com/attachment 如果使用 FTP 协议，FTP 服务器必须支持 PASV 模式，为了安全起见， 使用 FTP 连接的帐号不要设置可写权限和列表权限',
                'ftp_expire'            => 'FTP传输超时时间',
                'ftp_expire_tips'            => '单位：秒，0为服务器默认',
            ],
            'oss'           =>      [
                'app_key'               => 'Access Key ID',
                'app_key_tips'          => 'Access Key ID是您访问阿里云API的密钥，具有该账户完全的权限，请您妥善保管。 ',
                'app_secret'            => 'Access Key Secret',
                'app_secret_tips'       => 'Access Key Secret是您访问阿里云API的密钥，具有该账户完全的权限，请您妥善保管。(填写完Access Key ID 和 Access Key Secret 后请选择bucket) ',
                'url'                   => 'URL',
                'url_holder'            => 'http://',
                'url_tips'              => '阿里云oss支持用户自定义访问域名，如果自定义了URL则用自定义的URL，如果未自定义，则用系统生成出来的URL。注：自定义url开头加http://或https://结尾不加 ‘/’例：http://abc.com ',
            ],
            'qiniu'         =>      [
                'app_key'               => 'Accesskey',
                'app_key_tips'          => '用于签名的公钥',
                'app_secret'            => 'Secretkey',
                'app_secret_tips'       => '用于签名的私钥',
                'bucket'                => 'Bucket',
                'bucket_tips'           => 'Bucket',
                'url'                   => 'URL',
                'url_holder'            => 'http://',
                'url_tips'              => '七牛支持用户自定义访问域名。注：url开头加http://或https://结尾不加 ‘/’例：http://abc.com',
            ],
        ],
    ],
];