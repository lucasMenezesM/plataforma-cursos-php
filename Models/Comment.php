<?php

require_once basePath("Models/BaseModel.php");

class Comment extends BaseModel
{
    public function __construct()
    {
        parent::__construct("comments");
    }

    /**
     * Create a new comment
     *
     * @param string $title
     * @param string $content
     * @param string $userId
     * @param string $courseId
     * @return void
     */
    public function add(string $title, string $content, string $userId, string $courseId): void
    {
        $query = "INSERT INTO comments (title, content, user_id, course_id) VALUES (:title, :content, :user_id, :course_id)";

        $params = [
            "title" => $title,
            "content" => $content,
            "user_id" => $userId,
            "course_id" => $courseId
        ];

        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute($params);
        } catch (PDOException $e) {
            throw new Error("Failed to add comment: " . $e->getMessage());
        }
    }

    /**
     * Deletes a comment from the database
     *
     * @param string $commentId
     * @return void
     */
    public function delete(string $commentId): void
    {
        $query = "DELETE FROM comments WHERE id = :id";
        $params = ["id" => $commentId];
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute($params);
        } catch (PDOException $e) {
            throw new Error("Failed to delete comment: " . $e->getMessage());
        }
    }
}
