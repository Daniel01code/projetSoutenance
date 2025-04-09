<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document PDF</title>
    <style>
        @page { 
            size: A4; 
            margin: 20mm; 
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
        }
        .two-columns {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        .column {
            width: 48%;
            padding: 10px;
            box-sizing: border-box;
        }
        h1 {
            text-align: center;
            font-size: 18pt;
            margin-bottom: 20px;
        }
        p {
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <h1>Mon Document PDF</h1>
    <div class="two-columns">
        <div class="column">
            <h2>Colonne 1</h2>
            <p>Contenu de la première colonne. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="column">
            <h2>Colonne 2</h2>
            <p>Contenu de la deuxième colonne. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
    </div>
</body>
</html>