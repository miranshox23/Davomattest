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
                        <label for="customer_last_name" class="col-md-3 col-form-label">Бошқармалар номи</label>

                        <div class="col-md-8">
                            <input id="customer_last_name" name="customer_last_name" type="text" readonly
                                class="form-control-plaintext" value="{{ $customer->customer_last_name }}">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="customer_first_name" class="col-md-3 col-form-label">ходимлар сони</label>

                        <div class="col-md-8">
                            <input id="customer_first_name" name="customer_first_name" type="text" readonly
                                class="form-control-plaintext" value="{{ $customer->customer_first_name }}">
                        </div>
                    </div>
                    <hr class="narrow" />

                    <div class="row mb-2">
                        <label for="company_name" class="col-md-3 col-form-label">17:30 дан кейинги ходимлар сони</label>

                        <div class="col-md-8">
                            <input id="company_name" name="company_name" type="text" readonly
                                class="form-control-plaintext"
                                value="{{ $customer->company_name }}">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="company_vat" class="col-md-3 col-form-label">Рўзадорлар</label>

                        <div class="col-md-8">
                            <input id="company_vat" name="company_vat" type="text" readonly
                             class="form-control-plaintext"
                                value="{{ $customer->company_vat }}">
                        </div>
                    </div>
                    <hr class="narrow" />

                    <div class="row mb-2">
                        <label for="address_street" class="col-md-3 col-form-label">
                            Чой
                        </label>

                        <div class="col-md-8">
                            <input id="address_street" name="address_street" type="text" readonly
                                class="form-control-plaintext" value="{{ $customer->address_street }}">
                        </div>

                        {{-- <div class="col-md-2">
                            <input id="address_number" name="address_number" type="text" readonly
                                class="form-control-plaintext" value="{{ $customer->address_number }}">
                        </div> --}}
                    </div>

                    <div class="row mb-2">
                        <label for="address_country" class="col-md-3 col-form-label">
                            ходимлар сони 2-смена
                        </label>

                        <div class="col-md-2">
                            <input id="address_country" name="address_country" type="text" readonly
                                class="form-control-plaintext" value="{{ $customer->address_country }}">
                        </div>
                        {{-- <div class="col-md-4">
                            <input id="address_place" name="address_place" type="text" readonly
                                class="form-control-plaintext" value="{{ $customer->address_place }}">
                        </div>

                        <div class="col-md-1">
                            <button type="button" class="btn btn-outline-secondary btn-sm" id="btnMapFacturation"
                                name="btnMapFacturation" title="Show address on map" tabindex="-1">
                                <img src="{{ asset('img/icons/google-maps-location.png') }}"
                                    class="img-fluid mx-auto d-block" />
                            </button>
                        </div> --}}
                    </div>
                    <div class="row mb-2">
                        <label for="address_postal_code" class="col-md-3 col-form-label">
                            05:30 дан кейинги ходимлар сони 2-смена
                        </label>

                        <div class="col-md-8">
                            <input id="address_postal_code" name="address_street" type="text" readonly
                                class="form-control-plaintext" value="{{ $customer->address_postal_code }}">
                        </div>
                    </div>
                    <hr class="narrow" />

                    <div class="row mb-2">
                        <label for="phone" class="col-md-3 col-form-label">Рўзадорлар 2-смена</label>

                        <div class="col-md-8">
                            <input id="phone" name="phone" type="text" readonly class="form-control-plaintext"
                                value="{{ $customer->phone }}">
                        </div>
                    </div>

                    <div class="row">
                        <label for="delivery_address_street" class="col-md-3 col-form-label">Чой 2-смена</label>

                        <div class="col-md-8">
                            <input id="delivery_address_street" name="delivery_address_street" type="text" readonly class="form-control-plaintext"
                                value="{{ $customer->delivery_address_street }}">
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

            {{-- <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col">Delivery address</div>

                        <div class="col fs-5 text-end">
                            <img src="{{ asset('img/icons/delivery.png') }}" />
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-2">
                        <label for="delivery_address_street" class="col-md-3 col-form-label">
                            Street, number:
                        </label>

                        <div class="col-md-6">
                            <input id="delivery_address_street" name="delivery_address_street" type="text" readonly
                                class="form-control-plaintext" value="{{ $customer->delivery_address_street }}">
                        </div>

                        <div class="col-md-2">
                            <input id="delivery_address_number" name="delivery_address_number" type="text" readonly
                                class="form-control-plaintext" value="{{ $customer->delivery_address_number }}">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="delivery_address_country" class="col-md-3 col-form-label">
                            Country, postal code, place :
                        </label>

                        <div class="col-md-2">
                            <select name="delivery_address_country" id="delivery_address_country"
                                class="form-select selectpicker" disabled>
                                <option value="">Choose ...</option>
                                @foreach ($countries as $country)
                                    @if ($country->iso2 == $customer->delivery_address_country)
                                        <option value="{{ $country->iso2 }}" selected>{{ $country->name }}
                                        </option>
                                    @else
                                        <option value="{{ $country->iso2 }}">{{ $country->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <input id="delivery_address_postal_code" name="delivery_address_postal_code" type="text"
                                readonly class="form-control-plaintext"
                                value="{{ $customer->delivery_address_postal_code }}">
                        </div>

                        <div class="col-md-4">
                            <input id="delivery_address_place" name="delivery_address_place" type="text" readonly
                                class="form-control-plaintext" value="{{ $customer->delivery_address_place }}">
                        </div>

                        <div class="col-md-1">
                            <button type="button" class="btn btn-outline-secondary btn-sm" id="btnMapDelivery"
                                name="btnMapDelivery" title="Show address on map" tabindex="-1">
                                <img src="{{ asset('img/icons/google-maps-location.png') }}"
                                    class="img-fluid mx-auto d-block" />
                            </button>
                        </div>
                    </div>
                </div>
            </div> --}}
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
                    ($('#address_street').val() ?? ''),
                    ($('#address_number').val() ?? '') + ',',
                    ($('#address_postal_code').val() ?? ''),
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
                    ($('#delivery_address_street').val() ?? ''),
                    ($('#delivery_address_number').val() ?? '') + ',',
                    ($('#delivery_address_postal_code').val() ?? ''),
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
