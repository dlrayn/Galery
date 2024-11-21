<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Test - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            padding: 1rem;
        }

        .page-container {
            display: flex;
            width: 100%;
            max-width: 800px;
            height: 450px;
            background: rgba(255, 255, 255, 0.98);
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(56, 189, 248, 0.15);
            overflow: hidden;
        }

        .left-side {
            flex: 0.8;
            background: linear-gradient(45deg, #0ea5e9, #38bdf8);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .left-side::before {
            content: '';
            position: absolute;
            width: 150%;
            height: 150%;
            background: linear-gradient(45deg, rgba(255,255,255,0.2), rgba(255,255,255,0.05));
            transform: rotate(-45deg);
        }

        .left-side h1 {
            color: white;
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            text-align: center;
            position: relative;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            line-height: 1.4;
        }

        .login-container {
            flex: 1.2;
            padding: 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h2 {
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            color: #0f172a;
            font-weight: 700;
            font-family: 'Playfair Display', serif;
            letter-spacing: -0.5px;
            line-height: 1.2;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 0.4rem;
            font-weight: 500;
            color: #1e293b;
            text-align: left;
            font-size: 0.9rem;
            letter-spacing: 0.3px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 0.8rem 1rem;
            margin-bottom: 1.2rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.95rem;
            font-family: 'Montserrat', sans-serif;
            transition: all 0.3s ease;
            background: #f8fafc;
            color: #0f172a;
            font-weight: 500;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #38bdf8;
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.1);
            outline: none;
            background: #ffffff;
        }

        button {
            width: 100%;
            padding: 0.9rem;
            border: none;
            border-radius: 10px;
            background: linear-gradient(to right, #0ea5e9, #38bdf8);
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            font-family: 'Montserrat', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 0.8rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        button:hover {
            background: linear-gradient(to right, #0284c7, #0ea5e9);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(56, 189, 248, 0.25);
        }

        button:active {
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            .page-container {
                flex-direction: column;
                height: auto;
                max-width: 400px;
            }

            .left-side {
                padding: 1.5rem;
                min-height: 150px;
            }

            .left-side h1 {
                font-size: 1.5rem;
            }

            .login-container {
                padding: 1.5rem;
            }

            h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="page-container">
        <div class="left-side">
            <h1>Welcome<br>Back!</h1>
        </div>
        
        <div class="login-container">
            <h2>Sign In</h2>
            <form action="/api/login" method="POST">
                @csrf
                <label for="username">Username</label>
                <input type="text" 
                       name="username" 
                       id="username" 
                       required>

                <label for="password">Password</label>
                <input type="password" 
                       name="password" 
                       id="password" 
                       required>

                <button type="submit">Sign In</button>
            </form>
        </div>
    </div>
</body>
</html> 