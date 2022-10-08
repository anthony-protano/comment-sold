<?php

namespace App\Services;

class ReadLargeCSV
{
    public $file;
    public string $delimiter;
    public int $iterator;
    public array|null $header;

    public function __construct($filename, $delimiter = "\t")
    {
        $this->file = fopen($filename, 'r');
        $this->delimiter = $delimiter;
        $this->iterator = 0;
        $this->header = null;
    }

    public function csvToArray(): \Generator
    {
        $data = [];
        $is_mul_1000 = false;

        while (($row = fgetcsv($this->file, 1000, $this->delimiter)) !== false)
        {
            $is_mul_1000 = false;
            if (!$this->header) {
                $this->header = $row;
            } else {
                $this->iterator++;
                $data[] = array_combine($this->header, $row);
                if($this->iterator != 0 && $this->iterator % 1000 == 0){
                    $is_mul_1000 = true;
                    $chunk = $data;
                    $data = array();
                    yield $chunk;
                }
            }
        }

        fclose($this->file);

        if (!$is_mul_1000){
            yield $data;
        }

        return;
    }
}
