<?php

namespace App\Http\Controllers;

use App\Enums\Integrations\BaselinkerIntegrationEnum;
use App\Http\Requests\StoreBaselinkerTokenRequest;
use App\Interfaces\BaselinkerIntegrationInterface;
use App\Services\BaselinkerIntegrationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BaselinkerController extends Controller
{

    public function __construct(private readonly BaselinkerIntegrationInterface $repository, private readonly BaselinkerIntegrationService $service){}
    public function index(): View
    {
        $data = $this->repository->getIntegrationData();
        return view('panel.baselinker.index', [
            'token' => $data[BaselinkerIntegrationEnum::Token->value]['value'] ?? ''
        ]);
    }

    public function storeToken(StoreBaselinkerTokenRequest $request): RedirectResponse
    {
        $this->repository->storeToken($request->get('token'));
        return back();
    }
}
