<?php

namespace App\Http\Controllers\Admin;

use App\Patient;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPatientRequest;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Service;
use App\Prescription;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PatientsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Patient::with(['prescriptions'])->select(sprintf('%s.*', (new Patient)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'patient_show';
                $editGate      = 'patient_edit';
                $deleteGate    = 'patient_delete';
                $crudRoutePart = 'patients';

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
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : "";
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : "";
            });

            $table->editColumn('prescriptions', function ($row) {
                $labels = [];

                foreach ($row->prescriptions as $prescription) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $prescription->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder','prescriptions']);

            return $table->make(true);
        }

        return view('admin.patients.index');
    }

    public function create()
    {
        abort_if(Gate::denies('patient_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prescriptions = Prescription::all()->pluck('name','id');

        return view('admin.patients.create', compact('prescriptions'));
    }

    public function store(StorePatientRequest $request)
    {
        $patient = Patient::create($request->all());
        $patient->prescriptions()->sync($request->input('prescriptions', []));

        return redirect()->route('admin.patients.index');
    }

    public function edit(Patient $patient)
    {
        abort_if(Gate::denies('patient_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $prescriptions = Prescription::all()->pluck('name', 'id');
        $patient->load('prescriptions');
        return view('admin.patients.edit', compact('prescriptions','patient'));
    }

    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        $patient->update($request->all());
        $patient->prescriptions()->sync($request->input('prescriptions', []));

        return redirect()->route('admin.patients.index');
    }

    public function show(Patient $patient)
    {
        abort_if(Gate::denies('patient_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patient->load('prescriptions');

        return view('admin.patients.show', compact('patient'));
    }

    public function destroy(Patient $patient)
    {
        abort_if(Gate::denies('patient_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patient->delete();

        return back();
    }

    public function massDestroy(MassDestroyPatientRequest $request)
    {
        Patient::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
