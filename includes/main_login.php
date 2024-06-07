
<section class="vh-100 bg-dark">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="./src/images/logo_hub4.png"
          class="img-fluid" alt="Hub Innovation">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <h1 class="text-light mb-5 text-center">Login</h1>
        <form method="POST">
          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <input id="email" name="email" type="email" id="form1Example13" class="form-control form-control-lg" />
            <label class="form-label text-light" for="form1Example13">Email address</label>
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <input id="passwd" name="passwd" type="password" id="form1Example23" class="form-control form-control-lg" />
            <label class="form-label text-light" for="form1Example23">Password</label>
          </div>

          <!-- Submit button -->
          <button type="submit" name="logar" id="logar" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block">Sign in</button>

        </form>
      </div>
    </div>
  </div>
</section>