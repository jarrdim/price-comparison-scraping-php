<?php $this->view('header') ?>

<section  class="mt-md-5 login">
    <div class="container  mb-5 " style="margin-bottom:8rem !important;" >
        <div class="row">
            <div class="col-md-12">
                <div class="card  w-50   "
                 style="
                    box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;
                    ">
                    <form method="POST" class="card-body">
                         <?php if(!empty($errors['email'])):?>
                        <div class="text-danger"><?php echo $errors['email']?></div>
                     <?php endif; ?>  


                            <label for="email">Enter Email</label>
                        <input type="text" id="email" name="email" class="form-control mt-2" />
                          <div class="form-outline mt-2">
                            <label for="password">Enter Password</label>
                        <input type="password" id="password"  name="password" class="form-control mt-2 mb-4" />

                       <button type="submit" class="btn w-100 btn-primary btn-block mb-4">
                        Login
                        </button>
                        <div class="mb-4" >
                           <a style="color:#993133 !important;" href="<?php echo ROOT ?>/forgot"> Forgotten your password?</a>
                        </div>
                        <div class="text-center">
                         <span><a  href="signup">Sign Up</a></span>
                        </div>

                        </div>
                    </form>
                </div>
         

            </div>
        </div>
    </div>
</section>






















