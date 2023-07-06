<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
                                </div>
                                <?= $this->session->flashdata('notification') ?>
                                <form class="user" method="POST" action="<?= site_url('Auth/login') ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Username">
                                        <?= form_error('username', '<small class="text-danger" style="padding: 20px;">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger" style="padding: 20px;">', '</small>') ?>
                                    </div>
                                    <button type="submit" href="<?= site_url('Auth/login') ?>" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>