@extends('app')



                </div>
                <body>
                    <div class="container mt-5" style="max-width: 1000px;">
                        <h2 class="mb-4">Employee Details</h2>

                        <div class="card shadow-sm">
                            <div class="card-body">

                                <h4 class="card-title">{{ $employee->firstname ?? '' }}
                                {{ $employee->middlename ?? '' }}
                                {{ $employee->lastname ?? '' }} </h4>
                                <p>{{$countries}}


                                <table class="table table-borderless">
                                    <tbody>
                                        <div class='text-end'>Employee:
                                            {{$employee['E_number']}}
                                            <div>

                                        <tr>
                                            <th scope="row">Birthdate:</th>
                                            <td>{{ \Carbon\Carbon::parse($employee->birthdate)->format('F j, Y') ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Age:</th>
                                            <td>
                                                 {{$employee['age']}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Department:</th>
                                            <td>{{$department['departmentname'] ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Designation:</th>
                                            <td>{{ $designation['designationname'] ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total Experience:</th>
                                            <td>{{ $employee['totalexperience'] ?? '0' }} year(s)</td>
                                        </tr>



                                    </tbody>
                                </table>
                                <h4>experience</h4>
                                <table>
                                <thead >
                                    <tr class="border border-1 border-dark ">
                                        <th>experince</th>
                                        <th>role</th>
                                        <th scope="row">Company Name </th>
                                        <th scope="row">Start Date</th>
                                        <th scope="row">End Date</th>
                                    </tr>

                                    @foreach ($experience as $exp=>$value )


                                    <tr >

                                        <td>{{ $value['totalexperience'] ?? '' }} year</td>


                                        <td>{{ $value['role'] ?? '0' }} </td>


                                        <td>{{ $value['company_name'] ?? '' }}</td>


                                        <td>
                                            {{ !empty($value['start_date']) ? \Carbon\Carbon::parse($value['start_date'])->format('d - m - Y') : '' }}
                                        </td>


                                        <td>
                                            {{ !empty($value['end_date']) ? \Carbon\Carbon::parse($value['end_date'])->format('d- m- Y') : '' }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>

                                <a href="{{ url('/employee') }}" class="btn btn-secondary mt-3">Back to List Employee</a>
                            </div>
                        </div>
                    </div>
                    </body>