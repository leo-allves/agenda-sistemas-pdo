<?php
    include './src/php/links.php'
?>

<body class="bg-dark">
    <div class="container" style="background-color:#3c3b3b; color:white; padding:10px 20px 60px 20px;margin-top:30px; width:700px; border-radius:10px;"> 	
    <!--bg #363636 #4F4F4F #292929-->
        <div class="title-form">
            <i class="far fa-id-card icon-agenda"></i>
            <h1 class="text-info">Agenda De Sistemas</h1>  
        </div>
        <form id="form" action="./src/php/insert.php" method="post">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Frente:</label>
                <input type="text" class="form-control" name="sigla_sistema" placeholder="Digite a sigla do sistema" autocomplete="off" required>
            </div>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome do Sistema:</label>
                <input type="text" class="form-control" name="nome_sistema" placeholder="Digite o nome do sistema" autocomplete="off" required>
            </div>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Responsável Sistema/Área:</label>
                <input type="text" class="form-control" name="responsavel_sistema" placeholder="Digite Responsável do Sistema" autocomplete="off" required>
            </div>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Telefone:</label>
                <input type="text" class="form-control" name="telefone" placeholder="Digite o telefone" autocomplete="off" required>
            </div>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">E-mail:</label>
                <input type="text" class="form-control" name="email" placeholder="Digite o e-mail do reposável" autocomplete="off" required>
            </div>


            <button type="submit" class="btn btn-light" style="padding-right: 25px;padding-left: 25px;">
                <i class="far fa-thumbs-up"></i>&nbsp;Salvar
            </button>

        </form>

    </div>

    <!-- link bootstrap css -->
    <script src="./lib/bootstrap/js/bootstrap.js"></script>
</body>

</html>