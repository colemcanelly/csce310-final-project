<section class="h-100 d-flex justify-content-center ">
  <div id="login" class="">
    <!-- Pills navs -->
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
      </li>
    </ul>
    <!-- Pills navs -->

    <!-- Pills content -->
    <div class="tab-content">
      <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
        <form autocomplete="on" method="post">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="loginName" name= "loginName" class="form-control" />
            <label class="form-label" for="loginName">Email</label>
          </div>
          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="loginPassword" name= "loginPassword" class="form-control" />
            <label class="form-label" for="loginPassword">Password</label>
          </div>
          <!-- Submit button -->
          <button type="submit" class="btn btn-outline-primary btn-block mb-4">Sign in</button>
          <!-- Register buttons -->
          <div class="text-center">
            <p>Not a member? <a href="#!">Register</a></p>
          </div>
        </form>
      </div>
      <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
      <form autocomplete="on" method="post">
          <!-- First Name input -->
          <div class="form-outline mb-4">
            <input type="text" id="registerFName" name="registerFName" class="form-control" />
            <label class="form-label" for="registerFName">First Name</label>
          </div>
          <!-- Last Name input -->
          <div class="form-outline mb-4">
          <input type="text" id="registerLName" name="registerLName" class="form-control" />
          <label class="form-label" for="registerLName">Last Name</label>
          </div>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="registerEmail" name="registerEmail" class="form-control" />
            <label class="form-label" for="registerEmail">Email</label>
          </div>
          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="registerPassword" name="registerPassword" class="form-control" />
            <label class="form-label" for="registerPassword">Password</label>
          </div>
          <!-- Repeat Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="registerRepeatPassword" name="registerRepeatPassword" class="form-control" />
            <label class="form-label" for="registerRepeatPassword">Repeat password</label>
          </div>
          <!-- Submit button -->
          <button type="submit" class="btn btn-outline-primary btn-block mb-3">Create Account</button>
        </form>
      </div>
    </div>
    <!-- Pills content -->
</div>
</section>

<style>
  #login {
    margin-top: 11%;
  }
</style>
