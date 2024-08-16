<?php

namespace App\Models;

use CodeIgniter\Model;

class RatingOutputModel extends Model
{
    protected $table = 'rating_outputs';
    protected $primaryKey = 'id_ro';
    protected $allowedFields = ['id_kr', 'output_target_q1', 'rating_value_q1', 'okr_score_q1', 'output_target_q2', 'rating_value_q2', 'okr_score_q2'];

    public function getAllRatingOutput()
    {
        return $this->db->table($this->table)
            ->select('users.nama_user, key_results.key_result, rating_outputs.*')
            ->join('key_results', 'key_results.id_kr = rating_outputs.id_kr', 'inner')
            ->join('objectives', 'objectives.id_objective = key_results.id_objective', 'inner')
            ->join('users', 'users.id_user = objectives.id_user', 'inner')
            ->get()
            ->getResultArray();
    }
    
    public function createRatingOutputModel($data)
    {
        return $this->insert($data);
    }

    public function updateRatingOutputModel($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteRatingOutputModel($id)
    {
        return $this->delete($id);
    }
}
