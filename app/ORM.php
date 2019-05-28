<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 30/03/19
 * Time: 14:03
 */

require_once __DIR__ . "/../core/db/SQL.php";

/**
 * Class ORM
 */
class ORM
{
    /**
     * @var string
     */
    protected $table;
    /**
     * @var SQL
     */
    protected $builder;
    /**
     * @var
     */
    protected $attributes;

    /**
     * ORM constructor.
     * @param $table
     */
    public function __construct($table = "")
    {
        if ($table == "") {
            $this->table = strtolower(get_class($this)) . "s";
        } else {
            $this->table = $table;
        }
        $this->builder = SQL::table($this->table);
        $this->builder->setModelClassName(get_class($this));
    }


    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        $builder = $this->getBuilder();
        return call_user_func_array([$builder, $name], $arguments);
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        $instance = new static(); //static - child. self - parent
        $builder = $instance->newBuilder();
        return call_user_func_array([$builder, $name], $arguments);
    }


    //st->name

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->attributes[$name];
    }

    //st->name

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    /**
     * @return SQL
     */
    public function getBuilder(): SQL
    {
        return $this->builder;
    }

    /**
     * @return SQL
     */
    public function newBuilder(): SQL
    {
        $builder = SQL::table($this->table);
        $builder->setModelClassName(get_class($this));
        return $builder;
    }


    /**
     * @param $result_row
     * @return ORM
     */
    public static function extract_from_result_array($result_row)
    {
        $obj = new static();

        //fields is written to $attributes via magic set...
        foreach ($result_row as $field_name => $field_value) {
            $obj->attributes[$field_name] = $field_value;
        }

        return $obj;
    }

    /**
     * @param array $composite_primary
     */
    public function save($composite_primary = [])
    {
        if ($composite_primary == []) {
            $already_existing = $this->is_already_existing_record($this->table, [key($this->attributes), $this->attributes[key($this->attributes)]]);
        } else {
            $already_existing = $this->is_already_existing_record($this->table, $composite_primary);
        }
        if ($already_existing) {
            $this->update($this->table, $this->attributes, $composite_primary);
        } else {
            $this->insert($this->table, $this->attributes);
        }
    }






    /**
     * @param $table
     * @param $field_name
     * @param $field_value
     * @return bool
     */

    //todo rework $existing in find
    /**
     * @param $table
     * @param $primary_keys
     * @return bool
     */
    public function is_already_existing_record($table, $primary_keys)
    {

        $select_all = "SELECT * FROM $table;";
        $res = $this->exct($select_all);

        $flag = false;

        foreach ($res as $record) {

            // проверка на подмножество
            if (0 == count(array_diff($primary_keys, $record))) {
                $flag = true;
                break;
            }
        }
        //echo "RES::";
       // echo $flag ? 1 : 0;
        return $flag;
    }

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }



}


spl_autoload_register(/**
 * @param $class
 */
    function ($class) {
    $file = "$class.php";
    if (is_file($file)) {
        require_once $file;
    }
});






//$b = User::emailAlreadyTaken("dsf", "students") ? 1 : 0;
//echo "fsdf" . $b;




////record creation.
//$exam_reg = new ExamRegistration("students_has_exams");
//$exam_reg->id_student = 36;
//$exam_reg->id_subject = 3;
//$exam_reg->exam_score = 99;
////$exam_reg->save(["id_student" => $_POST['idStudent'],"id_subject" => $_POST['idSubject']]);
//
//
//$exam_reg->is_already_existing_record("students_has_exams", ["id_student" => 36,"id_subject" => 1]);
//
//

//$users = User::table("students")->select()
//   ->get();


//$usersOrm = new User("students");
////$users = $usersOrm->select()->get();
//$users = $usersOrm->select()->get();
//
//foreach ($users as $car){
//    print_r($car);
//}




