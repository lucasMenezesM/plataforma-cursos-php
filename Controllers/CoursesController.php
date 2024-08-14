<?php

require basePath("Models/Course.php");
require basePath("Models/Enrollment.php");
require basePath("Models/Comment.php");

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

        $query = "select u.name, comments.user_id, title, content, comments.created_at, comments.id from comments inner join users u on comments.user_id = u.id inner join courses c on comments.course_id = c.id where c.id = :courseId";

        $params = [
            "courseId" => $id
        ];

        $commentsDb = new Comment();

        $comments = $commentsDb->customFetch($query, $params, true);


        $course = $this->db->findOne("id", $id);
        loadView("Courses/show", ["course" => $course, "comments" => $comments]);
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

    /**
     * Delete a course from database
     *
     * @param array $params
     * @return void
     */
    public function destroy(array $params)
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

    /**
     * Loads the edit course view
     *
     * @param array $params
     * @return void
     */
    public function editView($params): void
    {
        $courseId = (int) $params[""];

        $course = $this->db->findOne("id", $courseId);

        loadView("Courses/edit", ["course" => $course]);
    }

    /**
     * Updates a course
     *
     * @param array $params
     * @return void
     */
    public function update(array $params): void
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

    /**
     * Loads the view with the given query
     *
     * @return void
     */
    public function search(): void
    {
        // $query = "SELECT * FROM courses WHERE name LIKE '%:query1%' OR teacher LIKE '%:query2%'";
        $query = "SELECT * FROM courses WHERE name LIKE CONCAT('%', :query, '%') OR teacher LIKE CONCAT('%', :query, '%')";

        // $params = [
        //     ":query1" => $_GET["query"],
        //     ":query2" => $_GET["query"]
        // ];

        $params = [':query' => $_GET['query']];

        $courses = $this->db->customFetch($query, $params);

        loadView("Courses/index", ["courses" => $courses, "search" => $_GET['query']]);
    }
}
