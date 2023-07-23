<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\UserProfile;
use App\Services\UserService;
use Tests\TestCase;

class HomeServiceTest extends TestCase
{
    /**
     * @test
     */
    public function getUserReturnsUserFromRepository()
    {
        $user_id = 5;
        User::factory()->create(['id'=>$user_id]);
        UserProfile::factory()->create(['user_id'=>$user_id]);
        $userService = app()->make(UserService::class);

        // getUserメソッドを呼び出す
        $user = $userService->getUser($user_id);

        // ユーザーが期待通りのデータを持っていることを確認
        $this->assertDatabaseHas('users',['id' => $user['id']]);
    }

    /**
     * @test
     * @dataProvider dataProvider_for_getUser
     * 引数を変更してテストする例
     */
    public function userService_getUser(int $expected, int $amount)
    {
        $result = $amount;
        $this->assertSame($expected,$result);
    }

    public function dataProvider_for_getUser() :array
    {
        return [
//            '0,0をいれたよ'=>[0,0],
            [0,0],
//            [0,1],
        ];
    }

    /**
     * @test
     * 例外テストの例
     */
    public function exception_expectException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionCode(200);
        $this->expectExceptionMessage('message');

        //期待する例外を出す処理
        throw new \InvalidArgumentException('message',200);
    }


}
