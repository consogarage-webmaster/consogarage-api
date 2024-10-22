<?php
require_once 'databaseConnexion.php';
require_once 'quotation.php';

class QuotationMapper
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db->getConnection();
    }
    // public function getIdRoja45Quotation()
    // {
    //     return $this->id_roja45_quotation;
    // }

    // Method to find a Quotation by its ID
    public function findById($id)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM ps_roja45_quotationspro WHERE id_roja45_quotation = ?"
        );

        if (!$stmt) {
            die("Error preparing statement: " . $this->db->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            return new Quotation(
                $row['id_roja45_quotation'],
                $row['id_roja45_quotation_status'],
                $row['id_lang'],
                $row['id_shop'],
                $row['id_currency'],
                $row['id_country'],
                $row['id_state'],
                $row['id_address_invoice'],
                $row['id_address_delivery'],
                $row['id_address_tax'],
                $row['id_carrier'],
                $row['id_request'],
                $row['expiry_date'],
                $row['valid_days'],
                $row['email'],
                $row['firstname'],
                $row['lastname'],
                $row['form_data'],
                $row['reference'],
                $row['filename'],
                $row['calculate_taxes'],
                $row['modified'],
                $row['quote_sent'],
                $row['id_customer'],
                $row['tmp_password'],
                $row['id_cart'],
                $row['id_order'],
                $row['purchase_date'],
                $row['id_employee'],
                $row['id_profile'],
                $row['total_to_pay'],
                $row['total_products'],
                $row['total_discount'],
                $row['total_discount_wt'],
                $row['total_shipping'],
                $row['total_shipping_wt'],
                $row['total_handling'],
                $row['total_handling_wt'],
                $row['total_wrapping'],
                $row['total_wrapping_wt'],
                $row['total_charges'],
                $row['total_charges_wt'],
                $row['is_template'],
                $row['quote_name'],
                $row['template_name'],
                $row['date_add'],
                $row['date_upd']
            );
        }

        return null;
    }

    // Method to find all Quotations
    public function findAll($orderBy = 'id_roja45_quotation', $order = 'asc')
    {
        $allowedOrderBy = ['id_roja45_quotation', 'expiry_date', 'id_customer', 'date_add'];
        $allowedOrder = ['asc', 'desc'];

        if (!in_array($orderBy, $allowedOrderBy)) {
            $orderBy = 'id_roja45_quotation';
        }
        if (!in_array($order, $allowedOrder)) {
            $order = 'asc';
        }

        $query = "SELECT * FROM ps_roja45_quotationspro ORDER BY $orderBy $order";
        $stmt = $this->db->prepare($query);

        if (!$stmt) {
            die("Error preparing statement: " . $this->db->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        $quotations = [];
        while ($row = $result->fetch_assoc()) {
            $quotations[] = new Quotation(
                $row['id_roja45_quotation'],
                $row['id_roja45_quotation_status'],
                $row['id_lang'],
                $row['id_shop'],
                $row['id_currency'],
                $row['id_country'],
                $row['id_state'],
                $row['id_address_invoice'],
                $row['id_address_delivery'],
                $row['id_address_tax'],
                $row['id_carrier'],
                $row['id_request'],
                $row['expiry_date'],
                $row['valid_days'],
                $row['email'],
                $row['firstname'],
                $row['lastname'],
                $row['form_data'],
                $row['reference'],
                $row['filename'],
                $row['calculate_taxes'],
                $row['modified'],
                $row['quote_sent'],
                $row['id_customer'],
                $row['tmp_password'],
                $row['id_cart'],
                $row['id_order'],
                $row['purchase_date'],
                $row['id_employee'],
                $row['id_profile'],
                $row['total_to_pay'],
                $row['total_products'],
                $row['total_discount'],
                $row['total_discount_wt'],

                $row['total_charges'],
                $row['total_charges_wt'],
                $row['is_template'],
                $row['quote_name'],
                $row['template_name'],
                $row['date_add'],
                $row['date_upd']
            );
        }

        return $quotations;
    }
    public function findAllAPI($customerGroups = [], $statuses = [])
    {
        // Step 1: Prepare the base query to fetch quotations and customer details
        $query = "
    SELECT 
        q.id_roja45_quotation, 
        q.id_roja45_quotation_status, 
        q.reference,
        c.firstname AS customer_firstname, 
        c.lastname AS customer_lastname, 
        c.id_default_group AS customer_group
    FROM 
        ps_roja45_quotationspro q
    JOIN 
        ps_customer c ON q.id_customer = c.id_customer
    WHERE 1=1";

        $params = [];
        $types = '';

        // Add condition for customerGroups if provided
        if (!empty($customerGroups)) {
            $placeholders = implode(',', array_fill(0, count($customerGroups), '?'));
            $query .= " AND c.id_default_group IN ($placeholders)";
            $types .= str_repeat('i', count($customerGroups));
            $params = array_merge($params, $customerGroups);
        }

        // Add condition for id_roja45_quotation_status if provided
        if (!empty($statuses)) {
            $placeholders = implode(',', array_fill(0, count($statuses), '?'));
            $query .= " AND q.id_roja45_quotation_status IN ($placeholders)";
            $types .= str_repeat('i', count($statuses));
            $params = array_merge($params, $statuses);
        }

        // Prepare the statement
        $stmt = $this->db->prepare($query);

        if (!$stmt) {
            die("Error preparing statement: " . $this->db->error);
        }

        // Bind parameters dynamically if present
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }

        // Execute the query and fetch quotations
        $stmt->execute();
        $result = $stmt->get_result();

        $quotations = [];
        while ($row = $result->fetch_assoc()) {
            // Store quotation information without products initially
            $quotations[$row['id_roja45_quotation']] = [
                'id_roja45_quotation' => $row['id_roja45_quotation'],
                'id_roja45_quotation_status' => $row['id_roja45_quotation_status'],
                'reference' => $row['reference'],
                'customer_firstname' => $row['customer_firstname'],
                'customer_lastname' => $row['customer_lastname'],
                'customer_group' => $row['customer_group'],
                'products' => []  // Products will be added in Step 2
            ];
        }

        // Step 2: Fetch the products for each quotation
        if (!empty($quotations)) {
            $quotationIds = implode(',', array_keys($quotations));  // Get quotation IDs for which to fetch products

            $query = "
        SELECT 
            qp.id_roja45_quotation, 
            qp.product_title, 
            qp.qty 
        FROM 
            ps_roja45_quotationspro_product qp
        WHERE qp.id_roja45_quotation IN ($quotationIds)";

            $stmt = $this->db->prepare($query);

            if (!$stmt) {
                die("Error preparing statement: " . $this->db->error);
            }

            // Execute the product query
            $stmt->execute();
            $result = $stmt->get_result();

            // Add each product to its respective quotation
            while ($row = $result->fetch_assoc()) {
                $quotations[$row['id_roja45_quotation']]['products'][] = [
                    'product_name' => $row['product_title'],
                    'product_quantity' => $row['qty']
                ];
            }
        }

        return array_values($quotations);  // Return quotations as an indexed array
    }


    // Method to create a new Quotation
    public function create(Quotation $quotation)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO ps_roja45_quotationspro (id_roja45_quotation_status, id_lang, id_shop, id_currency, id_country, id_state, id_address_invoice, id_address_delivery, 
             id_address_tax, id_carrier, id_request, expiry_date, valid_days, email, firstname, lastname, form_data, reference, filename, calculate_taxes, 
             modified, quote_sent, id_customer, tmp_password, id_cart, id_order, purchase_date, id_employee, id_profile, total_to_pay, total_products, 
             total_discount, total_discount_wt, total_shipping, total_shipping_wt, total_handling, total_handling_wt, total_wrapping, total_wrapping_wt, 
             total_charges, total_charges_wt, is_template, quote_name, template_name, date_add, date_upd)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );

        if (!$stmt) {
            die("Error preparing statement: " . $this->db->error);
        }

        $stmt->bind_param(
            "iiiiiiiiissssssssssiiiiiiissdddddddddddssss",
            $quotation->getIdRoja45QuotationStatus(),
            $quotation->getIdLang(),
            $quotation->getIdShop(),
            $quotation->getIdCurrency(),
            $quotation->getIdCountry(),
            $quotation->getIdState(),
            $quotation->getIdAddressInvoice(),
            $quotation->getIdAddressDelivery(),
            $quotation->getIdAddressTax(),
            $quotation->getIdCarrier(),
            $quotation->getIdRequest(),
            $quotation->getExpiryDate(),
            $quotation->getValidDays(),
            $quotation->getEmail(),
            $quotation->getFirstname(),
            $quotation->getLastname(),
            $quotation->getFormData(),
            $quotation->getReference(),
            $quotation->getFilename(),
            $quotation->getCalculateTaxes(),
            $quotation->getModified(),
            $quotation->getQuoteSent(),
            $quotation->getIdCustomer(),
            $quotation->getTmpPassword(),
            $quotation->getIdCart(),
            $quotation->getIdOrder(),
            $quotation->getPurchaseDate(),
            $quotation->getIdEmployee(),
            $quotation->getIdProfile(),
            $quotation->getTotalToPay(),
            $quotation->getTotalProducts(),
            $quotation->getTotalDiscount(),
            $quotation->getTotalDiscountWt(),
            $quotation->getTotalShipping(),
            $quotation->getTotalShippingWt(),
            $quotation->getTotalHandling(),
            $quotation->getTotalHandlingWt(),
            $quotation->getTotalWrapping(),
            $quotation->getTotalWrappingWt(),
            $quotation->getTotalCharges(),
            $quotation->getTotalChargesWt(),
            $quotation->getIsTemplate(),
            $quotation->getQuoteName(),
            $quotation->getTemplateName(),
            $quotation->getDateAdd(),
            $quotation->getDateUpd()
        );

        if (!$stmt->execute()) {
            die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }

        $stmt->close();
    }

    // Method to delete a Quotation by its ID
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM ps_roja45_quotationspro WHERE id_roja45_quotation = ?");

        if (!$stmt) {
            die("Error preparing statement: " . $this->db->error);
        }

        $stmt->bind_param("i", $id);

        if (!$stmt->execute()) {
            die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }

        $stmt->close();

        return true;
    }

    // Method to get quotation by reference
    public function getBytRef($reference)
    {
        $stmt = $this->db->prepare("SELECT * FROM ps_roja45_quotationspro WHERE reference = ?");

        if (!$stmt) {
            die("Error preparing statement: " . $this->db->error);
        }

        $stmt->bind_param("s", $reference);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            return new Quotation(
                $row['id_roja45_quotation'],
                $row['id_roja45_quotation_status'],
                $row['id_lang'],
                $row['id_shop'],
                $row['id_currency'],
                $row['id_country'],
                $row['id_state'],
                $row['id_address_invoice'],
                $row['id_address_delivery'],
                $row['id_address_tax'],
                $row['id_carrier'],
                $row['id_request'],
                $row['expiry_date'],
                $row['valid_days'],
                $row['email'],
                $row['firstname'],
                $row['lastname'],
                $row['form_data'],
                $row['reference'],
                $row['filename'],
                $row['calculate_taxes'],
                $row['modified'],
                $row['quote_sent'],
                $row['id_customer'],
                $row['tmp_password'],
                $row['id_cart'],
                $row['id_order'],
                $row['purchase_date'],
                $row['id_employee'],
                $row['id_profile'],
                $row['total_to_pay'],
                $row['total_products'],
                $row['total_discount'],
                $row['total_discount_wt'],
                // $row['total_shipping'],
                // $row['total_shipping_wt'],
                // $row['total_handling'],
                // $row['total_handling_wt'],
                // $row['total_wrapping'],
                // $row['total_wrapping_wt'],
                $row['total_charges'],
                $row['total_charges_wt'],
                $row['is_template'],
                $row['quote_name'],
                $row['template_name'],
                $row['date_add'],
                $row['date_upd']
            );
        }

        return false; // Return false if no matching quotation is found
    }

}
