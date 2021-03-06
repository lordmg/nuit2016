<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo extends CI_Controller {
    public function __construct()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->model('photo_Model', 'photoManager');
    }


    public function index()
    {
        return $this->photo_Model->all();
    }


        public function store()
    {
        //configuration de la librairie d'upload
        $config['upload_path'] = './assets/images/uploaded';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '40000';

        //on charge la librairie ensuite
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload("unePhoto")) {
            $error = array('error' => $this->upload->display_errors());
            return false;
        }

        //stockage dans la BD
        $maphoto["libellePhoto"] = $this->upload->data('file_name');
        $maphoto["urlPhoto"] = $this->upload->data('full_path');
        if (!$this->photo_Model->save($maphoto))
        {
            return false;
        };
        return true;
    }

    public function delete($id)
    {
        $maPhoto = $this->photo_Model->find($id);
        if (!unlink($maPhoto->urlPhoto))
        {
            return false;
        }
        //suppression de la ligne dans la BD
        if (!$this->photo_Model->delete($maPhoto->id)) {
            return false;
        }
        return true;
    }

    public function activate($id)
    {
        $maPhoto = $this->photo_Model->find($id, 'idPhoto');
        if ($maPhoto['afficherPhoto']==0)
        {
            $maPhoto['afficherPhoto']=1;
        }
        else{
            $maPhoto['afficherPhoto']=0;
        }
        if ($this->photo_Model->update($maPhoto, $id, 'idPhoto'))
        {
            return TRUE;
        }
        return FALSE;

    }


}