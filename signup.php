<?php
session_start();
$responseMessage = $_SESSION['responseMessage'] ?? '';
unset($_SESSION['responseMessage']);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="css/signup.css" />
  </head>
  <body style="background-image: url(./img/chart_bacg.jpg); background-size: cover;">
    <div class="container">
      <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h1><strong>Sign Up</strong></h1>
          </div>
          <div class="panel-body">
            <!-- Form submission handled by PHP -->
            <form id="signupForm" action="connect.php" method="POST">
              <div class="form-group">
                <label for="firstName">First Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="firstName"
                  name="firstName"
                  placeholder="Enter your first name"
                  required
                />
              </div>
              <br />
              <div class="form-group">
                <label for="lastName">Last Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="lastName"
                  name="lastName"
                  placeholder="Enter your last name"
                  required
                />
              </div>
              <br />
              <div class="form-group">
                <label for="gender"
                  ><p>
                    <i
                      style="color: red; font: 12px sans-serif; font-style: italic"
                      >*Kindly select your gender from the options below</i
                    >
                  </p>
                  Gender</label
                >
                <div>
                  <label for="male" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="m"
                      id="male"
                    />Male</label
                  >
                  <label for="female" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="f"
                      id="female"
                    />Female</label
                  >
                  <label for="others" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="o"
                      id="others"
                    />Others</label
                  >
                </div>
              </div>
              <br />
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Enter your email"
                  required
                />
              </div>
              <br />
              <div class="form-group">
                <i style="color: red; font: 12px sans-serif; font-style: italic">*A strong password includes letters, numbers, and special characters</i>
                <br><br>
                <label for="password">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  placeholder="Enter a password"
                  required
                />
              </div>
              <br />
              <div class="form-group">
                <label for="number">Phone Number</label>
                <input
                  type="number"
                  class="form-control"
                  id="number"
                  name="number"
                  placeholder="Enter your phone number"
                  required
                />
              </div>
              <br />
              <button type="submit" class="btn btn-primary">Sign Up</button>
              <br />
              <br />
              <p>
                Already have an account? Click
                <a href="signin.html"
                  ><strong style="color: red">Here</strong></a
                >
                to sign in.
              </p>
            </form>

            <!-- Display response message -->
            <?php if ($responseMessage): ?>
              <p style="color: <?php echo $responseMessage === 'Registration successful! Welcome, $firstName $lastName.' ? 'green' : 'red'; ?>;">
                <?php echo $responseMessage; ?>
              </p>
            <?php endif; ?>
          </div>
          <div class="mark">
            <small>&copy; KayTech</small>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
