<?php

require basePath("Models/Enrollment.php");

class EnrollmentController
{
    private $db;
    public function __construct()
    {
        $this->db  = new Enrollment();
    }

    /**
     * Enroll a new course
     *
     * @return void
     */
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

        $enrollment = $this->db->customFetch($query, $params, false);

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

    /**
     * Returns all the active enrollments of the current user
     *
     * @return void
     */
    public function showAll(): void
    {
        $userId = Session::get("user")["id"];

        $query = "SELECT courses_enrollment.id as id, courses_enrollment.created_at, c.img_url, c.name as course_name, c.description, u.name as user_name FROM courses_enrollment 
        INNER JOIN users u ON u.id = courses_enrollment.student_id
        INNER JOIN courses c on c.id = courses_enrollment.course_id
        WHERE u.id = :userId;";

        $params = ["userId" => $userId];

        $enrollments = $this->db->customFetch($query, $params);

        // $enrollments = $this->db->findAll("student_id", $userId);

        loadView("/Courses/enrollments", ["enrollments" => $enrollments]);
    }

    /**
     * Remove a course enrollment 
     *
     * @param string $enrollmentId
     * @return void
     */
    public function destroy(): void
    {
        $enrollmentId = $_POST["enrollmentId"];

        $this->db->delete($enrollmentId);

        Session::set("success_messages", ["message" => "Enrollment successfully removed"]);

        header("location: /courses");
        exit;
    }
}
