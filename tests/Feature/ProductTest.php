#[Test]
public function it_shows_a_product_detail(): void
{
    $product = Product::factory()->create([
        'product_code' => 'P55555',
        'name'         => '詳細テスト製品',
        'quantity'     => 50,
        'price'        => 5555,
    ]);

    $response = $this->get(route('products.show', $product));

    // ✅ 1. Blade が正しく読み込まれているか確認（タイトルなどの文字でチェック）
    $response->assertOk();
    $response->assertSee('詳細');

    // ✅ 2. 製品名が表示されていることを確認
    $response->assertSeeText('詳細テスト製品');  // ← ここが失敗してたポイント
}
