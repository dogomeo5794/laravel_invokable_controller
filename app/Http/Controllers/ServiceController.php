<?php

namespace App\Http\Controllers;

use App\Services\ServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller
{
    protected const SERVICE_CLASS = ServiceInterface::class;
    private const ERROR_CHANNEL = "error";

    /**
     *
     */
    public function handle(Request $request): JsonResponse|JsonResource
    {
        try {
            $service = App::make(static::SERVICE_CLASS);

            $request->validated();

            $response = $service->__invoke($request);
        } catch (\Throwable $e) {
            $exceptionCode = $e->getCode() ?? Response::HTTP_INTERNAL_SERVER_ERROR;

            $code = (is_int($exceptionCode) && $exceptionCode >= 100 && $exceptionCode <= 599) ? $exceptionCode : 500;

            \Log::channel(self::ERROR_CHANNEL)->error("An Error Occurred", [
                "message" => $e->getMessage(),
                "code" => $e->getCode(),
                "file" => $e->getFile(),
                "line" => $e->getLine(),
                "tract" => $e->getTraceAsString()
            ]);

            return response()->json([
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ], $code);
        }

        return $response;
    }
}
