<?php
class Quotation
{
    private $id_roja45_quotation;
    private $id_roja45_quotation_status;
    private $id_lang;
    private $id_shop;
    private $id_currency;
    private $id_country;
    private $id_state;
    private $id_address_invoice;
    private $id_address_delivery;
    private $id_address_tax;
    private $id_carrier;
    private $id_request;
    private $expiry_date;
    private $valid_days;
    private $email;
    private $firstname;
    private $lastname;
    private $form_data;
    private $reference;
    private $filename;
    private $calculate_taxes;
    private $modified;
    private $quote_sent;
    private $id_customer;
    private $tmp_password;
    private $id_cart;
    private $id_order;
    private $purchase_date;
    private $id_employee;
    private $id_profile;
    private $total_to_pay;
    private $total_products;
    private $total_discount;
    private $total_discount_wt;
    private $total_shipping;
    private $total_shipping_wt;
    private $total_handling;
    private $total_handling_wt;
    private $total_wrapping;
    private $total_wrapping_wt;
    private $total_charges;
    private $total_charges_wt;
    private $is_template;
    private $quote_name;
    private $template_name;
    private $date_add;
    private $date_upd;

    // Constructor
    public function __construct(
        $id_roja45_quotation = null,
        $id_roja45_quotation_status = null,
        $id_lang = null,
        $id_shop = null,
        $id_currency = null,
        $id_country = null,
        $id_state = null,
        $id_address_invoice = null,
        $id_address_delivery = null,
        $id_address_tax = null,
        $id_carrier = null,
        $id_request = null,
        $expiry_date = null,
        $valid_days = null,
        $email = null,
        $firstname = null,
        $lastname = null,
        $form_data = null,
        $reference = null,
        $filename = null,
        $calculate_taxes = null,
        $modified = null,
        $quote_sent = null,
        $id_customer = null,
        $tmp_password = null,
        $id_cart = null,
        $id_order = null,
        $purchase_date = null,
        $id_employee = null,
        $id_profile = null,
        $total_to_pay = null,
        $total_products = null,
        $total_discount = null,
        $total_discount_wt = null,
        $total_shipping = null,
        $total_shipping_wt = null,
        $total_handling = null,
        $total_handling_wt = null,
        $total_wrapping = null,
        $total_wrapping_wt = null,
        $total_charges = null,
        $total_charges_wt = null,
        $is_template = null,
        $quote_name = null,
        $template_name = null,
        $date_add = null,
        $date_upd = null
    ) {
        $this->id_roja45_quotation = $id_roja45_quotation;
        $this->id_roja45_quotation_status = $id_roja45_quotation_status;
        $this->id_lang = $id_lang;
        $this->id_shop = $id_shop;
        $this->id_currency = $id_currency;
        $this->id_country = $id_country;
        $this->id_state = $id_state;
        $this->id_address_invoice = $id_address_invoice;
        $this->id_address_delivery = $id_address_delivery;
        $this->id_address_tax = $id_address_tax;
        $this->id_carrier = $id_carrier;
        $this->id_request = $id_request;
        $this->expiry_date = $expiry_date;
        $this->valid_days = $valid_days;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->form_data = $form_data;
        $this->reference = $reference;
        $this->filename = $filename;
        $this->calculate_taxes = $calculate_taxes;
        $this->modified = $modified;
        $this->quote_sent = $quote_sent;
        $this->id_customer = $id_customer;
        $this->tmp_password = $tmp_password;
        $this->id_cart = $id_cart;
        $this->id_order = $id_order;
        $this->purchase_date = $purchase_date;
        $this->id_employee = $id_employee;
        $this->id_profile = $id_profile;
        $this->total_to_pay = $total_to_pay;
        $this->total_products = $total_products;
        $this->total_discount = $total_discount;
        $this->total_discount_wt = $total_discount_wt;
        $this->total_shipping = $total_shipping;
        $this->total_shipping_wt = $total_shipping_wt;
        $this->total_handling = $total_handling;
        $this->total_handling_wt = $total_handling_wt;
        $this->total_wrapping = $total_wrapping;
        $this->total_wrapping_wt = $total_wrapping_wt;
        $this->total_charges = $total_charges;
        $this->total_charges_wt = $total_charges_wt;
        $this->is_template = $is_template;
        $this->quote_name = $quote_name;
        $this->template_name = $template_name;
        $this->date_add = $date_add;
        $this->date_upd = $date_upd;
    }

