<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Dodavanje korisnika</h5>
            <!-- Vertical Form -->
            <form method="post" action="createUserProcess" class="row g-3">
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Ime i prezime</label>
                    <input type="text" class="form-control" id="inputNanme4" name="fullname">
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4"  name="email">
                </div>
                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" name="password">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="adress">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form><!-- Vertical Form -->
        </div>
    </div>
</div>