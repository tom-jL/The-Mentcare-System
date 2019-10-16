@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.prescription.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.prescriptions.update", [$prescription->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.prescription.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($prescription) ? $prescription->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.prescription.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="price">{{ trans('cruds.prescription.fields.price') }}</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', isset($prescription) ? $prescription->price : '') }}" step="0.01">
                @if($errors->has('price'))
                    <em class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.prescription.fields.price_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('dosage') ? 'has-error' : '' }}">
                <label for="dosage">{{ trans('cruds.prescription.fields.dosage') }}</label>
                <input type="text" id="dosage" name="dosage" class="form-control" value="{{ old('dosage', isset($prescription) ? $prescription->dosage : '') }}">
                @if($errors->has('dosage'))
                    <em class="invalid-feedback">
                        {{ $errors->first('dosage') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.prescription.fields.dosage_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
