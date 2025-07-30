<?php
session_start();
$_SESSION['current_set'] = 'a';
include '../config/database.php';

// Set default timezone
date_default_timezone_set('Asia/Manila');

// Initialize quiz session with randomized questions
if (!isset($_SESSION['quiz_started'])) {
    $_SESSION['quiz_started'] = true;
    $_SESSION['current_question'] = 0;
    $_SESSION['answers'] = array_fill(0, 30, null);

    // Define complete Set A questions
    $set_a_questions = [
        1 => [
            'question' => "What is the common color for the USB 3.0 connector for Standard A receptacles and plugs?",
            'options' => [
                'A' => "Black",
                'B' => "Blue",
                'C' => "Red",
                'D' => "White"
            ],
            'correct' => "B"
        ],
        2 => [
            'question' => "What type of memory used in the Solid State Drive (SSD) as a storage?",
            'options' => [
                'A' => "Dynamic Random Access Memory (DRAM)",
                'B' => "Flash Memory",
                'C' => "Read Only Memory (ROM)",
                'D' => "Static Random Access Memory (SRAM)"
            ],
            'correct' => "B"
        ],
        3 => [
            'question' => "It is originally, where the BIOS stored in a standard PC.",
            'options' => [
                'A' => "Hard Disk Drive (HDD)",
                'B' => "Random Access Memory (RAM)",
                'C' => "Read Only Memory (ROM)",
                'D' => "Solid State Drive (SSD)"
            ],
            'correct' => "C"
        ],
        4 => [
            'question' => "is a complete copy of everything stored on a physical optical disc.",
            'options' => [
                'A' => "Backup file",
                'B' => "ISO image",
                'C' => "Memory map",
                'D' => "Stored file"
            ],
            'correct' => "B"
        ],
        5 => [
            'question' => "What is the minimum requirement for hard disk drive capacity in Windows 10?",
            'options' => [
                'A' => "16 GB for 32-bit OS or 20 GB for 64-bit OS",
                'B' => "20 GB for 32-bit OS or 30 GB for 64-bit OS",
                'C' => "20 GB for 32-bit OS or 40 GB for 64-bit OS",
                'D' => "30 GB for 32-bit OS or 40 GB for 64-bit OS"
            ],
            'correct' => "A"
        ],
        6 => [
            'question' => "Where do Windows device drivers store?",
            'options' => [
                'A' => "Computer",
                'B' => "Drivers and Settings",
                'C' => "Hardware",
                'D' => "Registry"
            ],
            'correct' => "D"
        ],
        7 => [
            'question' => "What is the volt rating of the RED wire in a power supply?",
            'options' => [
                'A' => "-5V",
                'B' => "+5V",
                'C' => "-12V",
                'D' => "+12V"
            ],
            'correct' => "B"
        ],
        8 => [
            'question' => "is a network cable where one end is T568-A while the other is T568-B configuration.",
            'options' => [
                'A' => "Cross-Over",
                'B' => "Extreme",
                'C' => "Roll-Over",
                'D' => "Straight-Thru"
            ],
            'correct' => "A"
        ],
        9 => [
            'question' => "In Windows 7, when LAN connection has a cross and red indicator signifies that there is .",
            'options' => [
                'A' => "emergency the need attention",
                'B' => "LAN update",
                'C' => "problem with the LAN driver",
                'D' => "virus in the LAN"
            ],
            'correct' => "C"
        ],
        10 => [
            'question' => "Which of the following hardware components can connect over a computer network?",
            'options' => [
                'A' => "Network Driver",
                'B' => "Network Hardware Card",
                'C' => "Network Interface Card",
                'D' => "Network Module Card"
            ],
            'correct' => "C"
        ],
        11 => [
            'question' => "It is a networking device that forwards data packets between computer networks.",
            'options' => [
                'A' => "Hub",
                'B' => "Patch Panel",
                'C' => "Router",
                'D' => "Wireless Access Point (WAP)"
            ],
            'correct' => "C"
        ],
        12 => [
            'question' => "Wi-Fi is a trademarked phrase, which means .",
            'options' => [
                'A' => "IEEE 801.11",
                'B' => "IEEE 802.11",
                'C' => "IEEE 803.11",
                'D' => "IEEE 803.11"
            ],
            'correct' => "B"
        ],
        13 => [
            'question' => "is a collection of devices connected together in one physical location.",
            'options' => [
                'A' => "Campus Area Network (CAN)",
                'B' => "Local Area Network (LAN)",
                'C' => "Metropolitan Area Network (MAN)",
                'D' => "Wide Area Network (WAN)"
            ],
            'correct' => "B"
        ],
        14 => [
            'question' => "A type of network that interconnects multiple local area network.",
            'options' => [
                'A' => "Campus Area Network (CAN)",
                'B' => "Local Area Network (LAN)",
                'C' => "Metropolitan Area Network (MAN)",
                'D' => "Wide Area Network (WAN)"
            ],
            'correct' => "D"
        ],
        15 => [
            'question' => "Which of the following hardware components can connect over a computer network?",
            'options' => [
                'A' => "Network Driver",
                'B' => "Network Hardware Card",
                'C' => "Network Interface Card",
                'D' => "Network Module Card"
            ],
            'correct' => "C"
        ],
        16 => [
            'question' => "is a two or more PCs are connected and share resources without going through a separate server computer.",
            'options' => [
                'A' => "Client Server",
                'B' => "Local Area Network",
                'C' => "Peer to peer network",
                'D' => "Personal Area Network"
            ],
            'correct' => "C"
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
            'question' => "What type of version that protects unauthorized network access by utilizing a set-up password?",
            'options' => [
                'A' => "Temporal Key Integrity Protocol (TKIP)",
                'B' => "Wi-Fi Protected Access (WPS)",
                'C' => "WPA-2 Enterprise",
                'D' => "WPA-2 Personal"
            ],
            'correct' => "D"
        ],
        19 => [
            'question' => "consists of the user matrices, and capability tables that govern the rights and privileges of users.",
            'options' => [
                'A' => "Temporal Key Integrity Protocol (TKIP)",
                'B' => "Wi-Fi Protected Access (WPS)",
                'C' => "WPA-2 Enterprise",
                'D' => "WPA-2 Personal"
            ],
            'correct' => "C"
        ],
        20 => [
            'question' => "It occurs when an attacker or trusted insider steals data from a computer system and demands compensation for its return.",
            'options' => [
                'A' => "Information Extortion",
                'B' => "Malicious code",
                'C' => "Theft",
                'D' => "The threat"
            ],
            'correct' => "A"
        ],
        21 => [
            'question' => "It monitors the initial security accreditation of an information system for tracking of changes.",
            'options' => [
                'A' => "Configuration Management",
                'B' => "Continuous Assessment",
                'C' => "Measurement Metrics",
                'D' => "Network Monitoring"
            ],
            'correct' => "A"
        ],
        22 => [
            'question' => "What services in Windows Server that enables administrators to migrate data to a lower-cost and tape media in file servers?",
            'options' => [
                'A' => "Data Compression Service",
                'B' => "File Screening Service",
                'C' => "Remote Storage Service",
                'D' => "Volume Shadow Copy Service"
            ],
            'correct' => "C"
        ],
        23 => [
            'question' => "What application group that contains a Client Access Point and with at least one application specific resource?",
            'options' => [
                'A' => "Active node",
                'B' => "Cluster",
                'C' => "Cluster resource",
                'D' => "Virtual cluster server"
            ],
            'correct' => "B"
        ],
        24 => [
            'question' => "A utility tool that test whether a particular host is reachable across an IP network.",
            'options' => [
                'A' => "Dxdiag",
                'B' => "Netstat",
                'C' => "Ping",
                'D' => "Tracer"
            ],
            'correct' => "C"
        ],
        25 => [
            'question' => "Which of the following keys is not appropriate to enter BIOS setup?",
            'options' => [
                'A' => "F1",
                'B' => "F2",
                'C' => "F5",
                'D' => "F10"
            ],
            'correct' => "C"
        ],
        26 => [
            'question' => "What enables users of Windows that corrects any problems preventing from booting up normally?",
            'options' => [
                'A' => "Disk cleanup",
                'B' => "IPconfig",
                'C' => "Safe mode",
                'D' => "Task manager"
            ],
            'correct' => "C"
        ],
        27 => [
            'question'=> "What Starts up recovery options in a computer that essentially boot into the RECOVERY partition of the main hard drive?",
            'options' => [
                'A' => "Command Prompt",
                'B' => "Repair Computer",
                'C' => "Safe mode",
                'D' => "System Restore"
            ],
            'correct' => "B"
        ],
        28 => [
            'question' => "A single physical hard drive can divide into multiple hard drives.",
            'options' => [
                'A' => "Boot",
                'B' => "Local",
                'C' => "Logical",
                'D' => "Single"
            ],
            'correct' => "C"
        ],
        29 => [
            'question' => "What are the two types of interface used to communicate between the hard drive and the computer motherboard?",
            'options' => [
                'A' => "Advanced Technology Attachment (ATA) and Parallel Advanced Technology Attachment (PATA)",
                'B' => "Advanced Technology Attachment (ATA) and Serial Advanced Technology Attachment (SATA)",
                'C' => "Industry Standard Architecture (ISA) and Advanced Technology Attachment (ATA)",
                'D' => "Parallel Advanced Technology Attachment (PATA) and Industry Standard Architecture (ISA)"
            ],
            'correct' => "B"
        ],
        30 => [
            'question' => "What is the spider-like interconnection in millions of places of information located on computers around the cyber space?",
            'options' => [
                'A' => "Browser",
                'B' => "E-commerce",
                'C' => "Internet of Things (IOT)",
                'D' => "World wide web"
            ],
            'correct' => "D"
        ]
    ];

    // Create randomized question order
    $question_order = array_keys($set_a_questions);
    shuffle($question_order);
    $_SESSION['question_order'] = $question_order;
    $_SESSION['questions'] = $set_a_questions;
}

