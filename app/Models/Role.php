<?php


namespace App\Models;

use App\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    const ROLE_SUPER_ADMIN = 'super admin';
    const ROLE_TEACHER = 'teacher';
    const ROLE_STUDENT = 'student';

    static $roles = [
        self::ROLE_SUPER_ADMIN => [
            Permission::PERMISSION_SUPER_ADMIN
        ],
        self::ROLE_TEACHER => [
            Permission::PERMISSION_TEACH,
            Permission::PERMISSION_MANAGE_ROLE
        ],
        self::ROLE_STUDENT => []
    ];
}
