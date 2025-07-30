<?php
session_start();
include '../config/database.php';

// Define all question sets with correct answers
$set_a_questions = [
    1 => ['correct' => "B", 'question' => "What is the common color for the USB 3.0 connector for Standard A receptacles and plugs?"],
    2 => ['correct' => "B", 'question' => "What type of memory is used in the Solid State Drive (SSD) as storage?"],
    3 => ['correct' => "C", 'question' => "Where is the BIOS originally stored in a standard PC?"],
    4 => ['correct' => "B", 'question' => "What is a complete copy of everything stored on a physical optical disc?"],
    5 => ['correct' => "A", 'question' => "What is the minimum requirement for hard disk drive capacity in Windows 10?"],
    6 => ['correct' => "D", 'question' => "Where do Windows device drivers store?"],
    7 => ['correct' => "B", 'question' => "What is the volt rating of the RED wire in a power supply?"],
    8 => ['correct' => "A", 'question' => "What is a network cable where one end is T568-A while the other is T568-B configuration?"],
    9 => ['correct' => "C", 'question' => "In Windows 7, what does a cross and red indicator signify for a LAN connection?"],
    10 => ['correct' => "C", 'question' => "Which of the following hardware components can connect over a computer network?"],
    11 => ['correct' => "C", 'question' => "What is a networking device that forwards data packets between computer networks?"],
    12 => ['correct' => "B", 'question' => "What does Wi-Fi mean?"],
    13 => ['correct' => "B", 'question' => "What is a collection of devices connected together in one physical location?"],
    14 => ['correct' => "D", 'question' => "What type of network interconnects multiple local area networks?"],
    15 => ['correct' => "C", 'question' => "Which of the following hardware components can connect over a computer network?"],
    16 => ['correct' => "C", 'question' => "What is it called when two or more PCs are connected and share resources without going through a separate server?"],
    17 => ['correct' => "C", 'question' => "What IP address is used by the virtual machine to communicate over the physical network?"],
    18 => ['correct' => "D", 'question' => "What type of version protects unauthorized network access by utilizing a set-up password?"],
    19 => ['correct' => "C", 'question' => "What consists of user matrices and capability tables that govern the rights and privileges of users?"],
    20 => ['correct' => "A", 'question' => "What occurs when an attacker or trusted insider steals data from a computer system and demands compensation for its return?"],
    21 => ['correct' => "A", 'question' => "What monitors the initial security accreditation of an information system for tracking changes?"],
    22 => ['correct' => "C", 'question' => "What services in Windows Server enable administrators to migrate data to lower-cost tape media in file servers?"],
    23 => ['correct' => "B", 'question' => "What application group contains a Client Access Point and at least one application-specific resource?"],
    24 => ['correct' => "C", 'question' => "What utility tool tests whether a particular host is reachable across an IP network?"],
    25 => ['correct' => "C", 'question' => "Which of the following keys is not appropriate to enter BIOS setup?"],
    26 => ['correct' => "C", 'question' => "What enables users of Windows to correct problems preventing normal booting?"],
    27 => ['correct' => "B", 'question' => "What starts up recovery options in a computer that boots into the RECOVERY partition of the main hard drive?"],
    28 => ['correct' => "C", 'question' => "What can a single physical hard drive divide into?"],
    29 => ['correct' => "B", 'question' => "What are the two types of interfaces used to communicate between the hard drive and the computer motherboard?"],
    30 => ['correct' => "D", 'question' => "What is the spider-like interconnection in millions of places of information located on computers around cyberspace?"]
];

