<?php

require basePath("Models/Course.php");
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
        inspect($this->db->findAll());
    }

    /**
     * Loads the view of a single course
     *
     * @param array $params
     * @return void
     */
    public function show(array $params)
    {
        $id = $params["id"];
        echo "id: " . $id;
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
        inspect($_POST);

        $name = $_POST["name"] ?? "";
        $description = $_POST["description"] ?? "";
        $lessons = (int) $_POST["lessons"] ?? 0;
        $hours_video = (int) $_POST["hours_video"] ?? 0;
        $enrolled_students = (int) $_POST["enrolled_students"] ?? 0;
        $teacher = $_POST["teacher"] ?? "";

        $this->db->add($name, $description, $hours_video, $lessons, $enrolled_students, $teacher);
    }
}
