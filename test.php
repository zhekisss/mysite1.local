<?php
// header('Location: http://yandex.ru');

function rus_date() {
    // Перевод
     $translate = array(
     "am" => "дп",
     "pm" => "пп",
     "AM" => "ДП",
     "PM" => "ПП",
     "Monday" => "Понедельник",
     "Mon" => "Пн",
     "Tuesday" => "Вторник",
     "Tue" => "Вт",
     "Wednesday" => "Среда",
     "Wed" => "Ср",
     "Thursday" => "Четверг",
     "Thu" => "Чт",
     "Friday" => "Пятница",
     "Fri" => "Пт",
     "Saturday" => "Суббота",
     "Sat" => "Сб",
     "Sunday" => "Воскресенье",
     "Sun" => "Вс",
     "January" => "Января",
     "Jan" => "Янв",
     "February" => "Февраля",
     "Feb" => "Фев",
     "March" => "Марта",
     "Mar" => "Мар",
     "April" => "Апреля",
     "Apr" => "Апр",
     "May" => "Мая",
     "May" => "Мая",
     "June" => "Июня",
     "Jun" => "Июн",
     "July" => "Июля",
     "Jul" => "Июл",
     "August" => "Августа",
     "Aug" => "Авг",
     "September" => "Сентября",
     "Sep" => "Сен",
     "October" => "Октября",
     "Oct" => "Окт",
     "November" => "Ноября",
     "Nov" => "Ноя",
     "December" => "Декабря",
     "Dec" => "Дек",
     "st" => "ое",
     "nd" => "ое",
     "rd" => "е",
     "th" => "ое"
     );
     // если передали дату, то переводим ее
     if (func_num_args() > 1) {
     $timestamp = func_get_arg(1);
     return strtr(date(func_get_arg(0), $timestamp), $translate);
     } else {
    // иначе текущую дату
     return strtr(date(func_get_arg(0)), $translate);
     }
     }

date_default_timezone_set('Asia/Yekaterinburg');
header('refresh: 1');
echo rus_date("D M j G:i:s T Y"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/test.css">
    <title>Document</title>
</head>
<body>
    
    <div class="construct">
    <?php
    
    ?>
    </div>

<script>

var obj = new Object();

console.log(obj);


</script>
<?php

class Test
{
    private $x;
    public $y;

    public function FunctionName(Type $var = null)
    {
    # code...

    }
}

$MyNewObj = new Test;

$data[] =  rus_date("D M j G:i:s T Y");

file_put_contents('file.txt', "$data[0]\n", FILE_APPEND);

$pass = 'admin@admin.comroot';
echo password_hash($pass, 1);

?>
</body>
</html>