$set_b_questions = [
    1 => ['correct' => "D", 'question' => "What compound is used to prevent overheating of the CPU?"],
    2 => ['correct' => "C", 'question' => "What is the minimum cable length for USB 2.0?"],
    3 => ['correct' => "B", 'question' => "What software program is stored in Read-Only Memory (ROM)?"],
    4 => ['correct' => "C", 'question' => "What is a disc image also known as?"],
    5 => ['correct' => "A", 'question' => "What is the minimum hardware requirement for RAM in Windows 10?"],
    6 => ['correct' => "B", 'question' => "What extension of Microsoft Management Console is used to manage hardware devices including device drivers?"],
    7 => ['correct' => "D", 'question' => "What is the volt rating of the YELLOW wire in a power supply?"],
    8 => ['correct' => "D", 'question' => "What are Yost cables, Cisco cables, and Console cables also known as?"],
    9 => ['correct' => "B", 'question' => "In Windows Server 2008, what does a yellow color indicator signify for a LAN connection?"],
    10 => ['correct' => "B", 'question' => "What do the lights on a Network Interface Card (NIC) indicate?"],
    11 => ['correct' => "B", 'question' => "What is a port in network address translation (NAT) that redirects a communication request from one address and port number combination to another?"],
    12 => ['correct' => "A", 'question' => "What is the alternative for wired connections that uses radio frequencies to send signals between devices and a router?"],
    13 => ['correct' => "A", 'question' => "What is a computer network made up of an interconnection of local area networks (LANs) without a limited geographical area?"],
    14 => ['correct' => "C", 'question' => "What term applies to the interconnection of LANs in a city into 5 to 50 kilometers?"],
    15 => ['correct' => "C", 'question' => "Who is assigned to monitor network security, operation, and network users?"],
    16 => ['correct' => "B", 'question' => "What is used to store user documents with a large amount of memory and storage space?"],
    17 => ['correct' => "C", 'question' => "What IP address is used by the virtual machine to communicate over the physical network?"],
    18 => ['correct' => "B", 'question' => "What type of version verifies network use through a server and requires a more complicated setup, but provides additional security?"],
    19 => ['correct' => "C", 'question' => "What is a way to identify a specific process to which an internet or other network message is forwarded when it arrives at a server?"],
    20 => ['correct' => "A", 'question' => "What is an automated software program that executes certain commands when it receives a specific input?"],
    21 => ['correct' => "D", 'question' => "What enables administrators to configure storage thresholds on particular sets of data stored on server NTFS volumes?"],
    22 => ['correct' => "C", 'question' => "What feature in Windows Server provides the ability to migrate workloads between a source and target cluster?"],
    23 => ['correct' => "B", 'question' => "What log files record performance statistics based on various performance objects and instances available in Performance Monitor?"],
    24 => ['correct' => "C", 'question' => "What Recovery Console Command examines the volume for errors and repairs it?"],
    25 => ['correct' => "D", 'question' => "What state is a computer system in if it is functional?"],
    26 => ['correct' => "A", 'question' => "What Windows update downloads and installs the latest versions?"],
    27 => ['correct' => "A", 'question' => "What is the physically damaged cluster of storage on the hard drive?"],
    28 => ['correct' => "B", 'question' => "What occurs when two or more devices are connected with the same IP address in a computer network?"],
    29 => ['correct' => "B", 'question' => "What storage device should be replaced if frequent error messages appear while moving files and booting up the operating system?"],
    30 => ['correct' => "B", 'question' => "What Recovery Console Command writes a new master boot record on the hard disk drive?"]
];

$set_c_questions = [
    1 => ['correct' => "C", 'question' => "What is the maximum cable length for USB 3.0 using a non-twisted pair wire?"],
    2 => ['correct' => "D", 'question' => "M.2 is a form factor for what?"],
    3 => ['correct' => "C", 'question' => "What kind of chip stores the settings in the BIOS?"],
    4 => ['correct' => "D", 'question' => "What is used as a substitute for an actual disc, allowing users to run software without having to load a CD or DVD?"],
    5 => ['correct' => "C", 'question' => "What Windows edition has a program capable of restricting other users from accessing certain programs?"],
    6 => ['correct' => "D", 'question' => "In what folder can device drivers be found?"],
    7 => ['correct' => "C", 'question' => "What is the ideal voltage range on the hot wires of a Molex connector?"],
    8 => ['correct' => "D", 'question' => "What Ethernet cable is used to connect computers to hubs and switches?"],
    9 => ['correct' => "B", 'question' => "What is a network interface controller also known as?"],
    10 => ['correct' => "C", 'question' => "What class of IP address is 192.168.0.1?"],
    11 => ['correct' => "B", 'question' => "What type of router is designed to operate in the internet backbone?"],
    12 => ['correct' => "A", 'question' => "What allows defining a list of devices and only allowing those devices on a Wi-Fi network?"],
    13 => ['correct' => "C", 'question' => "What type of network connects through signals, e.g., infrared?"],
    14 => ['correct' => "D", 'question' => "What allows users to move around the coverage area in a line of sight while maintaining a network connection?"],
    15 => ['correct' => "A", 'question' => "What is an enterprise-level heterogeneous backup and recovery suite?"],
    16 => ['correct' => "C", 'question' => "What type of server allows the central administration and management of network users and resources?"],
    17 => ['correct' => "D", 'question' => "What is an information asset suffering damage, unintended modification, or disclosure?"],
    18 => ['correct' => "B", 'question' => "What network security standard tries to make connections between a router and wireless devices faster and easier?"],
    19 => ['correct' => "B", 'question' => "Which of the following is the most efficient in transferring larger files?"],
    20 => ['correct' => "A", 'question' => "What technique is used to gain unauthorized access to computers, wherein the intruder sends messages with a source IP address?"],
    21 => ['correct' => "A", 'question' => "What enables administrators to define the types of files that can be saved within a Windows volume and folder?"],
    22 => ['correct' => "C", 'question' => "What second clustering technology provides corresponding client requests across several servers with replicated configurations?"],
    23 => ['correct' => "A", 'question' => "What log files conserve disk space by ensuring that the performance log file does not continue growing over certain limits?"],
    24 => ['correct' => "C", 'question' => "What should be upgraded to receive and transmit strong signals to and from other computers?"],
    25 => ['correct' => "B", 'question' => "What protocol provides quick, automatic, and central management for the distribution of IP addresses within a network?"],
    26 => ['correct' => "B", 'question' => "What command-line tool is used to find the IP address that corresponds to a host or domain name?"],
    27 => ['correct' => "A", 'question' => "What is the problem of a computer if the time and date keep resetting even after fixing in the BIOS?"],
    28 => ['correct' => "A", 'question' => "What tool is used for checking the condition of the hard drive with signs like 'Good', 'Caution', or 'Bad'?"],
    29 => ['correct' => "D", 'question' => "What is a task to do after planning to fix the network?"],
    30 => ['correct' => "A", 'question' => "What is the process of scanning, identifying, diagnosing, and resolving problems, errors, and bugs in software?"]
];

