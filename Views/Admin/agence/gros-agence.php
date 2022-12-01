<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-10">
            <h1><?= $titrePage.' '.$agence->getLibelle();?></h1>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=HOST;?>home.html">Tableau de bord</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $titrePage;?></li>
                </ol>
            </nav>

        </div><!-- /.col -->
        <div class="col-sm-2">
            <?php if($pointVentes):?> 
            <a href="<?= HOST;?>Views/pdf/pdf.php?idAgence=<?= $agence->getId();?>" class="btn btn-success btn-sm btn-block" data-tog="tooltip"><i class="fas fa-download" aria-hidden="true"></i> Imprimer</a>
            <?php endif;?>
        </div>
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card table-responsive">
                    <div class="card-body">
                        <style>
                            td {
                                white-space: nowrap;
                            }
                        </style>
                        <table id="table_annee" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th hidden scope="col">ID</th>
                                    <th hidden scope="col">idAgence</th>
                                    <th hidden scope="col">Type</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Montant Vendu</th>
                                    <th scope="col">Montant Complement</th>
                                    <th scope="col">Montant Retiré</th>
                                    <th scope="col">Montant Restant</th>
                                    <th scope="col">Dépenses</th>
                                    <th scope="col">Montant Versé</th>
                                    <th scope="col">Sommes des ventes</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
                                    foreach($pointVentes as $pointVente):
                                        if($pointVente->getTypePoint()=="EnGros"):
                                ?>
                                <tr>
                                    <td hidden><?= $pointVente->getId();?></td>
                                    <td hidden><?= $pointVente->getIdAgence();?></td>
                                    <td hidden><span class="badge badge-primary"><?= $pointVente->getTypePoint();?></span></td>
                                    <td><?= $pointVente->getDate();?> </td>
                                    <td><?= $pointVente->getMontantVendu();?> </td>
                                    <td><?= $pointVente->getMontantComplement();?> </td>
                                    <td><?= $pointVente->getMontantRetire();?> </td>
                                    <td><?= $pointVente->getMontantRestant();?> </td>
                                    <td><?= $pointVente->getDepenses();?> </td>
                                    <td><?= $pointVente->getMontantverse();?> </td>
                                    <td><?= $pointVente->getSommeVentes();?> </td>
                                    <td>
                                        <button type="button" data-tog="tooltip" data-placement="bottom" title="Modifier" class="btn btn-xs text-white btn-warning updateBtn" data-toggle="modal" data-target="#update"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                        <button type="button" data-tog="tooltip" data-placement="bottom" title="Supprimer" class="btn btn-xs btn-danger deleteBtn" data-toggle="modal" data-target="#delete"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                    </td>
                                </tr>

                                
                                <?php endif;endforeach;?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th hidden scope="col">ID</th>
                                    <th hidden scope="col">idAgence</th>
                                    <th hidden scope="col">Type</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Montant Vendu</th>
                                    <th scope="col">Montant Complement</th>
                                    <th scope="col">Montant Retiré</th>
                                    <th scope="col">Montant Restant</th>
                                    <th scope="col">Dépenses</th>
                                    <th scope="col">Montant Versé</th>
                                    <th scope="col">Sommes des ventes</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<div class="modal fade" id="update">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-warning">
            <h4 class="modal-title text-white">Modification</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= HOST;?>update-pointVente.html" method="POST" id="form_id">
                <div class="modal-body mt-3">
                    <div class="form-group col-sm-5">
                            <label for="date">Date : <?php if($pointVente){ echo $pointVente->getDate();};?> </label>
                            <input type="hidden" class="form-control" id="m_idPointVente" name="values[id]" value ="" > 
                            <input type="hidden" class="form-control" id="m_idAgence" name="values[idAgence]" value ="" > 
                            <input type="date" class="form-control" id="m_date" name="values[date]" > 
                            <input type="hidden" class="form-control" id="m_typePoint" name="values[typePoint]" value="EnGros" > 
                        </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="montantVendu">Montant Vendu de Lubrifiant</label>
                            <input type="number" class="form-control" id="m_montantVendu" name="values[montantVendu]" required>                     
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="montantComplement">Montant complémenté en Lubrifiant</label>
                            <input type="number" class="form-control" id="m_montantComplement" name="values[montantComplement]" required>                     
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="montantRetire">Montant retiré en Lubrifiant</label>
                            <input type="number" class="form-control" id="m_montantRetire" name="values[montantRetire]" required>                     
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="depenses">Dépenses</label>
                            <input type="number" class="form-control" id="m_depenses" name="values[depenses]" required>                     
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="form-group col-sm-6">
                            <label for="montantRestant">Montant restant en Lubrifiant</label>
                            <input type="number" class="form-control"  name="values[montantRestant]" required>                     
                        </div> -->
                        
                    </div>
                    <div class="row">
                        <!-- <div class="form-group col-sm-6">
                            <label for="montantVerse">Montant versé</label>
                            <input type="number" class="form-control"  name="values[montantVerse]" required>                     
                        </div> -->
                        <!-- <div class="form-group col-sm-6">
                            <label for="sommeVentes">Somme des ventes</label>
                            <input type="number" class="form-control"  name="values[sommeVentes]" required>                     
                        </div> -->
                    </div>
                    <!-- <div class="form-group col-sm-6">
                        <label for="typePoint">Options</label>
                        <select class="custom-select" class="form-control" name="values[typePoint]" required>
                            <option value="Journalier">Journalier</option>
                            <option value="Hebdomadaire">Hebdomadaire</option>
                            <option value="Mensuel">Mensuel</option>
                            <option value="Annuel">Annuel</option>
                        </select>
                    </div> -->
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="submit" value="Modifier" name="Modifier" class="btn btn-block btn-outline-warning">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<!-- deleteModal -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-danger">
            <h4 class="modal-title">Suppression</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mt-3">
            <div class="container">
                <p>Voulez vous vraiment supprimer cet point de vente ?</p>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="" id="delete_id"><button type="button" class="btn btn-block btn-outline-danger">Oui</button></a>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-block btn-outline-primary" data-dismiss="modal">Non</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<script>
