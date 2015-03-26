<?php 
class Log{
	public $fileName;
	public static function logMessage($logLevel, $message){
		$fileName = 'data/log-' . date('Y') . '.txt';
		$handle = fopen($fileName, 'a');
		fwrite($handle, date("H:i:s")." ".$logLevel." ".$message."\n");
		fclose($handle);
	}
	public static function info($message){
		Log::logMessage('Info', $message);
	}
	public static function error($message){
		Log::logMessage('Error', $message);
	}
	public function __construct($prefix = "log", $suffix = "txt"){
		$this->fileName = "data/{$prefix}-".date("Y-m-d").".{$suffix}";
	}
}
?>