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
                    ["A1", "B1", "C1", "D1", "E1", "F1"],
                    ["A2", "B2", "C2", "D2", "E2", "F2"],
                    ["A3", "B3", "C3", "D3", "E3", "F3"],
                    ["A4", "B4", "C4", "D4", "E4", "F4"],
                    ["A5", "B5", "C5", "D5", "E5", "F5"],
                    ["A6", "B6", "C6", "D6", "E6", "F6"],
                    ["A7", "B7", "C7", "D7", "E7", "F7"],
                    ["A8", "B8", "C8", "D8", "E8", "F8"],
                    ["A9", "B9", "C9", "D9", "E9", "F9"],
                    ["A10", "B10", "C10", "D10", "E10", "F10"],
                    ["A11", "B11", "C11", "D11", "E11", "F11"],
                    ["A12", "B12", "C12", "D12", "E12", "F12"],
                    ["A13", "B13", "C13", "D13", "E13", "F13"],
                    ["A14", "B14", "C14", "D14", "E14", "F14"],
                    ["A15", "B15", "C15", "D15", "E15", "F15"],
                    ["A16", "B16", "C16", "D16", "E16", "F16"],
                    ["A17", "B17", "C17", "D17", "E17", "F17"],
                    ["A18", "B18", "C18", "D18", "E18", "F18"],
                    ["A19", "B13", "C13", "D13", "E13", "F13"],
                    ["A20", "B14", "C14", "D14", "E14", "F14"],
                    ["A15", "B15", "C15", "D15", "E15", "F15"],
                    ["A16", "B16", "C16", "D16", "E16", "F16"],
                    ["A17", "B17", "C17", "D17", "E17", "F17"],
                    ["A18", "B18", "C18", "D18", "E18", "F18"],
                ]
                table = document.getElementById("table");

                array[2][2] = json.data[0].name;
                array[3][2] = json.data[0].surname;

                let startTime = 11;
                let minute = 0;

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
