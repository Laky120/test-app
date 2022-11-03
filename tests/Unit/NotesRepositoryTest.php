<?php

namespace Tests\Unit;

use App\Repositories\NotesRepository;
use PHPUnit\Framework\TestCase;

class NotesRepositoryTest extends TestCase
{
    /**
     * @return void
     */
    public function test_create()
    {
        $item = [
            'full_name' => 'Test',
            'company' => 'Test',
            'phone' => '89999999999',
            'email' => 'test@mail.ru',
            'birthday' => '2022-12-01',
            'photo' => 'path/image.png'
        ];

        $repositoryStub = $this->createStub(NotesRepository::class);
        $repositoryStub->method('create')->willReturn($item);

        $this->assertEquals($item, $repositoryStub->create($item));
    }

    /**
     * @return void
     */
    public function test_update()
    {
        $item = [
            'id' => '1',
            'full_name' => 'Test',
            'company' => 'Test',
            'phone' => '89999999999',
            'email' => 'test@mail.ru',
            'birthday' => '2022-12-01',
            'photo' => 'path/image.png'
        ];

        $repositoryStub = $this->createStub(NotesRepository::class);
        $repositoryStub->method('update')->willReturn($item);

        $this->assertEquals($item, $repositoryStub->update($item));
    }

    /**
     * @return void
     */
    public function test_delete()
    {
        $ids = [1];

        $repositoryStub = $this->createStub(NotesRepository::class);
        $repositoryStub->method('delete')->willReturn(1);

        $this->assertEquals(1, $repositoryStub->delete($ids));
    }
}
