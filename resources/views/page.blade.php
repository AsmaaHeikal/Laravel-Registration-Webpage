
   <! Doctype html>
       <html lang="en">

       <head>
           <meta charset="utf-8">
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
               <form action="#" method="post" enctype="multipart/form-data" id="form">
                <table>
                    <tr>
                        <td colspan="2"> <?php echo @$msg; ?> </td>
                        <div class="form-message"></div>
                    </tr>
                    <div class="form-message"></div>
                    <tr>
                        <td width="159"> <b>@lang('mycustom.fullname')<span style="color:red"> * </span></b> </td>
                        <td width="218">
                            <input type="text" placeholder="@lang('mycustom.namecontant')" name="n" pattern="[a-z A-Z]*" />
                        </td>
                    </tr>
                    <tr>
                        <td width="159"> <b> @lang('mycustom.username')<span style="color:red"> * </span> </b> </td>
                        <td width="218">
                            <input type="text"  placeholder="@lang('mycustom.usercontant')"name="u" pattern="[a-z A-Z]*" />
                        </td>
                    </tr>
                    <tr>
                        <td> <b> @lang('mycustom.bithdate') <span style="color:red"> * </span></b> </td>
                        <td>
                            <input type="date" name="birthdate" min='1899-01-01' max='2005-12-31' />
                            <button type="button" id="checkActors" onclick="window.location.href='Actors_Names.php'">check</button>
                        </td>
                    </tr>
                    <tr>
                        <td> <b> @lang('mycustom.phone') <span style="color:red"> * </span></b> </td>
                        <td> <input type="text" pattern="[0-9]*" name="m" / placeholder="@lang('mycustom.phonecontant')" /> </td>
                    </tr>
                    <tr>
                        <td> <b> @lang('mycustom.address') <span style="color:red"> * </span> </b> </td>
                        <td> <textarea name="add" placeholder="@lang('mycustom.addresscontant')"></textarea> </td>
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
                                {{-- <?php echo $pic_error ?> --}}
                            </p>
                        </td> -->
                    </tr>
                    <tr>
                        <td> <b> @lang('mycustom.email')<span style="color:red"> * </span> </b> </td>
                        <td> <input type="email" name="e" / placeholder="@lang('mycustom.emailcontant')"/> </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="save" value="@lang('mycustom.Register')" onclick="submitForm()" id="btn" />
                            <input type="reset" value="@lang('mycustom.Reset')" />
                        </td>
                    </tr>
                </table>
            </form>
               <div id="actorDetails"></div>
           </section>
           @include('footer')
           <script>
            document.getElementById("btn").addEventListener('click', function(event) {
                event.preventDefault();
                submitForm();
            });
        
            function submitForm() {
                var isValid = true;
                var displaymsg = document.getElementsByClassName('form-message')[0];
                displaymsg.innerHTML = '';
        
                var fullName = document.getElementsByName('n')[0].value;
                var username = document.getElementsByName('u')[0].value;
                var birthdate = document.getElementsByName('birthdate')[0].value;
                var phoneNumber = document.getElementsByName('m')[0].value;
                var password = document.getElementsByName('p')[0].value;
                var confirmPassword = document.getElementsByName('cp')[0].value;
                var email = document.getElementsByName('e')[0].value;
                var Profile_Picture = document.getElementsByName('pic')[0].value;
                var Address = document.getElementsByName('add')[0].value;
        
                // Perform input validation
                if (fullName.trim() === '' || username.trim() === '' || birthdate.trim() === '' || phoneNumber.trim() === '' || password.trim() === '' || confirmPassword.trim() === '' || email.trim() === '' || Profile_Picture.trim() === '' || Address.trim() === '') {
                    displaymsg.innerHTML += " @lang('mycustom.error1')<br>";
                    isValid = false;
                } else {
                    if (!/^[a-zA-Z ]*$/.test(fullName)) {
                        displaymsg.innerHTML += " @lang('mycustom.error2')<br>";
                        isValid = false;
                    }
                    if (!/^[a-zA-Z0-9_]+$/.test(username)) {
                        displaymsg.innerHTML += " @lang('mycustom.error3')<br>";
                        isValid = false;
                    }
                    var fileInput = document.getElementsByName('pic')[0];
                    var file = fileInput.files[0];
                    var fileType = file.type.toLowerCase();
                    var allowedExts = ["image/jpg", "image/jpeg", "image/png", "image/gif"];
                    if (!allowedExts.includes(fileType)) {
                        displaymsg.innerHTML += "@lang('mycustom.error4')<br>";
                        isValid = false;
                    }
        
                    var birthdateDateTime = new Date(birthdate);
                    var minBirthdate = new Date('1899-01-01');
                    var maxBirthdate = new Date('2005-12-31');
                    if (isNaN(birthdateDateTime) || birthdateDateTime < minBirthdate || birthdateDateTime > maxBirthdate) {
                        displaymsg.innerHTML += " @lang('mycustom.error5')<br>";
                        isValid = false;
                    }
        
                    if (!/^\d{11}$/.test(phoneNumber)) {
                        displaymsg.innerHTML += "@lang('mycustom.error6')<br>";
                        isValid = false;
                    }
        
                    if (password !== confirmPassword) {
                        displaymsg.innerHTML += "@lang('mycustom.error7')<br>";
                        isValid = false;
                    } else if (password.length < 8 || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/\d/.test(password) || !/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/.test(password)) {
                        displaymsg.innerHTML += " @lang('mycustom.error8')<br>";
                        isValid = false;
                    }
        
                    if (!/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/.test(email)) {
                        displaymsg.innerHTML += " @lang('mycustom.error9')<br>";
                        isValid = false;
                    }
                }
        
                if (!isValid) {
                    displaymsg.style.color = "red";
                    displaymsg.style.display = "block";
                    displaymsg.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    return;
                }
        
                if (submitForm.isSubmitting) {
                    return;
                }
        
                submitForm.isSubmitting = true;
        
                var xmlhttp;
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                } else if (window.ActiveXObject) {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.open("POST", "Controller.php", true);
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        if (this.responseText.includes("Registration Success")) {
                            displaymsg.style.color = "green";
                            document.getElementById('form').reset();
                        } else {
                            displaymsg.style.color = "red";
                        }
                        displaymsg.innerHTML = this.responseText;
                        displaymsg.style.display = "block";
                        displaymsg.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                        submitForm.isSubmitting = false;
                    }
                };
                var form = document.getElementById('form');
                var formdata = new FormData(form);
                xmlhttp.send(formdata);
            }
        </script>
           <script>
               document.getElementById('checkActors').addEventListener('click', function() {
                   var birthdate = document.getElementsByName('birthdate')[0].value;
                   if (birthdate) {
                       var xhr = new XMLHttpRequest();
                       xhr.open('POST', 'API_Ops.php', true);
                       xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                       xhr.onreadystatechange = function() {
                           if (xhr.readyState === XMLHttpRequest.DONE) {
                               if (xhr.status === 200) {
                                   document.getElementById('actorDetails').innerHTML = xhr.responseText;
                               } else {
                                   console.error('Error:', xhr.statusText);
                               }
                           }
                       };
                       xhr.send('birthdate=' + birthdate);
                   } else {
                       console.error('Birthdate is required.');
                   }
               });
           </script>
       </body>

       </html>