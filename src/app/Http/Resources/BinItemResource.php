<?php

namespace App\Http\Resources;

use App\BinItem;

class BinItemResource extends BaseResource
{
    /* @var $model BinItem */
    protected $model;

    /**
     * @return array
     */
    protected function prepareModel(): array
    {
        $arrReturn = [
            "id" => $this->model->id,
            "ip_address" => $this->model->ip_address,
            "method" => $this->model->method,
            "url" => $this->model->url,
            "content" => unserialize($this->model->content),
            "header" => unserialize($this->model->header),
            "date" => $this->model->created_at,
        ];

        return $arrReturn;
    }
}
