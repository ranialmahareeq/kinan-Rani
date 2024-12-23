<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ختمة القرآن الكريم</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        h1, h2 {
            color: #333;
        }

        .section {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            background-color: #fff;
        }

        .booked {
            color: red;
        }

        .available {
            color: green;
        }

        .btn {
            padding: 5px 10px;
            background-color: blue;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>ختمة القرآن الكريم</h1>

    <?php
    // أجزاء القرآن الكريم
    $quran_parts = [
        1 => 'الفاتحة والبقرة',
        2 => 'آل عمران والنساء',
        3 => 'المائدة والأنعام',
        4 => 'الأعراف والأنفال',
        5 => 'التوبة ويونس',
        6 => 'هود ويوسف',
        7 => 'الرعد وإبراهيم',
        8 => 'الحجر والنحل',
        9 => 'الإسراء والكهف',
        10 => 'مريم وطه',
        11 => 'الأنبياء والحج',
        12 => 'المؤمنون والنور',
        13 => 'الفرقان والشعراء',
        14 => 'النمل والقصص',
        15 => 'العنكبوت والروم',
        16 => 'لقمان والسجدة',
        17 => 'الأحزاب والسبأ',
        18 => 'فاطر ويس',
        19 => 'الصافات وص',
        20 => 'الدخان والجاثية',
        21 => 'الأحقاف ومحمد',
        22 => 'الفتح والحجرات',
        23 => 'ق والدخان',
        24 => 'الجاثية والأحقاف',
        25 => 'محمد والفتح',
        26 => 'الحجرات والزلزلة',
        27 => 'الملك والقلم',
        28 => 'الحاقة والمعارج',
        29 => 'نوح الجن',
        30 => 'المدثر والقيامة'
    ];

    // الحجز
    if (isset($_GET['book'])) {
        $booked_part = $_GET['book'];
        // يمكنك هنا تحديث الحالة إلى محجوز في قاعدة البيانات أو في ملف البيانات.
    }

    foreach ($quran_parts as $part => $name) {
        $isBooked = false; // هذه القيمة يمكن تعديلها بناءً على البيانات الحقيقية
        echo "<div class='section'>";
        echo "<h2>الجزء $part: $name</h2>";
        echo "<a href='?book=$part' class='btn'>حجز</a>";
        if ($isBooked) {
            echo "<p class='booked'>محجوز</p>";
        } else {
            echo "<p class='available'>متاح للحجز</p>";
        }
        echo "</div>";
    }
    ?>
</body>
</html>
