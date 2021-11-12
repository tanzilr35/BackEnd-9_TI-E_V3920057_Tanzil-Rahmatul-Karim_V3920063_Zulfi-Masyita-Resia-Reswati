<!-- File Product_model.php ini berfungsi untuk pemanggilan database -->

<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Line 6 = Pemanggilan akses dari controller
class Product_model extends CI_Model
{
    private $_table = "products";

    public $product_id;
    public $name;
    public $idol;
    public $price;
    public $description;

    // Line 17-36 = Rules ini dibutuhkan untuk validasi input
    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'idol',
            'label' => 'Idol',
            'rules' => 'required'],

            ['field' => 'price',
            'label' => 'Price',
            'rules' => 'numeric'],
            
            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required']
        ];
    }

    // Line 39-42 = Membuat fungsi getAll untuk pemanggilan semua tabel di database
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    // Line 45-48 = Membuat fungsi getById untuk pemanggilan tabel di database berdasarkan id
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["product_id" => $id])->row(); // fungsi untuk mengambil satu data hasil query
    }

    // Line 51-60 = Membuat fungsi save untuk pengambilan data dari form
    public function save()
    {
        $post = $this->input->post(); // ambil data dari form
        $this->product_id = uniqid(); //pada method save(), kita mengisinya dengan fungsi uniqid() untuk id unik. Karena kita akan membuat baru.
        $this->name = $post["name"]; // isi field nama album
        $this->idol = $post["idol"]; // isi field nama idol
        $this->price = $post["price"]; //isi field harga / price
        $this->description = $post["description"]; // isi field deskripsi
        $this->db->insert($this->_table, $this); // simpan ke database
    }

    // Line 63-72 = Membuat fungsi update untuk pemanggilan semua tabel di database
    public function update()
    {
        $post = $this->input->post();
        $this->product_id = $post["id"];
        $this->name = $post["name"];
        $this->idol = $post["idol"];
        $this->price = $post["price"];
        $this->description = $post["description"];
        $this->db->update($this->_table, $this, array('product_id' => $post['id'])); 
    }

    // Line 75-78 = membuat fungsi delete
    public function delete($id) 
    {
        return $this->db->delete($this->_table, array("product_id" => $id)); // jadi si id ini dijadikan index primary key di database
    }
}
