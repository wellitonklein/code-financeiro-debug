<?php

namespace CodeFin\Transformers;

use League\Fractal\TransformerAbstract;
use CodeFin\Models\Bank;

/**
 * Class BankAccountTransformer.
 *
 * @package namespace CodeFin\Transformers;
 */
class BankTransformer extends TransformerAbstract
{
    /**
     * Transform the BankAccount entity.
     *
     * @param \CodeFin\Models\Bank $model
     *
     * @return array
     */
    public function transform(Bank $model)
    {
        return [
            'id'      => (int) $model->id,
            'name'    => $model->name,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
