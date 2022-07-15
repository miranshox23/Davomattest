@extends('layouts.backend')

@section('title')
    &vert; Davomat
@endsection

@section('content')
    <form method="POST" action="{{ route('backend.customers.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-7">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">Davomat</div>

                            <div class="col fs-5 text-end">
                                <img src="{{ asset('img/icons/person.png') }}" />
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mb-2">
                            <label for="department_name" class="col-md-3 col-form-label">Бошқармалар номи</label>

                            <div class="col-md-8">
                                <input id="department_name" name="department_name" type="text"
                                    class="form-control @error('department_name') is-invalid @enderror"
                                    value="{{ old('department_name') }}" autofocus>

                                @error('department_name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="employees" class="col-md-3 col-form-label">ходимлар сони</label>

                            <div class="col-md-8">
                                <input id="employees" name="employees" type="text"
                                    class="form-control @error('employees') is-invalid @enderror"
                                    value="{{ old('employees') }}">

                                @error('employees')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <hr class="narrow" />

                        <div class="row mb-2">
                            <label for="employees_after17" class="col-md-3 col-form-label">17:30 дан кейинги ходимлар сони</label>

                            <div class="col-md-8">
                                <input id="employees_after17" name="employees_after17" type="text"
                                    class="form-control @error('employees_after17') is-invalid @enderror"
                                    value="{{ old('employees_after17') }}">

                                @error('employees_after17')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="fasting" class="col-md-3 col-form-label">Рўзадорлар</label>

                            <div class="col-md-8">
                                <input id="fasting" name="fasting" type="text"
                                    class="form-control @error('fasting') is-invalid @enderror"
                                    value="{{ old('fasting') }}">

                                @error('fasting')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <hr class="narrow" />

                        <div class="row mb-2">
                            <label for="tea" class="col-md-3 col-form-label">
                                Чой
                            </label>

                            <div class="col-md-8">
                                <input id="tea" name="tea" type="text"
                                    class="form-control @error('tea') is-invalid @enderror"
                                    value="{{ old('tea') }}">

                                @error('tea')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="employees_second" class="col-md-3 col-form-label">
                                ходимлар сони 2-смена
                            </label>

                            <div class="col-md-8">
                                <input id="employees_second" name="employees_second" type="text"
                                    class="form-control @error('employees_second') is-invalid @enderror"
                                    value="{{ old('employees_second') }}">

                                @error('employees_second')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <hr class="narrow" />
                        <div class="row mb-2">
                            <label for="employees_second_after5" class="col-md-3 col-form-label">
                                05:30 дан кейинги ходимлар сони 2-смена
                            </label>

                            <div class="col-md-8">
                                <input id="employees_second_after5" name="employees_second_after5" type="text"
                                    class="form-control @error('employees_second_after5') is-invalid @enderror"
                                    value="{{ old('employees_second_after5') }}">

                                @error('employees_second_after5')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <hr class="narrow" />

                        <div class="row mb-2">
                            <label for="fasting_second" class="col-md-3 col-form-label">Рўзадорлар 2-смена</label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <input id="fasting_second" name="fasting_second" type="text"
                                        class="form-control @error('fasting_second') is-invalid @enderror"
                                        value="{{ old('fasting_second') }}">

                                </div>

                                @error('fasting_second')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label for="tea_second" class="col-md-3 col-form-label">Чой 2-смена</label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <input id="tea_second" name="tea_second" type="text"
                                        class="form-control @error('tea_second') is-invalid @enderror"
                                        value="{{ old('tea_second') }}">

                                </div>

                                @error('tea_second')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-secondary text-white btn-sm"
                                    href="{{ route('backend.customers.index') }}"" role=" button" tabindex="-1">
                                    <i class="bi bi-arrow-left-short"></i>
                                </a>
                            </div>

                            <div class="col text-end">
                                <button type="submit" class="btn btn-primary text-white btn-sm" tabindex="-1">Saqlash</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        $(function() {
            /* -------------------------------------------------------------------------------------------- */
            $('#btnMapFacturation').click(function() {
                var href = "https://www.google.nl/maps/place/";

                var place = [
                    ($('#tea').val() ?? ''),
                    ($('#address_number').val() ?? '') + ',',
                    ($('#employees_second_after5').val() ?? ''),
                    ($('#address_place').val() ?? '')
                ].filter(Boolean).join("+");

                if (place > ',') {
                    window.open(href + place).focus();
                } else {
                    showToast({
                        type: 'info',
                        title: 'Show address ...',
                        message: 'No address available.',
                    });
                }
            });
            /* ------------------------------------------- */
            $('#btnMapLevering').click(function() {
                var href = "https://www.google.nl/maps/place/";

                var place = [
                    ($('#tea_second').val() ?? ''),
                    ($('#delivery_address_number').val() ?? '') + ',',
                    ($('#delivery_employees_second_after5').val() ?? ''),
                    ($('#delivery_address_place').val() ?? '')
                ].filter(Boolean).join("+");

                if (place > ',') {
                    window.open(href + place).focus();
                } else {
                    showToast({
                        type: 'info',
                        title: 'Show address ...',
                        message: 'No address availabler.',
                    });
                }
            });
            /* -------------------------------------------------------------------------------------------- */
            $('#btnClear').click(function() {
                $('#tea_second').val('');
                $('#delivery_address_number').val('');
                $('#delivery_employees_second').val('');
                $('#delivery_employees_second_after5').val('');
                $('#delivery_address_place').val('');
            });
            /* ------------------------------------------- */
            $('#btnCopy').click(function() {
                $('#tea_second').val($('#tea').val());
                $('#delivery_address_number').val($('#address_number').val());
                $('#delivery_employees_second').val($('#employees_second').find("option:selected").val());
                $('#delivery_employees_second_after5').val($('#employees_second_after5').val());
                $('#delivery_address_place').val($('#address_place').val());
            });
            /* -------------------------------------------------------------------------------------------- */
        })
    </script>
@endsection