// Handle previous question request
if (isset($_GET['prev'])) {
    if ($_SESSION['current_question'] > 0) {
        $_SESSION['current_question']--;
    }
    header("Location: set-a.php");
    exit;
}

// Handle question navigation
if (isset($_GET['q'])) {
    $q = (int)$_GET['q'];
    if ($q >= 0 && $q < 30) {
        $_SESSION['current_question'] = $q;
    }
    header("Location: set-a.php");
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Store the answer
    $current_index = $_SESSION['current_question'];
    if (isset($_POST['answer'])) {
        $_SESSION['answers'][$current_index] = $_POST['answer'];
    } else {
        // Clear the answer if deselected
        $_SESSION['answers'][$current_index] = null;
    }

    // Move to next question
    if ($current_index < 29) {
        $_SESSION['current_question']++;
    } else {
        header('Location: results.php');
        exit;
    }
}

// Check if question order and questions are set
if (!isset($_SESSION['question_order']) || !isset($_SESSION['questions'])) {
    // Redirect to the start of the quiz if not set
    header("Location: set-a.php");
    exit;
}

$current_index = $_SESSION['current_question'];
$current_question_id = $_SESSION['question_order'][$current_index];
$current_question = $_SESSION['questions'][$current_question_id];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set A Quiz | Computer System Servicing</title>
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
            <span class="font-semibold">Set A Quiz</span>
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
        <?php
        $question_order = $_SESSION['question_order'];
        for ($i = 0; $i < 30; $i++):
        $question_num = $question_order[$i];
        $is_answered = isset($_SESSION['answers'][$i]);
        $is_current = ($i == $_SESSION['current_question']);
        ?>
            <a href="set-a.php?q=<?= $i ?>"
               class="question-item text-center <?= $is_answered ? 'answered' : '' ?> <?= $is_current ? 'current' : '' ?>"
               data-question-id="<?= $question_num ?>">
                <span class="question-number"><?= $i + 1 ?></span>
            </a>
        <?php endfor; ?>
    </div>

    <!-- Submit Button -->
    <div class="mt-4">
        <form method="POST" action="results.php" onsubmit="return confirm('Are you sure you want to submit your quiz?');">
            <button type="submit" class="w-full px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors duration-200 flex items-center">
                <i class="fas fa-paper-plane mr-2"></i>
                Submit Quiz
            </button>
        </form>
    </div>
