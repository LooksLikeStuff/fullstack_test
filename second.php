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
        $openIndex = []; // Массив с ключами открывающих скобок "{" массиве $strToArr

        //Преобразование строки $invalidStr в массив
        $strToArr = str_split($invalidStr);

        foreach ($strToArr as $key => $value) {

            //Если значение элемента массива = открывающая скобка "{", то мы сохраняем ключ элемента в массиве $openCount
            // и продолжаем перебор массива
            if ($value == "{") {
                $openIndex[] += $key;
                continue;
            }

            //Если значение массива = закрывающая скобка "}", то мы проверяем, если массив с ключами открывающих скобок пустой, то скобки уже расставлены некорректно
            // возвращаем false
            if ($value == "}") {
                if (count($openIndex) == 0) {
                    return false;

                    // Или удаляем из массива пару закрывающих и открывающих скобок "{}" и очищаем массив $openIndex От ключа удаленной скобки
                } else {
                    unset($strToArr[$openIndex[array_key_first($openIndex)]]); // Удаление открывающей скобки "{"
                    unset($openIndex[array_key_first($openIndex)]); // Удаление ключа открывающей скобки "{" из массива $openIndex
                    unset($strToArr[$key]); // Удаление закрывающей скобки "}"
                }
            }
        }

        //Если в массиве остались открывающие или закрывающие скобки, то переданная строка является некорректной, возвращаем false
        return !((in_array("{", $strToArr) || in_array("}", $strToArr)));

    }
}

if(!empty($_POST["string"])){

    $str = new str($_POST["string"]);

   echo $str->correctStr() ? "Введенная строка корректна" : "Введенная строка некорректна";
}
