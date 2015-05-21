<?php namespace App\Http\Controllers\Install;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Request;

class InstallController extends Controller {
    private $db_user;
    private $db_password = '';
    private $db_host;
    private $db_name;
        
    public function getIndex()	{
		return view('install/index', ['success'=>false]);
	}

    public function postInstall(){
        $path = App::basePath();
    // Расположение файла дампа test.sql
        $dump_file=$path.'/database/test.sql';
    // Расположение файла для записи параметров подключения
        $file_setting=$path."/config/dbsetting.php";
    // Получение POST данных    
        $data = Request::all();
        if (isset($data['submit'])) { // если была нажата кнопка
            $this->db_user = trim($data['db_user']);
            $this->db_password=trim($data['db_password']);
            $this->db_host=trim($data['db_host']);
            $this->db_name=trim($data['db_name']);
        
        
    // Подключаемся к базе данных
        $connection = $this->connectDB();
    // Удаление всех таблиц из БД
        $this->dropTable($connection);
    // Парсим файл дампа и удаляем комментарии и пустые строки
        $query = $this->parsingDumpFile($dump_file);
    // Помещаем данные из дампа в БД
        $this->putDumpDB($connection, $query);
    // Записываем параметры подключения в установочный файл
        $this->putSettingFile($file_setting);
        
    // Формируем страницу отображения
        return view('install/index', ['success'=>true]);
        }
    }    
        
// Функция подключения к базе данных        
    public function connectDB() {    
        $conn = array('driver'    => 'mysql',
                    'host'      => $this->db_host,
                    'database'  => $this->db_name,
                    'username'  => $this->db_user,
                    'password'  => $this->db_password,
                    'charset'   => 'utf8',
                    'collation' => 'utf8_unicode_ci',
                    'prefix'    => '',
                    'strict'    => false);
        Config::set('database.connections.mysql', $conn);
        $connection = DB::connection('mysql');
        return $connection;
    }
// Функция очистки базы данных
    public function dropTable($connection) {    
        $res = array();
        $query = $connection->select('SHOW TABLES FROM ' . $this->db_name); 
            foreach($query as $row){
                foreach($row as $val){
                    $res[]= $val;
                }
        }
        if (!empty($res)){
            $connection->statement("SET foreign_key_checks = 0");
            $connection->statement("DROP TABLE " . implode(",", $res));
        }
    }
// Функция парсинга файла дампа данных БД
    public function parsingDumpFile($dump_file) {
        if (file_exists($dump_file)){
            $file=file($dump_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                $c = count($file);
                for( $i = 0; $i < $c; $i++){
                    if(substr(trim($file[$i]),0,2) == '--'){
                        unset($file[$i]);
                    }
                }
        $query = explode(';', implode ($file));
        return $query; 
        }
        else {
            header("Content-type: text/html; Charset=utf-8");
            exit ('Дампа БД не существует. Проверьте наличие файла test.sql в директории /database<br>'
                    . '<a href="'. URL::to('/install') .'">Вернуться назад.</a>');
        }
    }
// Функция записи дампа в БД
    public function putDumpDB($connection, array $query) {
        foreach ($query as $v){
            if (!empty($v)){
                $connection->statement($v);
            }
        }
    }
// Функция записи данных подключения в файл
    public function putSettingFile($file_setting) {
        $string =
            "<?php \r\n"
                . '$dbuser = \'' .  $this->db_user . "'; \r\n"
                . '$dbpass = \'' .  $this->db_password . "'; \r\n"
                . '$dbhost = \'' .  $this->db_host . "'; \r\n"
                . '$dbname = \'' .  $this->db_name . "'; \r\n";
        if(!file_put_contents($file_setting, $string)) { 
            header("Content-type: text/html; Charset=utf-8");
            exit ('Возникла ошибка при записи файла данных подключения к БД.<br>'
                    . '<a href="'. URL::to('/install') .'">Вернуться назад.</a>');
        } 
    }

}
