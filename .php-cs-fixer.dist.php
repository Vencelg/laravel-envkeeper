<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

return (new Config())
    ->setRiskyAllowed(false)
    ->setRules([
        '@PhpCsFixer' => true,
        'yoda_style' => false,
        'concat_space' => ['spacing' => 'one'],        // $a . $b instead of $a.$b
        'not_operator_with_successor_space' => false,    // ! $value instead of !$value
        'ordered_class_elements' => false,              // don't force method ordering
        'php_unit_strict' => false,                     // allow assertEquals
        'blank_line_before_statement' => false,
    ])
    // 💡 by default, Fixer looks for `*.php` files excluding `./vendor/` - here, you can groom this config
    ->setFinder(
        (new Finder())
            // 💡 root folder to check
            ->in(__DIR__)
            // 💡 additional files, eg bin entry file
            // ->append([__DIR__.'/bin-entry-file'])
            // 💡 folders to exclude, if any
            // ->exclude([/* ... */])
            // 💡 path patterns to exclude, if any
            // ->notPath([/* ... */])
            // 💡 extra configs
            // ->ignoreDotFiles(false) // true by default in v3, false in v4 or future mode
            // ->ignoreVCS(true) // true by default
    )
;
