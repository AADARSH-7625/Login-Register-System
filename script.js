document.getElementById('loginBtn').addEventListener('click', function () {
    document.getElementById('loginForm').style.display = 'block';
    document.getElementById('registerForm').style.display = 'none';
    this.style.color = 'white';
    document.getElementById('registerBtn').style.color = 'black'
    document.getElementById('filter-btn').style.left = 0;
    document.getElementById('filter-btn').style.right = '50%';
    document.getElementById('filter-btn').style.transition = "all .3s ease";

    // document.getElementById('registerBtn').classList.remove('active');
});

document.getElementById('registerBtn').addEventListener('click', function () {
    document.getElementById('filter-btn').style.right = 0;
    document.getElementById('filter-btn').style.left = '55%';
    document.getElementById('filter-btn').style.transition = "all .3s ease";
    document.getElementById('registerForm').style.display = 'block';
    document.getElementById('loginForm').style.display = 'none';
    this.style.color = 'white';
    document.getElementById('loginBtn').style.color = 'black';

    // document.getElementById('loginBtn').classList.remove('active');
});

// Enable/Disable the submit button for Login
document.getElementById('loginTerms').addEventListener('change', function () {
    document.getElementById('loginSubmit').disabled = !this.checked;
});

// Enable/Disable the submit button for Register
document.getElementById('registerTerms').addEventListener('change', function () {
    document.getElementById('registerSubmit').disabled = !this.checked;
});

$(document).ready(function () {
    // jQuery AJAX for Login
    $('#loginForm').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submission
    
        $.ajax({
            url: 'login.php', // PHP script to handle login
            type: 'POST',
            data: {
                username: $('#loginUsername').val(),
                password: $('#loginPassword').val()
            },
            success: function (response) {
                response = response.trim(); // Clean response
                if (response === 'success') {
                    alert("Login Successful!");
                    window.location.href = 'welcome.php'; // Redirect to the welcome page
                    console.log("success");
                    $('#loginForm').reset();

                } else {
                    $('#Message').html('<span style="color:red;">' + response + '</span>'); // Display error
                    
                }
            },
            error: function () {
                $('#Message').html('<span style="color:red;">An error occurred. Please try again.</span>'); // Generic error
            }
        });
    });
    

    // jQuery AJAX for Register
    $('#registerForm').on('submit', function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        $.ajax({
            url: 'register.php',
            type: 'POST',
            data: {
                username: $('#registerUsername').val(),
                email: $('#registerEmail').val(),
                password: $('#registerPassword').val()
            },
            success: function (response) {
                $('#Message').html(response); // Show the response message
                $('#registerForm')[0].reset();
                alert("Registration Successful!");
            },
            error: function () {
                $('#Message').html('An error occurred. Please try again.');
            }
        });
    });
});