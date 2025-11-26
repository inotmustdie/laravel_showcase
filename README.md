## Быстрый запуск

1. Клонировать репозиторий
2. Скопировать .env.example в .env
3. Установить зависимости: composer install && npm install && npm run build
4. Настроить БД в .env и запустить: php artisan key:generate && php artisan migrate --seed
5. Запустить сервер: php artisan serve

Приложение доступно: http://localhost:8000

## Разделы проекта

- Главная страница портфолио: /
- Трекер расходов MoneyTracker: /money-tracker

## API

- GET /api/expenses - список расходов
- POST /api/expenses - добавить расход
- GET /api/expenses-stats - статистика

Пример POST запроса:
```json
{
"description": "Обед",
"amount": 850.50,
"category": "food",
"date": "2024-01-15"
}
```

## Технологии

*Laravel 10, PHP 8.2, MySQL, Tailwind CSS, Alpine.js, Chart.js*
