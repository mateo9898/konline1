$(document).ready(function () {

    let json = "1";

    const test = jQuery.ajax({
        type: "POST",
        url: '',
        dataType: 'json',

        success: function (obj, textstatus, response) {
            if (!('error' in obj)) {
                json = response.responseJSON;
                console.log(json);
                let array = [
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                    ["", "", "", "", "", ""],
                ]
                table = document.getElementById("table");

                let column = 0;
                let row = 0;
                let minute = 0;
                let day = "";


                for (let i = 0; i < json.data.length; i++) {

                    day = (json.data[i].day_name).toLowerCase();

                    switch (day) {
                        case "poniedziałek":
                            column = 1;
                            break;
                        case "wtorek":
                            column = 2;
                            break;
                        case "środa":
                            column = 3;
                            break;
                        case "czwartek":
                            column = 4;
                            break;
                        case "piątek":
                            column = 5;
                            break;
                    };

                    array[2][column] = json.data[i].name;
                    array[3][column] = json.data[i].surname;

                }

                let startTime = (json.data[0].start_cons).substr(0, 2);

                for (let i = 0; i < 24; i++) {
                    array[i][0] = startTime + ":" + minute + "0";
                    minute++;
                    if (minute > 5) {
                        minute = 0;
                        startTime++;
                    }
                }


                // rows
                for (let i = 1; i < table.rows.length; i++) {
                    // cells
                    for (let j = 0; j < table.rows[i].cells.length; j++) {
                        table.rows[i].cells[j].innerHTML = array[i - 1][j];
                    }
                }


            } else {
                console.log(obj.error);
            }
        }
    });

});
