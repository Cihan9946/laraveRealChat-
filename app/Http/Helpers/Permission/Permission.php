<?php

namespace App\Http\Helpers\Permission;

class Permission {
    protected $permissions = [

        'messages' => 'mesaj',
        'BirimList' => 'Birim Listesi',
        'User' => 'Kullanıcılar',
        'ChatList' => 'TümChatListesi',
        'Role'=>'Roller',

    ];

    public function get_permissions() {
        return $this->permissions;
    }

}
