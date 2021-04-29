<?php
defined('BASEPATH') OR exit ('No direct script acces allowed');


class Controller extends CI_Controller
{
   public function __construct() {
      parent::__construct();
      $this->load->library('ion_auth');
      $this->load->model('Model');
      $this->load->view('layout/header');

      if(!$this->ion_auth->logged_in())$this->load->view('layout/navbar');
      else if($this->ion_auth->logged_in() && $this->ion_auth->is_admin())$this->load->view('layout/navbar_logged');
   }

   
  public function index()
  {
    if(!$this->ion_auth->logged_in())$this->load->view("pages/index");
    else if($this->ion_auth->logged_in() && $this->ion_auth->is_admin())$this->load->view('pages/index');

}
 

     public function filmy()  
     {    
           $this->load->library('form_validation');
           $this->form_validation->set_rules("zanr", "zanr", 'required');  

           if($this->form_validation->run())  
           {  
                $data = array(  
                     "nazev_filmu"     =>$this->input->post("nazev_filmu"),  
                     "delka"  =>$this->input->post("delka"),
                     "zanr"  =>$this->input->post("zanr"),
                     "typ"  =>$this->input->post("typ"));  

                if($this->input->post("update"))  
                {  
                     $this->Model->uprav_data($data, $this->input->post("hidden_id"));  
                     redirect(base_url() . "upraveno");  
                }

                if($this->input->post("insert"))  
                {  
                     $this->Model->vloz_data($data);  
                     redirect(base_url() . "vlozeno");  
                }  
           }  
           else  
           {    
               $data["vypis_filmy"] = $this->Model->vypis_filmy(); 
               $this->load->view("pages/filmy", $data);    
           }  
     }  
     
      public function vlozeno()  
      {  
          $data["vypis_filmy"] = $this->Model->vypis_filmy(); 
          $this->load->view("pages/filmy", $data);
      }  

      public function vymaz_data(){  
           $id = $this->uri->segment(3);  
           $this->Model->vymaz_data($id);  
           redirect(base_url() . "odstraneno");  
      }  

      public function odstraneno()  
      {  
          $data["vypis_filmy"] = $this->Model->vypis_filmy(); 
          $this->load->view("pages/filmy", $data);
      }

      public function uprav_data(){  
           $user_id = $this->uri->segment(3);  
           $data["user_data"] = $this->Model->vypis_jeden_film($user_id);  
           $data["vypis_filmy"] = $this->Model->vypis_filmy(); 
           $this->load->view("pages/filmy", $data);
      }  
      
      public function upraveno()  
      {  
          $data["vypis_filmy"] = $this->Model->vypis_filmy(); 
          $this->load->view("pages/filmy", $data);
      }  
     
     public function sal()
     {
          $this->load->library('form_validation');  
          $this->form_validation->set_rules("nazev", "nazev", 'required');  
          $this->form_validation->set_rules("je3D", "je3D", 'required|alpha');
          $this->form_validation->set_rules("prostorovy_zvuk", "prostorovy_zvuk", 'required|alpha');  

          if($this->form_validation->run())  
          {  
               $data = array(  
                    "nazev"     =>$this->input->post("nazev"),  
                    "kapacita"  =>$this->input->post("kapacita"),
                    "je3D"    =>$this->input->post("je3D"),  
                    "prostorovy_zvuk"   =>$this->input->post("prostorovy_zvuk"));   

                    if($this->input->post("update"))  
                    {  
                         $this->Model->uprav_data_sal($data, $this->input->post("hidden_id"));  
                         redirect(base_url() . "upraveno_sal");  
                    }

                    if($this->input->post("insert"))  
                    {  
                         $this->Model->vloz_data_sal($data);  
                         redirect(base_url() . "vlozeno_sal");  
                    }  
          }  
          else  
          {    
               $data["vypis_sal"] = $this->Model->vypis_sal(); 
               $this->load->view("pages/sal", $data);    
          }  
}  
          
          public function vlozeno_sal()  
          {  
               $data["vypis_sal"] = $this->Model->vypis_sal(); 
               $this->load->view("pages/sal", $data);    
          }  
           
          public function vymaz_data_sal(){  
               $id = $this->uri->segment(3);  
               $this->Model->vymaz_data_sal($id);  
               redirect(base_url() . "odstraneno_sal");  
          }  
     
          public function odstraneno_sal()  
          {  
               $data["vypis_sal"] = $this->Model->vypis_sal(); 
               $this->load->view("pages/sal", $data);    
          }
     
          public function uprav_data_sal(){  
               $user_id = $this->uri->segment(3);    
               $data["user_data"] = $this->Model->vypis_jeden_sal($user_id);  
               $data["vypis_sal"] = $this->Model->vypis_sal(); 
               $this->load->view("pages/sal", $data);    
          }  
           
          public function upraveno_sal()  
          {  
               $data["vypis_sal"] = $this->Model->vypis_sal(); 
               $this->load->view("pages/sal", $data);        
          }  

          public function herci(){
               $this->load->library('form_validation');
               $this->form_validation->set_rules("jmeno", "jmeno", 'required');  
    
               if($this->form_validation->run())  
               {  
                    $data = array(  
                         "jmeno"     =>$this->input->post("jmeno"),  
                         "prijmeni"  =>$this->input->post("prijmeni"),
                         "datum_narozeni"  =>$this->input->post("datum_narozeni"),
                         "stvarnena_postava"  =>$this->input->post("stvarnena_postava"));  
    
                    if($this->input->post("update"))  
                    {  
                         $this->Model->uprav_data_herci($data, $this->input->post("hidden_id"));  
                         redirect(base_url() . "upraveno");  
                    }
    
                    if($this->input->post("insert"))  
                    {  
                         $this->Model->vloz_data_herec($data);  
                         redirect(base_url() . "herci");  
                    }  
               }  
               else  
               {    
                   $data["vypis_herce"] = $this->Model->vypis_herce(); 
                   $this->load->view("pages/herci", $data);    
               }  
           }
           
          public function vlozit_herce()  
          {  
               $data["vypis_herce"] = $this->Model->vypis_herce(); 
               $this->load->view("pages/herci", $data);
          }  

          public function vymaz_data_herci(){  
               $id = $this->uri->segment(3);  
               $this->Model->vymaz_data_herci($id);  
               redirect(base_url() . "herci");  
          }  

          public function odstran_herce()  
          {  
               $data["vypis_herce"] = $this->Model->vypis_herce(); 
               $this->load->view("pages/herci", $data);
          }

          public function uprav_data_herci(){  
               $user_id = $this->uri->segment(3);  
               $data["user_data"] = $this->Model->vypis_jednoho_herce($user_id);  
               $data["vypis_herce"] = $this->Model->vypis_herce(); 
               $this->load->view("pages/herci", $data);
          }  
          
}

