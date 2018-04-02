<?php

namespace Ikodota\Yeoman\Models;
use Ikodota\Yeoman\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * 判断用户是否具有某个角色
     *
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return !! $role->intersect($this->roles)->count();
    }

    /**
     * 判断用户是否具有某权限
     *
     * @param $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        return $this->hasRole($permission->roles);
    }

    /**
     * 判断是否为超级管理员，用于跳过权限检查
     * @return bool
     */
    public function isSuperAdmin()
    {
        //这里从数据表中判断是否为超级管理员，也可从角色或拥有权限去判断。
        return $this->name == 'admin';
    }

}
