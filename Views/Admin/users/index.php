<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-10">
            <h1><?= $titrePage;?></h1>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=HOST;?>home.html">Tableau de bord</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $titrePage;?></li>
                </ol>
            </nav>
        </div><!-- /.col -->
        <div class="col-sm-2">
        <button type="button" data-tog="tooltip" data-placement="bottom" title="Ajouter" class="btn text-white btn-primary updateBtn" data-toggle="modal" data-target="#add"><i class="fas fa-plus" aria-hidden="true"> Ajouter</i></button>

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
                                    <th scope="col">N°</th>
                                    <th hidden scope="col">ID</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Téléphone</th>
                                    <th scope="col">Poste</th>
                                    <th scope="col">Etat</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
                                    $num = 1;
                                    foreach($users as $item):
                                ?>
                                <tr>
                                    <td><?= $num;?></td>
                                    <td hidden><?= $item->getId();?></td>
                                    <td><?= $item->getEmail();?> </td>
                                    <td><?= $item->getTelephone();?></td>
                                    <td><?= $item->getPoste();?></td>
                                    <td><?= $item->getEtat();?></td>
                                    <td>
                                        <button type="button" data-tog="tooltip" data-placement="bottom" title="Modifier" class="btn btn-xs text-white btn-warning updateBtn" data-toggle="modal" data-target="#update"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                        <button type="button" data-tog="tooltip" data-placement="bottom" title="Supprimer" class="btn btn-xs btn-danger deleteBtn" data-toggle="modal" data-target="#delete"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                    </td>
                                </tr>

                                
                                <?php $num++;endforeach;?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th hidden scope="col">ID</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Téléphone</th>
                                    <th scope="col">Poste</th>
                                    <th scope="col">Etat</th>
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

<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-primary">
            <h4 class="modal-title text-white">Ajouter un utilisateur</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= HOST;?>add-user.html" method="POST" id="form_id">
            <div class="modal-body mt-3">
                <div class="form-group">
                        <label for="date">Email :  </label>
                        <input type="text" class="form-control" id="email" name="values[email]" required> 
                </div>
                <div class="form-group ">
                    <label for="montantVendu">Téléphone : </label>
                    <input type="number" class="form-control" id="telephone" name="values[telephone]">                     
                </div>
                <div class="form-group">
                    <label for="idAgence">Agence : </label>
                    <select class="form-control" aria-label="Default select example">
                        <option selected>Choisir une agence...</option>
                        <?php 
                                $agences = (new Agence())->findAll();
                                // print_r($agences);exit;
                                foreach($agences as $agence):
                        ?>
                        <option value="<?= $agence->getId();?>"><?= $agence->getLibelle();?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <input type="submit" value="Enregistrer" name="Enregistrer" class="btn btn-block btn-outline-primary">
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<!-- update -->
<div class="modal fade" id="update">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-warning">
            <h4 class="modal-title text-white">Modifier un utilisateur</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= HOST;?>update-user.html" method="POST" id="form_id">
                <div class="modal-body mt-3">
                    <div class="form-group">
                            <label for="date">Email :  </label>
                            <input type="text" class="form-control" id="m_email" name="values[email]" required> 
                    </div>
                    <div class="form-group ">
                        <label for="montantVendu">Téléphone</label>
                        <input type="number" class="form-control" id="m_telephone" name="values[telephone]">                     
                    </div>
                    <div class="form-group">
                        <label for="idAgence">Choisir une agence...</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <?php 
                                  $agences = (new Agence())->findAll();
                                  // print_r($agences);exit;
                                  foreach($agences as $agence):
                            ?>
                            <option value="<?= $agence->getId();?>"><?= $agence->getLibelle();?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="submit" value="Enregistrer" name="Enregistrer" class="btn btn-block btn-outline-warning">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!-- end update -->

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
                <p>Voulez vous vraiment supprimer cet utilisateur ?</p>
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

    //    alert(data[1]);

        $('#m_id').val(data[1]);
        $('#m_email').val(data[2]);
        $('#m_telephone').val(data[3]);
        $('#m_poste').val(data[4]);
        $('#m_etat').val(data[5]);
       
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

            "sEmptyTable":     "Aucun utilisateur n'est disponible pour le moment",
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


