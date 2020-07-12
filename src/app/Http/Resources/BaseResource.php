<?php

namespace App\Http\Resources;

abstract class BaseResource implements \JsonSerializable
{
    protected $model;

    public function __construct($objModel = null)
    {
        $this->model = $objModel;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->prepareModel();
    }

    /**
     * @return array
     */
    protected function prepareModel(): array
    {
        return json_decode(json_encode($this->model), true);
    }

    /**
     * @return array $objReturn
     */
    public function buildResponse(): array
    {
        return [
            "data" => $this->jsonSerialize()
        ];
    }

    /**
     * Prepare a DateTime object to be used as API response in ISO 8601 format.
     *
     * @param \DateTime|null $objDate
     * @return string|null
     */
    protected function prepareDate(\DateTime $objDate = null): ?string
    {
        $strReturn = null;

        if (is_object($objDate)) {
            $strReturn = $objDate->format("c");
        }

        return $strReturn;
    }
}
