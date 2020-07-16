getStudents();
hideLoader();

$(document).on('click', '.delete-student', function (e) {
    showLoader();
    e.preventDefault();
    let id = $(this).attr('data-id');

    axios.delete(`/api/students/${id}`)
        .then(function () {
            getStudents();
            hideLoader();
        });
});

$('#students-table').on('click', '.update-student', function (e) {
    e.preventDefault();
    let id = $(this).attr('data-id');
    let name = $(`td.student-${id}-name`).text();

    $(`td.student-${id}-name`).html(`
        <input type="text" class="form-control" id="student-${id}-name-update-input" value="${name}" required> 

        <a href="#" class="text-success confirm-update-student-name" data-id="${id}">Confirm</a>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" class="text-danger cancel-student-update" data-original-value="${name}" data-id="${id}">Cancel</a>
    `);

    $(`input#student-${id}-update-name`).select().focus();
});

$('#students-table').on('click', '.cancel-student-update', function (e) {
    e.preventDefault();
    let id = $(this).attr('data-id');
    let original_value = $(this).attr('data-original-value');

    $(`td.student-${id}-name`).html(`${original_value}`);
});

$('#students-table').on('click', '.confirm-update-student-name', function (e) {
    e.preventDefault();
    showLoader();

    let id = $(this).attr('data-id');
    let name = $(`input#student-${id}-name-update-input`).val();

    axios.patch(`/api/students/${id}`, { name })
        .then(function (resp) {
            $(`td.student-${id}-name`).html(`${name}`);
        })
        .catch(function (error) {
            alert(error.response.data.errors.name);
        });

    hideLoader();
});

$('.add-student-modal-save').on('click', function () {
    showLoader();

    let name = $('input#new-student-name').val();

    axios.post('/api/students', { name })
        .then(function (resp) {
            getStudents();
            $('#add-student-modal').modal('hide');
            hideLoader();
        })
        .catch(function (error) {
            const err = error.response;
            alert(err.data.errors.name);
            hideLoader();
        });
});
