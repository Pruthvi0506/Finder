<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>  
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
    <script>
    function validation() {
    var name =
        document.forms.registration.name.value;
    var email =
        document.forms.registration.email.value;
    var phone =
        document.forms.registration.phnum.value;
    var password =
        document.forms.registration.password.value;

    var regEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g; //Javascript reGex for Email Validation.
    var regPhone=/^\d{10}$/;									 // Javascript reGex for Phone Number validation.
    var regName = /\d+$/g;								 // Javascript reGex for Name validation

    if (name == "" || regName.test(name)) {
        alert("Please enter your name properly.");
        return false;
        name.focus();
       
    }

    if (email == "" || !regEmail.test(email)) {
        alert("Please enter a valid e-mail address.");
        return false;
        email.focus();
       
    }
    
    if (password == "") {
        alert("Please enter your password");
        return false;
        password.focus();
    }

    if(password.length <6){
        alert("Password should be atleast 6 character long");
        return false;
        password.focus();

    }
    if (phone == "" || !regPhone.test(phone)) {
        alert("Please enter valid phone number.");
        return false;
        phone.focus();
    }
}

    </script>
</head>
<body>
<h1 style="font-size:45px;text-align:center;color:#FF0000">Technician Finder </h1>
    <form class="form" method="post" onsubmit="return validation()" action='tech_registration_update.php' name="registration">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="name" placeholder="Name" required />
        <input type="text" class="login-input" name="phnum" placeholder="Mobile No" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="password" class="login-input" name="password" placeholder="Password" required/>
        <input type="text" class="login-input" name="city" placeholder="City" required/>
        <input type="text" class="login-input" name="zip" placeholder="Zip" required/>
        <input type="text" class="login-input" name="workexp" placeholder="Years of Experience" required/>
        <select class="login-input" id="technicianType" name="technicianType" placeholder="Technician Type"  required/>
<option value="" selected="selected">Select </option>
<option value="Plumber">Plumber</option>
<option value="Mechanic">Mechanic</option>
<option value="Carpenter">Carpenter</option>
<option value="Painter">Painter</option>
<option value="Plumber">Electrician</option>
</select>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="index.php">Click to Login</a></p>
    </form>
</body>
</html>
</html>