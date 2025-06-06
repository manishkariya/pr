@include('app')



    <body>
<div class="container mt-5" style="max-width: 700px;">
    <div class="card shadow">
        <div class="card-header bg-light-dark">
            <h4 class="mb-0">{{ strtoupper($employeename['full_name']) }}</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered mb-0">
                <tr>
                    <th>Basic</th>
                    <td>{{ $salary->basic }}</td>
                </tr>
                <tr>
                    <th>HRA</th>
                    <td>{{$salary->hra }}</td>
                </tr>
                <tr>
                    <th>Special Allowance</th>
                    <td>{{ $salary->specialallows}}</td>
                </tr>
                <tr>
                    <th>Overtime</th>
                    <td>{{ $salary->overtime }} hrs</td>
                </tr>
                <tr class="table-success">
                    <th>Total Salary</th>
                    <td><strong>₹{{  $salary->totalsalary }}</strong></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>