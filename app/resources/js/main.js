const firstname = document.getElementById("txtfirstname");
const lastname = document.getElementById("txtlastname");
const course = document.getElementById("txtcourse");

$("#btnOnSave").click(() => {
    const obj = {
        fname: firstname.value,
        lname: lastname.value,
        course: course.value,
        isbool: true
    };

    clientRequest(obj)
        .then((repository) => {
            const data = JSON.parse(repository);
            console.log(data.status);
            location.reload();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
});

const clientRequest = (object) => {
    return new Promise((resolve, reject) => {
        $.post("app/Helper/helper.php", object, (response) => {
            resolve(response);
        }).fail((error) => {
            reject(error);
        });
    });
};

$(document).ready(() => {
    fetchData()
        .then((repository) => {
            const data = JSON.parse(repository);
            const message = data.status;
            console.log(data.status)
            $("#dataContainer").html("");
            if (data.status === "No record found") {
                $("#dataContainer").append(`
                    <tr>
                        <td colspan="3" class="text-center">${message}</td>
                    </tr>
                `);
            } else {
                data.forEach((item) => {
                    $("#dataContainer").append(`
                        <tr>
                            <td>${item.firstname}</td>
                            <td>${item.lastname}</td>
                            <td>${item.course}</td>
                        </tr>
                    `);
                });
            }
        })
        .catch((error) => {
            console.error("Error:", error);
        });
});

const fetchData = () => {
    return new Promise((resolve, reject) => {
        $.get("app/Helper/fetchHelper.php?trigger=true", (response) => {
            resolve(response);
        }).fail((error) => {
            reject(error);
        });
    });
};
