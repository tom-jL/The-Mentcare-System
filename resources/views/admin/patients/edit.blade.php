@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.patient.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("patients", [$patient->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.patient.fields.name') }}</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($patient) ? $patient->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.patient.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">{{ trans('cruds.patient.fields.phone') }}</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($patient) ? $patient->phone : '') }}">
                @if($errors->has('phone'))
                    <em class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.patient.fields.phone_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.patient.fields.email') }}</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($patient) ? $patient->email : '') }}">
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.patient.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('prescriptions') ? 'has-error' : '' }}">
                <label for="prescriptions">{{ trans('cruds.patient.fields.prescriptions') }}
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="prescriptions[]" id="prescriptions" class="form-control select2" multiple="multiple">
                    @foreach($prescriptions as $id => $prescriptions)
                        <option value="{{ $id }}" {{ (in_array($id, old('prescriptions', [])) || isset($patient) && $patient->prescriptions->contains($id)) ? 'selected' : '' }}>{{ $prescriptions }}</option>
                    @endforeach
                </select>
                @if($errors->has('prescriptions'))
                    <em class="invalid-feedback">
                        {{ $errors->first('prescriptions') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.patient.fields.prescriptions_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
