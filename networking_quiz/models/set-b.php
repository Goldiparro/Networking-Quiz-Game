<?php
session_start();
include '../config/database.php';

// Set default timezone
date_default_timezone_set('Asia/Manila');

// Initialize quiz session
if (!isset($_SESSION['quiz_started'])) {
    $_SESSION['quiz_started'] = true;
    $_SESSION['current_question'] = 0;
    $_SESSION['answers'] = array_fill(0, 30, null);
}

// Define complete Set B questions
$set_b_questions = [
    1 => [
        'question' => "A compound used to prevent overheating of CPU.",
        'options' => [
            'A' => "Central Processing Unit (CPU) separator",
            'B' => "Heat sink insulator",
            'C' => "Interface sink",
            'D' => "Thermal paste"
        ],
        'correct' => "D"
    ],
    2 => [
        'question' => "What is the minimum cable length for USB 2.0?",
        'options' => [
            'A' => "5 ft.",
            'B' => "1.2 yards",
            'C' => "1.5 meters",
            'D' => "5 meters"
        ],
        'correct' => "C"
    ],
    3 => [
        'question' => "What software program stores into a Read-Only Memory (ROM)?",
        'options' => [
            'A' => "Driver",
            'B' => "Firmware",
            'C' => "Flash IC",
            'D' => "Power On Self Test (POST)"
        ],
        'correct' => "B"
    ],
    4 => [
        'question' => "Disc image also known as .",
        'options' => [
            'A' => "Hard Disk Drive (HDD) image",
            'B' => "Installer image",
            'C' => "ISO image",
            'D' => "WIM image"
        ],
        'correct' => "C"
    ],
    5 => [
        'question' => "What is the minimum hardware requirements of the computer RAM for Windows 10?",
        'options' => [
            'A' => "1 gigabyte (GB) for 32-bit or 2 GB for 64-bit",
            'B' => "1 gigabyte (GB) for 32-bit or 4 GB for 64-bit",
            'C' => "2 gigabyte (GB) for 32-bit or 2 GB for 64-bit",
            'D' => "4 gigabyte (GB) for 32-bit or 4 GB for 64-bit"
        ],
        'correct' => "A"
    ],
    6 => [
        'question' => "An extension of Microsoft management console used to manage hardware devices including device drivers.",
        'options' => [
            'A' => "Console Manager",
            'B' => "Device Manager",
            'C' => "Hardware Manager",
            'D' => "Peripheral Manager"
        ],
        'correct' => "B"
    ],
    7 => [
        'question' => "What is the volt rating of the YELLOW wire in a power supply?",
        'options' => [
            'A' => "-5V",
            'B' => "+5V",
            'C' => "-12V",
            'D' => "+12V"
        ],
        'correct' => "D"
    ],
    8 => [
        'question' => "A Yost cable, Cisco cable, and a Console cable also known as .",
        'options' => [
            'A' => "Cross-Over",
            'B' => "Extreme",
            'C' => "Straight-Thru",
            'D' => "Roll-Over"
        ],
        'correct' => "D"
    ],
    9 => [
        'question' => "In Windows Server 2008, Local Area Network (LAN) connection icon in a yellow color indicator signifies .",
        'options' => [
            'A' => "driver problem",
            'B' => "no connectivity",
            'C' => "update",
            'D' => "virus"
        ],
        'correct' => "B"
    ],
    10 => [
        'question' => "Light Emitting Diode (LED) in Network Interface Card (NIC) has lights.",
        'options' => [
            'A' => "1",
            'B' => "2",
            'C' => "3",
            'D' => "4"
        ],
        'correct' => "B"
    ],
    11 => [
        'question' => "Port is an application of network address translation (NAT) that redirects a communication request from one address and port number combination to another.",
        'options' => [
            'A' => "Evaluation",
            'B' => "Forwarding",
            'C' => "Request",
            'D' => "Standard"
        ],
        'correct' => "B"
    ],
    12 => [
        'question' => "What is the alternative for wired connection that uses radio frequencies to send signals between devices and a router?",
        'options' => [
            'A' => "Wireless Fidelity",
            'B' => "Wireless Finder",
            'C' => "Wireless Firmware",
            'D' => "Wireless Fix"
        ],
        'correct' => "A"
    ],
    13 => [
        'question' => "A computer network made up of an interconnection of local area networks (LANs) without a limited geographical area, e.g. corporate buildings.",
        'options' => [
            'A' => "Campus Area Network (CAN)",
            'B' => "Local Area Network (LAN)",
            'C' => "Metropolitan Area Network (MAN)",
            'D' => "Wide Area Network (WAN)"
        ],
        'correct' => "A"
    ],
    14 => [
        'question' => "What term applies to the interconnection of LAN in a city into 5 to 50 kilometers?",
        'options' => [
            'A' => "Campus Area Network (CAN)",
            'B' => "Local Area Network (LAN)",
            'C' => "Metropolitan Area Network (MAN)",
            'D' => "Wide Area Network (WAN)"
        ],
        'correct' => "C"
    ],
    15 => [
        'question' => "Who is assigned to monitor the network security, operation and network users?",
        'options' => [
            'A' => "Encoder",
            'B' => "End-User  ",
            'C' => "Network Administrator",
            'D' => "Network Technician"
        ],
        'correct' => "C"
    ],
    16 => [
        'question' => "is used to store the user documents with a large amount of memory and storage space.",
        'options' => [
            'A' => "Application server",
            'B' => "File server",
            'C' => "Mail server",
            'D' => "Print server"
        ],
        'correct' => "B"
    ],
    17 => [
        'question' => "What IP address used by the virtual machine to communicate over the physical network?",
        'options' => [
            'A' => "Customer address",
            'B' => "Internet address",
            'C' => "Private address",
            'D' => "Provider address"
        ],
        'correct' => "C"
    ],
    18 => [
        'question' => "What type of version that verifies network uses through a server and requires a more complicated setup, but provides additional security?",
        'options' => [
            'A' => "Temporal Key Integrity Protocol (TKIP)",
            'B' => "WPA-2 Enterprise",
            'C' => "WPA-2 Personal",
            'D' => "Wi-Fi Protected Setup (WPS)"
        ],
        'correct' => "B"
    ],
    19 => [
        'question' => "is a way to identify a specific process to which an internet or other network message forwarded when it arrives at a server.",
        'options' => [
            'A' => "IP address",
            'B' => "Ping",
            'C' => "Port number",
            'D' => "Proxy server"
        ],
        'correct' => "C"
    ],
    20 => [
        'question' => "An automated software program that executes certain commands when it receives a specific input is .",
        'options' => [
            'A' => "Bot",
            'B' => "Malicious code",
            'C' => "Spyware",
            'D' => "Threat"
        ],
        'correct' => "A"
    ],
    21 => [
        'question' => "enables administrators to configure storage thresholds on particular sets of data stored on server NTFS volumes.",
        'options' => [
            'A' => "Data Compression",
            'B' => "Extensible File Allocation Table (exFAT)",
            'C' => "FAT-formatted partition",
            'D' => "File System Quota"
        ],
        'correct' => "D"
    ],
    22 => [
        'question' => "What feature in Windows Server provides the ability to migrate workloads between a source and target cluster.",
        'options' => [
            'A' => "Failback",
            'B' => "Failover",
            'C' => "Live Migration",
            'D' => "Shared storage"
        ],
        'correct' => "C"
    ],
    23 => [
        'question' => "What log files that record performance statistics based on the various performance objects and instances available in Performance Monitor?",
        'options' => [
            'A' => "Circular Logging",
            'B' => "Counter logs",
            'C' => "Linear logging",
            'D' => "View Log File Data"
        ],
        'correct' => "B"
    ],
    24 => [
        'question' => "The Recovery Console Command that examines the volume for errors and repairs it.",
        'options' => [
            'A' => "Bootcfg",
            'B' => "Bootrec",
            'C' => "Chkdsk",
            'D' => "Mbr"
        ],
        'correct' => "C"
    ],
    25 => [
        'question' => "The computer system is functional if it is in .",
        'options' => [
            'A' => "Auto shut off",
            'B' => "Change option",
            'C' => "Good option",
            'D' => "Normal booting"
        ],
        'correct' => "D"
    ],
    26 => [
        'question' => "What Windows update that downloads and installs latest versions?",
        'options' => [
            'A' => "Check update",
            'B' => "Full updates",
            'C' => "Fully automatic",
            'D' => "Normal booting"
        ],
        'correct' => "A"
    ],
    27 => [
        'question' => "What is the physically damaged cluster of storage on the hard drive?",
        'options' => [
            'A' => "Bad sector",
            'B' => "GUID Partition Table",
            'C' => "Master Boot Record (MBR)",
            'D' => "Volume"
        ],
        'correct' => "A"
    ],
    28 => [
        'question' => "It occurs when two or more devices connected with the same IP address in a computer network.",
        'options' => [
            'A' => "Dynamic IP address conflict",
            'B' => "IP address conflict",
            'C' => "Private IP address error",
            'D' => "Static IP address error"
        ],
        'correct' => "B"
    ],
    29 => [
        'question' => "What storage device should replace if frequent error messages appear while moving files and booting up operating system?",
        'options' => [
            'A' => "Flash drive",
            'B' => "Hard disk",
            'C' => "Optical drive",
            'D' => "Random Access Memory"
        ],
        'correct' => "B"
    ],
    30 => [
        'question' => "What Recovery Console Commands that writes a new master boot record on the hard disk drive?",
        'options' => [
            'A' => "bmrul",
            'B' => "bootrec",
            'C' => "chkdsk",
            'D' => "fixmbr"
        ],
        'correct' => "B"
    ]
];

