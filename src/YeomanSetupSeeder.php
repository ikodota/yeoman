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
        $this->setupUsers();
        //$this->setupAdmins();
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
                    'mobile' => '13880803496',
                    'password' => bcrypt('123456'),
                    'is_admin' => 1
                )
        ));
    }
    /*public function setupAdmins()
    {
        \DB::table('admins')->delete();

        \DB::table('admins')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'admin',
                    'email' => '28341847@qq.com',
                    'password' => bcrypt('123456')
                )
        ));
    }*/
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
                    'display_name' => '系统',
                    'url' => '',
                    'permission' => '',
                    'sort' => 0,
                    'is_system' => 1,
                    'is_display' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            1 =>
                array (
                    'id' => 2,
                    'parent_id' => 1,
                    'icon' => 'fa-dashboard',
                    'display_name' => '控制面板',
                    'url' => '/admin/dashboard',
                    'permission' => '',
                    'sort' => 0,
                    'is_system' => 1,
                    'is_display' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            2 =>
                array (
                    'id' => 3,
                    'parent_id' => 1,
                    'icon' => 'fa-sitemap',
                    'display_name' => '系统菜单',
                    'url' => '/admin/system/menu',
                    'permission' => 'admin.menu.read',
                    'sort' => 0,
                    'is_system' => 1,
                    'is_display' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            3 =>
                array (
                    'id' => 4,
                    'parent_id' => 1,
                    'icon' => 'fa-key',
                    'display_name' => '权限管理',
                    'url' => '/admin/system/permission',
                    'permission' => 'admin.permission.read',
                    'sort' => 0,
                    'is_system' => 1,
                    'is_display' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            4 =>
                array (
                    'id' => 5,
                    'parent_id' => 1,
                    'icon' => 'fa-users',
                    'display_name' => '角色管理',
                    'url' => '/admin/system/role',
                    'permission' => 'admin.role.read',
                    'sort' => 0,
                    'is_system' => 1,
                    'is_display' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            5 =>
                array (
                    'id' => 6,
                    'parent_id' => 1,
                    'icon' => 'fa-user-md',
                    'display_name' => '管理员',
                    'url' => '/admin/system/admin',
                    'permission' => 'admin.admin.read',
                    'sort' => 0,
                    'is_system' => 1,
                    'is_display' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            6 =>
                array (
                    'id' => 7,
                    'parent_id' => 0,
                    'icon' => 'fa-cogs',
                    'display_name' => '设置',
                    'url' => '',
                    'permission' => '',
                    'sort' => 0,
                    'is_system' => 1,
                    'is_display' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            7 =>
                array (
                    'id' => 8,
                    'parent_id' => 7,
                    'icon' => 'fa-cog',
                    'display_name' => '站点设置',
                    'url' => '/admin/setting/website',
                    'permission' => 'admin.setting.website',
                    'sort' => 0,
                    'is_system' => 1,
                    'is_display' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            8 =>
                array (
                    'id' => 9,
                    'parent_id' => 7,
                    'icon' => 'fa-file-image-o',
                    'display_name' => '附件设置',
                    'url' => '/admin/setting/attachment',
                    'permission' => 'admin.setting.attachment',
                    'sort' => 0,
                    'is_system' => 1,
                    'is_display' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            9 =>
                array (
                    'id' => 10,
                    'parent_id' => 7,
                    'icon' => 'fa-envelope',
                    'display_name' => '邮箱设置',
                    'url' => '/admin/setting/email',
                    'permission' => 'admin.setting.email',
                    'sort' => 0,
                    'is_system' => 1,
                    'is_display' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            10 =>
                array (
                    'id' => 11,
                    'parent_id' => 1,
                    'icon' => 'fa-shield',
                    'display_name' => '数据审查',
                    'url' => '/admin/system/audit',
                    'permission' => 'admin.audit.read',
                    'sort' => 0,
                    'is_system' => 1,
                    'is_display' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            11 =>
                array (
                    'id' => 12,
                    'parent_id' => 1,
                    'icon' => 'fa-database',
                    'display_name' => '数据库备份',
                    'url' => '/admin/system/db/backup',
                    'permission' => '',
                    'sort' => 0,
                    'is_system' => 1,
                    'is_display' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            12 =>
                array (
                    'id' => 13,
                    'parent_id' => 1,
                    'icon' => 'fa-file-text',
                    'display_name' => '系统日志',
                    'url' => '/admin/system/logviewer',
                    'permission' => 'admin.logviewer.read',
                    'sort' => 0,
                    'is_system' => 1,
                    'is_display' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
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
            /*0 =>
                array (
                    'id' => 1,
                    'name' => 'admin.super',
                    'display_name' => '超级管理员',
                    'description' => '可设置为超级管理员',
                    'class' => 'system',
                    'created_at' => '2016-11-12 04:25:37',
                    'updated_at' => '2016-11-19 05:17:05',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'admin.visit',
                    'display_name' => '后台访问权限',
                    'description' => '允许登陆后台',
                    'class' => 'system',
                    'created_at' => '2016-11-12 04:25:37',
                    'updated_at' => '2016-11-19 05:17:05',
                ),*/
            2 =>
                array (
                    'name' => 'admin.role.read',
                    'display_name' => '角色浏览',
                    'description' => '允许查看角色列表',
                    'class' => 'system',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            3 =>
                array (
                    'name' => 'admin.role.create',
                    'display_name' => '角色创建',
                    'description' => '允许创建角色',
                    'class' => 'system',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            4 =>
                array (
                    'name' => 'admin.role.update',
                    'display_name' => '编辑角色',
                    'description' => '可以编辑角色信息',
                    'class' => 'system',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            5 =>
                array (
                    'name' => 'admin.role.give',
                    'display_name' => '角色授权',
                    'description' => '为角色赋予权限',
                    'class' => 'system',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            6 =>
                array (
                    'name' => 'admin.permission.read',
                    'display_name' => '权限浏览',
                    'description' => '可浏览全部权限',
                    'class' => 'system',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            7 =>
                array (
                    'name' => 'admin.permission.create',
                    'display_name' => '创建权限',
                    'description' => '允许创建权限',
                    'class' => 'system',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            8 =>
                array (
                    'name' => 'admin.permission.update',
                    'display_name' => '权限编辑',
                    'description' => '允许对权限进行编辑',
                    'class' => 'system',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            9 =>
                array (
                    'name' => 'admin.permission.delete',
                    'display_name' => '权限删除',
                    'description' => '可以删除某个权限',
                    'class' => 'system',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            10 =>
                array (
                    'name' => 'admin.permission.attach',
                    'display_name' => '权限追加',
                    'description' => '允许把一种权限附加给一个或多个角色。适合插件',
                    'class' => 'system',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            11 =>
                array (
                    'name' => 'admin.admin.read',
                    'display_name' => '管理员列表',
                    'description' => '允许读取管理员数据',
                    'class' => 'system',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            12 =>
                array (
                    'name' => 'admin.admin.create',
                    'display_name' => '新建管理员',
                    'description' => '允许新建管理员',
                    'class' => 'system',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            13 =>
                array (
                    'name' => 'admin.admin.update',
                    'display_name' => '修改管理员',
                    'description' => '允许修改管理员信息和权限',
                    'class' => 'system',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            14 =>
                array (
                    'name' => 'admin.admin.delete',
                    'display_name' => '删除管理员',
                    'description' => '允许删除一个管理员，不能删除自身',
                    'class' => 'system',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            15 =>
                array (
                    'name' => 'admin.menu.read',
                    'display_name' => '菜单管理',
                    'description' => '后台菜单查看权限',
                    'class' => 'system',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            16 =>
                array (
                    'name' => 'admin.menu.create',
                    'display_name' => '新增菜单',
                    'description' => '新增一个菜单。',
                    'class' => 'system',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            17 =>
                array (
                    'name' => 'admin.menu.update',
                    'display_name' => '编辑菜单',
                    'description' => '允许对后台菜单编辑',
                    'class' => 'system',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            18 =>
                array (
                    'name' => 'admin.menu.delete',
                    'display_name' => '删除菜单',
                    'description' => '允许删除后台菜单项',
                    'class' => 'system',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            19 =>
                array (
                    'name' => 'admin.audit.read',
                    'display_name' => '数据审查',
                    'description' => '允许审查各表数据变化记录',
                    'class' => 'system',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            21 =>
                array (
                    'name' => 'admin.logviewer.read',
                    'display_name' => '查看系统日志',
                    'description' => '允许查看系统日志',
                    'class' => 'system',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            22 =>
                array (
                    'name' => 'admin.setting.website',
                    'display_name' => '站点设置',
                    'description' => '允许修改站点设置',
                    'class' => 'setting',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            23 =>
                array (
                    'name' => 'admin.setting.attachment',
                    'display_name' => '附件设置',
                    'description' => '允许修改附件设置',
                    'class' => 'setting',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            24 =>
                array (
                    'name' => 'admin.setting.email',
                    'display_name' => '邮箱设置',
                    'description' => '设置默认发件邮箱',
                    'class' => 'setting',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
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
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'admin',
                    'display_name' => '管理员',
                    'description' => '一般管理员，需拥有后台登陆权限。',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'demo',
                    'display_name' => '演示角色',
                    'description' => '只具备浏览相关权限，需要设置权限',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
        ));
    }
}
