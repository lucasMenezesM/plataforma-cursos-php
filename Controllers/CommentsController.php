<?php

require basePath("Models/Comment.php");

class CommentsController
{
    private $db;
    public function __construct()
    {
        $this->db = new Comment();
    }

    /**
     * Creates a new comment
     *
     * @return void
     */
    public function create(): void
    {
        $title = $_POST["title"];
        $content = $_POST["content"];
        $courseId = $_POST["courseId"];
        $userId = Session::get("user")["id"];

        $this->db->add($title, $content, $userId, $courseId);
        header("location: /courses/" . $courseId);
        exit;
    }

    public function destroy(): void
    {
        $commentId = $_POST["commentId"];
        $userId = $_POST["userId"];
        $courseId = $_POST["courseId"];

        // Check if the user is authorize to delete a comment
        if (!Session::has("user") || !Session::get("user")["id"] === $userId) {
            header("Location: /users/login");
            exit;
        }

        $this->db->delete($commentId);
        header("location: courses/" . $courseId);
        exit;
    }
}
