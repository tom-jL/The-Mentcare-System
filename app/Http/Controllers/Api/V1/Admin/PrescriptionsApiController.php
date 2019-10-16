<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Resources\Admin\ServiceResource;
use App\Prescription;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrescriptionsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('prescription_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiceResource(Prescription::all());
    }

    public function store(StoreServiceRequest $request)
    {
        $prescription= Prescription::create($request->all());

        return (new ServiceResource($prescription))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Prescription $prescription)
    {
        abort_if(Gate::denies('prescription_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiceResource($prescription);
    }

    public function update(UpdateServiceRequest $request, Prescription $prescription)
    {
        $prescription->update($request->all());

        return (new ServiceResource($prescription))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Prescription $prescription)
    {
        abort_if(Gate::denies('prescription_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prescription->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
