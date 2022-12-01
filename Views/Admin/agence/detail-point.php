<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-10">
            <h1>Ajouter le point de vente</h1>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=HOST;?>home.html">Tableau de bord</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $titrePage;?></li>
                </ol>
            </nav>

        </div><!-- /.col -->
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
                        <form action="<?= HOST;?>add-pointVente.html" method="POST" id="form_id">
                            <div class="modal-body mt-3">

                                <div class="form-group col-sm-12">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control"  id="date" name="values[date]" required> 
                                    <input type="hidden" class="form-control"  id="typePoint" name="values[typePoint]" value="EnDetail"> 
                                </div>

                                <div class="form-group col-sm-12">
                                    <label for="typePoint">Nom de l'agence </label>
                                    <select class="custom-select" class="form-control" name="values[agence]" id="idAgence" required>
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

                                <div class="form-group col-sm-12">
                                    <label for="depenses">Dépenses</label>
                                    <input type="number" class="form-control"  name="values[depenses]" id="depenses" required>                     
                                </div>

                                <div class="form-group col-sm-12" id="montantRestant">
                                    <label for="montantRestant">Montant restant en Lubrifiant</label>
                                    <input type="number" class="form-control"  name="values[montantRestant]"  required>                     
                                </div>

                                <div class="form-group col-sm-12"  id="montantVerse">
                                    <label for="montantVerse">Montant versé</label>
                                    <input type="number" class="form-control"  name="values[montantVerse]" required>                     
                                </div>

                                <div class="form-group col-sm-12" id="sommeVentes">
                                    <label for="sommeVentes">Somme des ventes</label>
                                    <input type="number" class="form-control"  name="values[sommeVentes]"  required>                     
                                </div>
                               
                            </div>
                            <div class="modal-footer justify-content-between">
                                <input type="submit" value="Enrregistrer" name="creer" id="submit" class="btn btn-block btn-outline-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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