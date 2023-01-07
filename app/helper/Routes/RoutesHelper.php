<?php
namespace App\helper\Routes;

use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;

class RoutesHelper
{
    public static function fileExc(string $file)
    {
        $dirRecursevle = new RecursiveDirectoryIterator($file);
        /** @var RecursiveDirectoryIterator|RecursiveIteratorIterator $it */
        $it = new RecursiveIteratorIterator($dirRecursevle);
        while ($it->valid()) {
            if (
                !$it->isDot()
                && $it->isFile()
                && $it->isReadable()
                && $it->current()->getExtension() === 'php'
            ) {
                require $it->key();
            }
            $it->next();
        }
    }
}