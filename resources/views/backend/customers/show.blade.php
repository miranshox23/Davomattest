@extends('layouts.backend')

@section('title')
    &vert; Davomat
@endsection

@section('content')
    <div class="row">
        <div class="col-7">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col">Davomaat</div>

                        <div class="col text-center">
                            <strong> ID {{ str_pad($customer->id, 5, '0', STR_PAD_LEFT) }}</strong>
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
                                class="form-control-plaintext" value="{{ $customer->department_name }}">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="employees" class="col-md-3 col-form-label">ходимлар сони</label>

                        <div class="col-md-8">
                            <input id="employees" name="employees" type="text" readonly
                                class="form-control-plaintext" value="{{ $customer->employees }}">
                        </div>
                    </div>
                    <hr class="narrow" />

                    <div class="row mb-2">
                        <label for="employees_after17" class="col-md-3 col-form-label">17:30 дан кейинги ходимлар сони</label>

                        <div class="col-md-8">
                            <input id="employees_after17" name="employees_after17" type="text" readonly
                                class="form-control-plaintext"
                                value="{{ $customer->employees_after17 }}">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="fasting" class="col-md-3 col-form-label">Рўзадорлар</label>

                        <div class="col-md-8">
                            <input id="fasting" name="fasting" type="text" readonly
                             class="form-control-plaintext"
                                value="{{ $customer->fasting }}">
                        </div>
                    </div>
                    <hr class="narrow" />

                    <div class="row mb-2">
                        <label for="tea" class="col-md-3 col-form-label">
                            Чой
                        </label>

                        <div class="col-md-8">
                            <input id="tea" name="tea" type="text" readonly
                                class="form-control-plaintext" value="{{ $customer->tea }}">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="employees_second" class="col-md-3 col-form-label">
                            ходимлар сони 2-смена
                        </label>

                        <div class="col-md-2">
                            <input id="employees_second" name="employees_second" type="text" readonly
                                class="form-control-plaintext" value="{{ $customer->employees_second }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="employees_second_after5" class="col-md-3 col-form-label">
                            05:30 дан кейинги ходимлар сони 2-смена
                        </label>

                        <div class="col-md-8">
                            <input id="employees_second_after5" name="tea" type="text" readonly
                                class="form-control-plaintext" value="{{ $customer->employees_second_after5 }}">
                        </div>
                    </div>
                    <hr class="narrow" />

                    <div class="row mb-2">
                        <label for="fasting_second" class="col-md-3 col-form-label">Рўзадорлар 2-смена</label>

                        <div class="col-md-8">
                            <input id="fasting_second" name="fasting_second" type="text" readonly class="form-control-plaintext"
                                value="{{ $customer->fasting_second }}">
                        </div>
                    </div>

                    <div class="row">
                        <label for="tea_second" class="col-md-3 col-form-label">Чой 2-смена</label>

                        <div class="col-md-8">
                            <input id="tea_second" name="tea_second" type="text" readonly class="form-control-plaintext"
                                value="{{ $customer->tea_second }}">
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-secondary text-white btn-sm"
                                href="{{ route('backend.customers.index') }}" role=" button" tabindex="-1">
                                <i class="bi bi-arrow-left-short"></i>
                            </a>
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
        })
    </script>
@endsection
