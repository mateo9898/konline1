function getWeekNumber(d) {
    // Copy date so don't modify original
    d = new Date(Date.UTC(d.getFullYear(), d.getMonth(), d.getDate()));
    // Set to nearest Thursday: current date + 4 - current day number
    // Make Sunday's day number 7
    d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay() || 7));
    // Get first day of year
    var yearStart = new Date(Date.UTC(d.getUTCFullYear(), 0, 1));
    // Calculate full weeks to nearest Thursday
    var weekNo = Math.ceil((((d - yearStart) / 86400000) + 1) / 7);
    // Return array of year and week number
    return weekNo;
}

function fill(week) {

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
                let hour = 0;
                let startTime;
                let endTime;
                let cell;
                let consultation_day = [];

                if (week < (getWeekNumber(new Date(Date.now())))) week = (getWeekNumber(new Date(Date.now())));

                document.getElementById("title").textContent = week;


                for (let i = 0; i < json.data.length; i++) {

                    if (week == getWeekNumber(new Date(json.data[i].start_date))) {

                        if (json.data[i].accept == 1) {
                            startTime = (json.data[i].start_cons).substr(0, 2);

                            for (let l = 0; l < 24; l++) {

                                if (((json.data[i].start_hour).substr(0, 5)) == (startTime + ":" + minute + "0")) {
                                    row = l;
                                }

                                if (((json.data[i].end_hour).substr(0, 5)) == (startTime + ":" + minute + "0")) {
                                    hour = l;
                                }

                                minute++;

                                if (minute > 5) {
                                    minute = 0;
                                    startTime++;
                                }

                            }

                            if (consultation_day[0] == undefined) {
                                consultation_day[0] = json.data[i].day_name;
                            } else {
                                if (consultation_day[1] == undefined) consultation_day[1] = json.data[i].day_name;
                            }
                            document.getElementById("count").textContent = consultation_day[0] + ", " + consultation_day[1] + " w godz: " + json.data[0].start_cons + " - " + json.data[0].end_cons;

                            switch ((json.data[i].day_name).toLowerCase()) {
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


                            for (let m = 0; m < (hour - row); m++) {
                                array[(row + m)][column] = json.data[i].name + " " + json.data[i].surname;
                                cell = document.getElementById((row + 1 + m) + "_" + (1 + column));
                                //cell.style['background'] = '#2f323e';
                                // cell.style['color'] = '#fff'
                            }
                        }
                    }
                }


                minute = 0;
                startTime = (json.data[0].start_cons).substr(0, 2);
                endTime = (json.data[0].end_cons).substr(0, 2);

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


}


$(document).ready(function () {
    fill(getWeekNumber(new Date(Date.now())));
});

function nextWeek() {
    console.log("next");
    fill(Number(document.getElementById("title").textContent) + 1);
}

function prevWeek() {

    console.log("prev");
    fill(Number(document.getElementById("title").textContent) - 1);
}
