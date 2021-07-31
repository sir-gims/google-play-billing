<?php

namespace Imdhemy\GooglePlay\Tests\Products;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;
use Imdhemy\GooglePlay\ClientFactory;
use Imdhemy\GooglePlay\Products\Product;
use Imdhemy\GooglePlay\Products\ProductPurchase;
use Imdhemy\GooglePlay\Tests\TestCase;

/**
 * Class ProductTest
 * @package Imdhemy\GooglePlay\Tests\Products
 */
class ProductTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function test_it_can_send_get_request()
    {
        $client = ClientFactory::mock(new Response(200, [], json_encode([])));
        $product = new Product(
            $client,
            'com.some.thing',
            'fake_id',
            'fake_token'
        );
        $this->assertInstanceOf(ProductPurchase::class, $product->get());
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function test_it_can_send_acknowledge_request()
    {
        $this->expectNotToPerformAssertions();

        $client = ClientFactory::mock(new Response(200, [], json_encode([])));
        $product = new Product(
            $client,
            'com.some.thing',
            'fake_id',
            'fake_token'
        );
        $product->acknowledge();
    }
}
