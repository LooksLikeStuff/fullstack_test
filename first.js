//Переменные объявил для наглядности, чтобы проще воспринимался код
let paragraph = document.querySelector(".test");  // Получаем необходимый объект который имеет класс "test" (то есть наш параграф)
let firstButton = document.querySelector(".first__button") // Получаем первую кнопку "кнопка 1" в виде объекта
let secondButton = document.querySelector(".second__button") //Получаем вторую кнопку "кнопка 2" в виде объекта


//Вешаем на первую кнопка событие "клик" при срабатывании которого, мы объявляем событие для второй кнопки
firstButton.addEventListener("click", function ()
    {
        //Одноразовое событие для второй кнопки, при срабатывании которого мы переключаем класс нашего параграфа.
        secondButton.addEventListener("click", function (){

            paragraph.classList.toggle("on");

    }, { once: true });
})


