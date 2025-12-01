<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lista de Presentes - Casamento de Lailla e Cristhian">
    <title>Lista de Presentes - Lailla & Cristhian</title>

    <!-- Fonts - Same as Home -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600;700&family=Dancing+Script:wght@400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- CSS do Site Principal -->
    <link rel="stylesheet" href="{{ asset('css/wedding-new.css') }}?v={{ time() }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        /* ====================================
           ROOT VARIABLES - Black & White Theme
           ==================================== */
        :root {
            --black: #000000;
            --white: #ffffff;
            --gray-50: #fafafa;
            --gray-100: #f5f5f5;
            --gray-200: #e5e5e5;
            --gray-300: #d4d4d4;
            --gray-400: #a3a3a3;
            --gray-500: #737373;
            --gray-600: #525252;
            --gray-700: #404040;
            --gray-800: #262626;
            --gray-900: #171717;
            
            --text-dark: #1a1a1a;
            --text-light: #666666;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Anaktoria', Georgia, serif;
            line-height: 1.6;
            color: var(--text-dark);
            overflow-x: hidden;
            background: var(--gray-100);
        }

        .script-font {
            font-family: 'Dancing Script', cursive;
        }
        
        /* Sort Buttons */
        .sort-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.75rem;
            flex-wrap: wrap;
            margin-top: 1.5rem;
        }
        
        .sort-label {
            font-size: 0.9rem;
            color: var(--gray-600);
            font-weight: 500;
        }
        
        .sort-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.5rem 1rem;
            background: var(--white);
            border: 2px solid var(--gray-300);
            color: var(--gray-600);
            border-radius: 50px;
            font-family: inherit;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .sort-btn:hover,
        .sort-btn.active {
            background: var(--black);
            border-color: var(--black);
            color: var(--white);
        }
        
        @media (max-width: 480px) {
            .sort-buttons {
                flex-direction: column;
            }
            
            .sort-btn {
                width: 100%;
                max-width: 200px;
                justify-content: center;
            }
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Hero section styles inherited from wedding-new.css */

        /* ====================================
           STATS SECTION
           ==================================== */
        .gifts-stats {
            background: var(--gray-200);
            padding: 4rem 2rem;
        }

        .stats-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .stats-subtitle {
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            color: var(--gray-600);
            font-style: italic;
            margin-bottom: 0.5rem;
        }

        .stats-title {
            color: var(--black);
            font-size: clamp(1.8rem, 4vw, 2.5rem);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            max-width: 900px;
            margin: 0 auto 3rem;
        }

        .stat-card {
            text-align: center;
            padding: 2rem 1.5rem;
            background: var(--white);
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            font-size: clamp(2rem, 4vw, 3rem);
            color: var(--black);
            margin-bottom: 0.75rem;
        }

        .stat-number {
            font-size: clamp(2rem, 5vw, 4rem);
            color: var(--black);
            font-weight: 700;
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: clamp(0.8rem, 2vw, 1.1rem);
            color: var(--gray-600);
            font-weight: 500;
            margin-bottom: 0.25rem;
        }

        .stat-description {
            font-size: clamp(0.7rem, 1.5vw, 0.9rem);
            color: var(--gray-400);
            font-style: italic;
        }
        
        @media (max-width: 480px) {
            .stats-grid {
                gap: 0.75rem;
            }
            
            .stat-card {
                padding: 1.25rem 0.75rem;
            }
            
            .stat-description {
                display: none;
            }
        }

        /* Progress Bar */
        .progress-wrapper {
            max-width: 600px;
            margin: 0 auto;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
        }

        .progress-label {
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            color: var(--gray-700);
            font-weight: 500;
        }

        .progress-percentage {
            font-size: clamp(1.2rem, 2.5vw, 1.5rem);
            color: var(--black);
            font-weight: 700;
        }

        .progress-bar {
            width: 100%;
            height: 12px;
            background: var(--gray-300);
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: var(--black);
            border-radius: 10px;
            transition: width 0.8s ease;
        }

        /* ====================================
           FILTER SECTION
           ==================================== */
        .gifts-filter {
            background: var(--gray-100);
            padding: 3rem 2rem;
        }

        .filter-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .filter-subtitle {
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            color: var(--gray-600);
            font-style: italic;
            margin-bottom: 0.5rem;
        }

        .filter-title {
            color: var(--black);
            font-size: clamp(1.5rem, 4vw, 2.2rem);
        }
        
        .filter-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .filter-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: var(--white);
            border: 2px solid var(--gray-300);
            color: var(--gray-700);
            border-radius: 50px;
            font-family: inherit;
            font-size: clamp(0.85rem, 2vw, 1rem);
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--black);
            border-color: var(--black);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .filter-count {
            font-size: 0.85em;
            opacity: 0.8;
        }
        
        @media (max-width: 480px) {
            .filter-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .filter-btn {
                width: 100%;
                max-width: 280px;
                justify-content: center;
            }
        }

        /* ====================================
           GIFTS GRID
           ==================================== */
        .gifts-grid-section {
            background: var(--gray-100);
            padding: 0 2rem 4rem;
        }

        .gifts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .gifts-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
        }
        
        @media (max-width: 400px) {
            .gifts-grid {
                gap: 0.75rem;
            }
        }
        
        /* Gift Card */
        .gift-card {
            background: var(--white);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
        }

        .gift-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .gift-card.purchased {
            opacity: 0.85;
        }
        
        /* Gift Image - Grayscale by default, color on hover */
        .gift-image-wrapper {
            position: relative;
            width: 100%;
            aspect-ratio: 4/3;
            overflow: hidden;
            cursor: pointer;
        }

        .gift-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(100%);
            transition: all 0.5s ease;
        }

        .gift-card:hover .gift-image {
            transform: scale(1.05);
            filter: grayscale(0%);
        }

        .gift-image-placeholder {
            width: 100%;
            aspect-ratio: 4/3;
            background: var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .gift-image-placeholder i {
            font-size: 4rem;
            color: var(--gray-400);
        }

        /* Gift Hover Overlay */
        .gift-hover-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            color: var(--white);
        }

        .gift-card:hover .gift-hover-overlay {
            opacity: 1;
        }

        .gift-hover-overlay i {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .gift-hover-overlay span {
            font-size: 1rem;
            font-weight: 500;
        }

        /* Gift Purchased Overlay */
        .gift-purchased-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .gift-purchased-overlay i {
            font-size: clamp(2rem, 6vw, 3.5rem);
            color: var(--white);
            margin-bottom: 0.5rem;
        }

        .gift-purchased-overlay span {
            font-size: clamp(0.8rem, 2.5vw, 1.1rem);
            font-weight: 600;
        }

        /* Gift Status Badge */
        .gift-badge {
            position: absolute;
            top: 0.75rem;
            right: 0.75rem;
            padding: 4px 10px;
            border-radius: 50px;
            font-size: clamp(0.65rem, 1.8vw, 0.75rem);
            font-weight: 600;
            text-transform: uppercase;
            z-index: 5;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }
        
        .gift-badge.available {
            background: var(--black);
            color: var(--white);
        }

        .gift-badge.purchased {
            background: var(--gray-600);
            color: white;
        }

        /* Gift Content */
        .gift-content {
            padding: 1.25rem;
        }
        
        @media (min-width: 769px) {
            .gift-content {
                padding: 1.5rem;
            }
        }

        .gift-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 0.5rem;
            gap: 0.5rem;
        }

        .gift-name {
            font-size: clamp(1rem, 2.5vw, 1.4rem);
            color: var(--black);
            font-weight: 600;
            line-height: 1.3;
            flex: 1;
        }

        .gift-external-link {
            color: var(--gray-600);
            font-size: 1rem;
            transition: transform 0.3s ease;
            flex-shrink: 0;
        }

        .gift-external-link:hover {
            transform: scale(1.2);
            color: var(--black);
        }

        .gift-description {
            font-size: clamp(0.8rem, 2vw, 0.95rem);
            color: var(--gray-500);
            line-height: 1.5;
            margin-bottom: 0.75rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        @media (max-width: 768px) {
            .gift-description {
                display: none;
            }
            
            .gift-read-more {
                display: none;
            }
        }

        .gift-read-more {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.9rem;
            color: var(--gray-600);
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .gift-read-more:hover {
            gap: 0.5rem;
            color: var(--black);
        }

        /* Gift Price */
        .gift-price-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-top: 1px solid var(--gray-200);
            margin-bottom: 0.75rem;
        }

        .gift-price-info {
            display: flex;
            flex-direction: column;
        }

        .gift-price-label {
            font-size: clamp(0.65rem, 1.5vw, 0.8rem);
            color: var(--gray-400);
        }

        .gift-price {
            font-size: clamp(1.1rem, 2.5vw, 1.5rem);
            color: var(--black);
            font-weight: 700;
        }

        .gift-availability {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            font-size: clamp(0.7rem, 1.8vw, 0.85rem);
            color: var(--gray-600);
        }
        
        .gift-availability i {
            font-size: 0.5rem;
            color: var(--gray-600);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }
        
        /* Gift Purchased Info */
        .gift-purchased-info {
            background: var(--gray-100);
            padding: 0.75rem;
            border-radius: 8px;
            border-left: 3px solid var(--gray-600);
            margin-bottom: 0.75rem;
            text-align: center;
        }
        
        .gift-purchased-info-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
            font-size: clamp(0.75rem, 2vw, 0.9rem);
            color: var(--gray-600);
            font-weight: 600;
        }
        
        /* Gift Button */
        .gift-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            width: 100%;
            padding: 0.75rem 1rem;
            background: var(--black);
            color: var(--white);
            border: 2px solid var(--black);
            border-radius: 50px;
            font-family: inherit;
            font-size: clamp(0.8rem, 2vw, 1rem);
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .gift-btn:hover:not(.disabled) {
            background: var(--white);
            color: var(--black);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .gift-btn.disabled {
            background: var(--gray-400);
            border-color: var(--gray-400);
            cursor: not-allowed;
            opacity: 0.7;
        }
        
        /* No Gifts Message */
        .no-gifts {
            text-align: center;
            padding: 4rem 2rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .no-gifts i {
            font-size: 4rem;
            color: var(--gray-400);
            margin-bottom: 1.5rem;
        }
        
        .no-gifts h3 {
            color: var(--gray-700);
            margin-bottom: 0.75rem;
            font-size: 1.5rem;
        }
        
        .no-gifts p {
            color: var(--gray-500);
        }

        /* ====================================
           PAGINATION
           ==================================== */
        .pagination-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
            padding: 3rem 2rem;
            background: var(--gray-100);
        }

        .pagination-info {
            font-size: clamp(0.85rem, 2vw, 1rem);
            color: var(--gray-500);
            text-align: center;
        }

        .pagination-info strong {
            color: var(--black);
            font-weight: 600;
        }

        .pagination {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .pagination-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 44px;
            height: 44px;
            padding: 0.5rem 1rem;
            background: var(--white);
            border: 2px solid var(--gray-300);
            border-radius: 10px;
            color: var(--gray-700);
            font-family: inherit;
            font-size: clamp(0.85rem, 2vw, 1rem);
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .pagination-btn:hover:not(.disabled):not(.active) {
            background: var(--black);
            border-color: var(--black);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .pagination-btn.active {
            background: var(--black);
            border-color: var(--black);
            color: var(--white);
            cursor: default;
        }

        .pagination-btn.disabled {
            opacity: 0.4;
            cursor: not-allowed;
            background: var(--gray-100);
        }

        .pagination-ellipsis {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 44px;
            height: 44px;
            color: var(--gray-400);
            font-size: 1rem;
        }

        @media (max-width: 480px) {
            .pagination {
                gap: 4px;
            }
            
            .pagination-btn {
                min-width: 40px;
                height: 40px;
                padding: 0.5rem;
            }
            
            .pagination-btn.page-number:not(.active):not(.near-current) {
                display: none;
            }
            
            .pagination-ellipsis {
                display: none;
            }
        }

        /* ====================================
           HOW IT WORKS SECTION
           ==================================== */
        .gifts-how {
            background: var(--gray-200);
            padding: 4rem 2rem;
            overflow: hidden;
        }

        .how-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .how-subtitle {
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            color: var(--gray-600);
            font-style: italic;
            margin-bottom: 0.5rem;
        }

        .how-title {
            color: var(--black);
            font-size: clamp(1.5rem, 4vw, 2.2rem);
        }

        .how-carousel-wrapper {
            position: relative;
            max-width: 1100px;
            margin: 0 auto;
        }

        .how-carousel {
            display: flex;
            gap: 1.5rem;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
            padding: 1.5rem 0.5rem;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        
        .how-carousel::-webkit-scrollbar {
            display: none;
        }

        .how-step {
            flex: 0 0 auto;
            width: 280px;
            text-align: center;
            position: relative;
            padding: 2rem 1.5rem;
            background: var(--white);
            border-radius: 15px;
            scroll-snap-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        
        @media (min-width: 900px) {
            .how-carousel {
                overflow-x: visible;
                justify-content: center;
            }
            
            .how-step {
                width: 300px;
            }
        }

        .how-step-number {
            position: absolute;
            top: -0.75rem;
            left: 50%;
            transform: translateX(-50%);
            width: 2rem;
            height: 2rem;
            background: var(--black);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            font-weight: 700;
        }

        .how-step-icon {
            width: 4rem;
            height: 4rem;
            background: var(--gray-100);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 1rem auto;
            font-size: 1.5rem;
            color: var(--black);
        }

        .how-step-title {
            font-size: clamp(1rem, 2.5vw, 1.3rem);
            color: var(--black);
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .how-step-text {
            font-size: clamp(0.85rem, 2vw, 0.95rem);
            color: var(--gray-500);
            line-height: 1.6;
        }
        
        .how-indicators {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1.5rem;
        }
        
        .how-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--gray-300);
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .how-indicator.active {
            background: var(--black);
            transform: scale(1.2);
        }
        
        @media (min-width: 900px) {
            .how-indicators {
                display: none;
            }
        }

        /* ====================================
           BACK BUTTON IN HOW SECTION
           ==================================== */
        .how-back-button {
            text-align: center;
            margin-top: 3rem;
        }

        .back-home-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 2rem;
            background: var(--black);
            color: var(--white);
            border: 2px solid var(--black);
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .back-home-btn:hover {
            background: transparent;
            color: var(--black);
            transform: translateY(-2px);
        }

        /* ====================================
           FLASH MESSAGES
           ==================================== */
        .flash-message {
            position: fixed;
            top: 100px;
            left: 50%;
            transform: translateX(-50%);
            padding: 1rem 2rem;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            z-index: 9999;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            animation: slideDown 0.5s ease;
            max-width: 90%;
        }

        @keyframes slideDown {
            from {
                transform: translateX(-50%) translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(-50%) translateY(0);
                opacity: 1;
            }
        }

        .flash-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .flash-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .flash-warning {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffc107;
        }

        .flash-message i {
            font-size: 1.25rem;
        }

        .flash-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            opacity: 0.7;
            margin-left: 1rem;
            color: inherit;
        }

        .flash-close:hover {
            opacity: 1;
        }

        @media (max-width: 640px) {
            .flash-message {
                top: 80px;
                padding: 0.75rem 1rem;
                font-size: 0.9rem;
            }
        }

        /* Footer styles inherited from wedding-new.css */

        /* ====================================
           LIGHTBOX MODAL
           ==================================== */
        .lightbox {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .lightbox.active {
            opacity: 1;
            visibility: visible;
        }

        .lightbox-content {
            position: relative;
            max-width: 90vw;
            max-height: 90vh;
            animation: zoomIn 0.3s ease;
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.8);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .lightbox-image {
            max-width: 100%;
            max-height: 85vh;
            object-fit: contain;
            border-radius: 10px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }

        .lightbox-close {
            position: absolute;
            top: -50px;
            right: 0;
            background: none;
            border: none;
            color: var(--white);
            font-size: 2.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 0.5rem;
        }

        .lightbox-close:hover {
            opacity: 0.7;
            transform: rotate(90deg);
        }

        .lightbox-caption {
            position: absolute;
            bottom: -50px;
            left: 50%;
            transform: translateX(-50%);
            color: var(--white);
            font-size: 1.1rem;
            text-align: center;
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            .lightbox-close {
                top: -45px;
                right: 10px;
            }
            
            .lightbox-caption {
                bottom: -40px;
                font-size: 0.9rem;
            }
        }

        /* ====================================
           LOADING SCREEN
           ==================================== */
        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        .loading.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 3px solid var(--gray-200);
            border-top: 3px solid var(--black);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading" id="loading">
        <div class="spinner"></div>
    </div>

    <!-- Flash Messages -->
    @if(session('success'))
    <div class="flash-message flash-success" id="flash-message">
        <i class="fas fa-check-circle"></i>
        <span>{{ session('success') }}</span>
        <button class="flash-close" onclick="closeFlash()">&times;</button>
    </div>
    @endif

    @if(session('error'))
    <div class="flash-message flash-error" id="flash-message">
        <i class="fas fa-exclamation-circle"></i>
        <span>{{ session('error') }}</span>
        <button class="flash-close" onclick="closeFlash()">&times;</button>
    </div>
    @endif

    @if(session('warning'))
    <div class="flash-message flash-warning" id="flash-message">
        <i class="fas fa-exclamation-triangle"></i>
        <span>{{ session('warning') }}</span>
        <button class="flash-close" onclick="closeFlash()">&times;</button>
    </div>
    @endif

    <!-- Header - Same as Home -->
    <header class="main-header" id="main-header">
        <nav class="header-nav">
            <div class="nav-links">
                <a href="{{ route('home') }}" class="nav-link">Início</a>
                <a href="{{ route('home') }}#story" class="nav-link">Nossa História</a>
                <a href="{{ route('home') }}#event" class="nav-link">O Casamento</a>
                <a href="{{ route('home') }}#map" class="nav-link">Localização</a>
                <a href="{{ route('gifts.index') }}" class="nav-link">Presentes</a>
                <a href="{{ route('home') }}#rsvp" class="nav-link">RSVP</a>
                <a href="{{ route('home') }}#gallery" class="nav-link">Galeria</a>
            </div>
        </nav>
    </header>

    <!-- Hero Section - Same as Home Gift CTA -->
    <section class="section-gift-cta" id="gifts-hero">
        <div class="gift-cta-background">
            <img src="{{ asset('giftstore.jpeg') }}" alt="Lista de Presentes" class="gift-cta-bg-image">
            <div class="gift-cta-overlay"></div>
        </div>
        
        <div class="gift-cta-content reveal visible">
            <img src="{{ asset('Titulos/SELECAO DE PRESENTES.svg') }}" alt="Seleção de Presentes - Sua presença é o maior presente de todos" class="section-title-svg gift-title-svg">
            
            <p class="gift-cta-text">
                Pensamos com carinho em alguns itens que nos ajudarão a construir nosso lar e nossa nova fase juntos.
            </p>
            <p class="gift-cta-text">
                Cada gesto, grande ou pequeno, é recebido com alegria e gratidão.
            </p>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="gifts-stats">
        <div class="container">
            <div class="stats-header" data-aos="fade-up">
                <p class="stats-subtitle">Nossa lista de presentes</p>
                <h2 class="stats-title">Um gesto de carinho</h2>
            </div>
            
            <div class="stats-grid">
                <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <div class="stat-number">{{ $totalGifts }}</div>
                    <div class="stat-label">Itens na lista</div>
                    <div class="stat-description">Selecionados com carinho</div>
                </div>
                
                <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="stat-number">{{ $availableGifts }}</div>
                    <div class="stat-label">Disponíveis</div>
                    <div class="stat-description">Aguardando seu carinho</div>
                </div>
                
                <div class="stat-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-number">{{ $purchasedGifts }}</div>
                    <div class="stat-label">Presenteados</div>
                    <div class="stat-description">Com amor recebidos</div>
                </div>
            </div>
            
            @if($totalGifts > 0)
            <div class="progress-wrapper" data-aos="fade-up" data-aos-delay="400">
                <div class="progress-info">
                    <span class="progress-label">Progresso da lista</span>
                    <span class="progress-percentage">{{ round(($purchasedGifts / $totalGifts) * 100) }}%</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: {{ ($purchasedGifts / $totalGifts) * 100 }}%"></div>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Filter Section -->
    <section class="gifts-filter" id="gifts-filter">
        <div class="container">
            <div class="filter-header" data-aos="fade-up">
                <p class="filter-subtitle">Explore nossa seleção</p>
                <h2 class="filter-title">Encontre o presente perfeito</h2>
            </div>
            
            <div class="filter-buttons" data-aos="fade-up" data-aos-delay="100">
                <a href="{{ route('gifts.index', array_merge(request()->except('filter'), ['filter' => 'all'])) }}#gifts-filter" class="filter-btn {{ $filter === 'all' ? 'active' : '' }}">
                    <i class="fas fa-th-large"></i>
                    <span>Todos</span>
                    <span class="filter-count">({{ $totalGifts }})</span>
                </a>
                <a href="{{ route('gifts.index', array_merge(request()->except('filter'), ['filter' => 'available'])) }}#gifts-filter" class="filter-btn {{ $filter === 'available' ? 'active' : '' }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Disponíveis</span>
                    <span class="filter-count">({{ $availableGifts }})</span>
                </a>
                <a href="{{ route('gifts.index', array_merge(request()->except('filter'), ['filter' => 'purchased'])) }}#gifts-filter" class="filter-btn {{ $filter === 'purchased' ? 'active' : '' }}">
                    <i class="fas fa-heart"></i>
                    <span>Presenteados</span>
                    <span class="filter-count">({{ $purchasedGifts }})</span>
                </a>
            </div>
            
            <!-- Sort Buttons -->
            <div class="sort-buttons" data-aos="fade-up" data-aos-delay="200">
                <span class="sort-label">Ordenar por:</span>
                <a href="{{ route('gifts.index', array_merge(request()->except('sort'), ['sort' => 'random'])) }}#gifts-filter" class="sort-btn {{ (!request('sort') || request('sort') === 'random') ? 'active' : '' }}">
                    <i class="fas fa-random"></i>
                    <span>Aleatório</span>
                </a>
                <a href="{{ route('gifts.index', array_merge(request()->except('sort'), ['sort' => 'price_asc'])) }}#gifts-filter" class="sort-btn {{ request('sort') === 'price_asc' ? 'active' : '' }}">
                    <i class="fas fa-sort-amount-up"></i>
                    <span>Menor Preço</span>
                </a>
                <a href="{{ route('gifts.index', array_merge(request()->except('sort'), ['sort' => 'price_desc'])) }}#gifts-filter" class="sort-btn {{ request('sort') === 'price_desc' ? 'active' : '' }}">
                    <i class="fas fa-sort-amount-down"></i>
                    <span>Maior Preço</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Gifts Grid -->
    <section class="gifts-grid-section">
        <div class="container">
            @if($gifts->isEmpty())
            <div class="no-gifts" data-aos="fade-up">
                <i class="fas fa-gift"></i>
                <h3>Nenhum presente encontrado</h3>
                <p>Não há presentes nesta categoria no momento.</p>
                @if($filter !== 'all')
                <a href="{{ route('gifts.index', ['filter' => 'all']) }}" class="filter-btn" style="margin-top: 1.5rem;">
                    <i class="fas fa-th-large"></i>
                    <span>Ver todos os presentes</span>
                </a>
                @endif
            </div>
            @else
            <div class="gifts-grid">
                @foreach($gifts as $index => $gift)
                <div class="gift-card {{ $gift->is_purchased ? 'purchased' : 'available' }}" data-aos="fade-up" data-aos-delay="{{ ($index % 4) * 100 }}">
                    <!-- Image -->
                    @if($gift->image_url)
                    <div class="gift-image-wrapper" onclick="openLightbox('{{ asset($gift->image_url) }}', '{{ $gift->name }}')">
                        <img src="{{ asset($gift->image_url) }}" alt="{{ $gift->name }}" class="gift-image">
                        
                        @if($gift->is_purchased)
                        <div class="gift-purchased-overlay">
                            <i class="fas fa-check-circle"></i>
                            <span>Presenteado</span>
                        </div>
                        @else
                        <div class="gift-hover-overlay">
                            <i class="fas fa-search-plus"></i>
                            <span>Clique para ampliar</span>
                        </div>
                        @endif
                        
                        <div class="gift-badge {{ $gift->is_purchased ? 'purchased' : 'available' }}">
                            <i class="fas {{ $gift->is_purchased ? 'fa-heart' : 'fa-tag' }}"></i>
                            <span>{{ $gift->is_purchased ? 'Presenteado' : 'Disponível' }}</span>
                        </div>
                    </div>
                    @else
                    <div class="gift-image-placeholder">
                        <i class="fas fa-gift"></i>
                    </div>
                    @endif
                    
                    <!-- Content -->
                    <div class="gift-content">
                        <div class="gift-header">
                            <h3 class="gift-name">{{ $gift->name }}</h3>
                            @if($gift->store_url && !$gift->is_purchased)
                            <a href="{{ $gift->store_url }}" target="_blank" class="gift-external-link" title="Ver na loja">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                            @endif
                        </div>
                        
                        <p class="gift-description">{{ Str::limit($gift->description, 80) }}</p>
                        
                        @if(strlen($gift->description) > 80)
                        <a href="{{ route('gifts.show', $gift) }}" class="gift-read-more">
                            Ler mais <i class="fas fa-arrow-right"></i>
                        </a>
                        @endif
                        
                        <div class="gift-price-row">
                            <div class="gift-price-info">
                                <span class="gift-price-label">Valor</span>
                                <span class="gift-price">{{ $gift->formatted_price }}</span>
                            </div>
                            @if(!$gift->is_purchased)
                            <div class="gift-availability">
                                <i class="fas fa-circle"></i>
                                <span>Disponível</span>
                            </div>
                            @endif
                        </div>
                        
                        @if($gift->is_purchased)
                        <div class="gift-purchased-info">
                            <div class="gift-purchased-info-header">
                                <i class="fas fa-heart"></i>
                                <span>Presenteado com amor</span>
                            </div>
                        </div>
                        @endif
                        
                        <div class="gift-action">
                            @if($gift->is_purchased)
                            <button class="gift-btn disabled" disabled>
                                <i class="fas fa-check"></i>
                                <span>Presenteado</span>
                            </button>
                            @else
                            <a href="{{ route('gifts.show', $gift) }}" class="gift-btn">
                                <i class="fas fa-gift"></i>
                                <span>Presentear</span>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            @if($gifts->hasPages())
            <div class="pagination-wrapper">
                <div class="pagination-info">
                    Exibindo <strong>{{ $gifts->firstItem() }}</strong> a <strong>{{ $gifts->lastItem() }}</strong> de <strong>{{ $gifts->total() }}</strong> presentes
                </div>
                
                <nav class="pagination" aria-label="Navegação da lista de presentes">
                    {{-- Previous Button --}}
                    @if($gifts->onFirstPage())
                        <span class="pagination-btn disabled" aria-disabled="true">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @else
                        <a href="{{ $gifts->previousPageUrl() }}" class="pagination-btn" rel="prev" aria-label="Página anterior">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif

                    {{-- Page Numbers --}}
                    @php
                        $currentPage = $gifts->currentPage();
                        $lastPage = $gifts->lastPage();
                        $start = max(1, $currentPage - 2);
                        $end = min($lastPage, $currentPage + 2);
                    @endphp

                    @if($start > 1)
                        <a href="{{ $gifts->url(1) }}" class="pagination-btn page-number">1</a>
                        @if($start > 2)
                            <span class="pagination-ellipsis">...</span>
                        @endif
                    @endif

                    @for($page = $start; $page <= $end; $page++)
                        @php
                            $isNearCurrent = abs($page - $currentPage) <= 1;
                        @endphp
                        @if($page == $currentPage)
                            <span class="pagination-btn page-number active near-current" aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $gifts->url($page) }}" class="pagination-btn page-number {{ $isNearCurrent ? 'near-current' : '' }}">{{ $page }}</a>
                        @endif
                    @endfor

                    @if($end < $lastPage)
                        @if($end < $lastPage - 1)
                            <span class="pagination-ellipsis">...</span>
                        @endif
                        <a href="{{ $gifts->url($lastPage) }}" class="pagination-btn page-number">{{ $lastPage }}</a>
                    @endif

                    {{-- Next Button --}}
                    @if($gifts->hasMorePages())
                        <a href="{{ $gifts->nextPageUrl() }}" class="pagination-btn" rel="next" aria-label="Próxima página">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @else
                        <span class="pagination-btn disabled" aria-disabled="true">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    @endif
                </nav>
            </div>
            @endif
            @endif
        </div>
    </section>

    <!-- How It Works -->
    <section class="gifts-how">
        <div class="container">
            <div class="how-header" data-aos="fade-up">
                <p class="how-subtitle">Como funciona</p>
                <h2 class="how-title">Um gesto simples, um carinho eterno</h2>
            </div>
            
            <div class="how-carousel-wrapper">
                <div class="how-carousel" id="howCarousel">
                    <div class="how-step" data-aos="fade-up" data-aos-delay="100">
                        <div class="how-step-number">1</div>
                        <div class="how-step-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3 class="how-step-title">Explore a lista</h3>
                        <p class="how-step-text">Navegue pelos presentes que selecionamos com muito carinho para nosso novo lar.</p>
                    </div>
                    
                    <div class="how-step" data-aos="fade-up" data-aos-delay="200">
                        <div class="how-step-number">2</div>
                        <div class="how-step-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3 class="how-step-title">Escolha o presente</h3>
                        <p class="how-step-text">Selecione o presente que mais combina com você e com o que deseja celebrar conosco.</p>
                    </div>
                    
                    <div class="how-step" data-aos="fade-up" data-aos-delay="300">
                        <div class="how-step-number">3</div>
                        <div class="how-step-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h3 class="how-step-title">Confirme sua escolha</h3>
                        <p class="how-step-text">Preencha seus dados e confirme. Entraremos em contato para combinar a entrega.</p>
                    </div>
                </div>
                
                <div class="how-indicators">
                    <button class="how-indicator active" data-index="0"></button>
                    <button class="how-indicator" data-index="1"></button>
                    <button class="how-indicator" data-index="2"></button>
                </div>
            </div>
            
            <div class="how-back-button" data-aos="fade-up">
                <a href="{{ route('home') }}" class="back-home-btn">
                    <i class="fas fa-arrow-left"></i>
                    <span>Voltar ao início</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer - Same as Home -->
    <footer class="footer">
        <div class="container">
            <p class="footer-quote">"All love stories are beautiful, but ours is my favorite"</p>
            
            <div class="footer-names">
                <h3>Lailla</h3>
                <span class="footer-ampersand">&</span>
                <h3>Cristhian</h3>
            </div>
            
            <p class="footer-date">09 de Maio de 2026</p>
            
            <div class="footer-divider">
                <p class="footer-copyright">© 2025 Lailla & Cristhian. Feito com ❤️ para nosso grande dia.</p>
            </div>
        </div>
    </footer>

    <!-- Lightbox Modal -->
    <div class="lightbox" id="lightbox">
        <div class="lightbox-content">
            <button class="lightbox-close" onclick="closeLightbox()">
                <i class="fas fa-times"></i>
            </button>
            <img src="" alt="" class="lightbox-image" id="lightbox-image">
            <p class="lightbox-caption" id="lightbox-caption"></p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Loading screen
        window.addEventListener('load', function() {
            const loadingEl = document.getElementById('loading');
            if (loadingEl) {
                setTimeout(() => {
                    loadingEl.classList.add('hidden');
                }, 500);
            }
        });

        // Header scroll effect - Same as Home
        const header = document.getElementById('main-header');
        let lastScroll = 0;
        
        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;
            
            if (header) {
                // Add scrolled class for background
                if (currentScroll > 100) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
                
                // Hide/show on scroll
                if (currentScroll > lastScroll && currentScroll > 200) {
                    header.classList.add('hidden');
                } else {
                    header.classList.remove('hidden');
                }
            }
            
            lastScroll = currentScroll;
        });

        // Carousel "Como Funciona"
        const carousel = document.getElementById('howCarousel');
        const indicators = document.querySelectorAll('.how-indicator');
        const steps = carousel ? carousel.querySelectorAll('.how-step') : [];
        
        if (carousel && steps.length > 0) {
            carousel.addEventListener('scroll', function() {
                const scrollLeft = carousel.scrollLeft;
                const stepWidth = steps[0].offsetWidth + 24;
                const currentIndex = Math.round(scrollLeft / stepWidth);
                
                indicators.forEach((ind, i) => {
                    ind.classList.toggle('active', i === currentIndex);
                });
            });
            
            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', function() {
                    const stepWidth = steps[0].offsetWidth + 24;
                    carousel.scrollTo({
                        left: stepWidth * index,
                        behavior: 'smooth'
                    });
                });
            });
        }

        // Lightbox functionality
        function openLightbox(src, caption) {
            const lightbox = document.getElementById('lightbox');
            const lightboxImage = document.getElementById('lightbox-image');
            const lightboxCaption = document.getElementById('lightbox-caption');
            
            if (lightbox && lightboxImage && lightboxCaption) {
                lightboxImage.src = src;
                lightboxImage.alt = caption;
                lightboxCaption.textContent = caption;
                lightbox.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            if (lightbox) {
                lightbox.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        // Close lightbox on background click
        const lightbox = document.getElementById('lightbox');
        if (lightbox) {
            lightbox.addEventListener('click', function(e) {
                if (e.target === lightbox) {
                    closeLightbox();
                }
            });
        }

        // Close lightbox on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLightbox();
            }
        });

        // Flash message functions
        function closeFlash() {
            const flash = document.getElementById('flash-message');
            if (flash) {
                flash.style.animation = 'slideDown 0.3s ease reverse';
                setTimeout(() => flash.remove(), 300);
            }
        }

        // Auto-close flash messages after 8 seconds
        const flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            setTimeout(() => {
                closeFlash();
            }, 8000);
        }
    </script>
</body>
</html>
