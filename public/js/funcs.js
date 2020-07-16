function showLoader() {
    $('#loader').show();
}

function hideLoader() {
    $('#loader').hide();
}

function getStudents() {
    axios.get(`/api/students`)
        .then(function (resp) {
            $('#students-table').html('');

            console.log(resp);

            for (let index = 0; index < resp.data.data.length; index++) {
                const student = resp.data.data[index];
            
                $('#students-table').append(`
                    <tr>
                        <td>${student.id}</td>
                        <td class="student-${student.id}-name">${student.name}</td>
                        <td>${student.created_at}</td>
                        <td>
                            <a href="#" data-id="${student.id}" class="text-info update-student">Update</a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="#" data-id="${student.id}" class="text-danger delete-student">Delete</a>
                        </td>
                    </tr>
                `);
            }
        });
}
