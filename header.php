<!DOCTYPE html>
<html>

<head>
    <?php
        echo '<title>GPA Calculator - ' . $page_title . '</title>';
    ?>

    <link rel = "stylesheet" href = "css/style.css">

    <meta name="description" content="FUPRE GPA Calculator">
    <meta name="keywords" content="FUPRE, GPA, GPA Calculator, Nigerian university">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <header>
        <div id = "nav-toggler" onclick = "toggleNav()">
            <svg viewBox = "0 0 100 80" width="40" height="40">
                <rect width = "100" height = "20" rx = "8" ry = "8" fill = "#f2f2f2"></rect>
                <rect y = "30" width = "100" height = "20" rx = "8" ry = "8" fill = "#f2f2f2"></rect>
                <rect y = "60" width = "100" height = "20" rx = "8" ry = "8" fill = "#f2f2f2"></rect>
            </svg>
        </div>

        <figure id = "logo">
            <a href = "https://GitHub.com/Osas-Solo" target = "_blank"><img src = "images/OS_Tech_Logo.png" alt = "OS Tech Logo"></a>
        </figure>