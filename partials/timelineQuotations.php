<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './models/databaseConnexion.php';
require_once './models/timelineEventMapper.php';
require_once './models/quotationMapper.php';

$quotationStatusMap = [
    "1" => ["label" => "Demandes de Devis", "color" => "#FF8C00"],
    "2" => ["label" => "Devis Ouvert", "color" => "#108510"],
    "3" => ["label" => "Envoyé", "color" => "#007c14"],
    "4" => ["label" => "Dans le panier", "color" => "#4169E1"],
    "5" => ["label" => "Message Client Reçu", "color" => "#FF8C00"],
    "6" => ["label" => "Réponse du Client Envoyée", "color" => "#4169E1"],
    "7" => ["label" => "Commande Client Créée", "color" => "#4169E1"],
    "8" => ["label" => "Closed - Completed", "color" => "#b3b3b3"],
    "9" => ["label" => "Closed - Incomplete", "color" => "red"],
    "10" => ["label" => "Devis Supprimé", "color" => "darkred"],
    "11" => ["label" => "Demande de Devis Annulée", "color" => "red"],
    "12" => ["label" => "Demande de Commande Client", "color" => "red"],
    "13" => ["label" => "Brouillon", "color" => "#FF8C00"],
    "15" => ["label" => "Proforma", "color" => "#700087"]
];

// Create a Database instance
$db = new Database();
// if ($db->connect_error) {
//     die('Database connection error: ' . $db->connect_error);
// }

// Create a TimelineEventMapper instance
$timelineEventMapper = new TimelineEventMapper($db);

// Get affaireId from query string and validate
// $affaireId = isset($_GET['affaireId']) ? (int) $_GET['affaireId'] : null;

if (!$affaireId) {
    echo "<h3 class='subtitle has-text-warning'>Invalid Affaire ID: $affaireId</h3>";
    // exit;
}

// Fetch timeline events for the given affaireId
$timelineEvents = $timelineEventMapper->findByAffaireId($affaireId);

// Debug: print the returned events
// echo '<pre>';
// print_r($timelineEvents);
// echo '</pre>';

if (!empty($timelineEvents)): ?>

    <?php foreach ($timelineEvents as $event): ?>
        <!-- <span> -->
        <?php
        // $date = DateTime::createFromFormat('Y-m-d H:i:s', $event->getDate());

        // // Check if the DateTime object was created successfully
        // if ($date) {
        //     // Format the date in French style: dd/mm/yyyy H:i
        //     $formattedDate = $date->format('d/m/Y H:i');
        //     echo htmlspecialchars($formattedDate, ENT_QUOTES, 'UTF-8');
        // } else {
        //     echo 'Invalid date';
        // }
        ?>


        <?php
        $content = htmlspecialchars($event->getContent(), ENT_QUOTES, 'UTF-8'); // Escape the content first
        $linkPattern = '/linkQuotation/'; // Define the pattern to search for

        if (preg_match($linkPattern, $content)) {
            // If 'linkQuotation' is found, remove it
            $displayContent = preg_replace($linkPattern, '', $content);

            // Define your link URL (modify as necessary)
            $linkUrl = '#'; // Replace with the actual URL you want to link to

            // echo '<a href="' . $linkUrl . '" class="button is-info is-small quotation">' . trim($displayContent) . '</a>'; 
            // echo trim($displayContent);
            $quotation = $quotationMapper->getBytRef(trim($displayContent));

            if ($quotation) {
                // If a quotation is found, display the state
                $statusId = $quotation->getIdRoja45QuotationStatus();
                echo "<div style='background-color:" . $quotationStatusMap[$statusId]['color'] . "'>" . trim($displayContent) . "<br>" . (isset($quotationStatusMap[$statusId]) ? $quotationStatusMap[$statusId]['label'] : 'Unknown Status') . "</div> ";
            } else {
                // If no quotation is found, you may want to handle it differently
                echo "<span class='is-size-8'>" . trim($displayContent) . "Devis non trouvé</span>";
            }
        }
        ?>
        <!-- </span> -->
    <?php endforeach; ?>

<?php endif; ?>