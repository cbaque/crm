<?php

class fecha {
	public static function getDatetimeNow() {
		$tz_object = new DateTimeZone('America/Guayaquil');

		$datetime = new DateTime();
		$datetime->setTimezone($tz_object);
		return $datetime->format('Y\-m\-d\ h:i:s');
	}
}
?>