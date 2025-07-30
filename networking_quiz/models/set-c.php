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

// Define complete Set C questions
$set_c_questions = [
    1 => [
        'question' => "What is the maximum cable length for USB 3.0 using a non-twisted pair wire?",
        'options' => [
            'A' => "3 meters",
            'B' => "4 meters",
            'C' => "5 meters",
            'D' => "10 meters"
        ],
        'correct' => "C"
    ],
    2 => [
        'question' => "M.2 is a form factor for .",
        'options' => [
            'A' => "Memory",
            'B' => "Motherboard",
            'C' => "Power supply",
            'D' => "Storage drive"
        ],
        'correct' => "D"
    ],
    3 => [
        'question' => "What kind of chip stores the settings in the BIOS?",
        'options' => [
            'A' => "Advanced Technology eXtended (ATX) Chip",
            'B' => "Basic Input Output System Random Access Memory (BIOS RAM) chip",
            'C' => "Complementary Metal Oxide Semiconductor Read Only Memory (CMOS ROM) chip",
            'D' => "Real Time Clock/Non Volatile Random Access Memory (RTC/NVRAM) chip"
        ],
        'correct' => "C"
    ],
    4 => [
        'question' => "It is used as a substitute for actual disc, allowing users to run software without having to load a CD or DVD.",
        'options' => [
            'A' => "Bootsys file",
            'B' => "Cmd file",
            'C' => "Hyberfill file",
            'D' => "ISO file"
        ],
        'correct' => "D"
    ],
    5 => [
        'question' => "What Windows edition has a program capable of restricting other users to access certain programs in a computer?",
        'options' => [
            'A' => "Windows Extreme",
            'B' => "Windows Basic",
            'C' => "Windows Professional",
            'D' => "Windows Ultimate"
        ],
        'correct' => "C"
    ],
    6 => [
        'question' => "In what folder that the device driver can be found?",
        'options' => [
            'A' => "drv",
            'B' => "Program files",
            'C' => "Registry",
            'D' => "System32"
        ],
        'correct' => "D"
    ],
    7 => [
        'question' => "An ideal voltage range on the hotwires of a Molex connector?",
        'options' => [
            'A' => "Red = 3.3V, Yellow = 5V",
            'B' => "Red = 5V, Yellow = 3.3V",
            'C' => "Red = 5V, Yellow = 12V",
            'D' => "Red = 12V, Yellow = 5V"
        ],
        'correct' => "C"
    ],
    8 => [
        'question' => "What Ethernet cable used to connect computers to hubs & switches?",
        'options' => [
            'A' => "Cross-Over",
            'B' => "Extreme",
            'C' => "Roll-Over",
            'D' => "Straight-Thru"
        ],
        'correct' => "D"
    ],
    9 => [
        'question' => "A network interface controller also known as .",
        'options' => [
            'A' => "Hub",
            'B' => "LAN Card",
            'C' => "Switch",
            'D' => "WAP"
        ],
        'correct' => "B"
    ],
    10 => [
        'question' => "What Class of IP address is 192.168.0.1?",
        'options' => [
            'A' => "Class A",
            'B' => "Class B",
            'C' => "Class C",
            'D' => "Class D"
        ],
        'correct' => "C"
    ],
    11 => [
        'question' => "A router that is designed to operate in the internet backbone?",
        'options' => [
            'A' => "Bridge",
            'B' => "Core",
            'C' => "Edge",
            'D' => "Network"
        ],
        'correct' => "B"
    ],
    12 => [
        'question' => "allows to define a list of devices and only allow those devices on Wi-Fi network.",
        'options' => [
            'A' => "MAC Address Filtering",
            'B' => "Service Set Identifier",
            'C' => "Wired Equivalent Privacy",
            'D' => "Wireless Security"
        ],
        'correct' => "A"
    ],
    13 => [
        'question' => "What type of network that connects through signals, e.g. infrared?",
        'options' => [
            'A' => "Campus Area Network",
            'B' => "Local Area Network",
            'C' => "Wireless Personal Area Network",
            'D' => "Wide Area Network"
        ],
        'correct' => "C"
    ],
    14 => [
        'question' => "allows users to move around the coverage area in a line of sight while maintaining a network connection.",
        'options' => [
            'A' => "Campus Area Network",
            'B' => "Local Area Network",
            'C' => "Wide Area Network",
            'D' => "Wireless Local Area Network"
        ],
        'correct' => "D"
    ],
    15 => [
        'question' => "is an enterprise-level heterogeneous backup and recovery suite.",
        'options' => [
            'A' => "NetBackup",
            'B' => "Net Copy",
            'C' => "NetFile",
            'D' => "NetSave"
        ],
        'correct' => "A"
    ],
    16 => [
        'question' => "A type of server that allows the central administration and management of network users and network resources.",
        'options' => [
            'A' => "Application software",
            'B' => "Database server",
            'C' => "Directory server",
            'D' => "File server"
        ],
        'correct' => "C"
    ],
    17 => [
        'question' => "is an information asset, suffering damage, unintended modification or disclosure.",
        'options' => [
            'A' => "Attack",
            'B' => "Exploit",
            'C' => "Exposure",
            'D' => "Loss"
        ],
        'correct' => "D"
    ],
    18 => [
        'question' => "The network security standard that tries to make connections between a router and wireless devices faster and easier.",
        'options' => [
            'A' => "TKIP",
            'B' => "WPS",
            'C' => "WPA-2 Enterprise",
            'D' => "WPA-2 Personal"
        ],
        'correct' => "B"
    ],
    19 => [
        'question' => "Which of the following is the most efficient in transferring larger files?",
        'options' => [
            'A' => "Control Protocol",
            'B' => "File Transfer Protocol",
            'C' => "Hypertext Transfer Protocol",
            'D' => "Network Time Protocol (NTP)"
        ],
        'correct' => "B"
    ],
    20 => [
        'question' => "What technique used to gain unauthorized access to computers, wherein the intruder sends messages with a source IP address?",
        'options' => [
            'A' => "Sniffers",
            'B' => "Spam",
            'C' => "Spooling",
            'D' => "Spyware"
        ],
        'correct' => "A"
    ],
    21 => [
        'question' => "It enables administrators to define the types of file that can save within a Windows volume and folder.",
        'options' => [
            'A' => "File Classification Infrastructure",
            'B' => "File Compression",
            'C' => "File Encryption",
            'D' => "File Screening"
        ],
        'correct' => "A"
    ],
    22 => [
        'question' => "What second clustering technology provides by corresponding client requests across several servers with replicated configurations?",
        'options' => [
            'A' => "Cluster quorum",
            'B' => "Hyper-V virtualization",
            'C' => "Network Load Balancing",
            'D' => "Quick Migration"
        ],
        'correct' => "C"
    ],
    23 => [
        'question' => "What log files that conserves disk space by ensuring that the performance log file will not continue growing over certain limits.",
        'options' => [
            'A' => "Circular Logging",
            'B' => "Counter Logs",
            'C' => "Linear Logging",
            'D' => "View Log File Data"
        ],
        'correct' => "A"
    ],
    24 => [
        'question' => "A should be upgraded to receive and transmit strong signals to and from other computer.",
        'options' => [
            'A' => "Video card",
            'B' => "Memory card",
            'C' => "Network card",
            'D' => "Sim card"
        ],
        'correct' => "C"
    ],
    25 => [
        'question' => "A protocol that provides quick, automatic, and central management for the distribution of IP addresses within a network.",
        'options' => [
            'A' => "Domain Name System (DNS)",
            'B' => "Dynamic Host Control Protocol (DHCP)",
            'C' => "Simple Mail Transfer Protocol (SMTP)",
            'D' => "Transmission Control Protocol (TCP)"
        ],
        'correct' => "B"
    ],
    26 => [
        'question' => "What command-line tool used to find the IP address that corresponds to a host or domain name?",
        'options' => [
            'A' => "Ms dos",
            'B' => "Nslookup",
            'C' => "ping",
            'D' => "tracert"
        ],
        'correct' => "B"
    ],
    27 => [
        'question' => "What is the problem of a computer if the time and date keeps on resetting even after fixing in the BIOS?",
        'options' => [
            'A' => "CMOS battery failure",
            'B' => "CPU overheating",
            'C' => "Disk Management",
            'D' => "Scandisk"
        ],
        'correct' => "A"
    ],
    28 => [
        'question' => "A tools used for checking the condition of the hard drive with signs like “Good”, “Caution” or “Bad”",
        'options' => [
            'A' => "CyrstalDiskInfo",
            'B' => "Defragmented",
            'C' => "Disk Management",
            'D' => "Scandisk"
        ],
        'correct' => "A"
    ],
    29 => [
        'question' => "A task to do after planning to fix the network is .",
        'options' => [
            'A' => "Implementing the agreement",
            'B' => "Implementing the idea",
            'C' => "Implementing the result",
            'D' => "Implementing the solution"
        ],
        'correct' => "D"
    ],
    30 => [
        'question' => "A process of scanning, identifying, diagnosing and resolving problems, errors and bugs in software.",
        'options' => [
            'A' => "Debugging",
            'B' => "Software diagnostic",
            'C' => "Software troubleshooting",
            'D' => "Testing"
        ],
        'correct' => "A"
    ]
];