    // Getters and Setters for each property
    public function getIdroja45Quotation()
    {
        return $this->id_roja45_quotation;
    }
    public function setIdroja45Quotation($id_roja45_quotation)
    {
        $this->id_roja45_quotation = $id_roja45_quotation;
    }


    public function setIdroja45QuotationStatus($id_roja45_quotation_status)
    {
        $this->id_roja45_quotation_status = $id_roja45_quotation_status;
    }
    public function getIdroja45QuotationStatus()
    {
        return $this->id_roja45_quotation_status;
    }
    public function getIdLang()
    {
        return $this->id_lang;
    }
    public function setIdLang($id_lang)
    {
        $this->id_lang = $id_lang;
    }

    public function getIdShop()
    {
        return $this->id_shop;
    }
    public function setIdShop($id_shop)
    {
        $this->id_shop = $id_shop;
    }

    public function getIdCurrency()
    {
        return $this->id_currency;
    }
    public function setIdCurrency($id_currency)
    {
        $this->id_currency = $id_currency;
    }

    public function getIdCountry()
    {
        return $this->id_country;
    }
    public function setIdCountry($id_country)
    {
        $this->id_country = $id_country;
    }

    public function getIdState()
    {
        return $this->id_state;
    }
    public function setIdState($id_state)
    {
        $this->id_state = $id_state;
    }

    public function getIdAddressInvoice()
    {
        return $this->id_address_invoice;
    }
    public function setIdAddressInvoice($id_address_invoice)
    {
        $this->id_address_invoice = $id_address_invoice;
    }

    public function getIdAddressDelivery()
    {
        return $this->id_address_delivery;
    }
    public function setIdAddressDelivery($id_address_delivery)
    {
        $this->id_address_delivery = $id_address_delivery;
    }

    public function getIdAddressTax()
    {
        return $this->id_address_tax;
    }
    public function setIdAddressTax($id_address_tax)
    {
        $this->id_address_tax = $id_address_tax;
    }

    public function getIdCarrier()
    {
        return $this->id_carrier;
    }
    public function setIdCarrier($id_carrier)
    {
        $this->id_carrier = $id_carrier;
    }

    public function getIdRequest()
    {
        return $this->id_request;
    }
    public function setIdRequest($id_request)
    {
        $this->id_request = $id_request;
    }

    public function getExpiryDate()
    {
        return $this->expiry_date;
    }
    public function setExpiryDate($expiry_date)
    {
        $this->expiry_date = $expiry_date;
    }

