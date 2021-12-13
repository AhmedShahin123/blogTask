<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KeywordTest extends TestCase
{
    public function test_get_articles()
    {
        $user = User::factory()->create();


        $article = Article::factory()->published()->create([
            'heading' => 'Test Heading',
            'user_id' => $user->id,
        ]);

        
        $this->get("article/{$article->id}")
            ->assertOk()
            ->assertSee($article->heading)
            ->assertSee($article->published_at->format('M d, Y'))
            ->assertSee("{$article->user->name}");

    }
}
