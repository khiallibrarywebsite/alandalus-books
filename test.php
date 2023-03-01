<!DOCTYPE html>
<html>
<head>
	<title>Form Example</title>
<style>
body {
  font-family: Arial, sans-serif;
  color: #FFF;
  background-color: #000ff0;
}

form {
  max-width: 600px;
  margin: 50px auto;
  padding: 20px;
  background-color: #FFF;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  transition: all 0.3s ease;
}

form:hover {
  transform: scale(1.02);
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.7);
}

label {
  display: block;
  margin-bottom: 10px;
  font-size: 18px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: none;
  border-radius: 5px;
  background-color: #F2F2F2;
  transition: all 0.3s ease;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus {
  outline: none;
  box-shadow: 0 0 5px rgba(33, 150, 243, 0.5);
}

input[type="radio"] {
  margin-right: 5px;
}

button[type="submit"] {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  background-color: #2196F3;
  color: #FFF;
  font-size: 18px;
  cursor: pointer;
  transition: all 0.3s ease;
}

button[type="submit"]:hover {
  background-color: #0a73cc;
}


</style>
</head>
<body>
<form>
  <h1>Sign Up</h1>
  <p>Please fill in this form to create an account.</p>
  <label for="name"><b>Name</b></label>
  <input type="text" placeholder="Enter your name" name="name" required>
  
  <label for="email"><b>Email</b></label>
  <input type="email" placeholder="Enter your email" name="email" required>

  <label><b>Gender</b></label>
  <div class="radio-container">
    <label>
      <input type="radio" name="gender" value="male">
      <span>Male</span>
    </label>
    <label>
      <input type="radio" name="gender" value="female">
      <span>Female</span>
    </label>
  </div>

  <label for="psw"><b>Password</b></label>
  <input type="password" placeholder="Enter your password" name="psw" required>
  
  <label for="psw-repeat"><b>Repeat Password</b></label>
  <input type="password" placeholder="Repeat your password" name="psw-repeat" required>
  
  <button type="submit" id="submit-btn">Submit</button>
</form>

	<script>
const form = document.querySelector('form');
const submitBtn = document.getElementById('submit-btn');

form.addEventListener('submit', (e) => {
  e.preventDefault();
  // Your form submission code goes here
  alert('Form submitted successfully!');
});

submitBtn.addEventListener('mouseover', () => {
  submitBtn.style.backgroundColor = '#0a73cc';
});

submitBtn.addEventListener('mouseout', () => {
  submitBtn.style.backgroundColor = '#2196F3';
});

  </script>
</body>
</html>
