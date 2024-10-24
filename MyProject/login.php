<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        .lobster-regular {
            font-family: "Lobster", sans-serif;
            font-weight: 400;
            font-style: normal;
            font-size: 50px;
            margin-bottom: 55px;
            color: #fff;
        }

        .poppins-extrabold {
            font-family: "Poppins", serif;
            font-weight: 800;
            font-style: normal;
            color: #fff;
        }

        /* จัดตำแหน่งกลางหน้าจอ */
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url(backgroud/bg1.jpg);
            background-size: cover;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* สไตล์ของกล่องล็อกอิน */
        .login-container {
            background-color: rgba(255, 255, 255, 0.2);
            /* ทำให้พื้นหลังโปร่งใส */
            backdrop-filter: blur(10px);
            /* เบลอพื้นหลัง */
            padding: 30px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            /* เส้นขอบสีขาวโปร่งแสง */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h1{
            margin-top: 4px;
        }

        /* สไตล์ของ input และปุ่ม */
        .login-container input {
            width: 100%;
            padding: 12px 15px;
            margin: 8px 0;
            border: 1px solid rgba(255, 255, 255, 0.3);
            /* เส้นขอบโปร่งแสง */
            background-color: white;
            color: black;
            /* สีตัวอักษรเป็นสีดำ */
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* เพิ่มเงาให้มีมิติ */
            transition: all 0.3s ease;
            /* ทำให้การเปลี่ยนแปลงนุ่มนวล */
            box-sizing: border-box;
        }

        .login-container input:focus {
            background-color: #f0f0f0;
            /* เปลี่ยนสีพื้นหลังเมื่อ focus */
            border-color: #A7C7E7;
            /* เปลี่ยนสีเส้นขอบเมื่อ focus */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* เพิ่มความเข้มของเงาเมื่อ focus */
            outline: none;
        }

        .login-container input::placeholder {
            color: #999;
            /* เปลี่ยนสี placeholder ให้เข้ากัน */
        }


        .login-container button {
            background: linear-gradient(135deg, #A7C7E7, #FDDDE6);
            color: white;
            padding: 14px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2), 0 2px 4px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            /* เพิ่มความนุ่มนวลเมื่อ hover */
        }

        .login-container button:hover {
            background: linear-gradient(135deg, #FDDDE6, #A7C7E7);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.3), 0 4px 6px rgba(0, 0, 0, 0.25);
            transform: translateY(-2px);
            /* ขยับขึ้นเมื่อ hover */
        }
    </style>
</head>

<body>
    <header class="lobster-regular">StepIntoStyle</header>
    <div class="login-container">
        <h1 class="poppins-extrabold">Login</h1>
        <form action="authenticate.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="poppins-extrabold">Login</button>
        </form>
    </div>
</body>

</html>