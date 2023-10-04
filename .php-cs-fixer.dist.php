<?php

// declare(strict_types=1);

// $finder = PhpCsFixer\Finder::create()->in(__DIR__);

// $config = new PhpCsFixer\Config();

// return $config
//     ->setRiskyAllowed(true)
//     ->setRules([
//         '@PSR2' => true,
//         // 'trailing_comma_in_multiline' => true, // この一行を追加
//         // 'array_syntax' => ['syntax' => 'short'], // 配列をarray()ではなく[]で表現する
//          'no_superfluous_elseif' => true, //不要なelse if文を削除
//         //'no_useless_else' => true, //不要なelse文を削除

//         // //Class内のメソッドを'public','protected','private'の順で並び替える
//         // 'ordered_class_elements' => [
//         //     'order' => ['public', 'protected', 'private'],
//         // ],
// ])->setUsingCache(false)
// ->setFinder($finder);

$finder = PhpCsFixer\Finder::create()->in(__DIR__);

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR2' => true,
        'no_useless_else' => true, 
    ])
    ->setUsingCache(false)
    ->setFinder($finder);
