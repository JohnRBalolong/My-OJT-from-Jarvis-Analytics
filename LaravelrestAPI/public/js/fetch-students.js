// this is one way to .fetch data from api using jquery.

// fetch('http://127.0.0.1:8000/api/students')
//     .then(response => response.json())
//     .then(data => {
//         const tableBody = document.getElementById('student-table-body');
//         tableBody.innerHTML = '';

//         // const dataArray = Array.isArray(data) ? data : Object.values(data);
//         console.log(data.message);

//         data.message.forEach(student => {
//             const newRow = tableBody.insertRow();

//             const nameCell = newRow.insertCell();
//             nameCell.innerText = student.name;

//             const emailCell = newRow.insertCell();
//             emailCell.innerText = student.email;

//             const phoneCell = newRow.insertCell();
//             phoneCell.innerText = student.phone;
//         });
//     })
//     .catch(error => {
//         console.error(error);
//     });

$(document).ready(function() {
    $.ajax({
        url: 'http://127.0.0.1:8000/api/students',
        dataType: 'json',
        success: function(data) {
            const tableBody = $('#student-table-body');
            tableBody.empty();

            $.each(data.student, function(index, student) {
                const newRow = $('<tr>').data('id', student.id);

                const indexCell = $('<td>').text(index + 1);
                newRow.append(indexCell);

                const nameCell = $('<td>').text(student.name);
                newRow.append(nameCell);

                const courseCell = $('<td>').text(student.course);
                newRow.append(courseCell);

                const emailCell = $('<td>').text(student.email);
                newRow.append(emailCell);

                const phoneCell = $('<td>').text(student.phone);
                newRow.append(phoneCell);

                const actionsCell = $('<td>');

                const editButton = $('<button>').addClass('btn btn-primary btn-sm').text('Edit').click(function() {
                    // Get the row that contains the Edit button
                    const row = $(this).closest('tr');

                    // Get the id from the data attribute of the row
                    const id = row.data('id');

                    // Get the values from the table cells in the row
                    const name = row.find('td:eq(1)').text();
                    const course = row.find('td:eq(2)').text();
                    const email = row.find('td:eq(3)').text();
                    const phone = row.find('td:eq(4)').text();

                    // Populate the input fields in the edit modal with the values
                    $('#editStudentModal #id').val(id);
                    $('#editStudentModal #name').val(name);
                    $('#editStudentModal #course').val(course);
                    $('#editStudentModal #email').val(email);
                    $('#editStudentModal #phone').val(phone);

                    // Show the edit modal
                    $('#editStudentModal').modal('show');
                });

                actionsCell.append(editButton);

                actionsCell.append(document.createTextNode(' | '));

                const deleteButton = $('<button>').addClass('btn btn-danger btn-sm').text('Delete').click(function() {
                    // Get the row that contains the Delete button
                    const row = $(this).closest('tr');

                    // Get the id from the data attribute of the row
                    const id = row.data('id');
                    const name = row.find('td:eq(1)').text();




                    $('#deleteStudentModal #name').text(name);

                    // Show the delete confirmation modal
                    $('#deleteStudentModal').modal('show');

                    // Set the delete button in the modal to trigger the DELETE request
                    $('#deleteStudentButton').off().click(function() {
                        // Send a DELETE request to the API endpoint
                        $.ajax({
                            url: 'http://127.0.0.1:8000/api/students/' + id + '/delete',
                            type: 'DELETE',
                            success: function() {
                                // Remove the row from the table
                                $('#deleteStudentModal').modal('hide');
                                fetchStudents();
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.error(textStatus, errorThrown);
                            }
                        });
                    });

                });

                actionsCell.append(deleteButton);

                newRow.append(actionsCell);

                tableBody.append(newRow);
            });

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(textStatus, errorThrown);
        }
    });
});









// Use this function to realod the table from the index after adding new students

function fetchStudents() {



    $(document).ready(function() {
        $.ajax({
            url: 'http://127.0.0.1:8000/api/students',
            dataType: 'json',
            success: function(data) {
                const tableBody = $('#student-table-body');
                tableBody.empty();

                $.each(data.student, function(index, student) {
                    const newRow = $('<tr>').data('id', student.id);

                    const indexCell = $('<td>').text(index + 1);
                    newRow.append(indexCell);

                    const nameCell = $('<td>').text(student.name);
                    newRow.append(nameCell);

                    const courseCell = $('<td>').text(student.course);
                    newRow.append(courseCell);

                    const emailCell = $('<td>').text(student.email);
                    newRow.append(emailCell);

                    const phoneCell = $('<td>').text(student.phone);
                    newRow.append(phoneCell);

                    const actionsCell = $('<td>');

                    const editButton = $('<button>').addClass('btn btn-primary btn-sm').text('Edit').click(function() {
                        // Get the row that contains the Edit button
                        const row = $(this).closest('tr');

                        // Get the id from the data attribute of the row
                        const id = row.data('id');

                        // Get the values from the table cells in the row
                        const name = row.find('td:eq(1)').text();
                        const course = row.find('td:eq(2)').text();
                        const email = row.find('td:eq(3)').text();
                        const phone = row.find('td:eq(4)').text();

                        // Populate the input fields in the edit modal with the values
                        $('#editStudentModal #id').val(id);
                        $('#editStudentModal #name').val(name);
                        $('#editStudentModal #course').val(course);
                        $('#editStudentModal #email').val(email);
                        $('#editStudentModal #phone').val(phone);

                        // Show the edit modal
                        $('#editStudentModal').modal('show');
                    });

                    actionsCell.append(editButton);

                    actionsCell.append(document.createTextNode(' | '));

                    const deleteButton = $('<button>').addClass('btn btn-danger btn-sm').text('Delete').click(function() {
                        // Get the row that contains the Delete button
                        const row = $(this).closest('tr');

                        // Get the id from the data attribute of the row
                        const id = row.data('id');
                        const name = row.find('td:eq(1)').text();




                        $('#deleteStudentModal #name').text(name);

                        // Show the delete confirmation modal
                        $('#deleteStudentModal').modal('show');

                        // Set the delete button in the modal to trigger the DELETE request
                        $('#deleteStudentButton').off().click(function() {
                            // Send a DELETE request to the API endpoint
                            $.ajax({
                                url: 'http://127.0.0.1:8000/api/students/' + id + '/delete',
                                type: 'DELETE',
                                success: function() {
                                    // Remove the row from the table
                                    $('#deleteStudentModal').modal('hide');
                                    fetchStudents();
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.error(textStatus, errorThrown);
                                }
                            });
                        });

                    });

                    actionsCell.append(deleteButton);

                    newRow.append(actionsCell);

                    tableBody.append(newRow);
                });

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(textStatus, errorThrown);
            }
        });
    });

}









$(document).ready(function() {
    $('#edit-student-form').submit(function(event) {
        event.preventDefault(); // prevent form from submitting normally

        // get the form data
        var formData = $(this).serialize();

        // make the AJAX request
        $.ajax({
            url: 'http://127.0.0.1:8000/api/students/' + $('#id').val() + '/edit',
            type: 'PUT',
            data: formData,
            success: function(data) {
                // update the UI or display a success message
                $('#editStudentModal').modal('hide');
                fetchStudents();
            },
            error: function(xhr, status, error) {
                // handle errors
                console.log(error);
            }
        });
    });
});