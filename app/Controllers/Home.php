<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		echo view('login');
	}
	public function main()
	{
		echo view('template/header');
		echo view('main');
		echo view('template/footer');
	}
	public function login(){
		$session = session();
		$db      = \Config\Database::connect();
		$email= $this->request->getVar('email');
		$senha= md5($this->request->getVar('senha'));
		$builder = $db->table('user');
		$builder->select('id,email,senha,nome');
	    $query = $builder->getWhere(['email' => $email]);
		$row = $query->getRow();
		if($row !== null){			
			if($email == $row->email && $senha == $row->senha){
				$data =[
					'id_session'=>$row->id,
					'nome_session'=>$row->nome,
				];
				
				$session->set($data);
				
				return redirect()->to(site_url('main'));
			}
		
		}
		$session->setFlashdata("erro","Erro login inválido!");
			
			return redirect()->to(site_url('Home/index'));
			
	}	
    public function deslogar(){
		$session = session();
		$session->destroy();
		
		return redirect()->to(site_url('Home/index'));
		
   }
	//--------------------------------------------------------------------

}