// Get current set from session
$current_set = $_SESSION['current_set'] ?? null;
if(!$current_set || !in_array($current_set, ['a','b','c'])) {
    header('Location: quiz.php');
    exit;
}

// Select the correct question set
$question_set = [];
$set_name = "";
switch($current_set) {
    case 'a':
        $question_set = $set_a_questions;
        $set_name = "Set A";
        break;
    case 'b':
        $question_set = $set_b_questions;
        $set_name = "Set B";
        break;
    case 'c':
        $question_set = $set_c_questions;
        $set_name = "Set C";
        break;
}

// Calculate score based on original question order
$score = 0;
$total_questions = 30;
$question_order = $_SESSION['question_order'] ?? [];
$user_answers = $_SESSION['answers'] ?? [];

foreach($question_order as $index => $q_num) {
    if(isset($question_set[$q_num]['correct']) &&
        isset($user_answers[$index]) &&
        $user_answers[$index] === $question_set[$q_num]['correct']) {
        $score++;
    }
}

// Determine result message and color
$percentage = round(($score / $total_questions) * 100);
if($percentage >= 90) {
    $message = "Excellent! You have mastered this topic!";
    $color = "text-green-600";
    $progress_color = "#10b981";
} elseif($percentage >= 75) {
    $message = "Good job! You have a strong understanding.";
    $color = "text-blue-600";
    $progress_color = "#3b82f6";
} elseif($percentage >= 50) {
    $message = "Not bad! Review your mistakes to improve.";
    $color = "text-yellow-600";
    $progress_color = "#eab308";
} else {
    $message = "Keep practicing! Review the material and try again.";
    $color = "text-red-600";
    $progress_color = "#ef4444";
}

// Clear session data
session_unset();
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
        .result-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            animation: fadeIn 0.3s;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .result-card {
            transform: scale(0.95);
            animation: zoomIn 0.3s forwards;
        }
        @keyframes zoomIn {
            to { transform: scale(1); }
        }
    </style>
</head>
<body>
<div class="result-overlay">
    <div class="result-card bg-white rounded-xl shadow-2xl p-8 w-full max-w-md mx-4">
        <div class="text-center">
            <h1 class="text-3xl font-bold mb-2">Quiz Results</h1>
            <p class="text-gray-600 mb-6"><?= $set_name ?></p>

            <!-- Circular progress -->
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
                            stroke="<?= $progress_color ?>"
                            stroke-width="3                        stroke-dasharray="<?= $percentage ?>, 100"
                    />
                    <text x="18" y="20.5" text-anchor="middle" font-size="8"
                          fill="<?= $progress_color ?>"
                          font-weight="bold"><?= $percentage ?>%</text>
                </svg>
            </div>

            <!-- Score display -->
            <div class="text-5xl font-bold mb-2 <?= $color ?>">
                <?= $score ?>/<?= $total_questions ?>
            </div>
            <div class="text-xl font-medium mb-6 <?= $color ?>">
                <?= $message ?>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="bg-gray-100 p-3 rounded-lg">
                    <div class="text-sm text-gray-600">Correct</div>
                    <div class="text-xl font-bold text-green-600"><?= $score ?></div>
                </div>
                <div class="bg-gray-100 p-3 rounded-lg">
                    <div class="text-sm text-gray-600">Incorrect</div>
                    <div class="text-xl font-bold text-red-600"><?= $total_questions - $score ?></div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-center space-x-3">
                <a href="quiz.php"
                   class="px-5 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg transition-colors">
                    <i class="fas fa-home mr-2"></i> Menu
                </a>
                <a href="set_<?= $current_set ?>.php"
                   class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                    <i class="fas fa-redo mr-2"></i> Retry
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    // Prevent going back to quiz
    history.pushState(null, null, location.href);
    window.onpopstate = function() {
        history.go(1);
    };

    // Close overlay when clicking outside (optional)
    document.querySelector('.result-overlay').addEventListener('click', function(e) {
        if(e.target === this) {
            window.location.href = 'quiz.php';
        }
    });
</script>