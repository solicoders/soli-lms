<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Créer les rôles
        $roleFormateur = Role::create(['name' => 'formateur']);
        $roleApprenant = Role::create(['name' => 'apprenant']);

        // Créer les permissions
        $permissions = [
            'add formation',
            'edit formation',
            'delete formation',
            'view formation'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Attribuer les permissions aux rôles
        $roleFormateur->givePermissionTo($permissions);
        $roleApprenant->givePermissionTo('view formation');
    }
}
