<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Крутые статьи</title>
    <link rel="stylesheet" href="./css/styles.css">
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #f2f2f2; 
        color: #111; 
    }

    .articles {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .article {
        padding: 20px;
        margin-bottom: 30px;
        border-bottom: 1px solid #ccc;
    }

    .article:last-child {
        border-bottom: none;
    }

    .article__title {
        display: block;
        font-size: 24px;
        color: #000;
        text-decoration: none;
        margin-bottom: 10px;
    }

    .article__title:hover {
        text-decoration: underline;
        color: #444;
    }

    .article__meta {
        font-size: 14px;
        color: #666;
        margin-bottom: 15px;
    }

    .article__text {
        font-size: 16px;
        line-height: 1.6;
        color: #333;
    }

    .articles a[href*="create"] {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 15px;
        background-color: #000;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.2s ease;
    }

    .articles a[href*="create"]:hover {
        background-color: #333;
    }
    .add-comment {
        max-width: 700px;
        margin: 40px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .add-comment h2 {
        margin-bottom: 20px;
        color: #111;
    }

    .add-comment textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        resize: vertical;
        font-size: 16px;
        color: #000;
        background-color: #f9f9f9;
        margin-bottom: 15px;
    }

    .add-comment button {
        padding: 10px 20px;
        background-color: #000;
        color: #fff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    .add-comment button:hover {
        background-color: #333;
    }
    <style>
    form {
        max-width: 700px;
        margin: 40px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    form label {
        display: block;
        margin-bottom: 15px;
        color: #111;
        font-weight: bold;
    }

    form input[type="text"],
    form textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        color: #000;
        background-color: #f9f9f9;
        margin-top: 5px;
    }

    form button {
        padding: 10px 20px;
        background-color: #000;
        color: #fff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    form button:hover {
        background-color: #333;
    }
    p a {
    color: #000;
    text-decoration: underline;
}

    p a:hover {
        color: #555;
    }
    .article-full {
    max-width: 800px;
    margin: 40px auto;
    padding: 25px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 12px rgba(0,0,0,0.1);
    }  

    .article-full__title {
        font-size: 28px;
        color: #000;
        margin-bottom: 10px;
    }

    .article-full__meta {
        font-size: 14px;
        color: #666;
        margin-bottom: 20px;
    }

    .article-full__text {
        font-size: 18px;
        color: #222;
        line-height: 1.6;
    }

    .article-full__actions {
        margin-top: 20px;
    }

    .article-full__link {
        margin-right: 15px;
        color: #000;
        text-decoration: underline;
    }

    .article-full__link:hover {
        color: #555;
    }

    .comments {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background-color: #f7f7f7;
        border-radius: 8px;
    }

    .comments__title {
        font-size: 22px;
        color: #111;
        margin-bottom: 20px;
    }

    .comment {
        padding: 15px;
        margin-bottom: 15px;
        background-color: #fff;
        border-radius: 6px;
        box-shadow: 0 0 5px rgba(0,0,0,0.05);
    }

    .comment__author {
        font-weight: bold;
        color: #000;
    }

    .comment__text {
        margin: 10px 0;
        color: #333;
    }

    .comment__date {
        font-size: 12px;
        color: #777;
    }

    .comment__edit-link {
        font-size: 14px;
        color: #000;
        text-decoration: underline;
    }

    .comment__edit-link:hover {
        color: #444;
    }

    .comments__empty {
        color: #555;
        font-style: italic;
    }
    .site-header__title {
        text-align: center;
        font-size: 40px;
    }
    .edit-title {
    color: #222;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    border-bottom: 2px solid #444;
    padding-bottom: 8px;
    margin-bottom: 20px;
}

    .edit-form {
        background-color: #f5f5f5;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 6px;
        max-width: 600px;
    }

    .edit-label {
        color: #333;
        font-weight: 600;
        display: block;
        margin-bottom: 8px;
    }

    .edit-input,
    .edit-textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #aaa;
        border-radius: 4px;
        font-size: 1rem;
        color: #222;
        background-color: #fff;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }

    .edit-input:focus,
    .edit-textarea:focus {
        border-color: #444;
        outline: none;
    }

    .edit-button {
        background-color: #444;
        color: #fff;
        border: none;
        padding: 12px 24px;
        font-size: 1rem;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .edit-button:hover {
        background-color: #222;
    }

    .edit-cancel {
        color: #444;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .edit-cancel:hover {
        color: #000;
        text-decoration: underline;
    }
</style>

</head>
<body>
    <header class="site-header">
        <div class="site-header__container">
            <a class="site-header__logo-link" href="/index.php">
                <svg width="100" height="100" viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg" aria-label="Cat face" role="img">
                <circle cx="60" cy="60" r="50" fill="#ccc" stroke="#444" stroke-width="3"/>
                <polygon points="20,20 40,10 40,50" fill="#bbb" stroke="#444" stroke-width="3"/>
                <polygon points="100,20 80,10 80,50" fill="#bbb" stroke="#444" stroke-width="3"/>
                <ellipse cx="40" cy="65" rx="10" ry="15" fill="#fff" stroke="#444" stroke-width="2"/>
                <ellipse cx="80" cy="65" rx="10" ry="15" fill="#fff" stroke="#444" stroke-width="2"/>
                <circle cx="40" cy="65" r="6" fill="#444"/>
                <circle cx="80" cy="65" r="6" fill="#444"/>
                <polygon points="55,80 65,80 60,90" fill="#888" stroke="#444" stroke-width="2"/>
                <path d="M50 95 Q60 105 70 95" stroke="#444" stroke-width="3" fill="none"/>
                <line x1="30" y1="85" x2="10" y2="85" stroke="#444" stroke-width="2"/>
                <line x1="30" y1="90" x2="10" y2="95" stroke="#444" stroke-width="2"/>
                <line x1="30" y1="80" x2="10" y2="75" stroke="#444" stroke-width="2"/>
                <line x1="90" y1="85" x2="110" y2="85" stroke="#444" stroke-width="2"/>
                <line x1="90" y1="90" x2="110" y2="95" stroke="#444" stroke-width="2"/>
                <line x1="90" y1="80" x2="110" y2="75" stroke="#444" stroke-width="2"/>
                </svg>
            </a>
            <h1 class="site-header__title">Про самого крутого котёнка</h1>
        </div>
    </header>
    <main class="site-main">
