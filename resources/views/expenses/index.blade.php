<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyTracker - Advanced Expense Analytics</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.0/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50" x-data="expenseTracker()">
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-blue-600">
                <i class="fas fa-chart-line mr-2"></i>MoneyTracker Pro
            </h1>
            <p class="text-gray-600">Advanced expense analytics dashboard</p>
        </div>
        <a href="/" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors">
            ← Back to Portfolio
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-600 text-sm">Total Spent</p>
                    <p class="text-2xl font-bold text-gray-800" x-text="'₽' + totalSpent"></p>
                </div>
                <i class="fas fa-wallet text-blue-500 text-xl"></i>
            </div>
            <p class="text-green-600 text-sm mt-2" x-text="'↑ ' + totalTransactions + ' transactions'"></p>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-600 text-sm">Avg. per Day</p>
                    <p class="text-2xl font-bold text-gray-800" x-text="'₽' + averagePerDay"></p>
                </div>
                <i class="fas fa-calendar-day text-green-500 text-xl"></i>
            </div>
            <p class="text-gray-600 text-sm mt-2">Last 30 days</p>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-600 text-sm">Top Category</p>
                    <p class="text-xl font-bold text-gray-800" x-text="topCategory"></p>
                </div>
                <i class="fas fa-tags text-purple-500 text-xl"></i>
            </div>
            <p class="text-gray-600 text-sm mt-2" x-text="'₽' + topCategoryAmount"></p>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-red-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-600 text-sm">This Month</p>
                    <p class="text-2xl font-bold text-gray-800" x-text="'₽' + monthSpent"></p>
                </div>
                <i class="fas fa-chart-bar text-red-500 text-xl"></i>
            </div>
            <p class="text-gray-600 text-sm mt-2" x-text="monthTransactions + ' transactions'"></p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-4 text-gray-800">
                    <i class="fas fa-chart-pie mr-2 text-purple-500"></i>Spending by Category
                </h3>
                <div class="h-80">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-4 text-gray-800">
                    <i class="fas fa-list-alt mr-2 text-blue-500"></i>Category Breakdown
                </h3>
                <div class="space-y-3">
                    <template x-for="item in stats.data" :key="item.category">
                        <div class="flex justify-between items-center p-3 border border-gray-200 rounded-lg">
                            <div class="flex items-center">
                        <span class="w-3 h-3 rounded-full mr-3"
                              :style="`background-color: ${getCategoryColor(item.category)}`"></span>
                                <span x-text="categories[item.category] || item.category"></span>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold" x-text="'₽' + item.total.toFixed(2)"></p>
                                <p class="text-sm text-gray-500" x-text="item.count + ' transactions'"></p>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-4 text-gray-800">
                    <i class="fas fa-plus-circle mr-2 text-green-500"></i>Add New Expense
                </h3>
                <form @submit.prevent="addExpense" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <input type="text" x-model="newExpense.description"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                               placeholder="Lunch at restaurant..." required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Amount (₽)</label>
                        <input type="number" step="0.01" x-model="newExpense.amount"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                               placeholder="850.50" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                        <select x-model="newExpense.category"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <template x-for="[key, value] in Object.entries(categories)" :key="key">
                                <option :value="key" x-text="value"></option>
                            </template>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                        <input type="date" x-model="newExpense.date"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>

                    <button type="submit"
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg transition-colors font-semibold">
                        <i class="fas fa-plus mr-2"></i>Add Expense
                    </button>
                </form>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-4 text-gray-800">
                    <i class="fas fa-history mr-2 text-orange-500"></i>Recent Transactions
                </h3>
                <div class="space-y-3 max-h-96 overflow-y-auto">
                    <template x-for="expense in recentExpenses" :key="expense.id">
                        <div class="flex justify-between items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50">
                            <div>
                                <p class="font-medium text-gray-800" x-text="expense.description"></p>
                                <p class="text-sm text-gray-600" x-text="expense.category_name"></p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-gray-800" x-text="'₽' + expense.amount"></p>
                                <p class="text-xs text-gray-500" x-text="formatDate(expense.date)"></p>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('expenseTracker', () => ({
            categories: {
                'food': '🍕 Food',
                'transport': '🚗 Transport',
                'entertainment': '🎬 Entertainment',
                'bills': '📄 Bills',
                'health': '🏥 Health',
                'other': '📦 Other'
            },
            newExpense: {
                description: '',
                amount: '',
                category: 'food',
                date: new Date().toISOString().split('T')[0]
            },
            expenses: [],
            stats: { data: [], total: 0 },
            categoryChart: null,

            // Computed properties
            get totalSpent() { return this.stats.total ? this.stats.total.toFixed(2) : '0.00' },
            get totalTransactions() { return this.stats.data ? this.stats.data.reduce((sum, item) => sum + item.count, 0) : 0 },
            get averagePerDay() { return this.stats.total ? (this.stats.total / 30).toFixed(2) : '0.00' },
            get topCategory() {
                if (!this.stats.data || this.stats.data.length === 0) return 'N/A';
                const top = this.stats.data.reduce((max, item) => item.total > max.total ? item : max, this.stats.data[0]);
                return this.categories[top.category] || top.category;
            },
            get topCategoryAmount() {
                if (!this.stats.data || this.stats.data.length === 0) return '0.00';
                const top = this.stats.data.reduce((max, item) => item.total > max.total ? item : max, this.stats.data[0]);
                return top.total.toFixed(2);
            },
            get monthSpent() {
                if (!Array.isArray(this.expenses)) return '0.00';
                const currentMonth = new Date().getMonth();
                const monthExpenses = this.expenses.filter(exp => new Date(exp.date).getMonth() === currentMonth);
                return monthExpenses.reduce((sum, exp) => sum + parseFloat(exp.amount), 0).toFixed(2);
            },
            get monthTransactions() {
                if (!Array.isArray(this.expenses)) return 0;
                const currentMonth = new Date().getMonth();
                return this.expenses.filter(exp => new Date(exp.date).getMonth() === currentMonth).length;
            },
            get recentExpenses() {
                return Array.isArray(this.expenses) ? this.expenses.slice(0, 10) : [];
            },

            async init() {
                await this.loadData();
            },

            async loadData() {
                try {
                    const expensesResponse = await fetch('/api/expenses');
                    const expensesData = await expensesResponse.json();
                    this.expenses = Array.isArray(expensesData) ? expensesData : expensesData.data || [];

                    const statsResponse = await fetch('/api/expenses-stats');
                    this.stats = await statsResponse.json();

                    // Инициализируем график после загрузки данных
                    this.$nextTick(() => {
                        this.initCategoryChart();
                    });

                } catch (error) {
                    console.error('Error loading data:', error);
                }
            },

            initCategoryChart() {
                const ctx = document.getElementById('categoryChart');
                if (!ctx) return;

                if (this.categoryChart) {
                    this.categoryChart.destroy();
                }

                const chartData = this.getCategoryChartData();
                this.categoryChart = new Chart(ctx.getContext('2d'), {
                    type: 'doughnut',
                    data: chartData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }
                });
            },

            getCategoryChartData() {
                if (!this.stats.data || this.stats.data.length === 0) {
                    return {
                        labels: ['No data'],
                        datasets: [{
                            data: [1],
                            backgroundColor: ['#6B7280'],
                            borderWidth: 0
                        }]
                    };
                }

                const colors = ['#3B82F6', '#10B981', '#8B5CF6', '#EF4444', '#F59E0B', '#6B7280'];

                return {
                    labels: this.stats.data.map(item => this.categories[item.category] || item.category),
                    datasets: [{
                        data: this.stats.data.map(item => item.total),
                        backgroundColor: colors,
                        borderWidth: 0
                    }]
                };
            },

            getCategoryColor(category) {
                const colors = {
                    'food': '#3B82F6',
                    'transport': '#10B981',
                    'entertainment': '#8B5CF6',
                    'bills': '#EF4444',
                    'health': '#F59E0B',
                    'other': '#6B7280'
                };
                return colors[category] || '#6B7280';
            },

            async addExpense() {
                try {
                    const response = await fetch('/api/expenses', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(this.newExpense)
                    });

                    if (response.ok) {
                        this.newExpense.description = '';
                        this.newExpense.amount = '';
                        await this.loadData();
                        alert('Expense added successfully!');
                    }
                } catch (error) {
                    console.error('Error adding expense:', error);
                    alert('Error adding expense');
                }
            },

            formatDate(dateString) {
                return new Date(dateString).toLocaleDateString('ru-RU');
            }
        }));
    });
</script>
</body>
</html>
