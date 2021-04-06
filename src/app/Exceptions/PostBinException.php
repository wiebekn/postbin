<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response as HttpResponse;

class PostBinException extends Exception
{
    public const UNAUTHORIZED = 1401;
    public const NOT_FOUND = 1404;
    public const INVALID_PERMISSION = 1414;
    public const INVALID_MEDIA_TYPE = 1415;
    public const RESOURCE_ALREADY_EXIST = 1416;
    public const VALIDATION_INVALID = 1422;
    public const TOO_MANY_REQUESTS = 1429;
    public const INTERNAL_SERVER_ERROR = 1500;

    /**
     * The Http response code, default set to 422
     *
     * @var int
     */
    protected $status = HttpResponse::HTTP_UNPROCESSABLE_ENTITY;

    /**
     * Array with error codes with default message
     *
     * @var array[]
     */
    protected static $errorCodes = [
        [
            "code" => self::VALIDATION_INVALID,
            "message" => "Given parameters are invalid.",
        ],
        [
            "code" => self::INTERNAL_SERVER_ERROR,
            "message" => "Unknown internal error.",
        ],
        [
            "code" => self::NOT_FOUND,
            "message" => "Resource not found.",
        ],
        [
            "code" => self::TOO_MANY_REQUESTS,
            "message" => "Too Many Attempts. Please wait a while and try again later.",
        ],
        [
            "code" => self::UNAUTHORIZED,
            "message" => "Missing or incorrect Bearer token in Authorization header.",
        ],
        [
            "code" => self::INVALID_PERMISSION,
            "message" => "You don't have the required permission for this resource.",
        ],
        [
            "code" => self::INVALID_MEDIA_TYPE,
            "message" => "You are requesting a content type other than JSON.",
        ],
        [
            "code" => self::RESOURCE_ALREADY_EXIST,
            "message" => "The resource already exists.",
        ]
    ];

    /**
     * Gives status
     *
     * @return int
     */
    public function getStatus(): int
    {
        $arrStatuses = [
            self::NOT_FOUND => HttpResponse::HTTP_NOT_FOUND,
            self::INVALID_PERMISSION => HttpResponse::HTTP_FORBIDDEN,
            self::INVALID_MEDIA_TYPE => HttpResponse::HTTP_UNSUPPORTED_MEDIA_TYPE,
            self::UNAUTHORIZED => HttpResponse::HTTP_UNAUTHORIZED,
        ];

        $intReturn = $arrStatuses[$this->code] ?? $this->status;

        return $intReturn;
    }

    /**
     * Gives array with error
     *
     * @return array[]
     */
    public function getErrorMessage(): array
    {
        if (empty($this->message)) {
            $this->message = self::getMessageByCode($this->code) ?? '';
        }

        $arrReturn = self::markupMessage($this->code, $this->message);

        return $arrReturn;
    }

    /**
     * Gives message from error code array my code
     *
     * @param $intCode
     * @return string
     */
    public static function getMessageByCode($intCode): string
    {
        $intKey = array_search($intCode, array_column(self::$errorCodes, 'code'), true);
        $strReturn = self::$errorCodes[$intKey]['message'] ?? '';

        return $strReturn;
    }

    /**
     * Gives the array layout for the error message.
     *
     * @param int $intCode
     * @param string|null $strMessage
     * @return array|array[]
     */
    public static function markupMessage(int $intCode, ?string $strMessage = null): array
    {
        if (is_null($strMessage)) {
            $strMessage = self::getMessageByCode($intCode);
        }

        $arrReturn = [
            "error" => [
                'code' => $intCode,
                'message' => $strMessage,
            ]
        ];

        return $arrReturn;
    }

    /**
     * Markup validation message
     *
     * @param array $arrErrors
     * @return array|array[]
     */
    public static function markupValidationMessage(array $arrErrors): array
    {
        $arrReturn = [
            "error" => [
                'code' => self::VALIDATION_INVALID,
                'message' => self::getMessageByCode(self::VALIDATION_INVALID),
                'errors' => $arrErrors,
            ]
        ];

        return $arrReturn;
    }
}