// Handle previous question request
if (isset($_GET['prev'])) {
    if ($_SESSION['current_question'] > 0) {
        $_SESSION['current_question']--;
    }
    header("Location: set-b.php");
    exit;
}

// Handle question navigation
if (isset($_GET['q'])) {
    $q = (int)$_GET['q'];
    if ($q >= 0 && $q < 30) {
        $_SESSION['current_question'] = $q;
    }
    header("Location: set-b.php");
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Store the answer
    $current_index = $_SESSION['current_question'];
    if (isset($_POST['answer'])) {
        $_SESSION['answers'][$current_index] = $_POST['answer'];
    }

    // Move to next question
    if ($current_index < 29) {
        $_SESSION['current_question']++;
    } else {
        header('Location: results.php');
        exit;
    }
}

$current_index = $_SESSION['current_question'];
$current_question = $set_b_questions[$current_index + 1];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set B Quiz | Computer System Servicing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #3b82f6;
            --sidebar: 250px;
            --secondary: #f3f4f6;
        }
        body {
            background-color: var(--secondary);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: grid;
            grid-template-columns: var(--sidebar) 1fr;
            min-height: 100vh;
        }
        .header {
            grid-column: 1/-1;
            background: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 1rem;
        }
        .question-tracker {
            background: white;
            padding: 1rem;
            border-right: 1px solid #e5e7eb;
            height: calc(100vh - 72px);
            position: sticky;
            top: 72px;
            overflow-y: auto;
        }
        .question-number {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .answered .question-number {
            background: var(--primary);
            color: white;
        }
        .current .question-number {
            border: 2px solid var(--primary);
            font-weight: bold;
        }
        .quiz-container {
            max-width: 800px;
            margin: 1rem auto;
            padding: 0 1rem;
        }
        .question-card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-left: 4px solid var(--primary);
        }
        .option-btn {
            transition: all 0.2s ease;
            border: 1px solid #e5e7eb;
        }
        .option-btn:hover {
            background-color: #eff6ff;
            border-color: var(--primary);
        }
        .option-btn.selected {
            background-color: #dbeafe;
            border-color: var(--primary);
        }
    </style>
