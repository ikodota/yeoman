<?php

namespace Ikodota\Yeoman\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use OwenIt\Auditing\Auditable;
use Illuminate\Support\Facades\Auth;


class Role extends Model
{

    use Auditable;
    //use DataTracker;

    // Clear the oldest audits after 100 records.
    protected $auditLimit = 100;

    // Fields that you do NOT want to audit.
    protected $dontKeepAuditOf = ['created_at', 'updated_at'];

    // Specify what actions you want to audit.
    //protected $auditableTypes = ['created', 'saved', 'deleted'];

    public static $auditCustomMessage = '{user.name|Anonymous} {type} a role  at {elapsed_time}';

    public static $auditCustomFields = [
        'name'  => 'The name  was defined as   "{new.name}" ',
        'display_name' => 'The display_name  was defined as  "{new.display_name}" ',
        'description' => 'The description  was defined as  "{new.description}"  ',
    ];

    protected $authGuardName='admin';





    protected $fillable = [
        'name', 'display_name', 'description',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    //给角色添加权限
    public function givePermissions($permission)
    {
        return $this->permissions()->save($permission);
    }
    


}
