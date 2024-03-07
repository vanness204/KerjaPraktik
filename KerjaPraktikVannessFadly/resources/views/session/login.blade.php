<!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
    <style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f0f0f0;
    }

    .container {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    text-align: center;
    width: 400px;
    margin: 0 auto;
    margin-top: 100px; /* tambahkan ini */
    animation: fadeIn 1s ease-in-out; /* tambahkan ini */
}

@keyframes fadeIn {
    0% { opacity: 0; }
    100% { opacity: 1; }
}
.logo {
    /*display: block;
    margin: 0 auto;
    width: 100px;
    height: auto;
    margin-bottom: 20px;
    border-radius: 50%;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);*/
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-size: 18px;
    font-weight: bold;
    width: auto; /* Ubah dari 100% menjadi auto */
    text-align: left; /* Mengatur teks ke kiri */
    line-height: 48px;
    height: 48px;
    transition: background-color 0.3s ease-in-out;
}


    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 12px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
        height: 48px;
        background-color: transparent; /* ubah ini */
    }
button[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    height: 48px;
    margin-top: 10px;
    transition: background-color 0.3s ease-in-out; /* tambahkan ini */
}

button[type="submit"]:hover {
    background-color: #3e8e41; /* tambahkan ini */
}

#message {
    color: red;
    font-size: 14px;
    margin-top: 10px;
    display: none; /* tambahkan ini */
}

#message.show {
    display: block; /* tambahkan ini */
}
    </style>
</head>
<body>
    <div class="container">
        <img src="file:///C:/Users/62831/Pictures/bh3rd/2022-12-27-13-15-03_0.png" width="100" heigh="100" alt="Logo" class="logo">
        <h2>Login</h2>
        <form action="#" method="post" onsubmit="return validateForm()">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username." required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password." required>
            <button type="submit">Log In</button>
            <p id="message"></p>
        </form>
    </div>    <script>
    function validateForm() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        if (username !== "admin" || password !== "admin123") {
            document.getElementById("message").innerHTML = "The username or password you entered is incorrect. Please try again!";
            document.getElementById("message").classList.add("show");
            return false;
        } else {
            return true;
        }
    }
    var inputs = document.getElementsByTagName("input");
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener("focus", function() {
            this.previousElementSibling.style.backgroundColor = "#fff";
        });
        inputs[i].addEventListener("blur", function() {
            if (this.value === "") {
                this.previousElementSibling.style.backgroundColor = "#f5f5f5";
            }
        });
    }
    </script>
</body>
</html>
