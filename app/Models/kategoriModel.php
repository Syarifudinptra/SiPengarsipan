<?php

namespace App\Models;

use CodeIgniter\Model;

class kategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'idkategori';
    protected $allowedFields = [
        'idkategori',
        'namakategori',
        'keterangan'
    ];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    // protected $validationRules      = [
    //     'nid' => 'required|numeric',
    // ];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];

    //filter berdasarkan tahun dan mentotalkan

    public function getalldata()
    {
        return $this->db->table('kategori')
            ->orderBy('idkategori', 'DESC')
            ->get()
            ->getResultArray();
    }
    public function all_data()
    {
        return $this->db->table('kategori')
        ->get()
        ->getResultArray();
    }
    public function getNextId()
    {
        $query = $this->select('MAX(idkategori) as max_id')->get()->getRowArray();
        $maxId = $query['max_id'];

        return $maxId + 1;
    }
}