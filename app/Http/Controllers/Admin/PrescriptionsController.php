<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyServiceRequest;
use App\Http\Requests\StorePrescriptionRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Prescription;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PrescriptionsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Prescription::query()->select(sprintf('%s.*', (new Prescription)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'prescription_show';
                $editGate      = 'prescription_edit';
                $deleteGate    = 'prescription_delete';
                $crudRoutePart = 'prescriptions';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('dosage', function ($row) {
                return $row->dosage ? $row->dosage : "";
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.prescriptions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('prescription_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.prescriptions.create');
    }

    public function store(StorePrescriptionRequest $request)
    {
        $prescription = Prescription::create($request->all());

        return redirect()->route('admin.prescriptions.index');
    }

    public function edit(Prescription $prescription)
    {
        abort_if(Gate::denies('prescription_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.prescriptions.edit', compact('prescription'));
    }

    public function update(UpdateServiceRequest $request, Prescription $prescription)
    {
        $prescription->update($request->all());

        return redirect()->route('admin.prescriptions.index');
    }

    public function show(Prescription $prescription)
    {
        abort_if(Gate::denies('prescription_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.prescriptions.show', compact('prescription'));
    }

    public function destroy(Prescription $prescription)
    {
        abort_if(Gate::denies('prescription_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prescription->delete();

        return back();
    }

    public function massDestroy(MassDestroyServiceRequest $request)
    {
        Prescription::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
