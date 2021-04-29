    <style>
      .center
      {
        text-align: center;
      }
    </style>
    

    <body>
    <div class="container">  
      <h1 class="center" style="color: black">Sály</h1>
      <div class="table-responsive">  
           <table class="table table-border">  
                <tr>  
                     <th>Název</th>  
                     <th>Kapacita</th>
                     <th>3D</th>  
                     <th>Prostorový zvuk</th>     
                     <th>Upravit</th>  
                     <th>Smazat</th>  
                </tr>  
           <?php  
           
                foreach($vypis_sal as $row)  
                {  
           ?>  
                <tr>  
                     <td><?php echo $row->nazev; ?></td>  
                     <td><?php echo $row->kapacita; ?></td> 
                     <td><?php echo $row->je3D; ?></td>
                     <td><?php echo $row->prostorovy_zvuk; ?></td> 
                     <td><a style="color: green;" href="<?php echo base_url(); ?>Controller/uprav_data_sal/<?php echo $row->id_sal; ?>">Upravit</a></td>  
                     <td><a style="color: red;" href="#" class="delete_data" id="<?php echo $row->id_sal; ?>">Smazat</a></td>
                </tr>  
           <?php       
                }  
              
           ?>  
           </table>  
      </div>  
      <br><br><br>
      <h2>Přidat sál</h2>
      <div>
      <form method="post" action="<?php echo base_url()?>Controller/sal">  
           <?php  
           if($this->uri->segment(2) == "inserted")  
           {  
                echo '<p class="text-success">Data vložena</p>';  
           }  
           if($this->uri->segment(2) == "updated")  
           {  
                echo '<p class="text-success">Data upravena</p>';  
           }  
           ?>  
           <?php  
           if(isset($user_data))  
           {  
                foreach($user_data->result() as $row)  
                {  
           ?>  
           <div class="form-group"> 
                <label>Zadejte název sálu</label>  
                <input type="text" name="nazev" value="<?php echo $row->nazev; ?>" class="form-control" />  
                <span class="text-danger"><?php echo form_error("nazev"); ?></span>  
           </div>  
           <div class="form-group">  
                <label>Zadejte kapacitu</label>  
                <input type="text" name="kapacita" value="<?php echo $row->kapacita; ?>" class="form-control" />  
                <span class="text-danger"><?php echo form_error("kapacita"); ?></span>  
           </div>  
           <div class="form-group">  
                <label>Je sál 3D?</label>  
                <input type="text" name="je3D" value="<?php echo $row->je3D; ?>" class="form-control" />  
                <span class="text-danger"><?php echo form_error("je3D"); ?></span>  
           </div>  
           <div class="form-group">  
                <label>Má sál prostorový zvuk?</label>  
                <input type="text" name="prostorovy_zvuk" value="<?php echo $row->prostorovy_zvuk; ?>" class="form-control" />  
                <span class="text-danger"><?php echo form_error("prostorovy_zvuk"); ?></span>  
           </div>  
           <div class="form-group" style="text-align: center;">  
                <input type="hidden" name="hidden_id" value="<?php echo $row->id_sal; ?>" />  
                <input type="submit" name="update" value="Upravit" class="btn btn-outline-success" />  
           </div>       
           <?php       
                }  
           }  
           else  
           {  
           ?>  
           <div class="form-group">  
                <label>Zadejte název sálu</label>  
                <input type="text" name="nazev" class="form-control" />  
                <span class="text-danger"><?php echo form_error("nazev"); ?></span>  
           </div>  
           <div class="form-group">  
                <label>Zadejte kapacitu</label>  
                <input type="text" name="kapacita" class="form-control" />  
                <span class="text-danger"><?php echo form_error("kapacita"); ?></span>  
           </div>  
           <div class="form-group">  
                <label>Je sál 3D?</label>  
                <input type="text" name="je3D" class="form-control" />  
                <span class="text-danger"><?php echo form_error("je3D"); ?></span>  
           </div>  
           <div class="form-group">  
                <label>Má sál prostorový zvuk?</label>  
                <input type="text" name="prostorovy_zvuk" class="form-control" />  
                <span class="text-danger"><?php echo form_error("prostorovy_zvuk"); ?></span>  
           </div>  
           <div class="form-group" style="text-align: center;">  
                <input type="submit" name="insert" value="Vložit" class="btn btn-outline-primary" />  
           </div>       
           <?php  
           }  
           ?>  
      </form>   
      </div>
      <script>  
      $(document).ready(function(){  
           $('.delete_data').click(function(){  
                var id = $(this).attr("id");  
                if(confirm("Opravdu chcete vymazat tuto položku?"))  
                {  
                     window.location="<?php echo base_url(); ?>Controller/vymaz_data_sal/"+id;  
                }  
                else  
                {  
                     return false;  
                }  
           });  
      });  
      </script>  
 </div>  
 <footer class="py-4 bg-dark text-white-50">
	    <div class="container text-center">
	    <small>
	      <center> <a>  <i>Michal Jurák</i> </a> </br> <a>Kontakt:  <i>jurak_michal@oauh.cz</i></a>  </center>
	    </small>
	    </div>
	</footer>
  </body>
</html>