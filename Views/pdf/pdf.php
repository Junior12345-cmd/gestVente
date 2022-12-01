<?php
require '../../Ressources/dompdf/vendor/autoload.php';
require_once '../../Ressources/dompdf/autoload.inc.php';
require_once '../../Models/Agence.php';

$idAgence = $_GET['idAgence'];
$agence = (new Agence())->find($idAgence);

// reference the Dompdf namespace
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set('defaultFont', 'Times new roman');
$dompdf->setOptions($options);

$pdf = new Dompdf($options);

ob_start();
?>
<style>
    table {
        border-collapse: collapse;
        font-size: 18px;
        
    }
    th {
        border: 1px solid black;
        padding-left: 8px;
        padding-right: 8px;
        padding-top: 8px;
        padding-bottom: 8px;
    }
    td {
        border: 1px solid black;
        padding-left: 8px;
        padding-right: 8px;
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: center;

    }
</style>

<h4 style="text-align:center;">POINT DES VENTES DE LUBRIFIANT </h4>
<h5 style="text-align:center;">AGENCE : <?php echo !empty($agence) ? $agence->getLibelle():" ...............................................";  ?></h5>
<table>
<thead>
    <tr>
        <th scope="col" class="text-center">Date</th>
        <th scope="col" class="text-center">Montant Vendu</th>
        <th scope="col" class="text-center">Montant complémenté</th>
        <th scope="col" class="text-center">Montant retiré</th>
        <th scope="col" class="text-center">Montant restant</th>
        <th scope="col" class="text-center">Dépenses</th>
        <th scope="col" class="text-center">Montant versé</th>
        <th scope="col" class="text-center">Somme des ventes</th>
        <th scope="col" class="text-center">Type</th>
    </tr>
</thead>
<tbody>
<?php
    include_once '../../Models/PointVente.php';
    $all_pointVente = (new PointVente())->findAgence($idAgence);
    setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');

    foreach($all_pointVente as $item) {
?>
<tr class="text-center">
        <td><?php if(isset($all_pointVente)){echo strftime('%A %d %B %Y',strtotime($item->getDate()));}else{ echo("En attente"); } ?></td>
        <td><?php if(isset($all_pointVente)){echo number_format($item->getMontantVendu(),2).' '.'FCFA';}else{ echo("En attente"); } ?></td>
        <td><?php if(isset($all_pointVente)){echo number_format($item->getMontantComplement(),2).' '.'FCFA';}else{ echo("En attente"); } ?></td>
        <td><?php if(isset($all_pointVente)){echo number_format($item->getMontantRetire(),2).' '.'FCFA';}else{ echo("En attente"); } ?></td>
        <td><?php if(isset($all_pointVente)){echo number_format($item->getMontantRestant(),2).' '.'FCFA';}else{ echo("En attente"); } ?></td>
        <td><?php if(isset($all_pointVente)){echo number_format($item->getDepenses(),2).' '.'FCFA';}else{ echo("En attente"); } ?></td>        
        <td><?php if(isset($all_pointVente)){echo number_format($item->getMontantVerse(),2).' '.'FCFA';}else{ echo("En attente"); } ?></td>        
        <td><?php if(isset($all_pointVente)){echo number_format($item->getSommeVentes(),2).' '.'FCFA';}else{ echo("En attente"); } ?></td>        
        <td><?php if(isset($all_pointVente)){echo $item->getTypePoint();}else{ echo("En attente"); } ?></td>        
        
    </tr>
    
<?php
    } 
?>
</tbody>
</table>

<?php
$html = ob_get_clean();

$pdf->loadHtml($html);

$pdf->setPaper('A4', 'landscape');

$pdf->render();

$pdf->stream('PointDesVentes.pdf', Array('Attachment'=>0));
// $pdf->stream('bulletin.pdf', Array('Attachment'=>0));
?>