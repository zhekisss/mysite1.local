<?php
class Mail {
	
	private $from;
	private $from_name = "";
	private $type = "text/html";
	private $encoding = "utf-8";
	private $notify = false;
	
	
	
	/* Конструктор принимающий обратный e-mail адрес */
	// 	public function __construct($from = '') {
		// 		$this->from = $from;
		//
	// }
	
	
	
	/* Изменение обратного e-mail адреса */
	public function setFrom($from) {
		$this->from = $from;
		return $this;
	}
	
	
	
	/* Изменение имени в обратном адресе */
	public function setFromName($from_name) {
		$this->from_name = $from_name;
		
		return $this;
	}
	
	
	
	/* Изменение типа содержимого письма */
	public function setType($type) {
		$this->type = $type;
		
		return $this;
	}
	
	
	
	/* Нужно ли запрашивать подтверждение письма */
	public function setNotify($notify) {
		$this->notify = $notify;
		
		return $this;
	}
	
	
	
	/* Изменение кодировки письма */
	public function setEncoding($encoding) {
		$this->encoding = $encoding;
		
		return $this;
	}
	
	
	
	/* Метод отправки письма */
	public function send($to, $subject, $message) {
		$from = "=?utf-8?B?".base64_encode($this->from_name)."?="." <".$this->from.">";
		// 		Кодируем обратный адрес (во избежание проблем с кодировкой)
				    $headers = "From: ".$from."\r\nReply-To: ".$from."\r\nContent-type: ".$this->type."; charset=".$this->encoding."\r\n";
		// 		Устанавливаем необходимые заголовки письма
				    if ($this->notify) $headers .= "Disposition-Notification-To: ".$this->from."\r\n";
		// 		Добавляем запрос подтверждения получения письма, если требуется
				    $subject = "=?utf-8?B?".base64_encode($subject)."?=";
		// 		Кодируем тему (во избежание проблем с кодировкой)
				    return mail($to, $subject, $message, $headers);
		// 		Отправляем письмо и возвращаем результат
	}
	
}

$send_mail = new Mail();

$to = 'zhekisss@rambler.ru';
$subject = 'TEST';
$message = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus cum quasi laudantium, vitae, officia totam vel iure quisquam voluptatibus est atque inventore magnam aperiam nobis iste recusandae sapiente reiciendis consequuntur.';

$send_mail->setFrom('zhekisss@mail.ru')->send($to, $subject, $message);

?>
