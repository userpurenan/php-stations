<?php

namespace Tests\Station12\Question;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;
use Src\Station12\Question\Product;

/**
 * @group station12
 */
class ProductTest extends TestCase
{
    /**
     * @test
     */
    public function originalPriceプロパティが定義されている(): void
    {
        $product = new ReflectionClass(Product::class);

        try {

            $product->getProperty('originalPrice');
            $this->assertTrue(true);

        } catch (ReflectionException $e) {
            $this->fail($e->getMessage());
        }
    }
}
