<?php
/**
* Создайте класс с именем Logger, реализуйте все необходимые методы для работы с логированием данных:
* Обеспечьте возможность записи логов в файл
* Обеспечьте возможность задания уровня логов (TRACE, DEBUG, INFO, WARN, ERROR, FATAL)
* Файл с логами должен хранить следующую информацию (дата и время, сообщение, уровень), через разделитель  (по умолчанию точка с запятой).
* Обработать все возможные исключительные ситуации
* Продумать какие должны быть методы, параметры методов т.е. продумать структуру класса (Возможно это ряд классов… если это будет аргументированно)
* Реализовать pattern singleton для этого класса, - аргументировать, если считаете что singleton не допустим для этого задания - аргументировать
* Реализовать механизм формата хранения логов. К примеру date, level, message...

*/

class Logger {
    
    private static $instances = [];
    private $levels = [];
    protected $fileName;
    protected $separator;
    
    
    protected function __construct($fileName) {
        $this->fileName = $fileName;
        $this->separator = ';';
        $this->levels = ['TRACE', 'DEBUG', 'INFO', 'WARN', 'ERROR', 'FATAL'];
    }
    
    public static function getInstance($fileName) {
        if(self::$instances[$fileName] === null){
            self::$instances[$fileName] = new self($fileName);
        }

        return self::$instances[$fileName];
    }
    
    public function writeLog(string $message, array $format = ['date', 'level', 'message'], string $level = 'TRACE'): void {
        if (!$this->isLevel($level)) {
            throw new Exception("Level $level is not exist!");
        }
        
        if (!$message) {
            throw new Exception("Message is empty!");
        }
        
        $log = '';
        $date = date("[Y-m-d H:i:s]");
        
        foreach ($format as $value) {
            $log.= $$value . $this->separator;
        }
        
        file_put_contents($this->fileName, "$log\n", FILE_APPEND);
    
    }
    
    protected function isLevel(string $level): bool {
        foreach ($this->levels as $value) {
            if ($value == $level) {
                return true;
            }
        }
        return false;
    }
    
}

$logFile = 'logs.log';
$format = ['date', 'message', 'level'];

Logger::getInstance($logFile)->writeLog("Message_2", $format, 'DEBUG');

