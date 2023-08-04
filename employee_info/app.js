$("#btnModel").on("click", function() {
    $("#popUpModel").modal("show");
});

$("#employeeForm").submit(function(event) {
    event.preventDefault();

    let form_data = new FormData($("#employeeForm")[0]);

    form_data.append("action", "RegisterEmployeeInfo");


    $.ajax({
        method: "POST",
        dataType: "JSON",
        url: "api.php",
        data: form_data,
        processData: false,
        contentType: false,
        success: function(data) {
            let status = data.status
            let response = data.data
            alert(response)
            $("#modalStudent").modal("hide");

        },
        error: function(data) {
            console.log(data)
        }
    })
});



console.log('miirshe');