<?php

namespace Tests\Feature;

use App\Repositories\UserRepositoryInterface;
use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class UserTestWithMock extends TestCase
{
    /**
     * @test
     */
    public function getUserReturnsUserFromRepository()
    {
        // リポジトリのモックを作成
        $userRepositoryMock = Mockery::mock(UserRepositoryInterface::class);

        // リポジトリのfindメソッドが呼び出されたときに返すダミーユーザーデータ
        $expectedUser = ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'];
        $userRepositoryMock->shouldReceive('find')->with(1)->andReturn($expectedUser);

        // UserServiceにモックを注入してインスタンスを作成
        $userService = new UserService($userRepositoryMock);

        // getUserメソッドを呼び出す
        $user = $userService->getUser(1);

        // ユーザーが期待通りのデータを持っていることを確認
        $this->assertEquals($expectedUser, $user);
    }

    // テストが終了した後にモックをクリーンアップ
    protected function tearDown(): void
    {
        Mockery::close();
    }
}
