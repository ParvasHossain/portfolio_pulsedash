<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- ApexCharts for Clean Vector Graphics -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f0f4ff',
                            100: '#e0e8ff',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                        },
                        emeraldPastel: '#a7f3d0',
                        rosePastel: '#fecdd3',
                        amberPastel: '#fef3c7',
                        skyPastel: '#bae6fd',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        .dark ::-webkit-scrollbar-thumb {
            background: #334155;
        }
    </style>
</head>
<body class="bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-100 min-h-screen transition-colors duration-200">

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar Navigation -->
        <aside class="w-64 bg-white dark:bg-slate-900 border-r border-slate-200 dark:border-slate-800 flex flex-col justify-between hidden md:flex">
            <div>
                <!-- Logo -->
                <div class="h-16 flex items-center px-6 border-b border-slate-100 dark:border-slate-800/80">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-brand-500 to-sky-400 flex items-center justify-center text-white font-bold shadow-lg shadow-brand-500/20">
                            <i data-lucide="layout-grid" class="w-5 h-5"></i>
                        </div>
                        <span class="font-bold text-lg tracking-tight bg-gradient-to-r from-slate-900 to-slate-700 dark:from-white dark:to-slate-300 bg-clip-text text-transparent">PulseDash</span>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="p-4 space-y-1">
                    <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-brand-50 dark:bg-brand-500/10 text-brand-600 dark:text-brand-400 font-semibold text-sm">
                        <i data-lucide="line-chart" class="w-4 h-4"></i>
                        <span>Overview</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/50 hover:text-slate-900 dark:hover:text-slate-200 font-medium text-sm transition-all">
                        <i data-lucide="folder-git-2" class="w-4 h-4"></i>
                        <span>Projects</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/50 hover:text-slate-900 dark:hover:text-slate-200 font-medium text-sm transition-all">
                        <i data-lucide="users" class="w-4 h-4"></i>
                        <span>Customers</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/50 hover:text-slate-900 dark:hover:text-slate-200 font-medium text-sm transition-all">
                        <i data-lucide="layers" class="w-4 h-4"></i>
                        <span>Integrations</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/50 hover:text-slate-900 dark:hover:text-slate-200 font-medium text-sm transition-all">
                        <i data-lucide="settings" class="w-4 h-4"></i>
                        <span>Settings</span>
                    </a>
                </nav>
            </div>

            <!-- Pro Banner -->
            <div class="p-4">
                <div class="p-4 rounded-2xl bg-gradient-to-br from-indigo-50 to-sky-50 dark:from-slate-800 dark:to-slate-800/40 border border-brand-100 dark:border-slate-700/50 relative overflow-hidden">
                    <div class="relative z-10">
                        <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-semibold bg-brand-500 text-white mb-2">Pro Plan</span>
                        <p class="text-xs text-slate-600 dark:text-slate-300 font-medium">85% of monthly bandwidth used.</p>
                        <div class="w-full bg-slate-200 dark:bg-slate-700 h-1.5 rounded-full mt-3 overflow-hidden">
                            <div class="bg-brand-500 h-full rounded-full" style="width: 85%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">

            <!-- Top Header -->
            <header class="h-16 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 flex items-center justify-between px-6 z-10">
                <div class="flex items-center gap-4 flex-1">
                    <button class="md:hidden text-slate-500 hover:text-slate-700">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                    <!-- Search Input -->
                    <div class="relative w-full max-w-md hidden sm:block">
                        <i data-lucide="search" class="w-4 h-4 absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="text" placeholder="Search analytics, logs, or metrics..." class="w-full pl-10 pr-4 py-2 bg-slate-100 dark:bg-slate-800 border-0 rounded-xl text-sm focus:ring-2 focus:ring-brand-500 outline-none transition-all placeholder:text-slate-400">
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <!-- Theme Toggle -->
                    <button id="themeToggle" class="p-2 rounded-xl text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        <i data-lucide="moon" class="w-5 h-5 dark:hidden"></i>
                        <i data-lucide="sun" class="w-5 h-5 hidden dark:block"></i>
                    </button>

                    <!-- Notifications -->
                    <button class="p-2 rounded-xl text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 relative transition-colors">
                        <i data-lucide="bell" class="w-5 h-5"></i>
                        <span class="w-2 h-2 bg-rose-500 rounded-full absolute top-2 right-2 ring-2 ring-white dark:ring-slate-900"></span>
                    </button>

                    <div class="h-6 w-[1px] bg-slate-200 dark:bg-slate-800 mx-1"></div>

                    <!-- User Profile -->
                    <div class="flex items-center gap-3 pl-1">
                        <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-sky-400 to-indigo-500 flex items-center justify-center text-white font-semibold text-sm ring-2 ring-slate-100 dark:ring-slate-800">
                            JD
                        </div>
                        <div class="hidden lg:block text-left">
                            <div class="text-sm font-semibold leading-none">Jane Doe</div>
                            <div class="text-xs text-slate-400 mt-1">Admin</div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Body -->
            <main class="flex-1 overflow-y-auto p-6 space-y-6">

                <!-- Page Title / Quick Actions -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-bold tracking-tight">Performance Overview</h1>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Real-time metrics and vector data insights.</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <button class="flex items-center gap-2 px-4 py-2 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl text-sm font-medium hover:bg-slate-50 dark:hover:bg-slate-800 shadow-sm transition-all">
                            <i data-lucide="calendar" class="w-4 h-4 text-slate-500"></i>
                            <span>Last 30 Days</span>
                        </button>
                        <button class="flex items-center gap-2 px-4 py-2 bg-brand-500 hover:bg-brand-600 text-white rounded-xl text-sm font-medium shadow-md shadow-brand-500/20 transition-all">
                            <i data-lucide="download" class="w-4 h-4"></i>
                            <span>Export Data</span>
                        </button>
                    </div>
                </div>

                <!-- KPI Metric Cards Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    
                    <!-- Card 1 -->
                    <div class="p-5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm relative overflow-hidden flex flex-col justify-between">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Total Revenue</span>
                            <div class="w-9 h-9 rounded-xl bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center">
                                <i data-lucide="dollar-sign" class="w-5 h-5"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="text-2xl font-bold">$45,231.89</div>
                            <div class="flex items-center gap-1.5 mt-2 text-xs font-medium text-emerald-600 dark:text-emerald-400">
                                <i data-lucide="arrow-up-right" class="w-3.5 h-3.5"></i>
                                <span>+12.5%</span>
                                <span class="text-slate-400 font-normal">vs last month</span>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="p-5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm relative overflow-hidden flex flex-col justify-between">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Active Sessions</span>
                            <div class="w-9 h-9 rounded-xl bg-indigo-50 dark:bg-indigo-500/10 text-brand-600 dark:text-brand-400 flex items-center justify-center">
                                <i data-lucide="activity" class="w-5 h-5"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="text-2xl font-bold">2,420</div>
                            <div class="flex items-center gap-1.5 mt-2 text-xs font-medium text-emerald-600 dark:text-emerald-400">
                                <i data-lucide="arrow-up-right" class="w-3.5 h-3.5"></i>
                                <span>+8.2%</span>
                                <span class="text-slate-400 font-normal">vs last month</span>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="p-5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm relative overflow-hidden flex flex-col justify-between">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Conversion Rate</span>
                            <div class="w-9 h-9 rounded-xl bg-sky-50 dark:bg-sky-500/10 text-sky-600 dark:text-sky-400 flex items-center justify-center">
                                <i data-lucide="trending-up" class="w-5 h-5"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="text-2xl font-bold">3.65%</div>
                            <div class="flex items-center gap-1.5 mt-2 text-xs font-medium text-rose-500">
                                <i data-lucide="arrow-down-right" class="w-3.5 h-3.5"></i>
                                <span>-1.1%</span>
                                <span class="text-slate-400 font-normal">vs last month</span>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="p-5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm relative overflow-hidden flex flex-col justify-between">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Avg. Response Time</span>
                            <div class="w-9 h-9 rounded-xl bg-amber-50 dark:bg-amber-500/10 text-amber-600 dark:text-amber-400 flex items-center justify-center">
                                <i data-lucide="clock" class="w-5 h-5"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="text-2xl font-bold">142 ms</div>
                            <div class="flex items-center gap-1.5 mt-2 text-xs font-medium text-emerald-600 dark:text-emerald-400">
                                <i data-lucide="arrow-up-right" class="w-3.5 h-3.5"></i>
                                <span>-14ms</span>
                                <span class="text-slate-400 font-normal">faster</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Charts Section -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    <!-- Main Area Vector Chart -->
                    <div class="lg:col-span-2 p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <h3 class="font-bold text-lg">Traffic vs Conversions</h3>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Past 7 days performance metric</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="flex items-center gap-1.5 text-xs font-medium text-slate-500">
                                    <span class="w-2.5 h-2.5 rounded-full bg-indigo-500"></span> Traffic
                                </span>
                                <span class="flex items-center gap-1.5 text-xs font-medium text-slate-500 ml-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-sky-400"></span> Conversions
                                </span>
                            </div>
                        </div>
                        <div id="areaChart" class="w-full h-72"></div>
                    </div>

                    <!-- Donut Vector Chart -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-lg">Acquisition Sources</h3>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Distribution by channel</p>
                        </div>
                        <div id="donutChart" class="w-full my-auto flex justify-center"></div>
                        <div class="grid grid-cols-2 gap-2 pt-2 border-t border-slate-100 dark:border-slate-800 text-xs">
                            <div class="flex items-center justify-between">
                                <span class="text-slate-500">Organic Search</span>
                                <span class="font-semibold">44%</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-slate-500">Direct</span>
                                <span class="font-semibold">31%</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Recent Activity Table -->
                <div class="p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm">
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <h3 class="font-bold text-lg">Recent Transactions</h3>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Latest activity across all channels</p>
                        </div>
                        <button class="text-xs font-semibold text-brand-600 dark:text-brand-400 hover:underline">View All</button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead>
                                <tr class="text-xs uppercase text-slate-400 border-b border-slate-100 dark:border-slate-800">
                                    <th class="pb-3 font-semibold">User</th>
                                    <th class="pb-3 font-semibold">Status</th>
                                    <th class="pb-3 font-semibold">Date</th>
                                    <th class="pb-3 font-semibold text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-800/60">
                                <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                                    <td class="py-3.5 flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center font-bold text-xs text-slate-600 dark:text-slate-300">
                                            AL
                                        </div>
                                        <div>
                                            <div class="font-medium">Alex Morgan</div>
                                            <div class="text-xs text-slate-400">alex@example.com</div>
                                        </div>
                                    </td>
                                    <td class="py-3.5">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Completed
                                        </span>
                                    </td>
                                    <td class="py-3.5 text-xs text-slate-500">Sep 07, 2026</td>
                                    <td class="py-3.5 text-right font-semibold">$249.00</td>
                                </tr>
                                <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                                    <td class="py-3.5 flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center font-bold text-xs text-slate-600 dark:text-slate-300">
                                            RK
                                        </div>
                                        <div>
                                            <div class="font-medium">Rachel Kim</div>
                                            <div class="text-xs text-slate-400">rachel@example.com</div>
                                        </div>
                                    </td>
                                    <td class="py-3.5">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-amber-50 dark:bg-amber-500/10 text-amber-600 dark:text-amber-400">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Pending
                                        </span>
                                    </td>
                                    <td class="py-3.5 text-xs text-slate-500">Sep 06, 2026</td>
                                    <td class="py-3.5 text-right font-semibold">$120.50</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <!-- Dashboard Vector Charts Configuration -->
    <script>
        // Initialize Lucide Icons
        lucide.createIcons();

        // Theme Switcher Logic
        const themeToggleBtn = document.getElementById('themeToggle');
        themeToggleBtn.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            renderCharts(); // Redraw charts for color adaptation
        });

        // Area Chart (Vector Graphics)
        let areaChart, donutChart;

        function renderCharts() {
            const isDark = document.documentElement.classList.contains('dark');
            const labelColor = isDark ? '#94a3b8' : '#64748b';
            const gridColor = isDark ? '#1e293b' : '#f1f5f9';

            if(areaChart) areaChart.destroy();
            if(donutChart) donutChart.destroy();

            // Apex Area Chart Config
            const areaOptions = {
                series: [{
                    name: 'Traffic',
                    data: [31, 40, 28, 51, 42, 109, 100]
                }, {
                    name: 'Conversions',
                    data: [11, 32, 45, 32, 34, 52, 41]
                }],
                chart: {
                    height: 280,
                    type: 'area',
                    toolbar: { show: false },
                    fontFamily: 'Plus Jakarta Sans, sans-serif'
                },
                colors: ['#6366f1', '#38bdf8'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.35,
                        opacityTo: 0.05,
                        stops: [0, 90, 100]
                    }
                },
                dataLabels: { enabled: false },
                stroke: { curve: 'smooth', width: 2.5 },
                xaxis: {
                    categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                    labels: { style: { colors: labelColor } },
                    axisBorder: { show: false },
                    axisTicks: { show: false }
                },
                yaxis: { labels: { style: { colors: labelColor } } },
                grid: { borderColor: gridColor, strokeDashArray: 4 },
                legend: { show: false },
                tooltip: { theme: isDark ? 'dark' : 'light' }
            };

            areaChart = new ApexCharts(document.querySelector("#areaChart"), areaOptions);
            areaChart.render();

            // Apex Donut Chart Config
            const donutOptions = {
                series: [44, 31, 13, 12],
                chart: {
                    type: 'donut',
                    height: 240,
                    fontFamily: 'Plus Jakarta Sans, sans-serif'
                },
                labels: ['Organic', 'Direct', 'Referral', 'Social'],
                colors: ['#818cf8', '#a7f3d0', '#bae6fd', '#fecdd3'],
                stroke: { width: 0 },
                legend: { position: 'bottom', labels: { colors: labelColor } },
                dataLabels: { enabled: false },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '75%',
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'Total Visits',
                                    color: labelColor,
                                    formatter: () => '12.4k'
                                }
                            }
                        }
                    }
                }
            };

            donutChart = new ApexCharts(document.querySelector("#donutChart"), donutOptions);
            donutChart.render();
        }

        // Initial Render
        renderCharts();
    </script>
</body>
</html>