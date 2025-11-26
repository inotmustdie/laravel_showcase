<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Донцов Глеб - Backend Developer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen">
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <header class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Донцов Глеб Сергеевич</h1>
        <p class="text-xl text-gray-600">Backend-разработчик | Laravel | PHP</p>
        <div class="flex justify-center space-x-4 mt-4">
                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">
                    <i class="fas fa-phone mr-1"></i> +7 (900) 255-11-04
                </span>
            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                    <i class="fas fa-envelope mr-1"></i> inotmustdie@gmail.com
                </span>
            <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">
                    <i class="fas fa-map-marker-alt mr-1"></i> Химки
                </span>
        </div>
    </header>

    <div class="grid md:grid-cols-3 gap-8 mb-12">
        <div class="md:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">
                    <i class="fas fa-briefcase mr-2 text-blue-500"></i>Опыт работы
                </h2>

                <div class="space-y-6">
                    <div class="border-l-4 border-blue-500 pl-4">
                        <h3 class="font-semibold text-lg">Zazu Group</h3>
                        <p class="text-gray-600">Backend-разработчик | Декабрь 2018 - настоящее время</p>
                        <ul class="mt-2 text-gray-700 list-disc list-inside space-y-1">
                            <li>Поддержка и разработка системы</li>
                            <li>Оптимизация запросов к БД</li>
                            <li>Рефакторинг легаси кода</li>
                        </ul>
                    </div>

                    <div class="border-l-4 border-green-500 pl-4">
                        <h3 class="font-semibold text-lg">emploi.uk</h3>
                        <p class="text-gray-600">Backend-разработчик | Апрель 2024 - Декабрь 2024</p>
                        <ul class="mt-2 text-gray-700 list-disc list-inside space-y-1">
                            <li>Доработка MVP проекта</li>
                            <li>Рефакторинг легаси кода</li>
                            <li>Полная пересборка бэкенда</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">
                    <i class="fas fa-code mr-2 text-green-500"></i>Навыки
                </h2>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">PHP</span>
                    <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm">Laravel</span>
                    <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm">MySQL</span>
                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">MongoDB</span>
                    <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">Git</span>
                    <span class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm">API</span>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">
                    <i class="fas fa-language mr-2 text-purple-500"></i>Языки
                </h2>
                <div class="space-y-2">
                    <div>
                        <p class="font-medium">Русский</p>
                        <p class="text-gray-600 text-sm">Родной</p>
                    </div>
                    <div>
                        <p class="font-medium">Английский</p>
                        <p class="text-gray-600 text-sm">B2 - Средне-продвинутый</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">
            <i class="fas fa-project-diagram mr-2 text-yellow-500"></i>Мои проекты
        </h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="border border-gray-200 rounded-lg p-4 hover:shadow-lg transition-shadow">
                <div class="bg-blue-500 text-white p-3 rounded-lg mb-4">
                    <i class="fas fa-money-bill-wave text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2">MoneyTracker</h3>
                <p class="text-gray-600 text-sm mb-4">Трекер личных расходов с аналитикой</p>
                <div class="flex flex-wrap gap-1 mb-4">
                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">Laravel</span>
                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">MySQL</span>
                    <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-xs">API</span>
                </div>
                <a href="/money-tracker"
                   class="block w-full bg-blue-500 hover:bg-blue-600 text-white text-center py-2 rounded-lg transition-colors">
                    <i class="fas fa-external-link-alt mr-2"></i>Открыть проект
                </a>
            </div>

            <!-- Заглушки для будущих проектов -->
            <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                <div class="bg-gray-400 text-white p-3 rounded-lg mb-4">
                    <i class="fas fa-plus text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2 text-gray-500">Скоро новый проект</h3>
                <p class="text-gray-400 text-sm mb-4">Здесь появится следующий проект</p>
                <button class="block w-full bg-gray-400 text-white text-center py-2 rounded-lg cursor-not-allowed">
                    Скоро...
                </button>
            </div>

            <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                <div class="bg-gray-400 text-white p-3 rounded-lg mb-4">
                    <i class="fas fa-plus text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2 text-gray-500">Скоро новый проект</h3>
                <p class="text-gray-400 text-sm mb-4">Здесь появится следующий проект</p>
                <button class="block w-full bg-gray-400 text-white text-center py-2 rounded-lg cursor-not-allowed">
                    Скоро...
                </button>
            </div>
        </div>
    </div>

    <footer class="text-center text-gray-600 border-t pt-8">
        <p>© 2025 Донцов Глеб. Backend-разработчик</p>
        <p class="text-sm mt-2">
            <i class="fas fa-heart text-red-500 mr-1"></i>
        </p>
    </footer>
</div>
</body>
</html>
