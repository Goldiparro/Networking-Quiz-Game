<?php
session_start();
include '../config/database.php'; // Ensure this path is correct
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer System Servicing Quiz</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #1a2980, #26d0ce);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .hero-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            transform-style: preserve-3d;
            transform: perspective(1000px);
        }
        .btn-primary {
            background: linear-gradient(135deg, #1a2980, #26d0ce);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #1a2980, #26d0ce);
        }
        .css-badge {
            background-color: #3b82f6;
            color: white;
        }
        .slideshow-container {
            position: relative;
            max-width: 100%;
            margin: auto;
            overflow: hidden;
            border-radius: 10px;
        }
        .slide {
            display: none;
            width: 100%;
        }
        .active {
            display: block;
        }
        .fade {
            animation: fade 1.5s ease-in-out;
        }
        @keyframes fade {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }
        .prev:hover, .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
    </style>
</head>
<body class="flex items-center justify-center p-4">
<div class="w-full max-w-4xl">
    <div class="hero-card p-8 md:p-12 overflow-hidden">
        <div class="flex flex-col md:flex-row items-center gap-8">
            <div class="md:w-1/2">
                <div class="slideshow-container">
                    <img src="../images/tesda.png" alt="TESDA Logo" class="slide fade">
                    <img src="../images/aclc.png" alt="ACLC Logo" class="slide fade">
                    <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
                    <a class="next" onclick="changeSlide(1)">&#10095;</a>
                </div>
            </div>

            <div class="md:w-1/2">
                <span class="css-badge text-sm font-semibold px-3 py-1 rounded-full mb-2 inline-block">Written Exam Reviewer</span>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Computer System Servicing Quiz</h1>
                <p class="text-gray-600 mb-6">
                    This official reviewer prepares candidates for the TESDA Computer System Servicing NC II certification exam.
                    Covering hardware troubleshooting, operating systems, network configuration, and safety procedures,
                    this timed quiz simulates the actual written examination environment.
                </p>

                <div class="flex flex-col space-y-4 mb-8">
                    <a href="quiz.php" class="btn-primary text-white text-center font-bold py-3 px-6 rounded-lg">
                        Begin Reviewer
                    </a>
                    <a href="#exam-specs" class="text-blue-600 text-center font-medium py-3 px-6 rounded-lg border border-blue-600 hover:bg-blue-50 transition">
                        Exam Specifications
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="exam-specs" class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white bg-opacity-90 p-6 rounded-xl shadow-md">
            <div class="feature-icon rounded-full flex items-center justify-center mb-4 mx-auto text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-center mb-2">Hardware Components</h3>
            <p class="text-gray-600 text-center">
                PC assembly & disassembly, component identification, preventive maintenance,
                and basic troubleshooting techniques
            </p>
        </div>

        <div class="bg-white bg-opacity-90 p-6 rounded-xl shadow-md">
            <div class="feature-icon rounded-full flex items-center justify-center mb-4 mx-auto text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-center mb-2">Operating Systems</h3>
            <p class="text-gray-600 text-center">
                Installation, configuration, user management, file systems,
                and command line operations
            </p>
        </div>

        <div class="bg-white bg-opacity-90 p-6 rounded-xl shadow-md">
            <div class="feature-icon rounded-full flex items-center justify-center mb-4 mx-auto text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-center mb-2">Network Setup</h3>
            <p class="text-gray-600 text-center">
                LAN cabling standards, IP configuration, basic router setup,
                and internet connectivity troubleshooting
            </p>
        </div>
    </div>

    <div class="mt-12 bg-white bg-opacity-90 p-6 rounded-xl shadow-md">
        <h3 class="text-xl font-bold text-center mb-4">Exam Simulation Details</h3>
        <div class="text-center">
            <div>
                <h4 class="font-semibold mb-2 text-blue-600">Quiz Format</h4>
                <ul class="pl-5 text-gray-700 space-y-1">
                    <li>30 multiple-choice questions</li>
                    <li>Randomized question order</li>
                    <li>60-minute time limit</li>
                    <li>Passing score: 75% (18 correct answers)</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        const slides = document.getElementsByClassName("slide");
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 3000); // Change image every 3 seconds
    }

    function changeSlide(n) {
        slideIndex += n;
        const slides = document.getElementsByClassName("slide");
        if (slideIndex > slides.length) {slideIndex = 1}
        if (slideIndex < 1) {slideIndex = slides.length}
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex - 1].style.display = "block";
    }
</script>
</body>
</html>
