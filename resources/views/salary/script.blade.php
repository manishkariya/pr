
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {

        function Salary() {
            var basic = parseFloat($('#basic').val()) ?? 0;
            var hra = parseFloat($('#hra').val()) || 0;
            var overtime = parseFloat($('#overtime').val()) || 0;

            var totalSalary = basic + hra + (overtime * 100);



            $('#totalSalary').val(totalSalary.toFixed(2));
            $('#total1Salary').val(totalSalary.toFixed(2));
        }


        $('#basic, #hra, #overtime').on('input', function() {
            Salary();
        });

        //
        Salary();
    });
</script>
