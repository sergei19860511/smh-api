
## Тестовое задание PHP-разработчика

### Для проверки задания и запуска проекта на своём ПК необходимо выполнить ряд инструкций




- Клонировать репозиторий на локальный ПК
- Перейти в корень проекта
- В консоли выполнить команду make init
- Далее выполнить миграции командой ./vendor/bin/sail artisan migrate

## Далее тестируем само приложение


<p>
    Для получения всех продуктов используем эндпоин http://localhost/api/v1/search/{sources},
    где sources желаемый вид сущности которую хотим получить (products, recipes, posts, users), 
    однако сохранение в бд настроено только для products.
</p>
<p>
    Для добавления сущности используем эндпоинт http://localhost/api/v1/{sources}/add,
    где sources желаемый вид сущности которую хотим добавить (products, recipes, posts, users),
    также добавление по апи настроено для products.
</p>
