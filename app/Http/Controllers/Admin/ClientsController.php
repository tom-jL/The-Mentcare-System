<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClientRequest;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Service;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ClientsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Client::with(['services'])->select(sprintf('%s.*', (new Client)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'patient_show';
                $editGate      = 'patient_edit';
                $deleteGate    = 'patient_delete';
                $crudRoutePart = 'clients';

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

            $table->editColumn('services', function ($row) {
                $labels = [];

                foreach ($row->services as $service) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $service->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder','services']);

            return $table->make(true);
        }

        return view('admin.clients.index');
    }

    public function create()
    {
        abort_if(Gate::denies('patient_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::all()->pluck('name', 'id');

        return view('admin.clients.create', compact('services'));
    }

    public function store(StoreClientRequest $request)
    {
        $client = Client::create($request->all());
        $client->services()->sync($request->input('services', []));

        return redirect()->route('admin.clients.index');
    }

    public function edit(Client $client)
    {
        abort_if(Gate::denies('patient_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $services = Service::all()->pluck('name', 'id');
        $client->load('services');
        return view('admin.clients.edit', compact('services','client'));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->all());
        $client->services()->sync($request->input('services', []));

        return redirect()->route('admin.clients.index');
    }

    public function show(Client $client)
    {
        abort_if(Gate::denies('patient_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client->load('services');

        return view('admin.clients.show', compact('client'));
    }

    public function destroy(Client $client)
    {
        abort_if(Gate::denies('patient_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientRequest $request)
    {
        Client::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
