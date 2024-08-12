<?php

namespace App\Http\Controllers;

use App\Enums\Integrations\BaselinkerIntegrationEnum;
use App\Http\Requests\StoreBaselinkerItemsRequest;
use App\Http\Requests\StoreBaselinkerTokenRequest;
use App\Interfaces\BaselinkerIntegrationInterface;
use App\Services\Proxies\BaselinkerIntegrationProxyService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BaselinkerController extends Controller
{

    public function __construct(private readonly BaselinkerIntegrationInterface $repository, private readonly BaselinkerIntegrationProxyService $proxyService){}
    public function index(): View
    {
        $data = $this->repository->getIntegrationData();
        $tokenData = $data[BaselinkerIntegrationEnum::Token->value] ?? [];

        return view('panel.baselinker.index', [
            'token' => $tokenData['value'] ?? '',
            'isVerified' => $tokenData['identifier'] ?? null,
            'currentWarehouseName' => $data['warehouse']['value'] ?? null,
            'currentInventoryName' => $data['inventory']['value'] ?? null,
            'currentPricingName' => $data['pricing']['value'] ?? null
        ]);
    }

    public function storeToken(StoreBaselinkerTokenRequest $request): RedirectResponse
    {
        $this->repository->storeToken($request->get('token'));
        return back();
    }

    public function storeBaselinkerItems(StoreBaselinkerItemsRequest $request): RedirectResponse
    {
        $this->repository->storeBaselinkerItems($request->validated());
        return back();
    }

    public function handleRequest(Request $request, string $method): JsonResponse
    {
        $response = $this->proxyService->$method($request->all());
        return response()->json($response);
    }
}
