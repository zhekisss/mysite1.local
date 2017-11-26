<?php
# Каталог, где мы будем хранить нашу
# электронную корреспонденцию:
define("DIR", "/opt/lampp/blank_mail/");

# Присваиваем имя файлу, функция:
function mkname($j = 0) {
  $file = DIR.date('Y-m-d_H-i-s_'). "$i.eml";
  if ( file_exists($file) )
    return mkname(++$j);
  return $file;
}

# Извлекаем содержимое письма из потока:
$stream = '';
$fp = fopen('php://stdin','r');
while ( $t = fread($fp,2048) ) :
  if ( $t === chr(0) )
    break;
  $stream .= $t;
endwhile;
fclose($fp);

# Сохраняем содержимое письма в файл:
$file = fopen(mkname(),'w');
fwrite($file,$stream);
fclose($file);
?>