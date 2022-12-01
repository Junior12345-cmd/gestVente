<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-10">
            <h1 class="m-0 text-dark"><?= $titrePage; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-2">
            <button type="button" data-tog="tooltip" data-placement="bottom" title="Ajouter une agence" class="btn text-white btn-primary updateBtn" data-toggle="modal" data-target="#update"><i class="fas fa-plus" aria-hidden="true"> Ajouter </i></button>
        </div>
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<?php if($_SESSION['poste'] == "Gerant"):?>
    <section class="content">
        <div class="container">
            <div class="row justify-content-center mb-2">

                <div class="col-sm-4 text-center mb-2">
                    <button type="button" data-tog="tooltip" data-placement="bottom" title="Ajouter un point de vente" class="btn text-white btn-primary updateBtn" data-toggle="modal" data-target="#addEnDetail">
                        <i class="fas fa-plus" aria-hidden="true"> Ajouter le point de vente : En Détail </i></button>
                </div>
                <div class="modal fade" id="addEnDetail">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4 class="modal-title text-white">Ajouter un point de vente : En Détail</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= HOST;?>add-pointVente.html" method="POST" id="form_id">
                            <div class="modal-body mt-3">

                                <div class="form-group col-sm-12">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control"  id="date" name="values[date]" required> 
                                    <input type="hidden" class="form-control"  id="typePoint" name="values[typePoint]" value="EnDetail"> 
                                </div>

                                <div class="form-group col-sm-12">
                                    <label for="typePoint">Nom de l'agence </label>
                                    <select class="custom-select" class="form-control" name="values[idAgence]" id="idAgence" required>
                                    <option value=""></option>

                                    <?php
                                        $all = (new Agence())->findAll();
                                        foreach($all as $item):
                                    
                                    ?>
                                        <option value="<?= $item->getId();?>" ><?= $item->getLibelle();?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div>
                                
                                <div class="form-group col-sm-12">
                                    <label for="montantVendu">Montant Vendu de Lubrifiant</label>
                                    <input type="number" class="form-control" name="values[montantVendu]" id="montantVendu" required>                     
                                </div>

                                <div class="form-group col-sm-12">
                                    <label for="montantComplement">Montant complémenté en Lubrifiant</label>
                                    <input type="number" class="form-control"  name="values[montantComplement]" id="montantComplement" required>                     
                                </div>

                                <div class="form-group col-sm-12">
                                    <label for="montantRetire">Montant retiré en Lubrifiant</label>
                                    <input type="number" class="form-control"  name="values[montantRetire]" id="montantRetire" required>                     
                                </div>

                                <div class="form-group col-sm-12" id="montantRestant">
                                    <label for="montantRestant">Montant restant en Lubrifiant</label>
                                    <input type="number" class="form-control"  name="values[montantRestant]" >                     
                                </div>

                                <div class="form-group col-sm-12">
                                    <label for="depenses">Dépenses</label>
                                    <input type="number" class="form-control"  name="values[depenses]" id="depenses" required>                     
                                </div>

                                <div class="form-group col-sm-12"  id="montantVerse">
                                    <label for="montantVerse">Montant versé</label>
                                    <input type="number" class="form-control"  name="values[montantVerse]" >                     
                                </div>

                                <div class="form-group col-sm-12" id="sommeVentes">
                                    <label for="sommeVentes">Somme des ventes</label>
                                    <input type="number" class="form-control"  name="values[sommeVentes]"  >                     
                                </div>
                               
                            </div>
                            <div class="modal-footer justify-content-between">
                                <input type="submit" value="Enrregistrer" name="creer" id="submit" class="btn btn-block btn-outline-primary">
                            </div>
                        </form>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                </div>
                
                <!-- Ajouter le point de vente : En Gros -->
                <div class="col-sm-4 text-center mb-2">
                    <button type="button" data-tog="tooltip" data-placement="bottom" title="Ajouter un point de vente " class="btn text-white btn-primary updateBtn" data-toggle="modal" data-target="#addEnGros">
                        <i class="fas fa-plus" aria-hidden="true"> Ajouter le point de vente : En Gros </i></button>
                </div>
                <div class="modal fade" id="addEnGros">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4 class="modal-title text-white">Ajouter un point de vente : En Gros</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= HOST;?>add-pointVente.html" method="POST" id="form_id">
                            <div class="modal-body mt-3">

                                <div class="form-group col-sm-12">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control"  id="dateGros" name="values[date]" required> 
                                    <input type="hidden" class="form-control"  id="typePointGros" name="values[typePoint]" value="EnGros"> 
                                </div>

                                <div class="form-group col-sm-12">
                                    <label for="typePoint">Nom de l'agence </label>
                                    <select class="custom-select" class="form-control" name="values[idAgence]" id="idAgenceGros" required>
                                    <option value=""></option>

                                    <?php
                                        $all = (new Agence())->findAll();
                                        // print_r($all);exit;
                                        foreach($all as $item):
                                    
                                    ?>
                                        <option value="<?= $item->getId();?>" ><?= $item->getLibelle();?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div>
                                
                                <div class="form-group col-sm-12">
                                    <label for="montantVendu">Montant Vendu de Lubrifiant</label>
                                    <input type="number" class="form-control" name="values[montantVendu]" id="montantVendu" required>                     
                                </div>

                                <div class="form-group col-sm-12">
                                    <label for="montantComplement">Montant complémenté en Lubrifiant</label>
                                    <input type="number" class="form-control"  name="values[montantComplement]" id="montantComplement" required>                     
                                </div>

                                <div class="form-group col-sm-12">
                                    <label for="montantRetire">Montant retiré en Lubrifiant</label>
                                    <input type="number" class="form-control"  name="values[montantRetire]" id="montantRetire" required>                     
                                </div>

                                <div class="form-group col-sm-12" id="montantRestantGros">
                                    <label for="montantRestant">Montant restant en Lubrifiant</label>
                                    <input type="number" class="form-control"  name="values[montantRestant]" >                     
                                </div>

                                <div class="form-group col-sm-12" id="depenses">
                                    <label for="depenses">Dépenses</label>
                                    <input type="number" class="form-control"  name="values[depenses]" id="depenses" required>                     
                                </div>


                                <div class="form-group col-sm-12"  id="montantVerseGros">
                                    <label for="montantVerse">Montant versé</label>
                                    <input type="number" class="form-control"  name="values[montantVerse]">                     
                                </div>

                                <div class="form-group col-sm-12" id="sommeVentesGros">
                                    <label for="sommeVentes">Somme des ventes</label>
                                    <input type="number" class="form-control"  name="values[sommeVentes]" >                     
                                </div>
                               
                            </div>
                            <div class="modal-footer justify-content-between">
                                <input type="submit" value="Enrregistrer" name="creer" class="btn btn-block btn-outline-primary">
                            </div>
                        </form>
                        
                        </div>
                        <!-- /.modal-content -->
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>
    </section>
