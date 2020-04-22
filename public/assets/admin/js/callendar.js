$(document).ready(function () {

    let json = "1";

    adr = function (input) {
        json = input;
    }

    const test = jQuery.ajax({
        type: "POST",
        url: '',
        dataType: 'json',

        success: function (obj, textstatus, response) {
            if (!('error' in obj)) {
                json = response.responseJSON;
                console.log(json);
                let array = [
                    ["A1", "B1", "C1", "D1", "E1", "F2"],
                    ["A2", "B2", "C2", "D2", "E2", "F3"],
                    ["A3", "B3", "C3", "D3", "E3", "F4"],
                    ["A4", "B4", "C4", "D4", "E4", "F5"],
                    ["A5", "B5", "C5", "D5", "E5", "F6"],
                    ["A6", "B6", "C6", "D6", "E6", "F7"],
                    ["A7", "B7", "C7", "D7", "E7", "F8"],
                    ["A8", "B8", "C8", "D8", "E8", "F9"],
                    ["A9", "B9", "C9", "D9", "E9", "F10"],
                    ["A10", "B10", "C10", "D10", "E10", "F11"],
                    ["A11", "B11", "C11", "D11", "E11", "F12"],
                    ["A12", "B12", "C12", "D12", "E12", "F13"],
                    ["A13", "B13", "C13", "D13", "E13", "F14"],
                ]
                table = document.getElementById("table");

                array[2][2] = json.data[0].name;
                array[3][2] = json.data[0].surname;


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
