<?php
# Line 3 = Untuk mencegah akses langsung ke file ini
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{
    # Line 9-13 = Untuk menjalankan fungsi diinginkan saat controller diakses dan mendeklarasikan variable yang akan sering digunakan
    public function __construct()
    {
        parent::__construct();
        $this->load->model("product_model");
        $this->load->library('form_validation');
    }

    # Line 16-20 = Method index auth untuk login
    public function index()
    {
        $data["products"] = $this->product_model->getAll();
        $this->load->view("admin/product/list", $data);
    }

    # Line 23-35 = CRUD fungsi tambah
    public function add() 
    {
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/product/new_form");
    }

    # CRUD fungsi edit yang menginisialisasi parameter getId
    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/products');
       
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        
        $this->load->view("admin/product/edit_form", $data);
    }

    # CRUD fungsi hapus produk
    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->product_model->delete($id)) {
            redirect(site_url('admin/products'));
        }
    }
}
