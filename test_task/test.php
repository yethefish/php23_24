<?php
class TestArray
{
    private $array;

    /* Конструктор принимает на вход готовый массив объектов по заданию,
    либо n>0 целое число и генерирует случайный массив n объектов*/

    public function __construct($param)  
    {
        if (is_int($param)) {
            $this->generateArray($param);
        } elseif (is_array($param)) {
            $this->array = $param;
        } else {
            $this->array = [];
        }
    }
    
    /* фунция для генерации случайного массива объектов вида
    Array
    (
    [i] => stdClass Object
        (
            [id] => i+1
            [category] => rand(one, two, three)
        )
        ...
    )
    */
    private function generateArray(int $num) 
    {
        $tmp = ['one', 'two', 'three'];
        $this->array = [];
        for ($i = 1; $i <= $num; $i++) {
            $this->array[] = (object)array("id" => $i, "category" => $tmp[rand(0, 2)]);
        }
    }

    public function getArray() :array
    {
        return $this->array;
    }

    // функция сортировки массива по заданию
    public function reorganizeArray()
    {
        $result = [];
        foreach ($this->array as $object) {
            $result[$object->category][] = (object)["id"=>$object->id];
        }
        $this->array = $result;
    }

    // функция для сохранения массива
    public function saveArray($path = "results.txt")
    {
        file_put_contents((is_string($path) ? $path : "results.txt"), print_r($this->array, true));
        echo "\nARRAY SAVED TO: $path\n";
    }
}

// пример кода
$test = new TestArray(10); // генерируем случайный массив
print_r($test->getArray()); // выводим в консоль
$test->reorganizeArray(); // сортируем
$test->saveArray(); // сохраняем отсортированный массив в файл
?>