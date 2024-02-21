<?php

namespace App\Models\Products;

class Handler
{
    public function handle($data): void
    {
        $key = array_key_first($data);

        switch ($key) {
            case 'products':
                foreach ($data['products'] as $product) {
                    if ($product['brand'] === 'Apple' && $product['category'] === 'smartphones') {

                        /** @var Product $itemProduct */
                        $itemProduct = Product::query()->create(
                            [
                                'title' => $product['title'],
                                'description' => $product['description'],
                                'price' => $product['price'],
                                'discountPercentage' => $product['discountPercentage'],
                                'rating' => $product['rating'],
                                'stock' => $product['stock'],
                                'brand' => $product['brand'],
                                'category' => $product['category'],
                                'thumbnail' => $product['thumbnail'],
                            ]);
                        foreach ($product['images'] as $image) {
                            $itemProduct->images()->create(['path' => $image]);
                        }
                    }
                }
                break;
            case 'posts':
                foreach ($data['posts'] as $post) {
                    // Даем условия для парсинга постов
                }
                break;
            case 'recipes':
                foreach ($data['recipes'] as $recipe) {
                    // Даем условия для парсинга рецептов
                }
                break;
        }
    }
}
