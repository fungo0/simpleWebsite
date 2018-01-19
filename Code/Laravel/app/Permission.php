<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    public static function defaultPermissions()
    {
        return [
            'Administer roles & permissions',

            'Create Post',
            'Edit Post',
            'Delete Post',

            'Create Course',
            'Edit Course',
            'Delete Course',

            'Create News',
            'Edit News',
            'Delete News',

            'Create Event',
            'Edit Event',
            'Delete Event',

        ];
    }
}
