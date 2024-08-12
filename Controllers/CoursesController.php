<?php

require basePath("Models/Course.php");
require basePath("Models/Enrollment.php");

class CoursesController
{
    private $db;

    public function __construct()
    {
        $this->db = new CoursesModel();
    }

    /**
     * Loads the view of all courses
     *
     * @return void
     */
    public function index()
    {
        $courses = $this->db->findAll();
        loadView("Courses/index", ["courses" => $courses]);
    }

    /**
     * Loads the view of a single course
     *
     * @param array $params
     * @return void
     */
    public function show($params)
    {

        $id = $params["id"];

        $course = $this->db->findOne("id", $id);
        loadView("Courses/show", ["course" => $course]);
    }

    /**
     * Loads the form to create a new course
     *
     * @return void
     */
    public function create(): void
    {
        loadView("Courses/create");
    }

    /**
     * Store a new course into the database
     *
     * @return void
     */
    public function store(): void
    {
        if (!Session::has("user") && !Session::get("user")["user_type"] === "admin") {
            header("location: /courses");
            exit;
        }

        $name = $_POST["name"] ?? "";
        $description = $_POST["description"] ?? "";
        $lessons = (int) $_POST["lessons"] ?? 0;
        $hours_video = (int) $_POST["hours_video"] ?? 0;
        $enrolled_students = 0;
        $teacher = $_POST["teacher"] ?? "";
        $img_url = $_POST["img_url"] ?? "";

        $this->db->add($name, $description, $hours_video, $lessons, $enrolled_students, $teacher, $img_url);

        Session::set("success_messages", ["message" => "Course Created successfully"]);

        header("location: /courses");
    }

    public function destroy($params)
    {
        if (!Session::has("user") && !Session::get("user")["user_type"] === "admin") {
            header("location: /courses");
            exit;
        }
        $courseId = $params["id"];

        $this->db->delete($courseId);

        Session::set("success_messages", ["message" => "Course deleted successfully"]);


        header("location: /courses");
    }

    public function editView($params): void
    {
        $courseId = (int) $params[""];

        $course = $this->db->findOne("id", $courseId);

        loadView("Courses/edit", ["course" => $course]);
    }

    public function update($params): void
    {
        if (!Session::has("user") && !Session::get("user")["user_type"] === "admin") {
            header("location: /courses");
            exit;
        }
        $courseId = $params["id"];

        $name = $_POST["name"] ?? "";
        $description = $_POST["description"] ?? "";
        $lessons = (int) $_POST["lessons"] ?? 0;
        $hours_video = (int) $_POST["hours_video"] ?? 0;
        $enrolled_students = 0;
        $teacher = $_POST["teacher"] ?? "";
        $img_url = $_POST["img_url"] ?? "";

        $this->db->update($courseId, $name, $description, $hours_video, $lessons, $enrolled_students, $teacher, $img_url);

        Session::set("success_messages", ["message" => "Course updated successfully"]);

        header("location: /courses");
        exit;
    }
}
