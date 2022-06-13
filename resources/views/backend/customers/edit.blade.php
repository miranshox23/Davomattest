@extends('layouts.backend')

@section('title')
    &vert; Customer
@endsection

@section('content')
    <form method="POST" action="{{ route('backend.customers.update', [$customer->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-7">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">Davomat</div>

                            <div class="col text-center">
                                <strong>ID {{ str_pad($customer->id, 5, '0', STR_PAD_LEFT) }}</strong>
                            </div>

                            <div class="col fs-5 text-end">
                                <img src="{{ asset('img/icons/person.png') }}" />
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mb-2">
                            <label for="department_name" class="col-md-3 col-form-label">Бошқармалар номи</label>

                            <div class="col-md-8">
                                <input id="department_name" name="department_name" type="text" readonly
                                    class="form-control @error('department_name') is-invalid @enderror"
                                    value="{{ $customer->department_name }}" autofocus>

                                @error('department_name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="employees" class="col-md-3 col-form-label">ходимлар сони</label>

                            <div class="col-md-8">
                                <input id="employees" name="employees" type="text" readonly
                                    class="form-control @error('employees') is-invalid @enderror"
                                    value="{{ $customer->employees }}">

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
                                    value="{{ $customer->employees_after17 }}">

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
                                    value="{{ $customer->fasting }}">

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
                                    value="{{ $customer->tea }}">

                                @error('tea')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- <div class="col-md-2">
                                <input id="address_number" name="address_number" type="text"
                                    class="form-control @error('address_number') is-invalid @enderror"
                                    value="{{ $customer->address_number }}">

                                @error('address_number')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div> --}}
                        </div>

                        <div class="row mb-2">
                            <label for="employees_second" class="col-md-3 col-form-label">
                                ходимлар сони 2-смена
                            </label>

                            <div class="col-md-8">
                                <input id="employees_second" name="employees_second" type="text" readonly
                                    class="form-control @error('employees_second') is-invalid @enderror"
                                    value="{{ $customer->employees_second }}">
                                @error('employees_second')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- <div class="col-md-2">
                                <input id="employees_second_after5" name="employees_second_after5" type="text"
                                    class="form-control @error('employees_second_after5') is-invalid @enderror"
                                    value="{{ $customer->employees_second_after5 }}">

                                @error('employees_second_after5')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="address_place" name="address_place" type="text"
                                    class="form-control @error('address_place') is-invalid @enderror"
                                    value="{{ $customer->address_place }}">

                                @error('address_place')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div> --}}

                            {{-- <div class="col-md-1">
                                <button type="button" class="btn btn-outline-secondary btn-sm" id="btnMapFacturation"
                                    name="btnMapFacturation" title="Show address on map" tabindex="-1">
                                    <img src="{{ asset('img/icons/google-maps-location.png') }}"
                                        class="img-fluid mx-auto d-block" />
                                </button>
                            </div> --}}
                        </div>
                        <hr class="narrow" />

                        <div class="row mb-2">
                            <label for="employees_second_after5" class="col-md-3 col-form-label">
                                05:30 дан кейинги ходимлар сони 2-смена
                            </label>

                            <div class="col-md-8">
                                <input id="employees_second_after5" name="employees_second_after5" type="text"
                                    class="form-control @error('employees_second_after5') is-invalid @enderror"
                                    value="{{ $customer->employees_second_after5 }}">
                                @error('employees_second_after5')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>


                        </div>
                        <div class="row mb-2">
                            <label for="fasting_second" class="col-md-3 col-form-label">Рўзадорлар 2-смена</label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <input id="fasting_second" name="fasting_second" type="text"
                                        class="form-control @error('fasting_second') is-invalid @enderror"
                                        value="{{ $customer->fasting_second }}">
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
                                        value="{{ $customer->tea_second }}">
                                    @error('tea_second')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-secondary text-white btn-sm" tabindex="-1"
                                    onclick="history.back();">
                                    <i class="bi bi-arrow-left-short"></i>
                                </button>
                            </div>

                            <div class="col text-end">
                                <button type="submit" class="btn btn-primary text-white btn-sm" tabindex="-1">Saqlash</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">Vaqt</div>

                            <div class="col fs-5 text-end">
                                <img src="{{ asset('img/icons/system.png') }}" />
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mb-2">
                            <label for="created_at" class="col-md-5 col-form-label">Yaratilgan vaqti :</label>
                            <div class="col-md-6">
                                <input type="text" readonly class="form-control-plaintext" id="created_at"
                                    value="{{ $customer->created_at }}">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="updated_at" class="col-md-5 col-form-label">O'zgartirilgan vaqti :</label>
                            <div class="col-md-6">
                                <input type="text" readonly class="form-control-plaintext" id="updated_at"
                                    value="{{ $customer->updated_at }}">
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
            $('#btnMapDelivery').click(function() {
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
                        message: 'No address available.',
                    });
                }
            });
            /* -------------------------------------------------------------------------------------------- */
            $('#btnClear').click(function() {
                $('#tea_second').val('');
                $('#delivery_address_number').val('');
                $('#delivery_employees_second').val('').trigger('change');
                $('#delivery_employees_second_after5').val('');
                $('#delivery_address_place').val('');
            });
            /* ------------------------------------------- */
            $('#btnCopy').click(function() {
                $('#tea_second').val($('#tea').val());
                $('#delivery_address_number').val($('#address_number').val());
                $('#delivery_employees_second').val($('#employees_second').find("option:selected").val())
                    .trigger('change');
                $('#delivery_employees_second_after5').val($('#employees_second_after5').val());
                $('#delivery_address_place').val($('#address_place').val());
            });
            /* -------------------------------------------------------------------------------------------- */
        })
    </script>
@endsection