</aside>

<!-- Main Quiz Content -->
<main class="quiz-container">
    <form method="POST" class="space-y-4">
        <div class="question-card">
            <div class="flex justify-between items-center mb-4">
                <span class="text-sm font-medium text-gray-500">
                    Question <?= $current_index + 1 ?> of 30
                </span>
                <div class="w-24 bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: <?= (($current_index + 1) / 30) * 100 ?>%"></div>
                </div>
            </div>

            <h2 class="text-xl font-semibold text-gray-800 mb-4">
                <?= htmlspecialchars($current_question['question']) ?>
            </h2>

            <div class="space-y-3">
                <?php foreach ($current_question['options'] as $key => $option):
                    $is_selected = (isset($_SESSION['answers'][$current_index]) && $_SESSION['answers'][$current_index] === $key);
                    ?>
                    <button type="button"
                            onclick="selectOption(this)"
                            class="option-btn w-full text-left p-4 rounded-lg flex items-center transition-colors duration-200 <?= $is_selected ? 'bg-blue-100 border-blue-300' : 'bg-white border-gray-200' ?> hover:bg-blue-50"
                            data-option="<?= $key ?>">
                        <span class="font-bold mr-3 text-gray-700"><?= $key ?>.</span>
                        <span class="text-gray-800"><?= htmlspecialchars($option) ?></span>
                        <input type="radio"
                               name="answer"
                               value="<?= $key ?>"
                               class="hidden"
                            <?= $is_selected ? 'checked' : '' ?>>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex justify-between mt-8">
            <?php if ($current_index > 0): ?>
                <a href="set-a.php?prev=1"
                   class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg transition-colors duration-200 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Previous
                </a>
            <?php else: ?>
                <div></div> <!-- Spacer -->
            <?php endif; ?>

            <button type="submit"
                    class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200 flex items-center">
                <?= ($current_index < 29) ? 'Next Question' : 'Submit Quiz' ?>
                <i class="fas fa-arrow-right ml-2"></i>
            </button>
        </div>
    </form>
</main>

<!-- Floating Progress Bar -->
<div class="fixed bottom-0 left-0 right-0 bg-white shadow-lg">
    <div class="container mx-auto px-4 py-2">
        <div class="flex items-center justify-between">
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-blue-600 h-2 rounded-full"
                     style="width: <?= (($current_index + 1) / 30) * 100 ?>%"></div>
            </div>
            <span class="ml-4 text-sm text-gray-600">
                <?= $current_index + 1 ?> / 30
            </span>
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