</head>
<body>
<!-- Header -->
<header class="header">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <a href="quiz.php" class="flex items-center text-gray-700 hover:text-blue-600">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Back to Dashboard</span>
        </a>
        <div class="flex items-center space-x-4">
            <img src="../images/aclc.png" alt="ACLC Logo" class="h-10">
            <span class="font-semibold">Set B Quiz</span>
        </div>
        <div class="flex items-center">
            <span class="text-sm text-gray-600">
                <?= ($current_index + 1) . '/30' ?>
            </span>
        </div>
    </div>
</header>

<!-- Question Tracker Sidebar -->
<aside class="question-tracker">
    <div id="timer" class="text-center text-lg font-bold text-red-600 mt-4">
        Time Remaining: <span id="time">60:00</span>
    </div>
    <br>
    <h3 class="font-bold text-lg mb-4">Question Progress</h3>
    <div class="grid grid-cols-5 gap-2">
        <?php for ($i = 0; $i < 30; $i++): ?>
            <a href="set-b.php?q=<?= $i ?>"
               class="question-item text-center <?= isset($_SESSION['answers'][$i]) ? 'answered' : '' ?> <?= $i == $current_index ? 'current' : '' ?>">
                <span class="question-number"><?= $i + 1 ?></span>
            </a>
        <?php endfor; ?>
    </div>
    <div class="mt-4">
        <form method="POST" action="results.php">
            <button type="submit" class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200">
                Submit Quiz
            </button>
        </form>
    </div>
