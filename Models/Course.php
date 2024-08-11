<?php

require basePath("Models/BaseModel.php");

class CoursesModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct("courses");
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
    public function add(string $name, string $description, int $hours_video, int $lessons, int $enrolled_students, string $teacher, $img_url)
    {

        $params = [
            "teacher" => $teacher,
            "name" => $name,
            "description" => $description,
            "hours_video" => $hours_video,
            "lessons" => $lessons,
            "enrolled_students" => $enrolled_students,
            "img_url" => $img_url
        ];

        try {
            $query = "INSERT INTO {$this->table} (teacher, name, description, hours_video, lessons, enrolled_students, img_url) VALUES (:teacher, :name, :description, :hours_video, :lessons, :enrolled_students, :img_url)";

            $smth = $this->connection->prepare($query);
            $smth->execute($params);
        } catch (PDOException $e) {
            throw new Exception("Failed to add course: " . $e);
        }
    }

    /**
     * Delete a course
     *
     * @param string $id
     * @return void
     */
    public function delete(string $id): void
    {
        try {
            $query = "DELETE FROM courses WHERE id = :id";
            $params = ["id" => $id];

            $smth = $this->connection->prepare($query);
            $smth->execute($params);
        } catch (PDOException $e) {
            throw new Exception("Failed to delete course: " . $e);
        }
    }

    public function update(string $id, string $name, string $description, int $hours_video, int $lessons, int $enrolled_students, string $teacher, $img_url): void
    {
        $params = [
            "id" => $id,
            "teacher" => $teacher,
            "name" => $name,
            "description" => $description,
            "hours_video" => $hours_video,
            "lessons" => $lessons,
            "enrolled_students" => $enrolled_students,
            "img_url" => $img_url
        ];

        try {
            $query = "UPDATE courses SET teacher = :teacher, name = :name, description = :description, hours_video = :hours_video, lessons = :lessons, enrolled_students = :enrolled_students, img_url= :img_url WHERE id = :id";

            $smth = $this->connection->prepare($query);
            $smth->execute($params);
        } catch (PDOException $e) {
            throw new Exception("Failed to update course: " . $e);
        }
    }
}
