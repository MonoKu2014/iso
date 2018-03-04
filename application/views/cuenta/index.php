<div class="container-fluid">


<ol class="breadcrumb">
  <li><a href="<?= base_url();?>panel">Dashboard</a></li>
  <li class="active">Mi cuenta</li>
</ol>



    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Mi Cuenta
            </h2>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
        <form method="post" action="<?= base_url(); ?>datos/guardar" class="form">

        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">


                <div class="col-xs-12 col-sm-6 col-md-1">
                    Nombre:
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <?= $this->session->nombre;?>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-xs-12 col-sm-6 col-md-1">
                    Email:
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <?= $this->session->email;?>
                    </div>
                </div>

            </div>
        </div>


        </form>
        </div>
    </div>

</div>