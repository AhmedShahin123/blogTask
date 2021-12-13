<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\Config;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Str;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use DatabaseTransactions;

    protected $user;


    

    public function setUp(): void
    {
        parent::setUp();

        Config::create(['name' => 'site_title', 'value' => Str::random()]);

        $this->user = User::factory()
            ->create(['name' => 'Example User', 'email' => 'example@test.com']);


    }

    public function testIndex()
    {
        $article = Article::factory()->published()->create([
            'heading' => 'Test Heading',
            'user_id' => $this->user->id,
        ]);

        Article::factory()->unpublished()->create([
            'heading' => 'Unpublished Heading',
            'user_id' => $this->user->id,
        ]);

        $this->get('article')
            ->assertOk()
            ->assertSee($article->heading)
            ->assertSee($article->published_at->format('M d, Y'))
            ->assertSee("{$article->user->name}")
            ->assertDontSee('Unpublished Heading');
    }

    public function testShowPublished()
    {
        $article = Article::factory()->published()->create([
            'heading' => 'Test Heading',
            'content' => 'Test content',
            'user_id' => $this->user->id,
            'is_deleted' => 0,
        ]);

        $this->get("article/{$article->id}/")->assertOk();
    }

    public function testHideShowUnpublished()
    {
        $article = Article::factory()->unpublished()->create([
            'heading' => 'Unpublished Heading',
            'content' => 'Unpublished content',
            'user_id' => $this->user->id,
        ]);

        $this->get("article/{$article->id}/")
            ->assertRedirect()
            ->assertDontSee('Unpublished Heading')
            ->assertDontSee('Unpublished content');
    }
}