<!-- /.content -->

<?php elseif($_SESSION['poste'] == "Admin"):?>
    <?php if($pointVentes):?>
        <section class="content shadow bg-white">
            <div class="container-fluid p-4">
                <div class="row">
                    <div class="col-sm-6">
                        <h2 class="text-center">Point de vente journalier</h2>
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <?php 
            foreach($pointVentes as $pointVente){
                $agence = (new Agence())->find( $pointVente->getIdAgence());

                $date[] = $pointVente->getDate().' '.$agence->getLibelle();
                $montantVendu[] = $pointVente->getMontantVendu();
            }
            // var_dump($date);
            ?>
                <script src="<?= ASSETS;?>LTE/chart.js"></script>

            <script>
                const ctx = document.getElementById('myChart');
                const labels = <?php echo json_encode($date);?>

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: <?= (json_encode($date)) ;?>,
                        datasets: [{
                            label: 'Point des venetes',
                            data: <?php echo json_encode($montantVendu);?>,
                            borderWidth: 1
                        }]
                    },
                    options: {
                    scales: {
                        y: {
                        beginAtZero: true
                        }
                    }
                    }
                });
            </script>

        </section>
    <?php endif;?>
<?php endif;?>

<div class="modal fade" id="update">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-primary">
            <h4 class="modal-title text-white">Ajouter une agence</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= HOST;?>add-agence.html" method="POST" id="form_id">
                <div class="modal-body mt-3">
                    <div class="form-group">
                        <label for="libelle">Nom de l'agence</label>
                        <input type="text" class="form-control" id="libelle" name="values[libelle]" required> 
                    </div>
                    <div class="form-group">
                        <label for="nomGerant">Nom du Gérant</label>
                        <input type="text" class="form-control" id="nomGerant" name="values[nomGerant]" >                     
                    </div>
                    <div class="form-group">
                        <label for="telephone">Téléphone</label>
                        <input type="number" class="form-control" id="telephone" name="values[telephone]" >                     
                    </div>
                    <div class="form-group">
                        <label for="email">Email du gérant</label>
                        <input type="email" class="form-control" id="email" name="values[email]" >                     
                    </div>
                </div>    
                <div class="modal-footer justify-content-between">
                    <input type="submit" value="Enregister" name="Enregister" class="btn btn-block btn-outline-primary">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>


<script>
    $(document).ready(function () {

        $('#idAgence').on('change', function(){

                $.ajax({
                    method: "POST",
                    url: "rechercher_agence.html",
                    data: {
                        'date' : $("#date").val(),
                        'typePoint' : $("#typePoint").val(),
                        'idAgence' : $("#idAgence").val(),                 
                    },
                    success : function(data){
                        // console.log("data");

                        data = JSON.parse(data);
                        // console.log(data);

                        if(data.id){
                            //si les données existe concernant l'agence
                            $( "#montantRestant" ).hide();
                            $( "#montantVerse" ).hide();
                            $( "#sommeVentes" ).hide();
                            
                        }else{
                            $( "#montantRestant" ).show();
                            $( "#montantVerse" ).show();
                            $( "#sommeVentes" ).show();
                        }


                        

                    }
                });
        });

        $('#idAgenceGros').on('change', function(){
            $.ajax({
                method: "POST",
                url: "rechercher_agence.html",
                data: {
                    'date' : $("#dateGros").val(),
                    'typePoint' : $("#typePointGros").val(),
                    'idAgence' : $("#idAgenceGros").val(),                 
                },
                success : function(data){

                    data = JSON.parse(data);
                    console.log(data);

                    if(data.id){
                        //si les données existe concernant l'agence
                        $( "#montantRestantGros" ).hide();
                        $( "#montantVerseGros" ).hide();
                        $( "#sommeVentesGros" ).hide();
                        
                    }else{
                        $( "#montantRestantGros" ).show();
                        $( "#montantVerseGros" ).show();
                        $( "#sommeVentesGros" ).show();

                    }
                }
            });
        });
    });
</script>