</aside>

<!-- Main Quiz Content -->
<main class="quiz-container">
    <form method="POST" class="space-y-4">
        <div class="question-card">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">
                Question <?= $current_index + 1 ?>:
                <?= htmlspecialchars($current_question['question']) ?>
            </h2>

            <div class="space-y-3 mt-4">
                <?php foreach ($current_question['options'] as $key => $option): ?>
                    <button type="button" onclick="selectOption(this)"
                            class="option-btn w-full text-left p-4 rounded-lg flex items-center hover:bg-blue-50 transition-colors duration-200 <?= (isset($_SESSION['answers'][$current_index]) && $_SESSION['answers'][$current_index] == $key) ? 'bg-blue-100 border-blue-300' : 'bg-white' ?>"
                            data-value="<?= $key ?>">
                        <span class="font-bold mr-3 text-gray-700"><?= $key ?>.</span>
                        <span class="text-gray-800"><?= htmlspecialchars($option) ?></span>
                        <input type="radio" name="answer" value="<?= $key ?>"
                               class="hidden" <?= (isset($_SESSION['answers'][$current_index]) && $_SESSION['answers'][$current_index] == $key) ? 'checked' : '' ?>>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="flex justify-between mt-8">
            <!-- Previous Button -->
            <?php if ($current_index > 0): ?>
                <a href="set-b.php?prev=1"
                   class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg transition-colors duration-200 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Previous
                </a>
            <?php else: ?>
                <div></div> <!-- Spacer -->
            <?php endif; ?>

            <!-- Next/Submit Button -->
            <button type="submit"
                    class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200 flex items-center">
                <?= $current_index < 29 ? 'Next Question' : 'Submit Quiz' ?>
                <i class="fas fa-arrow-right ml-2"></i>
            </button>
        </div>
    </form>
</main>

<!-- Progress Bar -->
<div class="fixed bottom-0 left-0 right-0 bg-white py-2 px-4 shadow-top">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between">
            <span class="text-sm text-gray-600">
                Progress: <?= ($current_index + 1) ?> of 30 questions
            </span>
            <div class="w-full md:w-64 bg-gray-200 rounded-full h-2.5">
                <div class="bg-blue-600 h-2.5 rounded-full"
                     style="width: <?= (($current_index + 1) / 30) * 100 ?>%"></div>
            </div>
        </div>
    </div>
</div>

<script>
    // Timer logic
    let timeLeft = 3600; // 60 minutes in seconds
    const timerDisplay = document.getElementById('time');
    const timer = setInterval(() => {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        timerDisplay.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

        if (timeLeft <= 0) {
            clearInterval(timer);
            alert("Time is up! Submitting your quiz.");
            document.querySelector('form').submit(); // Automatically submit the form
        }
        timeLeft--;
    }, 1000);
    // Handle option selection and deselection
    function selectOption(button) {
        // Existing option selection logic...
    }
    document.addEventListener('DOMContentLoaded', function() {
        // Existing DOMContentLoaded logic...
    });
</script>

<script>
    // Handle option selection and deselection
    function selectOption(button) {
        const input = button.querySelector('input[type="radio"]');
        const optionsContainer = button.closest('.space-y-3');

        // If already selected, deselect it
        if (input.checked) {
            input.checked = false;
            button.classList.remove('bg-blue-100', 'border-blue-300');
            button.classList.add('bg-white', 'border-gray-200');
            return;
        }

        // Remove selection from all options first
        optionsContainer.querySelectorAll('.option-btn').forEach(opt => {
            opt.classList.remove('bg-blue-100', 'border-blue-300');
            opt.classList.add('bg-white', 'border-gray-200');
            opt.querySelector('input[type="radio"]').checked = false;
        });

        // Select the clicked option
        input.checked = true;
        button.classList.add('bg-blue-100', 'border-blue-300');
        button.classList.remove('bg-white', 'border-gray-200');
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Scroll current question into view in sidebar
        const currentQuestion = document.querySelector('.current');
        if (currentQuestion) {
            currentQuestion.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }

        // Confirmation on submit
        const submitButton = document.querySelector('button[type="submit"]');
        if (submitButton && <?= $current_index ?> >= 29) {
            submitButton.addEventListener('click', function(e) {
                if (!confirm('Are you sure you want to submit your quiz?')) {
                    e.preventDefault();
                }
            });
        }
    });
</script>
</body>
</html>
