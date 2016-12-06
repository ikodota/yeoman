<?php
namespace Ikodota\Yeoman;

use Illuminate\Database\Seeder;

class YeomanSetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->setupUsers();
        $this->setupAdmins();
        $this->setupMenus();
        $this->setupPermissions();
        $this->setupRoles();
    }

    public function setupUsers()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'admin',
                    'email' => 'ikodota@gmail.com',
                    'password' => bcrypt('123456')
                )
        ));
    }
    public function setupAdmins()
    {
        \DB::table('admins')->delete();

        \DB::table('admins')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'admin',
                    'email' => 'ikodota@gmail.com',
                    'password' => bcrypt('123456')
                )
        ));
    }
    /**
     * 预置系统菜单
     */
    public function setupMenus()
    {
        \DB::table('menus')->delete();

        \DB::table('menus')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'parent_id' => 0,
                    'icon' => 'fa-laptop',
                    'name' => 'system',
                    'display_name' => '系统',
                    'route' => '',
                    'permission' => '',
                    'sort' => 0,
                    'created_at' => '2016-11-18 04:29:53',
                    'updated_at' => '2016-11-18 04:29:53',
                ),
            1 =>
                array (
                    'id' => 2,
                    'parent_id' => 1,
                    'icon' => 'fa-dashboard',
                    'name' => 'dashboard',
                    'display_name' => '控制面板',
                    'route' => 'admin.dashboard.index',
                    'permission' => '',
                    'sort' => 0,
                    'created_at' => '2016-11-18 04:30:27',
                    'updated_at' => '2016-11-18 04:30:27',
                ),
            2 =>
                array (
                    'id' => 3,
                    'parent_id' => 1,
                    'icon' => 'fa-sitemap',
                    'name' => 'menus',
                    'display_name' => '系统菜单',
                    'route' => 'admin.menu.index',
                    'permission' => 'admin.menu.retrieve',
                    'sort' => 0,
                    'created_at' => '2016-11-18 04:31:37',
                    'updated_at' => '2016-11-18 04:31:37',
                ),
            3 =>
                array (
                    'id' => 4,
                    'parent_id' => 1,
                    'icon' => 'fa-key',
                    'name' => 'permissions',
                    'display_name' => '权限管理',
                    'route' => 'admin.permission.index',
                    'permission' => 'admin.permission.retrieve',
                    'sort' => 0,
                    'created_at' => '2016-11-18 04:32:23',
                    'updated_at' => '2016-11-18 04:32:23',
                ),
            4 =>
                array (
                    'id' => 5,
                    'parent_id' => 1,
                    'icon' => 'fa-users',
                    'name' => 'roles',
                    'display_name' => '角色管理',
                    'route' => 'admin.role.index',
                    'permission' => 'admin.role.retrieve',
                    'sort' => 0,
                    'created_at' => '2016-11-18 04:33:06',
                    'updated_at' => '2016-11-18 04:33:06',
                ),
            5 =>
                array (
                    'id' => 6,
                    'parent_id' => 1,
                    'icon' => 'fa-user-md',
                    'name' => 'admins',
                    'display_name' => '管理员',
                    'route' => 'admin.admin.index',
                    'permission' => 'admin.admin.retrieve',
                    'sort' => 0,
                    'created_at' => '2016-11-18 04:45:00',
                    'updated_at' => '2016-11-18 04:45:00',
                ),
            6 =>
                array (
                    'id' => 7,
                    'parent_id' => 0,
                    'icon' => 'fa-cogs',
                    'name' => 'settings',
                    'display_name' => '设置',
                    'route' => '',
                    'permission' => '',
                    'sort' => 0,
                    'created_at' => '2016-11-18 04:48:09',
                    'updated_at' => '2016-11-18 04:48:09',
                ),
            7 =>
                array (
                    'id' => 8,
                    'parent_id' => 7,
                    'icon' => 'fa-cog',
                    'name' => 'website_setting',
                    'display_name' => '站点设置',
                    'route' => 'admin.setting.website',
                    'permission' => 'admin.setting.website',
                    'sort' => 0,
                    'created_at' => '2016-11-18 04:50:09',
                    'updated_at' => '2016-11-18 04:50:09',
                ),
            8 =>
                array (
                    'id' => 9,
                    'parent_id' => 7,
                    'icon' => 'fa-file-image-o',
                    'name' => 'attachment_setting',
                    'display_name' => '附件设置',
                    'route' => 'admin.setting.attachment',
                    'permission' => 'admin.setting.attachment',
                    'sort' => 0,
                    'created_at' => '2016-11-18 04:51:22',
                    'updated_at' => '2016-11-18 04:51:22',
                ),
            9 =>
                array (
                    'id' => 10,
                    'parent_id' => 7,
                    'icon' => 'fa-envelope',
                    'name' => 'email_setting',
                    'display_name' => '邮箱设置',
                    'route' => 'admin.setting.email',
                    'permission' => 'admin.setting.email',
                    'sort' => 0,
                    'created_at' => '2016-11-19 05:30:28',
                    'updated_at' => '2016-11-19 05:30:28',
                ),
            10 =>
                array (
                    'id' => 11,
                    'parent_id' => 1,
                    'icon' => 'fa-shield',
                    'name' => 'data_auditing',
                    'display_name' => '数据审查',
                    'route' => 'admin.auditing',
                    'permission' => 'admin.audit.retrieve',
                    'sort' => 0,
                    'created_at' => '2016-11-19 05:43:33',
                    'updated_at' => '2016-11-19 05:43:33',
                ),
            11 =>
                array (
                    'id' => 12,
                    'parent_id' => 1,
                    'icon' => 'fa-database',
                    'name' => 'data_backup',
                    'display_name' => '数据库备份',
                    'route' => 'admin.database.backup',
                    'permission' => '',
                    'sort' => 0,
                    'created_at' => '2016-11-19 05:54:03',
                    'updated_at' => '2016-11-19 05:54:03',
                ),
            12 =>
                array (
                    'id' => 13,
                    'parent_id' => 1,
                    'icon' => 'fa-file-text',
                    'name' => 'system_log',
                    'display_name' => '系统日志',
                    'route' => 'admin.system.logviewer',
                    'permission' => 'admin.logviewer.retrieve',
                    'sort' => 0,
                    'created_at' => '2016-11-24 16:11:07',
                    'updated_at' => '2016-11-24 16:11:07',
                ),
        ));
    }

    /**
     * 预置权限数据
     */
    public function setupPermissions()
    {
        \DB::table('Permissions')->delete();

        \DB::table('Permissions')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'admin.setting.website',
                    'display_name' => '站点设置',
                    'description' => '允许修改站点设置',
                    'created_at' => '2016-11-12 04:25:37',
                    'updated_at' => '2016-11-19 05:17:05',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'admin.setting.attachment',
                    'display_name' => '附件设置',
                    'description' => '允许修改附件设置',
                    'created_at' => '2016-11-12 05:09:17',
                    'updated_at' => '2016-11-20 09:05:02',
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'admin.role.retrieve',
                    'display_name' => '角色浏览',
                    'description' => '允许查看角色列表',
                    'created_at' => '2016-11-12 06:39:25',
                    'updated_at' => '2016-11-18 09:41:30',
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'admin.role.create',
                    'display_name' => '角色创建',
                    'description' => '允许创建角色',
                    'created_at' => '2016-11-12 06:39:50',
                    'updated_at' => '2016-11-12 06:39:50',
                ),
            4 =>
                array (
                    'id' => 7,
                    'name' => 'admin.role.update',
                    'display_name' => '编辑角色',
                    'description' => '可以编辑角色信息',
                    'created_at' => '2016-11-13 03:57:38',
                    'updated_at' => '2016-11-13 03:57:38',
                ),
            5 =>
                array (
                    'id' => 8,
                    'name' => 'admin.role.give',
                    'display_name' => '角色授权',
                    'description' => '为角色赋予权限',
                    'created_at' => '2016-11-13 03:58:21',
                    'updated_at' => '2016-11-13 06:34:43',
                ),
            6 =>
                array (
                    'id' => 9,
                    'name' => 'admin.permission.retrieve',
                    'display_name' => '权限浏览',
                    'description' => '可浏览全部权限',
                    'created_at' => '2016-11-13 04:00:14',
                    'updated_at' => '2016-11-18 09:42:50',
                ),
            7 =>
                array (
                    'id' => 10,
                    'name' => 'admin.permission.create',
                    'display_name' => '创建权限',
                    'description' => '允许创建权限',
                    'created_at' => '2016-11-13 04:01:06',
                    'updated_at' => '2016-11-13 04:01:06',
                ),
            8 =>
                array (
                    'id' => 11,
                    'name' => 'admin.permission.update',
                    'display_name' => '权限编辑',
                    'description' => '允许对权限进行编辑',
                    'created_at' => '2016-11-13 04:01:32',
                    'updated_at' => '2016-11-13 04:01:32',
                ),
            9 =>
                array (
                    'id' => 12,
                    'name' => 'admin.permission.delete',
                    'display_name' => '权限删除',
                    'description' => '可以删除某个权限',
                    'created_at' => '2016-11-13 04:02:21',
                    'updated_at' => '2016-11-13 04:02:21',
                ),
            10 =>
                array (
                    'id' => 13,
                    'name' => 'admin.permission.attach',
                    'display_name' => '权限追加',
                    'description' => '允许把一种权限附加给一个或多个角色。适合插件',
                    'created_at' => '2016-11-13 04:04:30',
                    'updated_at' => '2016-11-13 06:36:28',
                ),
            11 =>
                array (
                    'id' => 14,
                    'name' => 'admin.admin.retrieve',
                    'display_name' => '管理员列表',
                    'description' => '允许读取管理员数据',
                    'created_at' => '2016-11-13 06:33:34',
                    'updated_at' => '2016-11-18 10:07:08',
                ),
            12 =>
                array (
                    'id' => 15,
                    'name' => 'admin.admin.create',
                    'display_name' => '新建管理员',
                    'description' => '允许新建管理员',
                    'created_at' => '2016-11-18 05:55:34',
                    'updated_at' => '2016-11-18 05:55:34',
                ),
            13 =>
                array (
                    'id' => 16,
                    'name' => 'admin.admin.update',
                    'display_name' => '修改管理员',
                    'description' => '允许修改管理员信息和权限',
                    'created_at' => '2016-11-18 05:56:11',
                    'updated_at' => '2016-11-18 05:56:11',
                ),
            14 =>
                array (
                    'id' => 17,
                    'name' => 'admin.admin.delete',
                    'display_name' => '删除管理员',
                    'description' => '允许删除一个管理员，不能删除自身',
                    'created_at' => '2016-11-18 05:56:49',
                    'updated_at' => '2016-11-18 05:56:49',
                ),
            15 =>
                array (
                    'id' => 18,
                    'name' => 'admin.menu.retrieve',
                    'display_name' => '菜单管理',
                    'description' => '后台菜单查看权限',
                    'created_at' => '2016-11-18 05:57:56',
                    'updated_at' => '2016-11-18 09:42:39',
                ),
            16 =>
                array (
                    'id' => 19,
                    'name' => 'admin.menu.create',
                    'display_name' => '新增菜单',
                    'description' => '新增一个菜单。',
                    'created_at' => '2016-11-18 05:58:32',
                    'updated_at' => '2016-11-18 05:58:32',
                ),
            17 =>
                array (
                    'id' => 20,
                    'name' => 'admin.menu.update',
                    'display_name' => '编辑菜单',
                    'description' => '允许对后台菜单编辑',
                    'created_at' => '2016-11-18 05:59:02',
                    'updated_at' => '2016-11-18 05:59:02',
                ),
            18 =>
                array (
                    'id' => 21,
                    'name' => 'admin.menu.delete',
                    'display_name' => '删除菜单',
                    'description' => '允许删除后台菜单项',
                    'created_at' => '2016-11-18 05:59:38',
                    'updated_at' => '2016-11-18 05:59:38',
                ),
            19 =>
                array (
                    'id' => 22,
                    'name' => 'admin.setting.email',
                    'display_name' => '邮箱设置',
                    'description' => '允许设置发件邮箱信息',
                    'created_at' => '2016-11-19 05:35:23',
                    'updated_at' => '2016-11-19 05:35:23',
                ),
            20 =>
                array (
                    'id' => 23,
                    'name' => 'admin.audit.retrieve',
                    'display_name' => '数据审查',
                    'description' => '允许审查各表数据变化记录',
                    'created_at' => '2016-11-23 07:25:30',
                    'updated_at' => '2016-11-23 07:25:30',
                ),
            21 =>
                array (
                    'id' => 24,
                    'name' => 'admin.logviewer.retrieve',
                    'display_name' => '查看系统日志',
                    'description' => '允许查看系统日志',
                    'created_at' => '2016-11-24 16:16:59',
                    'updated_at' => '2016-11-24 16:16:59',
                ),
        ));
    }

    /**
     * 预置角色数据
     */
    public function setupRoles()
    {
        \DB::table('Roles')->delete();

        \DB::table('Roles')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'super_admin',
                    'display_name' => '超级管理员',
                    'description' => '拥有全部权限',
                    'created_at' => '2016-11-11 15:43:15',
                    'updated_at' => '2016-11-23 03:54:07',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'admin',
                    'display_name' => '管理员',
                    'description' => '一般管理员，需拥有后台登陆权限。',
                    'created_at' => '2016-11-12 06:49:25',
                    'updated_at' => '2016-11-23 10:21:25',
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'demo',
                    'display_name' => '演示角色',
                    'description' => '只具备浏览相关权限，需要设置权限',
                    'created_at' => '2016-11-12 11:21:40',
                    'updated_at' => '2016-11-23 09:35:45',
                ),
        ));
    }
}
