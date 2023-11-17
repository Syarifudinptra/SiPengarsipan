<?php

namespace App\Models;

use CodeIgniter\Model;

class ArsipModel extends Model
{
    protected $table = 'arsip';
    protected $primaryKey = 'nomorsurat';
    protected $allowedFields = [
        'id',
        'nomorsurat',
        'idkategori',
        'judul',
        'waktuarsip'
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
        return $this->db->table($this->table)
            ->orderBy('nomorsurat', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function findID($id)
    {
        return $this->db->table($this->table)
            ->where('id', $id)
            ->get()
            ->getResultArray();
    }
}