    public function getValidDays()
    {
        return $this->valid_days;
    }
    public function setValidDays($valid_days)
    {
        $this->valid_days = $valid_days;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getFormData()
    {
        return $this->form_data;
    }
    public function setFormData($form_data)
    {
        $this->form_data = $form_data;
    }

    public function getReference()
    {
        return $this->reference;
    }
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function getFilename()
    {
        return $this->filename;
    }
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    public function getCalculateTaxes()
    {
        return $this->calculate_taxes;
    }
    public function setCalculateTaxes($calculate_taxes)
    {
        $this->calculate_taxes = $calculate_taxes;
    }

    public function getModified()
    {
        return $this->modified;
    }
    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    public function getQuoteSent()
    {
        return $this->quote_sent;
    }
    public function setQuoteSent($quote_sent)
    {
        $this->quote_sent = $quote_sent;
    }

    public function getIdCustomer()
    {
        return $this->id_customer;
    }
    public function setIdCustomer($id_customer)
    {
        $this->id_customer = $id_customer;
    }

    public function getTmpPassword()
    {
        return $this->tmp_password;
    }
    public function setTmpPassword($tmp_password)
    {
        $this->tmp_password = $tmp_password;
    }

    public function getIdCart()
    {
        return $this->id_cart;
    }
    public function setIdCart($id_cart)
    {
        $this->id_cart = $id_cart;
    }

    public function getIdOrder()
    {
        return $this->id_order;
    }
    public function setIdOrder($id_order)
    {
        $this->id_order = $id_order;
    }

    public function getPurchaseDate()
    {
        return $this->purchase_date;
    }
    public function setPurchaseDate($purchase_date)
    {
        $this->purchase_date = $purchase_date;
    }

    public function getIdEmployee()
    {
        return $this->id_employee;
    }
    public function setIdEmployee($id_employee)
    {
        $this->id_employee = $id_employee;
    }

    public function getIdProfile()
    {
        return $this->id_profile;
    }
    public function setIdProfile($id_profile)
    {
        $this->id_profile = $id_profile;
    }

    public function getTotalToPay()
    {
        return $this->total_to_pay;
    }
    public function setTotalToPay($total_to_pay)
    {
        $this->total_to_pay = $total_to_pay;
    }

    public function getTotalProducts()
    {
        return $this->total_products;
    }
    public function setTotalProducts($total_products)
    {
        $this->total_products = $total_products;
    }

    public function getTotalDiscount()
    {
        return $this->total_discount;
    }
    public function setTotalDiscount($total_discount)
    {
        $this->total_discount = $total_discount;
    }

    public function getTotalDiscountWt()
    {
        return $this->total_discount_wt;
    }
    public function setTotalDiscountWt($total_discount_wt)
    {
        $this->total_discount_wt = $total_discount_wt;
    }

    public function getTotalShipping()
    {
        return $this->total_shipping;
    }
    public function setTotalShipping($total_shipping)
    {
        $this->total_shipping = $total_shipping;
    }

    public function getTotalShippingWt()
    {
        return $this->total_shipping_wt;
    }
    public function setTotalShippingWt($total_shipping_wt)
    {
        $this->total_shipping_wt = $total_shipping_wt;
    }

    public function getTotalHandling()
    {
        return $this->total_handling;
    }
    public function setTotalHandling($total_handling)
    {
        $this->total_handling = $total_handling;
    }

    public function getTotalHandlingWt()
    {
        return $this->total_handling_wt;
    }
    public function setTotalHandlingWt($total_handling_wt)
    {
        $this->total_handling_wt = $total_handling_wt;
    }

    public function getTotalWrapping()
    {
        return $this->total_wrapping;
    }
    public function setTotalWrapping($total_wrapping)
    {
        $this->total_wrapping = $total_wrapping;
    }

    public function getTotalWrappingWt()
    {
        return $this->total_wrapping_wt;
    }
    public function setTotalWrappingWt($total_wrapping_wt)
    {
        $this->total_wrapping_wt = $total_wrapping_wt;
    }

    public function getTotalCharges()
    {
        return $this->total_charges;
    }
    public function setTotalCharges($total_charges)
    {
        $this->total_charges = $total_charges;
    }

    public function getTotalChargesWt()
    {
        return $this->total_charges_wt;
    }
    public function setTotalChargesWt($total_charges_wt)
    {
        $this->total_charges_wt = $total_charges_wt;
    }

    public function getIsTemplate()
    {
        return $this->is_template;
    }
    public function setIsTemplate($is_template)
    {
        $this->is_template = $is_template;
    }

    public function getQuoteName()
    {
        return $this->quote_name;
    }
    public function setQuoteName($quote_name)
    {
        $this->quote_name = $quote_name;
    }

    public function getTemplateName()
    {
        return $this->template_name;
    }
    public function setTemplateName($template_name)
    {
        $this->template_name = $template_name;
    }

    public function getDateAdd()
    {
        return $this->date_add;
    }
    public function setDateAdd($date_add)
    {
        $this->date_add = $date_add;
    }

    public function getDateUpd()
    {
        return $this->date_upd;
    }
    public function setDateUpd($date_upd)
    {
        $this->date_upd = $date_upd;
    }
    // Method to return id_roja45_quotation

    // Convert to array method for easier JSON encoding
    public function toArray()
    {
        return get_object_vars($this);
    }
}
