<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>error 404</title>
    <style>
        *,
        ::after,
        ::before {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: monospace;
        }

        body {
            width: 100%;
            height: 100vh;

        }

        section {
            width: -100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        h1 {
            font-size: clamp(1.5rem, 5vw, 48px);
            font-weight: bold;
            margin-bottom: 16px;
        }

        section p {
            font-size: clamp(1rem, 2vw, 24px);
            color: #333;
            margin-bottom: 16px;
        }

        section a {
            text-decoration: none;
            color: #fff;
            background-color:#2ECC71;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: clamp(1rem, 2vw, 24px);
            transition: all .3s ease-in-out;
        }

        section a:hover {
            background-color: #555;
        }

        section a:active {
            transform: scale(0.9);
        }

        section a:focus {
            outline: none;
        }

        section a:focus-visible {
            outline: 2px solid #333;
            outline-offset: 2px;
        }

        section a:focus-visible:hover {
            outline: 2px solid #555;
        }

        section a:focus-visible:active {
            outline: 2px solid #333;
            outline-offset: 2px;
            transform: scale(0.9);
        }

        section a:focus-visible:active:hover {
            outline: 2px solid #555;
            outline-offset: 2px;
            transform: scale(0.9);
        }

        section a:focus-visible:active:focus {
            outline: 2px solid #333;
            outline-offset: 2px;
            transform: scale(0.9);
        }

        section a:focus-visible:active:focus:hover {
            outline: 2px solid #555;
            outline-offset: 2px;
            transform: scale(0.9);
        }

        section a:focus-visible:active:focus:focus-visible {
            outline: 2px solid #333;
            outline-offset: 2px;
            transform: scale(0.9);
        }

        section a:focus-visible:active:focus:focus-visible:hover {
            outline: 2px solid #555;
            outline-offset: 2px;
            transform: scale(0.9);
        }

        section a:focus-visible:active:focus:focus-visible:active {
            outline: 2px solid #333;
            outline-offset: 2px;
            transform: scale(0.9);
        }

        section a:focus-visible:active:focus:focus-visible:active:hover {
            outline: 2px solid #555;
            outline-offset: 2px;
            transform: scale(0.9);
        }

        section a:focus-visible:active:focus:focus-visible:active:focus {
            outline: 2px solid #333;
            outline-offset: 2px;
            transform: scale(0.9);
        }

        section a:focus-visible:active:focus:focus-visible:active:focus:hover {
            outline: 2px solid #555;
            outline-offset: 2px;
            transform: scale(0.9);
        }
    </style>
</head>

<body>
    <section>
        <h1>ERROR 404</h1>
        <p>page not found</p>
        <p>The page you are looking for does not exist.</p>
        <a href="index">GO to Home</a>
    </section>
</body>

</html>