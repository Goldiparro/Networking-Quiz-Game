<?php
session_start();
include '../config/database.php';

// Define all question sets with original order
$questions = [
    'a' => [
        1 => ['correct' => "B", 'question' => "What is the common color for the USB 3.0 connector for Standard A receptacles and plugs?"],
        2 => ['correct' => "B", 'question' => "What type of memory used in the Solid State Drive (SSD) as a storage?"],
        3 => ['correct' => "C", 'question' => "It is originally, where the BIOS stored in a standard PC."],
        4 => ['correct' => "B", 'question' => "is a complete copy of everything stored on a physical optical disc."],
        5 => ['correct' => "A", 'question' => "What is the minimum requirement for hard disk drive capacity in Windows 10?"],
        6 => ['correct' => "D", 'question' => "Where do Windows device drivers store?"],
        7 => ['correct' => "B", 'question' => "What is the volt rating of the RED wire in a power supply?"],
        8 => ['correct' => "A", 'question' => "is a network cable where one end is T568-A while the other is T568-B configuration."],
        9 => ['correct' => "C", 'question' => "In Windows 7, when LAN connection has a cross and red indicator signifies that there is ."],
        10 => ['correct' => "C", 'question' => "Which of the following hardware components can connect over a computer network?"],
        11 => ['correct' => "C", 'question' => "It is a networking device that forwards data packets between computer networks."],
        12 => ['correct' => "B", 'question' => "Wi-Fi is a trademarked phrase, which means ."],
        13 => ['correct' => "B", 'question' => "is a collection of devices connected together in one physical location."],
        14 => ['correct' => "D", 'question' => "A type of network that interconnects multiple local area network."],
        15 => ['correct' => "C", 'question' => "Which of the following hardware components can connect over a computer network?"],
        16 => ['correct' => "C", 'question' => "is a two or more PCs are connected and share resources without going through a separate server computer."],
        17 => ['correct' => "C", 'question' => "What IP address used by the virtual machine to communicate over the physical network?"],
        18 => ['correct' => "D", 'question' => "What type of version that protects unauthorized network access by utilizing a set-up password?"],
        19 => ['correct' => "C", 'question' => "consists of the user matrices, and capability tables that govern the rights and privileges of users."],
        20 => ['correct' => "A", 'question' => "It occurs when an attacker or trusted insider steals data from a computer system and demands compensation for its return."],
        21 => ['correct' => "A", 'question' => "It monitors the initial security accreditation of an information system for tracking of changes."],
        22 => ['correct' => "C", 'question' => "What services in Windows Server that enables administrators to migrate data to a lower-cost and tape media in file servers?"],
        23 => ['correct' => "B", 'question' => "What application group that contains a Client Access Point and with at least one application specific resource?"],
        24 => ['correct' => "C", 'question' => "A utility tool that test whether a particular host is reachable across an IP network."],
        25 => ['correct' => "C", 'question' => "Which of the following keys is not appropriate to enter BIOS setup?"],
        26 => ['correct' => "C", 'question' => "What enables users of Windows that corrects any problems preventing from booting up normally?"],
        27 => ['correct' => "B", 'question' => "What Starts up recovery options in a computer that essentially boot into the RECOVERY partition of the main hard drive?"],
        28 => ['correct' => "C", 'question' => "A single physical hard drive can divide into multiple hard drives."],
        29 => ['correct' => "B", 'question' => "What are the two types of interface used to communicate between the hard drive and the computer motherboard?"],
        30 => ['correct' => "D", 'question' => "What is the spider-like interconnection in millions of places of information located on computers around the cyber space?"]
    ],
    'b' => [
        // Set B questions in original order
        1 => ['correct' => "D", 'question' => "A compound used to prevent overheating of CPU."],
        2 => ['correct' => "C", 'question' => "What is the minimum cable length for USB 2.0?"],
        // ... all 30 Set B questions ...
        30 => ['correct' => "B", 'question' => "What Recovery Console Commands that writes a new master boot record on the hard disk drive?"]
    ],
    'c' => [
        // Set C questions in original order
        1 => ['correct' => "C", 'question' => "What is the maximum cable length for USB 3.0 using a non-twisted pair wire?"],
        2 => ['correct' => "D", 'question' => "M.2 is a form factor for ."],
        // ... all 30 Set C questions ...
        30 => ['correct' => "A", 'question' => "A process of scanning, identifying, diagnosing and resolving problems, errors and bugs in software."]
    ]
];