// Handle previous question request
if (isset($_GET['prev'])) {
    if ($_SESSION['current_question'] > 0) {
        $_SESSION['current_question']--;
    }
    header("Location: set-c.php");
    exit;
}

// Handle question navigation
if (isset($_GET['q'])) {
    $q = (int)$_GET['q'];
    if ($q >= 0 && $q < 30) {
        $_SESSION['current_question'] = $q;
    }
    header("Location: set-c.php");
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
$current_question = $set_c_questions[$current_index + 1];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set C Quiz | Computer System Servicing</title>
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
            <span class="font-semibold">Set C Quiz</span>
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
            <a href="set-c.php?q=<?= $i ?>"
               class="question-item text-center <?= isset($_SESSION['answers'][$i]) ? 'answered' : '' ?> <?= $i == $current_index ? 'current' : '' ?>">
                <span class="question-number"><?= $i + 1 ?></span>
            </a>
        <?php endfor; ?>
    </div>
    <div class="mt-4">
        <form method="POST" action="results.php" onsubmit="return confirm('Are you sure you want to submit your quiz?');">
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
                <?php foreach ($current_question['options'] as $key => $option):
                    $is_selected = (isset($_SESSION['answers'][$current_index]) && $_SESSION['answers'][$current_index] == $key);
                    ?>
                    <button type="button"
                            onclick="selectOption(this)"
                            class="option-btn w-full text-left p-4 rounded-lg flex items-center transition-colors duration-200 <?= $is_selected ? 'bg-blue-100 border-blue-300' : 'bg-white border-gray-200' ?> hover:bg-blue-50"
                            data-option="<?= $key ?>">
                        <span class="font-bold mr-3 text-gray-700"><?= $key ?>.</span>
                        <span class="text-gray-800"><?= htmlspecialchars($option) ?></span>
                        <input type="radio" name="answer" value="<?= $key ?>" class="hidden" <?= $is_selected ? 'checked' : '' ?>>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="flex justify-between mt-8">
            <?php if ($current_index > 0): ?>
                <a href="set-c.php?prev=1" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg transition-colors duration-200 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Previous
                </a>
            <?php else: ?>
                <div></div>
            <?php endif; ?>

            <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200 flex items-center">
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
                <div class="bg-blue-600 h-2.5 rounded-full" style="width: <?= (($current_index + 1) / 30) * 100 ?>%"></div>
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
