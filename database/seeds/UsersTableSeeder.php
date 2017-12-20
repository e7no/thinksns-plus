<?php

/*
 * +----------------------------------------------------------------------+
 * |                          ThinkSNS Plus                               |
 * +----------------------------------------------------------------------+
 * | Copyright (c) 2018 Chengdu ZhiYiChuangXiang Technology Co., Ltd.     |
 * +----------------------------------------------------------------------+
 * | This source file is subject to version 2.0 of the Apache license,    |
 * | that is bundled with this package in the file LICENSE, and is        |
 * | available through the world-wide-web at the following url:           |
 * | http://www.apache.org/licenses/LICENSE-2.0.html                      |
 * +----------------------------------------------------------------------+
 * | Author: Slim Kit Group <master@zhiyicx.com>                          |
 * +----------------------------------------------------------------------+
 */

use Zhiyi\Plus\Models\Role;
use Zhiyi\Plus\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->createFounderUser();
    }

    /**
     * Insert the founder information.
     *
     * @return void
     * @author Seven Du <shiweidu@outlook.com>
     */
    protected function createFounderUser()
    {
        $user = User::create(['name' => 'root', 'password' => bcrypt('root')]);
        $user->roles()->sync(
            Role::all()
        );
    }
}