// Get current set from session
$current_set = isset($_SESSION['current_set']) ? $_SESSION['current_set'] : null;
if(!$current_set || !isset($questions[$current_set])) {
    header('Location: quiz.php');
    exit;
}

// Calculate score by matching randomized answers to original questions
$score = 0;
$total_questions = 30;

// Check if we have the randomized question order in session
if(isset($_SESSION['question_order']) && isset($_SESSION['answers'])) {
    foreach($_SESSION['question_order'] as $index => $original_q_num) {
        $user_answer = isset($_SESSION['answers'][$index]) ? $_SESSION['answers'][$index] : null;
        if(isset($questions[$current_set][$original_q_num]) &&
            $user_answer === $questions[$current_set][$original_q_num]['correct']) {
            $score++;
        }
    }
}

// Determine result message and color
$percentage = round(($score / $total_questions) * 100);
if($percentage >= 90) {
    $message = "Excellent! You have mastered this topic!";
    $color = "text-green-600";
} elseif($percentage >= 75) {
    $message = "Good job! You have a strong understanding.";
    $color = "text-blue-600";
} elseif($percentage >= 50) {
    $message = "Not bad! Review your mistakes to improve.";
    $color = "text-yellow-600";
} else {
    $message = "Keep practicing! Review the material and try again.";
    $color = "text-red-600";
}

// Clear quiz session data
unset($_SESSION['answers']);
unset($_SESSION['current_question']);
unset($_SESSION['question_order']);
unset($_SESSION['questions']);
unset($_SESSION['current_set']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results | Computer System Servicing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .result-container {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .result-card {
            animation: fadeIn 0.3s ease-out forwards;
            opacity: 0;
        }
        @keyframes fadeIn {
            to { opacity: 1; }
        }
    </style>
</head>
<body>
<div class="result-container">
    <div class="result-card bg-white rounded-xl shadow-2xl p-8 max-w-md w-full mx-4 text-center">
        <h1 class="text-2xl font-bold mb-4">Quiz Results</h1>
        <div class="text-5xl font-bold mb-2 <?= $color ?>">
            <?= $score ?>/<?= $total_questions ?>
        </div>
        <div class="text-xl <?= $color ?> mb-6">
            <?= $message ?>
        </div>

        <!-- Progress circle -->
        <div class="relative w-40 h-40 mx-auto mb-6">
            <svg class="w-full h-full" viewBox="0 0 36 36">
                <path
                        d="M18 2.0845
                        a 15.9155 15.9155 0 0 1 0 31.831
                        a 15.9155 15.9155 0 0 1 0 -31.831"
                        fill="none"
                        stroke="#e5e7eb"
                        stroke-width="3"
                />
                <path
                        d="M18 2.0845
                        a 15.9155 15.9155 0 0 1 0 31.831
                        a 15.9155 15.9155 0 0 1 0 -31.831"
                        fill="none"
                        stroke="<?= $percentage >= 50 ? '#10b981' : '#ef4444' ?>"
                        stroke-width="3"
                        stroke-dasharray="<?= $percentage ?>, 100"
                />
                <text x="18" y="20.5" text-anchor="middle" font-size="8"
                      fill="<?= $percentage >= 50 ? '#10b981' : '#ef4444' ?>"
                      font-weight="bold" class="text-[8px]"><?= $percentage ?>%</text>
            </svg>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="bg-gray-100 p-3 rounded-lg">
                <div class="text-sm text-gray-600">Correct</div>
                <div class="text-lg font-bold text-green-600"><?= $score ?></div>
            </div>
            <div class="bg-gray-100 p-3 rounded-lg">
                <div class="text-sm text-gray-600">Incorrect</div>
                <div class="text-lg font-bold text-red-600"><?= $total_questions - $score ?></div>
            </div>
        </div>

        <div class="space-x-3">
            <a href="quiz.php"
               class="inline-block px-5 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg transition-colors">
                <i class="fas fa-home mr-2"></i> Quiz Menu
            </a>
            <a href="set_<?= $current_set ?>.php"
               class="inline-block px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                <i class="fas fa-redo mr-2"></i> Try Again
            </a>
        </div>
    </div>
</div>

<script>
    // Prevent going back to quiz
    history.pushState(null, null, location.href);
    window.onpopstate = function() {
        history.go(1);
    };
</script>
</body>
</html>
