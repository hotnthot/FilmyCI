<style>
      .center
      {
        text-align: center;
      }
    </style>
    

     <body>
     <div class="container">   
          <h1 class="center" style="color: black">Herci</h1> 
          <div class="table-responsive">  
               <table class="table table-border">  
                    <tr>  
                         <th>ID</th>
                         <th>Jméno</th>  
                         <th>Příjmení</th>
                         <th>Datum narození</th> 
                         <th>Stvárněná postava</th> 
                         <th>Upravit</th>  
                         <th>Smazat</th>  
                    </tr>  
               <?php  
               
                    foreach($vypis_herce as $row)  
                    {  
               ?>  
                    <tr>  
                         <td><?php echo $row->idherci; ?></td>  
                         <td><?php echo $row->jmeno; ?></td>  
                         <td><?php echo $row->prijmeni; ?></td>    
                         <td><?php echo $row->datum_narozeni; ?></td>    
                         <td><?php echo $row->stvarnena_postava; ?></td>    
                         <td><a style="color: green;" href="<?php echo base_url(); ?>Controller/uprav_data_herci/<?php echo $row->idherci; ?>">Upravit</a></td>  
                         <td><a style="color: red;" href="#" class="delete_data" id="<?php echo $row->idherci; ?>">Smazat</a></td>
                    </tr>  
               <?php       
                    }  
               
               ?>  
               </table>  
          </div>  
          <br><br><br>
          <h2>Přidat herce</h2>
          <div>
          <form method="post" action="<?php echo base_url()?>Controller/herci">  
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
                    <label>Zadejte jméno herce</label>  
                    <input type="text" name="jmeno" placeholder="Jméno" aria-label="Jméno" value="<?php echo $row->jmeno; ?>" class="form-control" />  
                    <span class="text-danger"><?php echo form_error("jmeno"); ?></span>  
               </div>  
               <div class="form-group">  
                    <label>Zadejte příjmení herce</label>  
                    <input type="text" name="prijmeni" value="<?php echo $row->prijmeni; ?>" class="form-control" />  
                    <span class="text-danger"><?php echo form_error("prijmeni"); ?></span>  
               </div>  
               <div class="form-group">  
                    <label>Zadejte datum narození herce</label>  
                    <input type="date" name="datum_narozeni" value="<?php echo $row->datum_narozeni; ?>" class="form-control" />  
                    <span class="text-danger"><?php echo form_error("datum_narozeni"); ?></span>  
               </div>  
               <div class="form-group">  
                    <label>Zadejte stvárněnou postavu hercem</label>  
                    <input type="text" name="stvarnena_postava" value="<?php echo $row->stvarnena_postava; ?>" class="form-control" />  
                    <span class="text-danger"><?php echo form_error("stvarnena_postava"); ?></span>  
               </div>  
               <div class="form-group" style="text-align: center">  
                    <input type="hidden" name="hidden_id" value="<?php echo $row->idherci; ?>" />  
                    <input type="submit" name="update" value="Upravit" class="btn btn-outline-success" />  
               </div>       
               <?php       
                    }  
               }  
               else  
               {  
               ?>  
               <div class="form-group">  
                    <label>Zadejte jméno herce</label>  
                    <input type="text" name="jmeno" class="form-control" />  
                    <span class="text-danger"><?php echo form_error("jmeno"); ?></span>  
               </div>  
               <div class="form-group">  
                    <label>Zadejte příjmení herce</label>  
                    <input type="text" name="prijmeni" class="form-control" />  
                    <span class="text-danger"><?php echo form_error("prijmeni"); ?></span>  
               </div>  
               <div class="form-group">  
                    <label>Zadejte datum narození herce</label>  
                    <input type="date" name="datum_narozeni" class="form-control" />  
                    <span class="text-danger"><?php echo form_error("datum_narozeni"); ?></span>  
               </div>  
               <div class="form-group">  
                    <label>Zadejte stvárněnou postavu hercem</label>  
                    <input type="text" name="stvarnena_postava" class="form-control" />  
                    <span class="text-danger"><?php echo form_error("stvarnena_postava"); ?></span>  
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
                         window.location="<?php echo base_url(); ?>Controller/vymaz_data_herci/"+id;  
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
