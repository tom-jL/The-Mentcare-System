@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.patient.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.id') }}
                        </th>
                        <td>
                            {{ $patient->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.name') }}
                        </th>
                        <td>
                            {{ $patient->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.phone') }}
                        </th>
                        <td>
                            {{ $patient->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.email') }}
                        </th>
                        <td>
                            {{ $patient->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.prescriptions') }}
                        </th>
                        <td>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>
                                            Name
                                        </td>
                                        <td>
                                            Date/Time Issued
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($patient->prescriptions as $id => $prescription)
                                        <tr>
                                            <td>
                                                <span class="label label-info label-many">{{ $prescription->name }}</span>
                                                @can('prescription_show')
                                                    <a class="btn btn-xs btn-primary" href="{{ url("admin/prescriptions/{$prescription->id}") }}">
                                                        View
                                                    </a>
                                                @endcan
                                            </td>
                                            <td>
                                                {{ $prescription->created_at }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ route('admin.patients.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection
