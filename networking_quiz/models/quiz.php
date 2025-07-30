<?php
session_start();
include '../config/database.php';

// Set default timezone
date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS Quiz Reviewer Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #3b82f6;
        }
        body {
            background-color: #f3f4f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .dashboard-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border-radius: 12px;
        }
        .dashboard-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .set-card {
            border-left: 4px solid var(--accent-color);
        }
        .progress-ring {
            transition: stroke-dashoffset 0.35s;
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
        }
        .floating-btn {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="../images/aclc.png" alt="ACLC Logo" class="h-10">
            </div>
            <h1 class="text-xl font-bold text-gray-800">CSS NC II Written Exam Reviewer</h1>
            <div class="flex items-center space-x-4">
                <span class="text-sm font-medium text-gray-600"><?= date('F j, Y') ?></span>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <!-- User Welcome Card -->
        <div class="dashboard-card bg-white p-6 mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">
                        Welcome!
                    </h2>
                    <p class="text-gray-600 mt-2">
                        Choose from the available quiz sets below to begin your exam preparation.
                    </p>
                </div>
                <div class="mt-4 md:mt-0">
                    <div class="flex items-center">
                        <div class="relative w-16 h-16 mr-4">
                            <svg class="w-full h-full" viewBox="0 0 36 36">
                                <circle class="text-gray-200" stroke-width="4" fill="none" cx="18" cy="18" r="16"></circle>
                                <circle class="progress-ring text-blue-500" stroke-width="4" stroke-dasharray="100" stroke-dashoffset="25" stroke-linecap="round" fill="none" cx="18" cy="18" r="16"></circle>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quiz Sets Selection -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Set A -->
            <div class="dashboard-card set-card bg-white p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-full mb-2">
                                SET A
                            </span>
                        <h3 class="text-xl font-bold text-gray-800">COMPUTER SYSTEMS SERVICING</h3>
                    </div>
                    <div class="bg-blue-100 p-2 rounded-full">
                        <i class="fas fa-laptop-code text-blue-600"></i>
                    </div>
                </div>
                <p class="text-gray-600 mb-4">
                    WRITTEN EXAM (SET A)
                </p>
                <ul class="text-sm text-gray-500 mb-5 space-y-1">
                    <li><i class="fas fa-check-circle text-green-500 mr-2"></i>30 multiple choice questions</li>
                    <li><i class="fas fa-clock text-blue-500 mr-2"></i>60 minute time limit</li>
                </ul>
                <a href="set-a.php?set=a" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition">
                    Start Set A
                </a>
            </div>

            <!-- Set B -->
            <div class="dashboard-card set-card bg-white p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                            <span class="inline-block px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-semibold rounded-full mb-2">
                                SET B
                            </span>
                        <h3 class="text-xl font-bold text-gray-800">COMPUTER SYSTEMS SERVICING</h3>
                    </div>
                    <div class="bg-yellow-100 p-2 rounded-full">
                        <i class="fas fa-network-wired text-yellow-600"></i>
                    </div>
                </div>
                <p class="text-gray-600 mb-4">
                    WRITTEN EXAM (SET B)
                </p>
                <ul class="text-sm text-gray-500 mb-5 space-y-1">
                    <li><i class="fas fa-check-circle text-green-500 mr-2"></i>30 multiple choice questions</li>
                    <li><i class="fas fa-clock text-blue-500 mr-2"></i>60 minute time limit</li>
                </ul>
                <a href="set-b.php?set=b" class="block w-full text-center bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded-lg transition">
                    Start Set B
                </a>
            </div>

            <!-- Set C -->
            <div class="dashboard-card set-card bg-white p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                            <span class="inline-block px-3 py-1 bg-red-100 text-red-800 text-xs font-semibold rounded-full mb-2">
                                SET C
                            </span>
                        <h3 class="text-xl font-bold text-gray-800">COMPUTER SYSTEMS SERVICING</h3>
                    </div>
                    <div class="bg-red-100 p-2 rounded-full">
                        <i class="fas fa-server text-red-600"></i>
                    </div>
                </div>
                <p class="text-gray-600 mb-4">
                    WRITTEN EXAM (SET C)
                </p>
                <ul class="text-sm text-gray-500 mb-5 space-y-1">
                    <li><i class="fas fa-check-circle text-green-500 mr-2"></i>30 multiple choice questions</li>
                    <li><i class="fas fa-clock text-blue-500 mr-2"></i>60 minute time limit</li>
                </ul>
                <a href="set-c.php?set=c" class="block w-full text-center bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg transition">
                    Start Set C
                </a>
            </div>
        </div>
    </main>

<!-- Floating Action Button -->
<div class="fixed bottom-6 right-6">
    <a href="#" class="floating-btn bg-blue-600 hover:bg-blue-700 text-white rounded-full h-14 w-14 flex items-center justify-center shadow-lg transition">
        <i class="fas fa-question text-xl"></i>
    </a>
</div>
</body>
</html>
