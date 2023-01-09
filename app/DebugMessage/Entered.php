<?php 
namespace App\DebugMessage;


use Symfony\Component\Console\Output\ConsoleOutput;

class Entred
{
    public static function message(string $sms)
    {
        $output = new ConsoleOutput();
$output->writeln("<info>'".$sms."'</info>");
    }
}