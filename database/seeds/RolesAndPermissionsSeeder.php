<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;
use Illuminate\Support\Str;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'Super Admin',
            'status'=>1,
            'email'=>'superadmin@test.com',
            'password'=> bcrypt('2YcHef7YWfid8KA')
          ]);

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        Permission::create(['name' => 'create articles']);
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // create permissions
        Permission::create(['name' => 'create content']);
        Permission::create(['name' => 'edit content']);
        Permission::create(['name' => 'delete content']);
        Permission::create(['name' => 'publish content']);
        Permission::create(['name' => 'unpublish content']);

        // create permissions
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'publish user']);
        Permission::create(['name' => 'unpublish user']);

        // create roles and assign created permissions
        // this can be done as separate statements
        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('create articles');

        // // or may be done by chaining
        Role::create(['name' => 'editor'])->givePermissionTo(['create articles','edit articles','delete articles' ,'publish articles', 'unpublish articles']);

        // // or may be done by chaining
        Role::create(['name' => 'admin'])->givePermissionTo(['create articles','edit articles','delete articles' ,'publish articles', 'unpublish articles', 'create content','edit content','delete content' ,'publish content', 'unpublish content']);

        $role3 = Role::create(['name' => 'super-admin']);
        $role3->givePermissionTo(Permission::all());

        
        $user->assignRole('super-admin');
        $user->givePermissionTo(Permission::all());

    }
}
