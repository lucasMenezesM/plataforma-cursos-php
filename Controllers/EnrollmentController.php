<?php

require basePath("Models/Enrollment.php");

class EnrollmentController
{
    private $db;
    public function __construct()
    {
        $this->db  = new Enrollment();
    }

    public function enroll(): void
    {
        $courseId = htmlspecialchars($_POST["courseId"]);
        $userId = htmlspecialchars($_POST["userId"]);
        $errors = [];

        $query = "SELECT * FROM courses_enrollment WHERE student_id = :userId AND course_id = :courseId";
        $params = [
            "userId" => $userId,
            "courseId" => $courseId,
        ];

        $enrollment = $this->db->curstomFetch($query, $params, false);

        if ($enrollment) {
            $errors[] = ["message" => "You are already enrolled in this course."];
            Session::set("error_messages", $errors);
            header("location: /courses/" . $courseId);
            exit;
        }

        $this->db->add($userId, $courseId);

        Session::set("success_messages", ["message" => "Course successfully enrolled"]);
        header("location: /courses");
        exit;
    }

    public function showAll(): void
    {
        $userId = Session::get("user")["id"];

        $query = "SELECT * FROM courses_enrollment 
        INNER JOIN users ON users.id = courses_enrollment.student_id
        INNER JOIN courses on courses.id = courses_enrollment.course_id
        WHERE users.id = :userId;";

        $params = ["userId" => $userId];

        $enrollments = $this->db->curstomFetch($query, $params);

        // $enrollments = $this->db->findAll("student_id", $userId);

        loadView("/Courses/enrollments", ["enrollments" => $enrollments]);
    }
}
