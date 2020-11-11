<?php 
namespace App\Controllers;
use App\Models\Noticia_Model;
class Noticia_controller extends BaseController
{
    public function index(){
        $model= new Noticia_Model();
        
        $user_id=session()->id_session;
        $data =['noticia' =>  $model->get_noticias($user_id)];
        echo view('template/header');
		echo view('listar_noticias',$data);
        echo view('template/footer');
    }
    public function create(){
        helper(['form', 'url']);
        echo view('template/header');
		echo view('cadastro_noticia');
        echo view('template/footer');	
    }

    public function store(){
        helper(['form', 'url']);
        
        $model =  new Noticia_Model();
        
        $check= $this->validate([
            'titulo' => 'min_length[5]|max_length[50]',
            'imagem' => 'is_image[imagem]',
            'resumo'=>'min_length[5]|max_length[255]',
            'conteudo'=>'min_length[5]',
            
        ]);
        if(! $check){
            $id=$this->request->getVar('id');
            $data['noticia']=$model->get_noticias_edit($id);
            $data= [
                'id'=>$data['noticia']['id'],
                'titulo'=>$data['noticia']['titulo'],
                'data'=>$data['noticia']['data'],
                'resumo'=>$data['noticia']['resumo'],
                'imagem'=>$data['noticia']['imagem'],
                'conteudo'=>$data['noticia']['conteudo'],
                'user_id'=>$data['noticia']['user_id'],
            ];
            echo view('template/header');
            echo view('cadastro_noticia', $data,['validation'=>$this->validator]);
            echo view('template/footer');
            
        }else{
            if($this->request->getVar('conteudo_mostra_imagem')){
                $image=$this->request->getVar('conteudo_mostra_imagem');
                if(! $this->request->getFile('imagem')){
                    $image="";
                }    
            }else{
                $image =$this->request->getFile('imagem')->store();
            }
            $model->save([
                'id' => $this->request->getVar('id'),
                'titulo' => $this->request->getVar('titulo'),
                'data'  => $this->request->getVar('data'),
                'resumo'  => $this->request->getVar('resumo'),
                'imagem'  =>$image ,
                'conteudo'  => $this->request->getVar('conteudo'),
                'user_id' =>$this->request->getVar('user_id'), 
                ]);
                $this->index();	
        }
    }
    public function Edit($id = null){
        $model=new Noticia_Model();
        $data['noticia']=$model->get_noticias_edit($id);
        if(empty($data['noticia'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Não foi possível encontrar ");
        }
        $data= [
            'id'=>$data['noticia']['id'],
            'titulo'=>$data['noticia']['titulo'],
            'data'=>$data['noticia']['data'],
            'resumo'=>$data['noticia']['resumo'],
            'imagem'=>$data['noticia']['imagem'],
            'conteudo'=>$data['noticia']['conteudo'],
            'user_id'=>$data['noticia']['user_id'],
        ];
       
        echo view('template/header');
		echo view('cadastro_noticia',$data);
        echo view('template/footer');
    }
    public function delete(){
        $id=$this->request->getVar('id');
        $db = db_connect();
        $builder = $db->table('noticia');
        $builder->where('id', $id);
        $builder->delete();
        
        return $this->response->redirect(site_url('/listar_noticias'));
       
    }

}