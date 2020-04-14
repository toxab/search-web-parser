<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

/**
 * Trait BaseRestTrait
 * @package App\Http\Traits
 */
trait BaseRestTrait
{

    /**
     * @param $data
     * @param string $message
     * @param string $action
     * @param int $httpStatus
     * @return JsonResponse
     */
    public function getResponse($data, $message = 'success', $httpStatus = 200, $action = 'response'): JsonResponse
    {
        return Response::json([
            'message' => $message,
            'action' => $action,
            'data' => $data,
        ], $httpStatus);
    }

    /**
     * @param $message
     * @param int $httpStatus
     * @param array $errors
     * @return JsonResponse
     */
    public function getErrorResponse($message, $httpStatus = 400, array $errors = []): JsonResponse
    {
        return $this->getResponse($this->answerGenerate($message, $errors), $message, $httpStatus);
    }

    /**
     * @param $message
     * @param int $httpStatus
     * @param array $errors
     * @return JsonResponse
     */
    public function getModelAlreadyExists($message, $httpStatus = 409, array $errors = []): JsonResponse
    {
        return $this->getResponse($this->answerGenerate($message, $errors), $httpStatus);
    }

    /**
     * @param $message
     * @param int $httpStatus
     * @param array $errors
     * @return JsonResponse
     */
    public function getModelNotFound($message, $httpStatus = 404, array $errors = []): JsonResponse
    {
        return $this->getResponse($this->answerGenerate($message, $errors), $httpStatus);
    }

    /**
     * @param int $httpStatus
     * @return JsonResponse
     */
    public function getSuccessResponse($httpStatus = 204): JsonResponse
    {
        return $this->getResponse(['message' => 'success'], $httpStatus);
    }

    /**
     * @param $message
     * @param $errors
     * @return array
     */
    public function answerGenerate($message, $errors)
    {
        if (empty($errors)) {
            $errors = ['error' => [$message]];
        }
        return [
            "message" => $message,
            "errors"  => $errors
        ];
    }
}
