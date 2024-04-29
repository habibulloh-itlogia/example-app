document.getElementById('addCharacteristic').addEventListener('click', function(event) {
    event.preventDefault();

    // Создаем новое поле для названия характеристики и значения
    var characteristic = document.createElement('div');
    characteristic.classList.add('characteristic');
    characteristic.innerHTML = `
        <input type="text" name="data" placeholder="Название характеристики">
        <input type="text" name="data" placeholder="Значение характеристики">
        <a href="#" class="removeCharacteristic">Удалить</a>
    `;

    // Добавляем новое поле к списку характеристик
    var characteristics = document.querySelector('.characteristics');
    characteristics.appendChild(characteristic);
});

// Обработчик клика по кнопке удаления
document.addEventListener('click', function(event) {
    if (event.target.classList.contains('removeCharacteristic')) {
        event.preventDefault();
        event.target.parentElement.remove(); // Удаляем родительский элемент кнопки
    }
});
