<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

//Import Model

use App\Role;
use App\User;
use App\Message;
use App\Discipline;
use App\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        // $this->call(UserInfoTableSeeder::class);


        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear all old data ?')) {
            // Call the php artisan migrate:refresh
            $this->command->call('migrate:refresh');
            $this->command->warn("Data cleared, starting from blank database.");
        }

        // Seed the default permissions
        $permissions = Permission::defaultPermissions();

        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }

        $this->command->info('Default Permissions added.');

        // Confirm roles needed
        // if ($this->command->info('Create Roles for user, default is admin and user? [y|N]', true)) {

        // Ask for roles from input
        $input_roles = $this->command->ask('Enter roles in comma separate format.', 'Admin,Speaker,User');

        // Explode roles
        $roles_array = explode(',', $input_roles);


        // add roles
        foreach($roles_array as $role) {
            $role = Role::firstOrCreate(['name' => trim($role)]);

            if( $role->name == 'Admin' ) {
                // assign all permissions
                $role->syncPermissions(Permission::all());
                $this->command->info('Admin granted all the permissions');
            } else if( $role->name == 'Speaker' ) {
                // can't news
                $speaker_forbidden_permission = Permission::where('name', 'LIKE', '% News')->orWhere('name', 'Administer roles & permissions')->pluck('name');
                $role->syncPermissions(Permission::whereNotIn('name', $speaker_forbidden_permission->toArray())->get());
                $this->createUser($role);
                $this->createUser($role);
            } else if( $role->name == 'User' ) {
                // can't delete post, can't course, can't news, can't event
                $role->syncPermissions(Permission::where('name','Create Post')->orWhere('name','Edit Post')->get());
                $this->createUser($role);
                $this->createUser($role);
                $this->createUser($role);
                $this->createUser($role);
                $this->createUser($role);
                $this->createUser($role);
                $this->createUser($role);
                $this->createUser($role);
                $this->createUser($role);
            }

            // create one user for each role
            $this->createUser($role);
        }

        $this->command->info('Roles ' . $input_roles . ' added successfully');

        // } else {
        //     Role::firstOrCreate(['name' => 'User']);
        //     $this->command->info('Added only default user role.');
        // }

        // now lets seed some posts for demo
        factory(\App\Post::class, 50)->create();
        $this->command->info('Some Posts data seeded.');

        factory(\App\Message::class, 30)->create();
        $this->command->info('Some Messages data seeded.');

        $disciplines = array('CS', 'EIE', 'COMP', 'IT', 'Web App', 'AI', 'Big Data', 'Cloud', 'Statistic', 'Automata');

        foreach($disciplines as $discipline)
            Discipline::create(['discipline' => $discipline]);

        $this->command->info('Some discipline data seeded.');

        $this->command->warn('All done :)');

        Model::reguard();
    }

    /**
     * Create a user with given role
     *
     * @param $role
     */
    private function createUser($role)
    {

        $user = factory(User::class)->create();

        $user->UserDetail()->save(factory(\App\UserDetail::class)->make());
        $user->UserProfile()->save(factory(\App\UserProfile::class)->make());

        $user->assignRole($role->name);

        if( $role->name == 'Admin' ) {
            $this->command->info('Here is your admin details to login:');
            $this->command->warn($user->email);
            $this->command->warn('Password is "secret"');
        }
    }

}
