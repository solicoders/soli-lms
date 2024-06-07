<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AssignRolesToUsersSeeder extends Seeder
{
    public function run()
    {
        // Créer ou récupérer les rôles
        $roleFormateur = Role::firstOrCreate(['name' => 'formateur']);
        $roleApprenant = Role::firstOrCreate(['name' => 'apprenant']);

        // Créer ou récupérer les permissions
        $permissions = ['view formation', 'add formation', 'edit formation', 'delete formation'];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assigner les permissions aux rôles
        $roleFormateur->givePermissionTo($permissions);
        $roleApprenant->givePermissionTo(['view formation']);

        // Récupérer les utilisateurs par email
        $apprenant = User::where('email', 'apprenant@gmail.com')->first();
        $formateur = User::where('email', 'formateur@gmail.com')->first();

        // Assigner les rôles aux utilisateurs
        if ($apprenant) {
            $apprenant->assignRole($roleApprenant);
        }

        if ($formateur) {
            $formateur->assignRole($roleFormateur);
        }
    }
}
