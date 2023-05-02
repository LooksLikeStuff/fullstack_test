<?php

class str
{
    public string $str;

    public function __construct(string $str)
    {
        $this->str = $str;
    }

    public function correctStr(): bool
    {
        $invalidStr = $this->str;  //Переданная строка
        $count = 0; //Счетчик пар открывающих и закрывающих скобок

        //Преобразование строки $invalidStr в массив
        $strToArr = str_split($invalidStr);

        foreach ($strToArr as $key => $value) {

            // Если элемент массива открывающая скобка "{", то увеличиваем счетчик на 1
            if ($value == "{") {
                $count += 1;
                continue;
            }

            // Если элемент массива закрывающая скобка "}", То проверяем, если счетчик равен нулю, то есть
            // перед закрывающей скобкой "}" ни разу не попадалась открывающая "{", то строка некорректна, возвращаем false
            if ($value == "}") {
                if ($count == 0) {
                    return false;

                // Иначе уменьшаем счетчик на 1
                } else {
                    $count -= 1;
                }
            }
        }

        //Если счетчик не равен нулю, значит в строке присутствуют скобки без пары, значит строка некорректна, возращаем false, иначе true
        return $count == 0;

    }
}

if(!empty($_POST["string"])){

    $str = new str($_POST["string"]);

   echo $str->correctStr() ? "Введенная строка корректна" : "Введенная строка некорректна";
}
