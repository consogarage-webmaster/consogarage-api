<?php
class QuotationStatus
{
    private $id_roja45_quotation_status;
    private $color;

    public function __construct($id_roja45_quotation_status = null, $color = null)
    {
        $this->id_roja45_quotation_status = $id_roja45_quotation_status;
        $this->color = $color;
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

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }
}
