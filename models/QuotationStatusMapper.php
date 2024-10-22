<?php
require_once 'databaseConnexion.php'; // Assuming you have this file to establish DB connection
require_once 'quotationStatus.php';  // The QuotationStatus class

class QuotationStatusMapper
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db->getConnection();
    }

    // Method to find a QuotationStatus by its ID
    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT id_roja45_quotation_status, color FROM ps_roja45_quotationspro_status WHERE id_roja45_quotation_status = ?");
        if (!$stmt) {
            die("Error preparing statement: " . $this->db->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            return new QuotationStatus($row['id_roja45_quotation_status'], $row['color']);
        }

        return null;
    }

    // Method to update color by ID
    public function updateColor($id, $color)
    {
        $stmt = $this->db->prepare("UPDATE ps_roja45_quotationspro_status SET color = ? WHERE id_roja45_quotation_status = ?");
        if (!$stmt) {
            die("Error preparing statement: " . $this->db->error);
        }

        $stmt->bind_param("si", $color, $id);

        if (!$stmt->execute()) {
            die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }

        $stmt->close();
    }

    // Method to create a new QuotationStatus
    public function create(QuotationStatus $status)
    {
        $stmt = $this->db->prepare("INSERT INTO ps_roja45_quotationspro_status (color) VALUES (?)");
        if (!$stmt) {
            die("Error preparing statement: " . $this->db->error);
        }

        $stmt->bind_param("s", $status->getColor());

        if (!$stmt->execute()) {
            die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }

        $stmt->close();
    }

    // Method to delete a QuotationStatus by its ID
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM ps_roja45_quotationspro_status WHERE id_roja45_quotation_status = ?");

        if (!$stmt) {
            die("Error preparing statement: " . $this->db->error);
        }

        $stmt->bind_param("i", $id);

        if (!$stmt->execute()) {
            die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }

        $stmt->close();
    }
}
