document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username === 'admin' && password === 'password123') {
        alert('Login successful!');
        // Redirect the user or perform other actions
    } else {
        alert('Invalid username or password. Please try again.');
    }
});
