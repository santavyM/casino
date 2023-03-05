<html>

    <head>

        <title>pes</title>
        <link rel="icon" type="image/png" href="<?= base_url('assets/casino/logo1.png'); ?>"/>
        <link type="text/css" rel="stylesheet" href="<?= base_url('assets/bootstrap/css/style.css'); ?>">
        <link type="text/css" rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
        
    </head>

    <body>

        <?= $this->include('layout/navbar'); ?>
        <div class="container-fluid bg-secondary">
            <!--Area for dynamic content -->
            <?= $this->renderSection("content"); ?>
            <?= $this->include('layout/footer'); ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://kit.fontawesome.com/e321b665aa.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>



        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script>

            var myModal = document.getElementById('modal')
            var myInput = document.getElementById('focus')

            myModal.addEventListener('shown.bs.modal', function () {
                myInput.focus()
            })
        </script>
    </body>

</html>