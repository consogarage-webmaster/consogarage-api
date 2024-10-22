<?php

class QuotationProduct
{
    private $id_roja45_quotation_product;
    private $id_roja45_quotation;
    private $id_product;
    private $id_product_attribute;
    private $id_customization;
    private $id_shop;
    private $position;
    private $product_title;
    private $comment;
    private $qty;
    private $unit_price_tax_excl;
    private $unit_price_tax_incl;
    private $deposit_amount;
    private $discount;
    private $discount_type;
    private $customization_cost_exc;
    private $customization_cost_inc;
    private $customization_cost_type;
    private $custom_price;
    private $custom_image;
    private $id_specific_price;
    private $id_tax_rules_group;
    private $tax_rate;
    private $date_add;
    private $date_upd;

    // Constructor
    public function __construct($data)
    {
        if (!empty($data)) {
            $this->hydrate($data);
        }
    }

    // Hydrate method for bulk assignment
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Getters and setters for each column
    public function getIdRoja45QuotationProduct()
    {
        return $this->id_roja45_quotation_product;
    }
    public function setIdRoja45QuotationProduct($id)
    {
        $this->id_roja45_quotation_product = $id;
    }

    public function getIdRoja45Quotation()
    {
        return $this->id_roja45_quotation;
    }
    public function setIdRoja45Quotation($id)
    {
        $this->id_roja45_quotation = $id;
    }

    public function getIdProduct()
    {
        return $this->id_product;
    }
    public function setIdProduct($id)
    {
        $this->id_product = $id;
    }

    public function getIdProductAttribute()
    {
        return $this->id_product_attribute;
    }
    public function setIdProductAttribute($id)
    {
        $this->id_product_attribute = $id;
    }

    public function getIdCustomization()
    {
        return $this->id_customization;
    }
    public function setIdCustomization($id)
    {
        $this->id_customization = $id;
    }

    public function getIdShop()
    {
        return $this->id_shop;
    }
    public function setIdShop($id)
    {
        $this->id_shop = $id;
    }

    public function getPosition()
    {
        return $this->position;
    }
    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function getProductTitle()
    {
        return $this->product_title;
    }
    public function setProductTitle($title)
    {
        $this->product_title = $title;
    }

    public function getComment()
    {
        return $this->comment;
    }
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function getQty()
    {
        return $this->qty;
    }
    public function setQty($qty)
    {
        $this->qty = $qty;
    }

    public function getUnitPriceTaxExcl()
    {
        return $this->unit_price_tax_excl;
    }
    public function setUnitPriceTaxExcl($price)
    {
        $this->unit_price_tax_excl = $price;
    }

    public function getUnitPriceTaxIncl()
    {
        return $this->unit_price_tax_incl;
    }
    public function setUnitPriceTaxIncl($price)
    {
        $this->unit_price_tax_incl = $price;
    }

    public function getDepositAmount()
    {
        return $this->deposit_amount;
    }
    public function setDepositAmount($amount)
    {
        $this->deposit_amount = $amount;
    }

    public function getDiscount()
    {
        return $this->discount;
    }
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function getDiscountType()
    {
        return $this->discount_type;
    }
    public function setDiscountType($type)
    {
        $this->discount_type = $type;
    }

    public function getCustomizationCostExc()
    {
        return $this->customization_cost_exc;
    }
    public function setCustomizationCostExc($cost)
    {
        $this->customization_cost_exc = $cost;
    }

    public function getCustomizationCostInc()
    {
        return $this->customization_cost_inc;
    }
    public function setCustomizationCostInc($cost)
    {
        $this->customization_cost_inc = $cost;
    }

    public function getCustomizationCostType()
    {
        return $this->customization_cost_type;
    }
    public function setCustomizationCostType($type)
    {
        $this->customization_cost_type = $type;
    }

    public function getCustomPrice()
    {
        return $this->custom_price;
    }
    public function setCustomPrice($custom_price)
    {
        $this->custom_price = $custom_price;
    }

    public function getCustomImage()
    {
        return $this->custom_image;
    }
    public function setCustomImage($image)
    {
        $this->custom_image = $image;
    }

    public function getIdSpecificPrice()
    {
        return $this->id_specific_price;
    }
    public function setIdSpecificPrice($id)
    {
        $this->id_specific_price = $id;
    }

    public function getIdTaxRulesGroup()
    {
        return $this->id_tax_rules_group;
    }
    public function setIdTaxRulesGroup($id)
    {
        $this->id_tax_rules_group = $id;
    }

    public function getTaxRate()
    {
        return $this->tax_rate;
    }
    public function setTaxRate($rate)
    {
        $this->tax_rate = $rate;
    }

    public function getDateAdd()
    {
        return $this->date_add;
    }
    public function setDateAdd($date)
    {
        $this->date_add = $date;
    }

    public function getDateUpd()
    {
        return $this->date_upd;
    }
    public function setDateUpd($date)
    {
        $this->date_upd = $date;
    }

    // Method to convert object data to an array
    public function toArray()
    {
        return [
            'id_roja45_quotation_product' => $this->getIdRoja45QuotationProduct(),
            'id_roja45_quotation' => $this->getIdRoja45Quotation(),
            'id_product' => $this->getIdProduct(),
            'id_product_attribute' => $this->getIdProductAttribute(),
            'id_customization' => $this->getIdCustomization(),
            'id_shop' => $this->getIdShop(),
            'position' => $this->getPosition(),
            'product_title' => $this->getProductTitle(),
            'comment' => $this->getComment(),
            'qty' => $this->getQty(),
            'unit_price_tax_excl' => $this->getUnitPriceTaxExcl(),
            'unit_price_tax_incl' => $this->getUnitPriceTaxIncl(),
            'deposit_amount' => $this->getDepositAmount(),
            'discount' => $this->getDiscount(),
            'discount_type' => $this->getDiscountType(),
            'customization_cost_exc' => $this->getCustomizationCostExc(),
            'customization_cost_inc' => $this->getCustomizationCostInc(),
            'customization_cost_type' => $this->getCustomizationCostType(),
            'custom_price' => $this->getCustomPrice(),
            'custom_image' => $this->getCustomImage(),
            'id_specific_price' => $this->getIdSpecificPrice(),
            'id_tax_rules_group' => $this->getIdTaxRulesGroup(),
            'tax_rate' => $this->getTaxRate(),
            'date_add' => $this->getDateAdd(),
            'date_upd' => $this->getDateUpd()
        ];
    }
}
