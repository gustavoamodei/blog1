<?php namespace App\Models;

use CodeIgniter\Model;

class Noticia_Model extends Model
{
    protected $table = 'noticia';
    protected $primaryKey= 'id';
    protected $allowedFields = ['titulo','data','resumo','imagem','conteudo','user_id'];
    protected $validationRules    = [];
    protected $validationMessages = [];

   public function get_noticias($id_user){

        
        $db      = \Config\Database::connect();
        $builder = $db->table('noticia');
        $query = $builder->getWhere(['user_id' => $id_user]);   
        return $result =$query->getResultArray(); 
   }

   public function get_noticias_edit($id_noticia){
  
    $db      = \Config\Database::connect();
    $builder = $db->table('noticia');
    $query = $builder->getWhere(['id' => $id_noticia]);   
    return $row=$query->getRowArray();
    
    }
}