<?php

namespace Tests\Unit\Models;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var Category
     */
    protected $category;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create(['email' => 'example@test.com']);

    }

    public function testPublishedScope()
    {
        Article::factory()->published()->create([
            'user_id' => $this->user->id
          ]);
        $this->assertEquals(1, Article::published()->value('is_published'));
    }

    public function testNotDeletedScope()
    {
        Article::factory()->create([
            'is_deleted' => 0,
            'user_id' => $this->user->id,
        ]);

        $article = Article::notDeleted()->first();
        $this->assertEquals(0, $article->is_deleted);
    }


}
