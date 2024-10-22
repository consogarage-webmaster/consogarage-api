<?php
header('Content-Type: application/json');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../models/quotationMapper.php';
require_once '../models/databaseConnexion.php';

// Create database connection
$database = new Database();
$dbConnection = $database->getConnection();

// Create instance of QuotationMapper
$quotationMapper = new QuotationMapper($database);

try {
    // Check if the customergroups parameter exists in the URL
    $customergroups = isset($_GET['customergroups']) ? explode(',', trim($_GET['customergroups'], '[]')) : [];

    // Check if the id_roja45_quotation_status parameter exists in the URL
    $statuses = isset($_GET['id_roja45_quotation_status']) ? explode(',', trim($_GET['id_roja45_quotation_status'], '[]')) : [];

    // Convert status values to integers for database query
    $statuses = array_map('intval', $statuses);

    // Fetch filtered quotations by passing customerGroups and statuses to findAllAPI
    $quotations = $quotationMapper->findAllAPI($customergroups, $statuses);

    $data = [];

    // Loop through each quotation and add the necessary details
    foreach ($quotations as $quotation) {
        $quotationData = [
            'quotation' => [
                'id' => $quotation['id_roja45_quotation'],
                'reference' => $quotation['reference'],
                'status' => $quotation['id_roja45_quotation_status']
            ],
            'customer' => [
                'firstname' => $quotation['customer_firstname'],
                'lastname' => $quotation['customer_lastname'],
                'group' => $quotation['customer_group']
            ],
            'products' => [] // Initialize products array
        ];

        // Add each product for the current quotation
        foreach ($quotation['products'] as $product) {
            $quotationData['products'][] = [
                'product_name' => $product['product_name'],
                'product_quantity' => $product['product_quantity']
            ];
        }

        $data[] = $quotationData;
    }

    // Return the response as JSON
    echo json_encode($data);
} catch (Exception $e) {
    // Return error response if something goes wrong
    echo json_encode(['error' => $e->getMessage()]);
}
