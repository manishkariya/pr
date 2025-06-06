<script>
    $(document).ready(function () {


        $('.repeater').repeater({
            initEmpty: false,
            defaultValues: {



            },
            show: function () {
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },

            ready: function (setIndexes) {



            },
            ready: function (setIndexes) {

    },

    isFirstItemUndeletable: true
        });

  //department fetch

        $('#departmentid').change(function () {
                       var departmentId = $(this).val();
                       if (departmentId) {
                           $.ajax({
                               url: '/get-designations/' + departmentId,
                               type: 'GET',
                               dataType: 'json',
                               success: function (data) {

                                   $('#designation_id').empty().append('<option value="">-- Select Designation --</option>');
                                   $.each(data, function (key, value) {
                                       $('#designation_id').append('<option value="' + key + '">' + value + '</option>');
                                   });
                               }
                           });
                       } else {
                           $('#designation_id').empty().append('<option value="">-- Select Designation --</option>');
                       }
                   });



        $('#country_id').change(function () {
                       var countryId = $(this).val();
                       if (countryId) {
                           $.ajax({
                               url: '/get-state/' + countryId,
                               type: 'GET',
                               dataType: 'json',
                               success: function (data) {

                                $('#state_id').prop('disabled', false);


                                $('#state_id').empty().append('<option value="">-- Select state --</option>');
                                $('#city_id').empty().append('<option value="">-- Select city --</option>');

                                $.each(data, function (key, value) {
                                       $('#state_id').append('<option value="' + key + '">' + value + '</option>');
                                   });
                               }
                           });
                       } else {
                           $('#state_id').empty().append('<option value="">-- Select state --</option>');
                       }
                   });
                   $('#state_id').change(function () {
                       var stateId = $(this).val();
                       if (stateId) {
                           $.ajax({
                               url: '/get-city/' + stateId,
                               type: 'GET',
                               dataType: 'json',
                               success: function (data) {
                                $('#city_id').prop('disabled', false);

                                   $('#city_id').empty().append('<option value="">-- Select Designation --</option>');
                                   $.each(data, function (key, value) {
                                       $('#city_id').append('<option value="' + key + '">' + value + '</option>');
                                   });
                               }
                           });
                       } else {
                           $('#city_id').empty().append('<option value="">-- Select city --</option>');
                       }
                   });
 //end
// auto age fetch
 $("#datepicker").datepicker({
           dateFormat: 'yy-mm-dd',
           changeMonth: true,
           changeYear: true,
           yearRange: "-100:+0",
           maxDate: new Date()
       });
    });

    $("#datepicker").change( function() {
       var dob = $(this).datepicker("getDate");

       if (dob) {
           var today = new Date();
           var age = today.getFullYear() - dob.getFullYear();
           var monthDiff = today.getMonth() - dob.getMonth();
           if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
               age--;
           }
           $("#age").val(age);
          // alert("You are " + age + " years old.");
       } else {
           alert("Please select a valid date.");
       }

        });


</script>
<script>
    function loadCountryTable() {
        if ($.fn.DataTable.isDataTable('#dataTableBuilder')) {
            $('#dataTableBuilder').DataTable().clear().destroy();
        }

        $('#dataTableBuilder').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            "lengthMenu": [[ 5,10 , 25, 100 ], [ 5, 10, 25, 100]],
            "pageLength": 5,
            ajax: '{{ route("employee.index") }}',

            columns: [
                {data: 'id', name: 'id'},
                {data: 'E_number', name: 'E_number'},
                {data: 'firstname' , name: 'firstname'},
                {data: 'middlename', name: 'middlename'},
                {data: 'lastname', name: 'lastname'},
                {data: 'birthdate', name: 'birthdate'},
                {data: 'age', name: 'age'},
                {data: 'departmentname', name: 'departmentname'},
                {data: 'designationname', name: 'designationname'},
                {data: 'country_name', name: 'country_name'},
                {data: 'statename', name: 'statename'},
                {data: 'cityname', name: 'cityname'},
                { data: 'action', name: 'action', orderable: false, searchable: false } // 3rd column: Actions
            ]
        });

    }

    $(document).ready(function () {
        loadCountryTable();


    });

    </script>

<script>
    let table = $('#users-table').DataTable({

      processing: true,
      serverSide: true,
      scrollX: true,


      "lengthMenu": [[ 5,10 , 25, 100 ], [ 5, 15, 25, 100]],
      "pageLength": 5,

      ajax: {
          url: '{{ route("users.index") }}',
          type: 'GET', // change to POST if your route is POST
          data: function (d) {

          }
      },


      columns: [



  {data: 'id', name: 'id'},
  { data: 'id_link', name: 'id_link', orderable: false, searchable: false },


   {data: 'firstname' , name: 'firstname'},
  {data: 'middlename', name: 'middlename'},
  {data: 'lastname', name: 'lastname'},
  {data: 'birthdate', name: 'birthdate'},
  {data: 'age', name: 'age'},
  {data: 'departmentname', name: 'departmentname'},

  {data: 'designationname', name: 'designationname'},
  {data: 'country_name', name: 'country'},
  {data: 'statename', name: 'state'},

  {data: 'cityname', name: 'city'},



  { data: 'action', orderable: false, searchable: false },




      ]
  });



  $('#applyFilter').on('click', function () {
      console.log('Sending filter:', $('#start_date').val(), $('#end_date').val());
      $('#filterModal').modal('hide');
      table.draw(); // forces ajax reload
  });

  $('#users-table thead tr:eq(0) th').each(function (i) {
          $('input', this).on('keyup change', function () {
              if (table.column(i).search() !== this.value) {
                  table.column(i).search(this.value).draw();
              }
          });
      });

      $(document).on('click', '.delete-button', function () {
    let id = $(this).data('id');
    if (confirm('Are you sure you want to delete this employee?')) {
        $.ajax({
            url: '/employees/' + id,
            type: 'get',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                $('#users-table').DataTable().ajax.reload();
            }
        });
    }
});

  </script>
