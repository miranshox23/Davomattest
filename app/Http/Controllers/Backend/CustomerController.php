<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Country;
use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $customers = Customer::select(sprintf('%s.*', (new Customer)->getTable()));

            return Datatables::of($customers)
                ->addColumn('DT_RowId', function ($row) {return $row->id;})

                ->filterColumn('department_name', function ($query, $keyword) {
                    $sql = "CONCAT(customers.department_name, ' ', customers.employees) like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->filterColumn('employees_second', function ($query, $keyword) {
                })
                ->filterColumn('employees_second', function ($query, $keyword) {
                    $sql = "CONCAT(customers.employees_second_after5, ' ', customers.employees_second) like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->toJson();
        }

        return view('backend.customers.index');
    }

    public function create()
    {
        $countries = Country::where('is_eu', 1)->orderBy('name', 'asc')->get();

        return view('backend.customers.create')->with(compact('countries'));
    }

    public function store(CustomerStoreRequest $request)
    {
        $customer = Customer::create($request->all());

        $notification = [
            "type" => "success",
            "title" => 'Add ...',
            "message" => 'Item added.',
        ];

        return redirect()->route('backend.customers.index')->with('notification', $notification);
    }

    public function show(Customer $customer)
    {
        $countries = Country::where('is_eu', 1)->orderBy('name', 'asc')->get();

        return view('backend.customers.show', compact('customer'))->with(compact('countries'));
    }

    public function edit(Customer $customer)
    {
        $countries = Country::where('is_eu', 1)->orderBy('name', 'asc')->get();

        return view('backend.customers.edit', compact('customer'))->with(compact('countries'));
    }

    public function update(CustomerUpdateRequest $request, Customer $customer)
    {
        $customer->update($request->all());

        $notification = [
            "type" => "success",
            "title" => 'Edit ...',
            "message" => 'Item updated.',
        ];

        return redirect()->route('backend.customers.index')->with('notification', $notification);
    }

    public function massDestroy(Request $request)
    {
        Customer::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
