<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Perhitungan Jam Kerja</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Styles -->
    <style>
        .send-button {
            background: #54C7C3;
            width: 100%;
            font-weight: 600;
            color: #fff;
            padding: 8px 25px;
        }

        .g-button {
            color: #fff !important;
            border: 1px solid #EA4335;
            background: #ea4335 !important;
            width: 100%;
            font-weight: 600;
            color: #fff;
            padding: 8px 25px;
        }

        .my-input {
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            cursor: text;
            padding: 8px 10px;
            transition: border .1s linear;
        }

        .header-title {
            margin: 5rem 0;
        }

        h1 {
            font-size: 31px;
            line-height: 40px;
            font-weight: 600;
            color: #4c5357;
        }

        h2 {
            color: #5e8396;
            font-size: 21px;
            line-height: 32px;
            font-weight: 400;
        }

        .login-or {
            position: relative;
            color: #aaa;
            margin-top: 10px;
            margin-bottom: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
        }


        @media screen and (max-width:480px) {
            h1 {
                font-size: 26px;
            }

            h2 {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="col-md-6 mx-auto text-center">
            <div class="header-title" style="margin-bottom: 3em">
                <h1 class="wv-heading--title">
                    Sistem Perhitungan Jam Kerja
                </h1>

            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="myform form">
                    <form action="">
                        <div class="form-group">
                            <label for="date">Tanggal</label>
                            <input type="date" name="date" class="form-control my-input" id="date" required>
                        </div>
                        <div class="form-group">
                            <label for="start">Jam Mulai</label>
                            <input type="time" name="start" class="form-control my-input" id="start" required>
                        </div>
                        <div class="form-group">
                            <label for="end">Jam Selesai</label>
                            <input type="time" name="end" class="form-control my-input" id="end" required>
                        </div>
                        <div class="form-group">
                            <label for="job">Pekerjaan Yang Kamu Kerjakan</label>
                            <textarea name="job" id="job" cols="47" rows="4" style="resize: none" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="kendala">Kendala</label>
                            <textarea name="kendala" id="kendala" cols="47" rows="4" style="resize: none" required></textarea>
                        </div>
                        <div class="text-center ">
                            <button type="button" class=" btn btn-block send-button tx-tfm" onclick="testtime()" data-toggle="modal" data-target="#exampleModalCenter">Submit</button>
                        </div>

                        <p class="small mt-3">Time is not money, Time is more valuable than money. Time is Life</a>.
                        </p>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="text">
                    Silahkan Masukkan Inputtan Dengan Benar
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        function toFloat(time) {
            var hoursMinutes = time.split(/[.:]/);
            var hours = parseInt(hoursMinutes[0], 10);
            var minutes = hoursMinutes[1] ? parseInt(hoursMinutes[1], 10) : 0;
            return hours + minutes / 60;
        }


        function testtime() {
            var date = document.getElementById("date").value;
            var start = document.getElementById("start").value;
            var end = document.getElementById("end").value;
            var keluhan = document.getElementById("kendala").value;
            var job = document.getElementById("job").value;
            if (date != "" && start != "" && end != "" && keluhan != "" && job != "") {
                var total = toFloat(document.getElementById("end").value) - toFloat(document.getElementById("start").value);
                if (start > end) console.log("Silahkan masukkan waktu dengan benar");
                else {
                    if (start < "12:00") {
                        if (end >= "13:00" && end <= "17:00") total--;
                        else if (end >= "17:00" && end <= "19:00") total = total - 2;
                        else if (end >= "19:00") total = total - 3;
                    } else if (start >= "13:00") {
                        if (end >= "17:00" && end <= "19:00") total--;
                        else if (end >= "19:00") total = total - 2;
                    } else if (start >= "17:00") {
                        if (end >= "19:00") total--;
                    }
                    var intTotal = parseFloat(total);
                    intTotal = intTotal * 60 * 60;
                    var hour = Math.floor(intTotal / (60 * 60));
                    intTotal = intTotal - (hour * 60 * 60);
                    var minute = Math.floor(intTotal / 60);
                    console.log(hour + " Jam " + minute + " Menit");

                    document.getElementById("text").innerHTML = "Pada Tanggal " + date + " Kamu Bekerja Selama " + hour + " Jam " + minute + " Menit";
                }
            }

        }
    </script>
</body>



</html>