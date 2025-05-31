<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function ログイン済みユーザーは製品一覧ページにアクセスできる()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/products');

        $response->assertStatus(200);
        $response->assertSee('製品一覧');
    }

    /** @test */
    public function 製品を登録できる()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $formData = [
            'product_code' => 'P12345',
            'product_name' => 'テスト製品',
            'quantity' => 10,
            'price' => 5000,
        ];

        $response = $this
            ->withHeaders(['Accept' => 'text/html'])
            ->post('/products', $formData);

        $response->assertRedirect('/products');

        $this->assertDatabaseHas('products', [
            'product_code' => 'P12345',
            'product_name' => 'テスト製品',
        ]);
    }

    /** @test */
    public function 製品を編集できる()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create([
            'product_code' => 'P99999',
            'product_name' => '旧製品',
            'quantity' => 5,
            'price' => 1000,
        ]);

        $updateData = [
            'product_code' => 'P99999',
            'product_name' => '更新済み製品',
            'quantity' => 20,
            'price' => 3000,
        ];

        $response = $this
            ->withHeaders(['Accept' => 'text/html'])
            ->put("/products/{$product->id}", $updateData);

        $response->assertRedirect('/products');

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'product_name' => '更新済み製品',
        ]);
    }

    /** @test */
    public function 製品を削除できる()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create([
            'product_code' => 'P77777',
            'product_name' => '削除対象製品',
            'quantity' => 99,
            'price' => 9999,
        ]);

        $response = $this
            ->withHeaders(['Accept' => 'text/html'])
            ->delete("/products/{$product->id}");

        $response->assertRedirect('/products');

        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }

    /** @test */
    public function 製品の詳細を表示できる()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create([
            'product_code' => 'P55555',
            'product_name' => '詳細テスト製品',
            'quantity' => 50,
            'price' => 5555,
        ]);

        $response = $this->get("/products/{$product->id}");

        $response->assertStatus(200);
        $response->assertSee('詳細');
        $response->assertSee('詳細テスト製品');
    }
}
