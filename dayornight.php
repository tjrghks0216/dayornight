<!DOCTYPE html>
<html>
<head>
    <title>엄마 주간/야간 계산기</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="container mt-5 p-5 text-center border rounded-5">
        <h1>날짜를 선택하세요:</h1>
        <form method="post">
            <input type="date" name="selected_date" class="form-control mt-3">
            <input type="submit" name="submit" value="확인" class="btn btn-primary mt-2">
        </form>
    <?php
    if (isset($_POST['submit'])) {
        function isDayOrNight($date)
        {
            // 입력된 날짜로부터 1970년 1월 1일까지의 초 계산
            $timestamp = strtotime($date);
            $seconds_in_a_week = 604800; // 60초 * 60분 * 24시 * 7일
            $seconds_since_epoch = $timestamp - strtotime('1970-01-05'); // 월요일부터 계산해야 하기때문에 월요일인 날짜 지정
    
            // 1970년 1월 5일부터 현재까지의 주차 계산
            $weekNumber = floor($seconds_since_epoch / $seconds_in_a_week);

            // 주차가 짝수인지 홀수인지 판별하여 주간 또는 야간 출력
            if ($weekNumber % 2 == 0) {
                return "야간";
            } else {
                return "주간";
            }
        }

        $selected_date = $_POST['selected_date'];
        echo "<div class ='container mt-5 text-center'><h2>$selected_date 은(는) " . isDayOrNight($selected_date) . "입니다.</h2></div>";
    }
    ?>

    </div>

</body>
</html>