$(document).ready(function () {
    $('.updateBtn').on('click', function(){

        $('#updateClasse').modal('show');
    
        // Get the table row data.
        $tr = $(this).closest('tr');
    
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

    //    alert(data[4]);

        $('#m_idPointVente').val(data[0]);
        $('#m_idAgence').val(data[1]);
        $('#m_typePoint').val(data[2]);
        $('#m_date').val(data[3]);
        $('#m_montantVendu').val(data[4]);
        $('#m_montantComplement').val(data[5]);
        $('#m_montantRetire').val(data[6]);
        $('#m_montantRetant').val(data[7]);
        $('#m_depenses').val(data[8]);
        $('#m_montantVerse').val(data[9]);
        $('#m_sommeDesVentes').val(data[10]);

    }); 
});

$(document).ready(function () {
    $('.deleteBtn').on('click', function(){

        $('#delete').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        // alert(data[0]);
        document.getElementById("delete_id").href = "<?= HOST;?>delete-pointVente.html/id/"+data[0];

    });
});

$(function () {
    $("#table_annee").DataTable({
        "responsive": false,
        "autoWidth": false,
        "language" : {

            "sEmptyTable":     "Aucun point n'est disponible pour le moment",
            "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
            "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
            "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
            "sInfoPostFix":    "",
            "sInfoThousands":  ",",
            "sLengthMenu":     "Afficher _MENU_ éléments",
            "sLoadingRecords": "Chargement...",
            "sProcessing":     "Traitement...",
            "sSearch":         "Rechercher :",
            "sZeroRecords":    "Aucun élément correspondant trouvé",
            "oPaginate": {
                "sFirst":    "Premier",
                "sLast":     "Dernier",
                "sNext":     "Suivant",
                "sPrevious": "Précédent"
            },
            "oAria": {
                "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
            },
            "select": {
                    "rows": {
                        "_": "%d lignes sélectionnées",
                        "0": "Aucune ligne sélectionnée",
                        "1": "1 ligne sélectionnée"
                    }
            }
        }
    });
});

</script>


