<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absensi - Sistem Perpustakaan</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('form/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('form/css/style.css')}}">
</head>
<body>

    <div class="main">

        <div class="container">
            <form method="POST" class="appointment-form" id="appointment-form" action="{{ url('submitabsen') }}">
                {{ csrf_field() }}
                <h2>Absensi <br> Sistem Informasi Perpustakaan</h2>
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('success') }}
                    </div>
                @endif
                <div class="form-group-1">
                    <input type="text" name="name" id="name" placeholder="Nama" required />
                    <input type="email" name="email" id="email" placeholder="Email" required />
                    <input type="number" name="phone" id="phone" placeholder="No. HP" required />
                    <input type="text" name="address" id="address" placeholder="Alamat" required />

                    <div class="select-list">
                        <select name="type" id="type">
                            <!-- <option slected value="">Course Type</option> -->
                            <option value="member">Member</option>
                            <option value="non">non Member</option>
                        </select>
                    </div>
                </div>
                <div class="form-submit">
                    <input type="submit" name="submit" id="submit" class="submit" value="Submit" />
                </div>
            </form>
        </div>

    </div>

    <!-- JS -->
    <script src="{{asset('form/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('form/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>