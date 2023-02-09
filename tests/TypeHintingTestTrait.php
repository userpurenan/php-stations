<?php

namespace Tests;

use Closure;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Property;
use PhpParser\ParserFactory;

trait TypeHintingTestTrait
{
    private function assertPropertyTypeHinting(string $expectedType, Property $property): void
    {
        if (is_null($property->type)) {
            $this->fail($property->props[0]->name->toString() . ' property has no type hinting.');
        }

        $this->assertEquals($expectedType, $property->type->toString());
    }

    private function assertMethodParamsTypeHinting(string $expectedType, ClassMethod $method, int $number = 1): void
    {
        if (count($method->params) === 0) {
            $this->fail($method->name->name . ' method has no any parameters.');
        }

        $idx = $number - 1;

        if (is_null($method->params[$idx]->type)) {
            $this->fail('parameter $' . $method->params[$idx]->var->name . ' has no type hinting.');
        }

        $this->assertEquals($expectedType, $method->params[$idx]->type->toString());
    }

    private function assertMethodReturnValueTypeHinting(string $expectedType, ClassMethod $method): void
    {
        if (is_null($method->returnType)) {
            $this->fail('return value of ' . $method->name->toString() . ' method has no type hinting.');
        }

        $this->assertEquals($expectedType, $method->returnType->toString());
    }

    private function property(string $filePath, string $name): Property
    {
        $filteredProperty = $this->filteredStmts($filePath, function ($stmt) use ($name) {
            return $stmt->getType() === 'Stmt_Property'
                && $stmt->props[0]->name->toString() === $name;
        });

        if (count($filteredProperty) === 0) {
            $this->fail($name . ' property does not exist.');
        }

        return array_values($filteredProperty)[0];
    }

    private function method(string $filePath, string $name): ClassMethod
    {
        $filteredMethod = $this->filteredStmts($filePath, function ($stmt) use ($name) {
            return $stmt->getType() === 'Stmt_ClassMethod'
                && $stmt->name->toString() === $name;
        });

        if (count($filteredMethod) === 0) {
            $this->fail($name . ' method does not exist.');
        }

        return array_values($filteredMethod)[0];
    }

    private function filteredStmts(string $filePath, Closure $filter): array
    {
        $code = file_get_contents($filePath);

        $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
        $stmtsClass = $parser->parse($code)[0]->stmts[0];

        return array_filter($stmtsClass->stmts, fn($stmt) => $filter($stmt));
    }
}
