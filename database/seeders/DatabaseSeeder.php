<?php

namespace Database\Seeders;
use App\Models\Author;
use App\Models\Post;
use Database\Seeders\DataRowsTableSeeder;
use DataTypesTableSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\MenuItemsTableSeeder;
use Database\Seeders\MenusTableSeeder;
use Database\Seeders\PermissionRoleTableSeeder;
use Database\Seeders\PermissionsTableSeeder;
use Database\Seeders\SettingsTableSeeder;
use Database\Seeders\TranslationsTableSeeder;
use Database\Seeders\VoyagerDatabaseSeeder;
use Database\Seeders\VoyagerDummyDatabaseSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        ]);
    }
}
