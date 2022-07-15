@extends('layouts.backend')

@section('title')
    &vert; Davomat
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-print-none">
            <div class="row">
                <div class="col">Davomat</div>

                <div class="col fs-5 text-end">
                    <img src="{{ asset('img/icons/persons.png') }}" />
                </div>
            </div>
        </div>

        <div class="card-body p-1">
            <div class="d-flex justify-content-between mb-1">
                <div id="ToolbarLeft"></div>
                <div id="ToolbarCenter"></div>
                <div id="ToolbarRight"></div>
            </div>

            <table id="sqltable" class="table table-bordered table-striped table-hover table-sm dataTable">
                <thead class="table-success">
                    <tr>
                        <th scope="col">Бошқармалар номи</th>
                        <th scope="col">ходимлар сони</th>
                        <th scope="col">17:30 дан кейинги ходимлар сони</th>
                        <th scope="col">Рўзадорлар</th>
                        <th scope="col">Чой</th>
                        <th scope="col">ходимлар сони 2-смена</th>
                        <th scope="col">05:30 дан кейинги ходимлар сони 2-смена</th>
                        <th scope="col">Рўзадорлар 2-смена</th>
                        <th scope="col">Чой 2-смена</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    @include('backend.components.datatables-js')

    @parent
    <script>
        $(function() {
            /* ------------------------------------------------------------------------ */
            let createButton = {
                className: 'btn-success',
                text: '<i class="bi bi-plus"></i>',
                titleAttr: 'Add',
                enabled: true,
                action: function(e, dt, node, config) {
                    var url = '{{ route('backend.customers.create') }}';

                    document.location.href = url;
                }
            }
            dtButtonsCenter.push(createButton)

            let showButton = {
                extend: 'selectedSingle',
                className: 'btn-secondary selectOne',
                text: '<i class="bi bi-eye"></i>',
                titleAttr: 'Show',
                enabled: false,
                action: function(e, dt, node, config) {
                    var id = dt.row({
                        selected: true
                    }).data().id;

                    var url = '{{ route('backend.customers.show', 'id') }}';
                    url = url.replace("id", id);

                    document.location.href = url;
                }
            }
            dtButtonsCenter.push(showButton)

            let editButton = {
                extend: 'selectedSingle',
                className: 'btn-primary selectOne',
                text: '<i class="bi bi-pencil"></i>',
                titleAttr: 'Edit',
                enabled: false,
                action: function(e, dt, node, config) {
                    var id = dt.row({
                        selected: true
                    }).data().id;

                    var url = '{{ route('backend.customers.edit', 'id') }}';
                    url = url.replace("id", id);

                    document.location.href = url;
                }
            }
            dtButtonsCenter.push(editButton)

            let clearButton = {
                className: 'btn-secondary',
                text: '<i class="bi bi-arrow-counterclockwise"></i>',
                titleAttr: 'Remove filter and sort',
                action: function(e, dt, node, config) {
                    dt.state.clear();
                    window.location.reload();
                }
            }
            dtButtonsRight.push(clearButton)

            let deleteButton = {
                extend: 'selected',
                className: 'btn-danger selectMultiple',
                text: '<i class="bi bi-trash"></i>',
                titleAttr: 'Delete',
                enabled: false,
                url: "{{ route('backend.customers.massDestroy') }}",
                action: function(e, dt, node, config) {
                    var ids = $.map(dt.rows({
                        selected: true
                    }).data(), function(entry) {
                        return entry.id;
                    });

                    if (ids.length === 0) {
                        bootbox.alert({
                            title: 'Error ...',
                            message: 'Nothing slected'
                        });
                        return
                    }

                    bootbox.confirm({
                        title: "Qatorni o'chirish",
                        message: "O'chirish?",
                        buttons: {
                            confirm: {
                                label: 'Ha',
                                className: 'btn-sm btn-primary'
                            },
                            cancel: {
                                label: "Yo'q",
                                className: 'btn-sm btn-secondary'
                            }
                        },
                        callback: function(confirmed) {
                            if (confirmed) {
                                $.ajax({
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    },
                                    success: function(response) {
                                        oTable.draw();

                                        showToast({
                                            type: 'success',
                                            title: 'Delete ...',
                                            message: "Qator o'chirildi.",
                                        });
                                    }
                                });
                            }
                        }
                    });
                }
            }
            dtButtonsRight.push(deleteButton)
            /* ------------------------------------------------------------------------ */
            let dtOverrideGlobals = {
                serverSide: true,
                retrieve: true,
                ajax: {
                    url: "{{ route('backend.customers.index') }}",
                    data: function(d) {}
                },
                columns: [
                    {
                        data: 'department_name',
                        name: 'department_name',
                    },
                    {
                        data: 'employees',
                        name: 'employees',
                    },
                    {
                        data: 'employees_after17',
                        name: 'employees_after17',
                    },
                    {
                        data: 'fasting',
                        name: 'fasting',
                    },
                    {
                        data: 'tea',
                        name: 'tea',
                    },

                    {
                        data: 'employees_second',
                        name: 'employees_second',
                        className: 'text-center',

                    },

                    {
                        data: 'employees_second_after5',
                        name: 'employees_second_after5',
                    },

                    {
                        data: 'fasting_second',
                        name: 'fasting_second',
                    },
                    {
                        data: 'tea_second',
                        name: 'tea_second',
                    },
                ],
                select: {
                    selector: 'td:not(.no-select)',
                },
                ordering: true,
                order: [
                    [1, "asc"],
                    [2, "asc"],
                    [3, "asc"],
                ],
                preDrawCallback: function(settings) {
                    oTable.columns.adjust();
                }
            };
            /* ------------------------------------------- */
            let oTable = $('#sqltable').DataTable(dtOverrideGlobals);
            /* ------------------------------------------------------------------------ */
            new $.fn.dataTable.Buttons(oTable, {
                name: 'BtnGroupLeft',
                buttons: dtButtonsLeft
            });
            new $.fn.dataTable.Buttons(oTable, {
                name: 'BtnGroupCenter',
                buttons: dtButtonsCenter
            });
            new $.fn.dataTable.Buttons(oTable, {
                name: 'BtnGroupRight',
                buttons: dtButtonsRight
            });

            oTable.buttons('BtnGroupLeft', null).containers().appendTo('#ToolbarLeft');
            oTable.buttons('BtnGroupCenter', null).containers().appendTo('#ToolbarCenter');
            oTable.buttons('BtnGroupRight', null).containers().appendTo('#ToolbarRight');
            /* ------------------------------------------------------------------------ */
            oTable.on('select deselect', function(e, dt, type, indexes) {
                var selectedRows = oTable.rows({
                    selected: true
                }).count();

                oTable.buttons('.selectOne').enable(selectedRows === 1);
                oTable.buttons('.selectMultiple').enable(selectedRows > 0);
            });
            /* ------------------------------------------------------------------------ */
            /* DATATABLE - CELL - Action					   						    */
            /* ------------------------------------------------------------------------ */
            $('#sqltable tbody').on('click', 'td.toggleSendNewsletter', function() {
                var table = 'customers';
                var id = oTable.row($(this).closest("tr")).data().DT_RowId;
                var key = 'send_newsletter';
                var value = oTable.cell(this).data();

                bootbox.confirm({
                    title: 'Edit ...',
                    message: MyItem(id, key, value),
                    size: 'xl',
                    onEscape: true,
                    backdrop: true,
                    buttons: {
                        confirm: {
                            label: 'Ha',
                            className: 'btn-success'
                        },
                        cancel: {
                            label: "Yo'q",
                            className: 'btn-secondary'
                        }
                    },
                    callback: function(confirmed) {
                        if (confirmed) {
                            value = value == 0 ? 1 : 0;

                            setValue(table, id, key, value);
                        }
                    }
                });
            });
            /* ------------------------------------------------------------------------ */
            /* FUNCTIONS - MyItem, setValue         			            		    */
            /* ------------------------------------------------------------------------ */
            function MyItem(id, key, value) {
                var aRow = oTable.row('#' + id).data();

                if (value == 1) {
                    from = '1';
                    to = '0';
                } else {
                    from = '0';
                    to = '1';
                }

                var strHTML = '';
                strHTML += '<table class="table table-bordered table-sm mytable">';
                strHTML += '<thead class="table-success">';
                strHTML +=
                    '<tr><th class="text-center">ID</th><th>Customer</th><th>Company</th><th>Place</th><th class="text-center">Send newsletter ?</th></tr>';
                strHTML += '</thead>';
                strHTML += '<tbody>';
                strHTML += '<tr>';
                strHTML += '<td class="text-center">' + aRow['id'].toString().padStart(5, '0') + '</td>';
                strHTML += '<td>';
                if (aRow['customer'] == null) {
                    strHTML += '&nbsp;';
                } else {
                    strHTML += aRow['customer'];
                }
                strHTML += '</td>';
                strHTML += '<td>';
                if (aRow['employees_after17'] == null) {
                    strHTML += '&nbsp;';
                } else {
                    strHTML += aRow['employees_after17'];
                }
                strHTML += '</td>';
                strHTML += '<td>';
                if (aRow['place'] == null) {
                    strHTML += '&nbsp;';
                } else {
                    strHTML += aRow['place'];
                }
                strHTML += '</td>';
                strHTML += '<td class="text-center">';
                strHTML += from + ' <i class="bi bi-arrow-right"></i> ' + to;
                strHTML += '</td>';
                strHTML += '</tr>';
                strHTML += '</tbody>';
                strHTML += '</table>';
                strHTML += "<div>Elementni o'zgartirishni hohlaysizmi?</div>";
                return strHTML;
            };
            /* ------------------------------------------- */
            function setValue(table, id, key, value) {
                $.ajax({
                    method: 'POST',
                    url: "{{ route('backend.general.setValueDB') }}",
                    data: {
                        table: table,
                        id: id,
                        key: key,
                        value: value,
                    },
                    success: function(response) {
                        oTable.rows(id).invalidate().draw(false);

                        showToast(response);
                    }
                });
            };
            /* ------------------------------------------------------------------------ */
        });
    </script>
@endsection

@section('styles')
    @include('backend.components.datatables-css')
@endsection
