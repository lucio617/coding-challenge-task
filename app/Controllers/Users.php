<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\Request;

class Users extends Controller
{
    public function __construct(){
        helper("form");
    }
    
        
    
    public function index()
    {
        // $data=[];
        
        $rules=[
            'users'=>'required',
            'body'=>'required|min_length[20]|alpha_space',
            'title'=>'required|min_length[5]|alpha'

            
        ];
        try{
        $body= $this->request->getVar('body');
        $user=$this->request->getVar('users');
        $title=$this->request->getVar('title');
        }
        catch(\Exception $e)
        {
            echo view('exception',['message'=>$e->getMessage()]);
        }
        $json_data = file_get_contents('D:\xampp\htdocs\ci_form\app\Views\data.txt');
        $json=json_decode($json_data, true);
        $count=0;
        
        //Getting the corresponding user id
        foreach($json as $rkey =>$js) {
          if($user==$js['name'])
          {
        
              break;
          }
          else{
              $count++;
          }
         }

      $data=array("body"=>$body,
                          "user"=>$user,
                          "title"=>$title,
                          "id"=>$count,
                    "validation");
        
        if($this->request->getMethod()=='post')
        {
            
            if($this->validate($rules))
            {
                 
                
                
            //     $string=http_build_query($data_to_send);

            //     $ch=curl_init("https://jsonplaceholder.typicode.com/posts");
            //     curl_setopt($ch,CURLOPT_POST,true);
            //     curl_setopt($ch,CURLOPT_POSTFIELDS,$string);
            //     curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
            //     curl_exec($ch);
            //     curl_close($ch);
            //  echo "";
            
            return view('sub_successful',$data);
            }
             else{
                 $data['validation']=$this->validator;
             }
        }
       

        return view('myform',$data);
    }
}

?>


