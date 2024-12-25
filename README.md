<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تقسيم الأجزاء</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #00796b;
            margin-top: 20px;
            font-size: 28px;
        }

        .form-container {
            margin: 20px 0;
        }

        .form-container input, .form-container select, .form-container button {
            padding: 10px;
            margin: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            background-color: #00796b;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .form-container button:hover {
            background-color: #004d40;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 10px;
            padding: 20px;
            max-width: 900px;
            margin: 0 auto;
        }

        .card {
            background-color: #004d40;
            color: white;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-size: 16px;
        }

        .card p {
            margin: 5px 0;
        }

        .card .reserved {
            color: #ffccbc;
            font-weight: bold;
        }

        .card .unreserved {
            color: #c8e6c9;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>تقسيم الأجزاء</h1>
    <div class="form-container">
        <form method="GET">
            <input type="text" name="name" placeholder="أدخل اسمك" required>
            <select name="part" required>
                <?php
                for ($i = 1; $i <= 30; $i++) {
                    echo "<option value='$i'>الجزء $i</option>";
                }
                ?>
            </select>
            <button type="submit">حفظ</button>
        </form>
    </div>

    <div class="container">
        <?php
        // تفعيل عرض الأخطاء للتصحيح
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        // الأجزاء الـ 30
        $quran_parts = [];
        for ($i = 1; $i <= 30; $i++) {
            $quran_parts[$i] = "الجزء $i";
        }

        // تحميل الأجزاء المحجوزة
        $booked_parts = [];
        if (file_exists('booked_parts.json')) {
            $booked_parts = json_decode(file_get_contents('booked_parts.json'), true);
        }

        // تسجيل الحجز
        if (isset($_GET['name'], $_GET['part'])) {
            $name = htmlspecialchars($_GET['name']);
            $part = (int)$_GET['part'];
            if (!isset($booked_parts[$part])) {
                $booked_parts[$part] = $name;
                file_put_contents('booked_parts.json', json_encode($booked_parts));
            }
        }

        // عرض الأجزاء
        foreach ($quran_parts as $part => $name) {
            $isReserved = isset($booked_parts[$part]);
            echo "<div class='card'>";
            echo "<h2>$name</h2>";
            if ($isReserved) {
                echo "<p class='reserved'>محجوز بواسطة: " . htmlspecialchars($booked_parts[$part]) . "</p>";
            } else {
                echo "<p class='unreserved'>غير مخصص</p>";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
