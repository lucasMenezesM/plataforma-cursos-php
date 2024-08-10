<?php

require basePath("Models/BaseModel.php");

class CoursesModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct("Courses");
    }

    /**
     * Add a new course
     *
     * @param string $nome
     * @param string $descricao
     * @param integer $carga_horaria
     * @param integer $qtd_aulas
     * @param integer $qtd_alunos_matriculados
     * @return void
     */
    public function add(string $name, string $description, int $hours_video, int $lessons, int $enrolled_students, string $teacher)
    {

        $params = [
            "teacher" => $teacher,
            "name" => $name,
            "description" => $description,
            "hours_video" => $hours_video,
            "lessons" => $lessons,
            "enrolled_students" => $enrolled_students
        ];

        $query = "INSERT INTO {$this->table} (teacher, name, description, hours_video, lessons, enrolled_students) VALUES (:teacher, :name, :description, :hours_video, :lessons, :enrolled_students)";

        $smth = $this->connection->prepare($query);
        $smth->execute($params);
    }
}
