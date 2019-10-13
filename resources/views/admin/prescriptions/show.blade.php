@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.prescription.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.prescription.fields.id') }}
                        </th>
                        <td>
                            {{ $prescription->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prescription.fields.name') }}
                        </th>
                        <td>
                            {{ $prescription->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prescription.fields.price') }}
                        </th>
                        <td>
                            ${{ $prescription->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prescription.fields.dosage') }}
                        </th>
                        <td>
                            ${{ $prescription->dosage }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
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
