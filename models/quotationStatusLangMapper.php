<?php
require_once 'quotationStatusLang.php';

class QuotationStatusLangMapper
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db->getConnection();
    }

    // Method to find QuotationStatusLang by its ID
    public function findById($id, $lang)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM ps_roja45_quotationspro_status_lang WHERE id_roja45_quotation_status = ? AND id_lang = ?"
        );

        if (!$stmt) {
            die("Error preparing statement: " . $this->db->error);
        }

        $stmt->bind_param("ii", $id, $lang);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            return new QuotationStatusLang(
                $row['id_roja45_quotation_status'],
                $row['id_lang'],
                $row['status'],
                $row['display_code']
            );
        }

        return null;
    }

    // Method to find all QuotationStatusLang entries
    public function findAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM ps_roja45_quotationspro_status_lang");

        if (!$stmt) {
            die("Error preparing statement: " . $this->db->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        $statuses = [];
        while ($row = $result->fetch_assoc()) {
            $statuses[] = new QuotationStatusLang(
                $row['id_roja45_quotation_status'],
                $row['id_lang'],
                $row['status'],
                $row['display_code']
            );
        }

        return $statuses;
    }

    // Method to create a new QuotationStatusLang entry
    public function create(QuotationStatusLang $statusLang)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO ps_roja45_quotationspro_status_lang (id_roja45_quotation_status, id_lang, status, display_code) VALUES (?, ?, ?, ?)"
        );

        if (!$stmt) {
            die("Error preparing statement: " . $this->db->error);
        }

        $stmt->bind_param(
            "iiss",
            $statusLang->getIdRoja45QuotationStatus(),
            $statusLang->getIdLang(),
            $statusLang->getStatus(),
            $statusLang->getDisplayCode()
        );

        if (!$stmt->execute()) {
            die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }

        $stmt->close();
    }

    // Method to update a QuotationStatusLang entry
    public function update(QuotationStatusLang $statusLang)
    {
        $stmt = $this->db->prepare(
            "UPDATE ps_roja45_quotationspro_status_lang SET status = ?, display_code = ? WHERE id_roja45_quotation_status = ? AND id_lang = ?"
        );

        if (!$stmt) {
            die("Error preparing statement: " . $this->db->error);
        }

        $stmt->bind_param(
            "ssii",
            $statusLang->getStatus(),
            $statusLang->getDisplayCode(),
            $statusLang->getIdRoja45QuotationStatus(),
            $statusLang->getIdLang()
        );

        if (!$stmt->execute()) {
            die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }

        $stmt->close();
    }

    // Method to delete a QuotationStatusLang entry
    public function delete($id, $lang)
    {
        $stmt = $this->db->prepare("DELETE FROM ps_roja45_quotationspro_status_lang WHERE id_roja45_quotation_status = ? AND id_lang = ?");

        if (!$stmt) {
            die("Error preparing statement: " . $this->db->error);
        }

        $stmt->bind_param("ii", $id, $lang);

        if (!$stmt->execute()) {
            die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }

        $stmt->close();
    }
}
