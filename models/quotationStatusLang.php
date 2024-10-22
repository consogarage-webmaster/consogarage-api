<?php
class QuotationStatusLang
{
    private $id_roja45_quotation_status;
    private $id_lang;
    private $status;
    private $display_code;

    public function __construct($id_roja45_quotation_status = null, $id_lang = null, $status = null, $display_code = null)
    {
        $this->id_roja45_quotation_status = $id_roja45_quotation_status;
        $this->id_lang = $id_lang;
        $this->status = $status;
        $this->display_code = $display_code;
    }

    // Getters and Setters
    public function getIdRoja45QuotationStatus()
    {
        return $this->id_roja45_quotation_status;
    }

    public function setIdRoja45QuotationStatus($id_roja45_quotation_status)
    {
        $this->id_roja45_quotation_status = $id_roja45_quotation_status;
    }

    public function getIdLang()
    {
        return $this->id_lang;
    }

    public function setIdLang($id_lang)
    {
        $this->id_lang = $id_lang;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getDisplayCode()
    {
        return $this->display_code;
    }

    public function setDisplayCode($display_code)
    {
        $this->display_code = $display_code;
    }

    // Convert to array for easy JSON encoding
    public function toArray()
    {
        return get_object_vars($this);
    }
}
