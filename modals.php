<!-- Ajouter consultation modal -->
<div class="col-md-4 col-sm-12 mb-30">
                        
                        <?php 
    
    $datenow=date('Y-m-d');
    $req = "select * from acte";
    $rs = mysqli_query($conn,$req) or die(mysqli_error());
    $option = NULL;
    
    while($row = mysqli_fetch_assoc($rs))
        {
          $option .= '<option value = "'.$row['id_acte'].'"> '.$row['acte'].' </option>';
        }
    
    ?>
    
    
    
                            
                                <div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Ajouter consultation</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form action="" method="post">
                                            <div class="modal-body">
                                        
                                            <div class="row">
                                            <div class="col">
                                                    <div class="form-group">
                          
                                    <input class="form-control" type="hidden" name="pat" id="example-text-input" value ="<?php echo ($row1['pat_id']); ?> " >
                            </div>
    
                            <div class="form-group">
                                <label for="example-date-input" class="col-form-label">Date :</label>
                                <input class="form-control" type="date" name="date" id="example-date-input"  value = "<?php echo $datenow; ?>" readonly>
                            </div>
                            <div class="form-group">
                                                <label class="col-form-label">Type :</label>
                                                <select class="form-control" name="type">
                                                    <option hidden>--</option>
                                                    <option value="Consultation">Consultation</option>
                                                    <option value="Controle">Controle</option>
                                                
                                                </select>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Motif :</label>
                                    <input class="form-control" type="text" name="motif" id="example-text-input">
                            </div>
    
                            <!-- <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Acte :</label>
                                    <input class="form-control" type="text" name="acte" id="example-text-input">
                            </div> -->
                            
                           <div class="form-group">
                    <label class="col-form-label">Acte :</label>
                    <select name="acte" id="acte" class="form-control" onchange="Fetchmed(this.value)" > 
           <option value=""hidden>--</option>
                <option value="<?php echo $option; ?>"></option>
        </select>
           
                            </div>
                            <div class="form-group">
                                                <label class="col-form-label">Tarif :</label>
                                                <input class="form-control" type="text" name="tarif"  id="example-text-input">
                            </div>
                                                    </div>
    
                                                    <div>
                                                    <img src="vendors/images/dental.png" alt="">
                                                    <script type="text/javascript">
      function Fetchmed(id){
        $('#med').html('');
        $.ajax({
          type:'post',
          url: 'ajaxdata.php',
          data : { cat_id : id},
          success : function(data){
             $('#med').html(data);
          }
    
        })
      }
    
      
    
      
    </script>
                                                    </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                    <input type="submit" class="btn btn-primary" name="ajouter" value="Ajouter">
                                                </div>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!----------------  Ajouter consultation modal end ------------->
    
    
    
                                  <!-- Modifier la consultation modal -->
                                  <div class="col-md-4 col-sm-12 mb-30">
                            
                            
                            <div class="modal fade bs-example-modal-lg" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                    
                                        <div class="row">
                                        <div class="col">
                                                <div class="form-group">

                                <input class="form-control" type="hidden" name="pat" id="example-text-input" value="<?php echo ($row1['pat_id']); ?>" readonly>
                        </div>
    
                        <div class="form-group">
                            <label for="example-date-input" class="col-form-label">Date :</label>
                            <input class="form-control" type="date" name="date" id="example-date-input" value="<?php echo $datenow; ?>" readonly>
                        </div>
    
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Dent :</label>
                                <input class="form-control" type="text" name="motif" id="example-text-input" value="<?php echo ($row19['dent']); ?>" readonly>
                        </div>
                        <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Surface :</label>
                        <input class="form-control" type="text" name="motif" id="example-text-input" value="<?php echo ($row19['surface']); ?>" readonly>
             
                        </div>
                        <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Acte :</label>
                        <input class="form-control" type="text" name="motif" id="example-text-input" value="<?php echo ($row19['acte']); ?>" readonly>
             
                        </div>
                      
                        <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Acte :</label>

                        <input class="form-control" type="text" name="motif" id="example-text-input" value="<?php echo ($row19['acte']); ?>" readonly>
                        </div>
                                                </div>
    
                                                <div>
                                                <img src="vendors/images/dental.svg" alt="">
                                                </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <!-- Modifier la consultation  modal end -->