<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Styled Document</title>
    <style>
        /* Set the entire page background */
        body {
            background-color: #2c2c2c; /* Dark background */
            color: #ffffff; /* Light text color */
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        /* Style the main heading */
        h1 {
            font-size: 2.5em;
            color: #ffdd57; /* Soft yellow */
            text-align: center;
            margin: 0;
        }

        /* Style the paragraph */
        p {
            font-size: 1.2em;
            color: #b0b0b0; /* Light gray */
            text-align: center;
            max-width: 600px;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <h1>Hello</h1>
    <p>
        {{$data[0]}}
    </p>
</body>
</html>
