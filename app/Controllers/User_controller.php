<?php 


namespace App\Controllers;
use App\Models\User_Model;

class User_controller extends BaseController
{
    
	public function index()
	{
        $model =  new User_Model();
        $data=[
            'user'=>$model->get_users()
        ] ;
        echo view('template/header');    
        echo view('listar_users',$data);
		echo view('template/footer');
	}
	public function create()
	{
        helper(['form', 'url']);
        $model= new User_Model();
        $data['estado']=$model->getEstados();
       
		echo view('template/header');
		echo view('cadastro_user',$data);
        echo view('template/footer');	
    }
    
	//--------------------------------------------------------------------
    public function store()
    {  
        helper(['form', 'url']);
        //$validation = \Config\Services::validation();
        $model =  new User_Model();
        $check= $this->validate([
            'nome' => 'min_length[5]|max_length[100]',
            'cpf' => 'min_length[11]|max_length[11]|is_unique[user.cpf,id,{id}]|validaCPF',
            'email'=>'valid_email|is_unique[user.email,id,{id}]',
            'endereco'=>'min_length[5]|max_length[100]',
            'senha'=>'min_length[5]|max_length[100]',
            'senha2'=>'matches[senha]',
        ]);
        $aux= $this->pegar_uf();
        $uf=$aux[0]['uf'];
    
            
            if(! $check){
                $model= new User_Model();
                $data['estado']=$model->getEstados();
                echo view('template/header');
                echo view('cadastro_user',$data,['validation'=>$this->validator]);
                echo view('template/footer');
                
            }else{
                       
                $model->save([
                    'id' => $this->request->getVar('id'),
                    'nome' => $this->request->getVar('nome'),
                    'email'  => $this->request->getVar('email'),
                    'cpf'  => $this->request->getVar('cpf'),
                    'cidade'  => $this->request->getVar('cidade'),
                    'uf'  => $uf,
                    'endereco'  => $this->request->getVar('endereco'),
                    'senha'  => md5($this->request->getVar('senha')),
                    
                    ]);
                    
                    $this->index();
                 	
            }

    }

    public function getCidades(){
        $uf= $this->request->getVar('uf');
        $model=new User_Model();
        $results= $model->getCidades($uf);
        return  json_encode($results->getResult());
    }

    public function Edit($id = null){
        $model=new User_Model();
        $data['user']=$model->get_users($id);
        if(empty($data['user'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Não foi possível encontrar ");
        }
        $data= [
            'id'=>$data['user']['id'],
            'nome'=>$data['user']['nome'],
            'cpf'=>$data['user']['cpf'],
            'email'=>$data['user']['email'],
            'uf'=>$data['user']['uf'],
            'cidade'=>$data['user']['cidade'],
            'endereco'=>$data['user']['endereco'],
            'senha'=>md5($data['user']['senha']),
           
        ];
       
        $data['estado']=$model->getEstados();
        echo view('template/header');
		echo view('cadastro_user',$data);
        echo view('template/footer');
    }

    public function delete(){
        $id=$this->request->getVar('id');
        $db = db_connect();
        $builder = $db->table('user');
        $builder->where('id', $id);
        $builder->delete();
        
        return $this->response->redirect(site_url('/listar_users'));
       
    }

    public function pegar_uf(){
        
        $model = new User_Model();
        $uf = $this->request->getVar('uf');
        $results = $model->pegar_uf_to_insert($uf);
        return  $results->getResultArray();
        
        
        //echo $r[0]['uf'];
       
    }


   
    

    public function s(){
        $session = session();
        $data =[
            'id_session'=>5,
            'nome_session'=>"bia",
        ];
        
        $session->set($data);
        
        echo  session()->nome_session;
        
        if(! isset(session()->nome_session) === false){
            echo "cai aqui";
        }
        
    }
    public function d(){
        session()->destroy();
        session()->nome_session;
    }

}
