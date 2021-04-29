    <style>
      .center
      {
        text-align: center;
      }
    </style>
    

    <body>
    <div class="container">   
      <h1 class="center" style="color: black">Filmy</h1> 
      <div class="table-responsive">  
           <table class="table table-border">  
                <tr>  
                     <th>Název</th>  
                     <th>Délka</th>
                     <th>Žánr</th> 
                     <th>Typ</th> 
                     <th>Upravit</th>  
                     <th>Smazat</th>  
                </tr>  
           <?php  
           
                foreach($vypis_filmy as $row)  
                {  
           ?>  
                <tr>  
                     <td><?php echo $row->nazev_filmu; ?></td>  
                     <td><?php echo $row->delka; ?></td>    
                     <td><?php echo $row->zanr; ?></td>    
                     <td><?php echo $row->typ; ?></td>    
                     <td><a style="color: green;" href="<?php echo base_url(); ?>Controller/uprav_data/<?php echo $row->id_filmu; ?>">Upravit</a></td>  
                     <td><a style="color: red;" href="#" class="delete_data" id="<?php echo $row->id_filmu; ?>">Smazat</a></td>
                </tr>  
           <?php       
                }  
              
           ?>  
           </table>  
      </div>  
      <br><br><br>
      <h2>Přidat film</h2>
      <div>
      <form method="post" action="<?php echo base_url()?>Controller/filmy">  
           <?php  
           if($this->uri->segment(2) == "vlozeno")  
           {  
                echo '<p class="text-success">Data vložena</p>';  
           }  
           if($this->uri->segment(2) == "upraveno")  
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
                <label>Zadejte název filmu</label>  
                <input type="text" name="nazev_filmu" placeholder="Název filmu" aria-label="Název filmu" value="<?php echo $row->nazev_filmu; ?>" class="form-control" />  
                <span class="text-danger"><?php echo form_error("nazev_filmu"); ?></span>  
           </div>  
           <div class="form-group">  
                <label>Zadejte délku filmu (v minutách)</label>  
                <input type="text" name="delka" value="<?php echo $row->delka; ?>" class="form-control" />  
                <span class="text-danger"><?php echo form_error("delka"); ?></span>  
           </div>  
           <div class="form-group">  
                <label>Zadejte žánr</label>  
                <input type="text" name="zanr" value="<?php echo $row->zanr; ?>" class="form-control" />  
                <span class="text-danger"><?php echo form_error("zanr"); ?></span>  
           </div>  
           <div class="form-group">  
                <label>Zadejte typ</label>  
                <input type="text" name="typ" value="<?php echo $row->typ; ?>" class="form-control" />  
                <span class="text-danger"><?php echo form_error("typ"); ?></span>  
           </div>  
           <div class="form-group" style="text-align: center">  
                <input type="hidden" name="hidden_id" value="<?php echo $row->id_filmu; ?>" />  
                <input type="submit" name="update" value="Upravit" class="btn btn-outline-success" />  
           </div>       
           <?php       
                }  
           }  
           else  
           {  
           ?>  
           <div class="form-group">  
                <label>Zadejte název filmu</label>  
                <input type="text" name="nazev_filmu" class="form-control" />  
                <span class="text-danger"><?php echo form_error("nazev_flmu"); ?></span>  
           </div>  
           <div class="form-group">  
                <label>Zadejte délku filmu (v minutách)</label>  
                <input type="text" name="delka" class="form-control" />  
                <span class="text-danger"><?php echo form_error("delka"); ?></span>  
           </div>  
           <div class="form-group">  
                <label>Zadejte žánr</label>  
                <input type="text" name="zanr" class="form-control" />  
                <span class="text-danger"><?php echo form_error("zanr"); ?></span>  
           </div>  
           <div class="form-group">  
                <label>Zadejte typ</label>  
                <input type="text" name="typ" class="form-control" />  
                <span class="text-danger"><?php echo form_error("typ"); ?></span>  
           </div>  
           <div class="form-group" style="text-align: center">  
                <input  type="submit" name="insert" value="Vložit" class="btn btn-outline-primary" />  
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
                     window.location="<?php echo base_url(); ?>Controller/vymaz_data/"+id;  
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
