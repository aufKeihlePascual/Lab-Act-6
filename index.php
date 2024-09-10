<?php
require "vendor/autoload.php";

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('ipt10');
$log->pushHandler(new StreamHandler('ipt10.log'));

$log->warning('Keihle Dianne Gyraser L. Pascual');
$log->error('pascual.keihlediannegyraser@auf.edu.phu');
$log->info('profile', [
    'student_number' => '21-2076-208',
    'college' => 'CCS',
    'program' => 'IT',
    'university' => 'Angeles University Foundation'
]);

class TestClass
{
    private $logger;

    public function __construct($logger_name)
    {
        $this->logger = new Logger($logger_name);
        $this->logger->info(__FILE__ . " Greetings to {$logger_name}");
    }

    public function greet($name)
    {
        $message = "Greetings to {$name}";
        $this->logger->info(__METHOD__ . " {$message}");
        return $message;
    }

    public function getAverage($data)
    {
        $this->logger->info(__CLASS__ . " get the average");

        $average = array_sum($data) / count($data);
        return $average;
    }

    public function largest($data)
    {
        $this->logger->info(__CLASS__ . " Get the largest number");

        $largest = max($data);
        return $largest;
    }

    public function smallest($data)
    {
        $this->logger->info(__CLASS__ . " Get the smallest number");

        $smallest = min($data);
        return $smallest;
    }
}

$my_name = 'Keihle Pascual';
$obj = new TestClass($my_name);
echo $obj->greet($my_name) . PHP_EOL;

$data = [100, 345, 4563, 65, 234, 6734, -99];
echo "Average: " . $obj->getAverage($data) . PHP_EOL;
echo "Largest: " . $obj->largest($data) . PHP_EOL;
echo "Smallest: " . $obj->smallest($data) . PHP_EOL;

$log->info('data', $data);
$log->info('object', ['greet' => $obj->greet($my_name), 'average' => $obj->getAverage($data), 'largest' => $obj->largest($data), 'smallest' => $obj->smallest($data)]);