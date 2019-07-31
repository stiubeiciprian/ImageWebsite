<div class="container">
    <form action="/user/login" method="post">
        <h1>Login</h1>
        <hr>

        <div class="form-group">
            <label for="<?= USER_EMAIL?>">Email</label>
            <input type="email" class="form-control" name="<?= USER_EMAIL ?>" placeholder="user@email.com">
        </div>

        <div class="form-group">
            <label for="<?= USER_PASSWORD?>">Password</label>
            <input type="password" class="form-control" name="<?= USER_PASSWORD ?>" placeholder="Password">
        </div>

        <button class="btn btn-primary" type="submit">Login</button>

    </form>
</div>
