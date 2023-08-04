printData()

let btnactions = 'add';

$("#btnModel").on('click', function() {
    $("#popUpModel").modal('show');
});

function resetForm() {
    $("#employeeForm")[0].reset();
}

$("#employeeForm").submit(function(event) {
    event.preventDefault();

    let form_data = new FormData($("#employeeForm")[0]);

    if (btnactions === 'add') {

        form_data.append("action", "employeeRegistration");
    } else {
        form_data.append("action", "updateEmployee");
    }

    $.ajax({
        method: "POST",
        dataType: "JSON",
        url: "operations.php",
        data: form_data,
        processData: false,
        contentType: false,
        success: function(data) {
            console.log(data);
            let message = data.data;
            alert(message);
            $("#popUpModel").modal('hide');
            resetForm();
            printData();
            btnactions = 'add';
        },
        error: function(data) {
            console.log(data);
        }
    })
});

function printData() {
    $("#tableEmployee tbody").html('');
    let fetchData = {
        "action": "fetchEmployee",
    }
    $.ajax({
        method: "POST",
        dataType: "JSON",
        url: "operations.php",
        data: fetchData,
        success: function(data) {
            console.log(data.data);
            let response = data.data;
            let status = data.status;
            console.log("hi response", response);
            let tr = '';
            if (status) {
                response.forEach(element => {
                    tr += "<tr>";
                    for (const i in element) {
                        tr += `<td>${element[i]}</td>`;
                    }
                    tr += `<td><a class= "btn btn-success update_info " update_id=${element['id']}>Edit</a> &nbsp; &nbsp; <a class="btn btn-danger delete_info"  delete_id=${element['id']}>Delete</a></td>`;
                    tr += "</tr>";
                });

            }
            $("#tableEmployee tbody").append(tr);

        },
        error: function(data) {
            console.log(data)
        }
    })
}


function deleteEmployee(id) {
    let delete_info = {
        "action": "deleteEmployee",
        "id": id,
    }
    $.ajax({
        method: "POST",
        dataType: "JSON",
        url: "operations.php",
        data: delete_info,
        success: function(data) {
            alert(data.data);
            printData();
        },
        error: function(data) {
            console.log(data);
        }
    })
}

function getSingleEmployeeInfo(id) {
    let getSingleInfo = {
        "action": "singleEmployee",
        "id": id,
    }
    $.ajax({
        method: "POST",
        dataType: "JSON",
        url: "operations.php",
        data: getSingleInfo,
        success: function(data) {
            let response = data.data;
            let status = data.status;
            if (status) {
                $("#Employee_ID").val(response[0].id);
                $("#Employee_Name").val(response[0].name);
                $("#Employee_Phone").val(response[0].phone);
                $("#Employee_Address").val(response[0].address);
                $("#Employee_Date").val(response[0].date);
                $("#popUpModel").modal('show');
                btnactions = 'update';

            }
        },
        error: function(data) {
            console.log(data);
        }
    })
}

$("#tableEmployee tbody").on('click', ('a.delete_info'), function() {
    let id = $(this).attr("delete_id");
    if (confirm("Are you sure you want to delete this employee")) {
        deleteEmployee(id);
    };
});
$("#tableEmployee tbody").on('click', ('a.update_info'), function() {
    let id = $(this).attr("update_id");
    getSingleEmployeeInfo(id);

});