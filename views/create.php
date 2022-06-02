<div class="card">
    <div class="card-body">
        <h5 class="card-title">Create User</h5>

        <!-- Vertical Form -->
        <form class="row g-3" method="post" action="createUserProcess">
            <div class="col-12">
                <label for="inputNanme4" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="inputNanme4" name="full_name">
            </div>
            <div class="col-12">
                <label for="inputNanme4" class="form-label">Username</label>
                <input type="text" class="form-control" id="inputNanme4" name="username">
            </div>
            <div class="col-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" name="email">
            </div>
            <div class="col-12">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword4" name="password">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form><!-- Vertical Form -->

    </div>
</div>