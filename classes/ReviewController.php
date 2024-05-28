<?php
require_once "DatabaseController.php";

class ReviewController {
    protected $db;

    public function __construct(DatabaseController $db) {
        $this->db = $db;
    }

    public function addReview($comment, $rating) {
        $query = "INSERT INTO reviews (Comment, Rating) VALUES (:comment, :rating)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":comment", $comment);
        $stmt->bindParam(":rating", $rating);
        return $stmt->execute();
    }

    public function getAllReviews() {
        $query = "SELECT * FROM reviews";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteReview($reviewId) {
        $query = "DELETE FROM reviews WHERE Reviews_id = :reviewId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":reviewId", $reviewId);
        return $stmt->execute();
    }
}
?>
