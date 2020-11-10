<?php namespace App\Models;

use CodeIgniter\Model;

class User_Model extends Model
{
    protected $table = 'user';
    protected $primaryKey= 'id';
    protected $allowedFields = ['nome','email','cpf','endereco','uf','cidade','senha'];
    protected $validationRules    = [];
    protected $validationMessages = [];
   
    public function getEstados($id = null){
        //$db = \Config\Database::connect();
        $db = db_connect();
        if($id === null){
            $query = $db->table('estados')->get();
            return $query->getResult();
        }else{
            $builder = $db->table('estados');
            $builder->select('uf');
            return $query = $builder->getWhere(['id' => $id]);
        }
    }

    public function get_users($id = null){
        if($id === null){
            return $this->findAll();
        }else{
            return $this->asArray()->where(['id' => $id])->first();
        }
        
    }

    public function getCidades($uf){
        $db      = \Config\Database::connect();
        $builder = $db->table('cidades');
        //$builder = $db->table('estados');
        //$builder->db->table('cidades');
        $builder->select('cidades.nome');
        $builder->join('estados', 'cidades.id_estado = estados.id');
        $builder->where('estados.uf', $uf);
        return $query = $builder->get();
        
       
    }

    public function pegar_uf_to_insert($uf){
        $db = db_connect();
        $builder = $db->table('estados');
        $builder->select('uf');
        return $query = $builder->getWhere(['uf' => $uf]);
    }

    
}