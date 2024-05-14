<! Doctype html>
    <html lang="en">

    <head>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title> Registration Form </title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #76ABAE;
            }

            .page-body {
                width: 50%;
                margin: 70 auto;
                padding: 20px;
                background-color: #EEEEEE;
                border-radius: 30px;
                box-shadow: 0 0 25px rgba(0, 0, 0, 1);
            }

            .title {
                text-align: center;
                margin-bottom: 20px;
                color: #222831;
            }

            form {
                width: 100%;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            td {
                padding: 10px;
                border-bottom: 1px solid #ddd;
                color: #222831;
            }

            td b {
                display: block;
                margin-bottom: 5px;
            }

            tr:last-child td {
                border-bottom: none;
            }

            input[type="text"],
            input[type="password"],
            input[type="email"],
            textarea,
            select {
                width: calc(100% - 16px);
                padding: 8px;
                border: 1px solid #ddd;
                border-radius: 10px;
                box-sizing: border-box;
                color: #222831;
            }

            input[type="date"] {
                width: calc(82% - 16px);
                padding: 8px;
                border: 1px solid #ddd;
                border-radius: 10px;
                box-sizing: border-box;
                color: #222831;
            }

            input[type="file"] {
                padding: 8px;
            }

            input[type="submit"],
            input[type="reset"] {
                padding: 20px 70px;
                background-color: #31363F;
                color: #fff;
                border: none;
                border-radius: 10px;
                cursor: pointer;
                transition: background-color 0.3s;
                margin-top: 30px;
                font-size: medium;
            }

            input[type="submit"]:hover,
            input[type="reset"]:hover,
            button[id="checkActors"]:hover {
                opacity: 80%;
            }

            @media (max-width: 768px) {
                .page-body {
                    width: 90%;
                }
            }

            button[id="checkActors"] {
                padding: 8px;
                background-color: #31363F;
                color: #fff;
                border: none;
                border-radius: 10px;
                cursor: pointer;
                transition: background-color 0.3s;
                margin-top: 10px;
                font-size: medium;
            }

            .error {
                color: #af4242;
                background-color: #fde8ec;
                display: none;
            }

            form-message {
                display: none;
                background-color: #ffcccc;
                color: #990000;
                padding: 10px;
                border-radius: 5px;
                margin-top: 10px;
                border: 1px solid #ff3333;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            }
        </style>
    </head>

    <body>

        @include('header')
        <section class="page-body">
            <div class="title">
                <h1> @lang('mycustom.RegistrationForm')</h1>
            </div>
            <form action="{{ url('Registration') }}" method="post" enctype="multipart/form-data" id="form">
                @csrf
                <table>
                    <tr>
                        <td colspan="2"> <?php echo @$msg; ?> </td>
                    </tr>
                    <div class="form-message"> </div>
                    <tr>
                        <td width="159"> <b>@lang('mycustom.fullname')<span style="color:red"> * </span></b> </td>
                        <td width="218">
                            <input type="text" placeholder="@lang('mycustom.namecontant')" name="n" pattern="[a-z A-Z]*" />
                        </td>
                    </tr>
                    <tr>
                        <td width="159"> <b> @lang('mycustom.username')<span style="color:red"> * </span> </b> </td>
                        <td width="218">
                            <input type="text" placeholder="@lang('mycustom.usercontant')"name="u" pattern="[a-z A-Z]*" />
                        </td>
                    </tr>
                    <tr>
                        <td> <b> @lang('mycustom.bithdate') <span style="color:red"> * </span></b> </td>
                        <td>
                            <input type="date" name="birthdate" min='1899-01-01' max='2005-12-31' />
                            <button type="button" id="checkActors">check</button>
                        </td>
                    </tr>
                    <tr>
                        <td> <b> @lang('mycustom.phone') <span style="color:red"> * </span></b> </td>
                        <td> <input type="text" pattern="[0-9]*" name="m" / placeholder="@lang('mycustom.phonecontant')" />
                        </td>
                    </tr>
                    <tr>
                        <td> <b> @lang('mycustom.address') <span style="color:red"> * </span> </b> </td>
                        <td>
                            <textarea name="add" placeholder="@lang('mycustom.addresscontant')"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td> <b> @lang('mycustom.password') <span style="color:red"> * </span></b> </td>
                        <td> <input type="password" name="p" / placeholder="@lang('mycustom.passordcontant')"> </td>
                    </tr>
                    <tr>
                        <td> <b> @lang('mycustom.copassword')<span style="color:red"> * </span></b> </td>
                        <td> <input type="password" name="cp" / placeholder="@lang('mycustom.conpassordcontant')"> </td>
                    </tr>
                    <tr>
                        <td> <b>@lang('mycustom.picture')<span style="color:red"> * </span> </b> </td>
                        <td> <input type="file" name="pic" /> </td>
                        <!-- <td>
                            <p class="error pic-error">
                                {{-- <?php echo $pic_error; ?> --}}
                            </p>
                        </td> -->
                    </tr>
                    <tr>
                        <td> <b> @lang('mycustom.email')<span style="color:red"> * </span> </b> </td>
                        <td> <input type="email" name="e" / placeholder="@lang('mycustom.emailcontant')" /> </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="save" value="@lang('mycustom.Register')" onclick="submitForm()"
                                id="btn" />
                            <input type="reset" value="@lang('mycustom.Reset')" />
                        </td>
                    </tr>
                </table>
            </form>
            <div id="actorDetails"></div>
        </section>
        <script>
            $(document).ready(function () {
                $('#form').on('submit', function (event) {
                    event.preventDefault();
                    var formData = new FormData(this);
            
                    $.ajax({
                        url: "{{ url('Registration') }}",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            $('.form-message').html('<p style="color: green;">' + response.message + '</p>');
                            $('#form')[0].reset();
                            $('.error').remove(); 
                            scrollToMessage();
                        },
                        error: function (jqXHR) {
                            var errors = jqXHR.responseJSON.errors;
                            var errorHtml = '<ul style="color: red;">'; 
                            $('.error').remove(); 
            
                            $.each(errors, function (field, messages) {
                                errorHtml += '<li>' + messages[0] + '</li>'; 
                            });
            
                            errorHtml += '</ul>'; 
                            $('.form-message').html(errorHtml); 
                            scrollToMessage();
                        }
                    });
                });
                function scrollToMessage() {
        $('html, body').animate({
            scrollTop: $('.form-message').offset().top
        }, 'slow');
    }
            });
            </script>
            
        @include('footer')
        <script>
            document.getElementById('checkActors').addEventListener('click', function() {
                var birthdate = document.getElementsByName('birthdate')[0].value;
                if (birthdate) {
                    axios.post('{{ route('get-actors') }}', { birthdate: birthdate })
                        .then(function(response) {
                            document.getElementById('actorDetails').innerHTML = response.data;
                        })
                        .catch(function(error) {
                            console.error('Error:', error);
                        });
                } else {
                    console.error('Birthdate is required.');
                }
            });

        </script>
    </body>

    </html>