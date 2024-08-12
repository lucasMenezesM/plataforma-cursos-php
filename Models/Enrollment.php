<?php

require_once basePath("Models/BaseModel.php");

class Enrollment extends BaseModel
{
    public function __construct()
    {
        parent::__construct("courses_enrollment");
    }

    /**
     * Adds a new enrollment using a student id and a course id
     *
     * @param string $studentId
     * @param string $courseId
     * @return void
     */
    public function add(string $studentId, string $courseId): void
    {
        try {
            $query = "INSERT INTO courses_enrollment (student_id, course_id) VALUES (:student_id, :course_id)";
            $params = [
                "student_id" => $studentId,
                "course_id" => $courseId,
            ];

            $smth = $this->connection->prepare($query);
            $smth->execute($params);
        } catch (PDOException $e) {
            throw new Exception("Failed to add enrollment: " . $e);
        }
    }
}
