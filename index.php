<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lavadora de automóveis</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="frameworks/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    
    <!-- JavaScript -->
    <script src="frameworks/jQuery/js/jquery-3.5.1.min.js"></script>
    <script src="frameworks/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>
    <script src="javascript/script.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="form">
            <div class="title">
                <h1>AGENDAMENTO DE HORÁRIOS</h1>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"method="post" class="form-horizontal justify-content-center">
                <label for="nome">Nome completo: *</label>
                <input type="text" name="nome" required> 

                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" id="telefone" placeholder="(00) 90000-0000">

                <p>Possui WhatsApp?</p>
                <div class="inputRadio">
                    <input type="radio" name="whatsapp" value="sim">
                    <label for="whatsapp">Sim</label>
                    <input type="radio" name="whatsapp" value="não">
                    <label for="whatsapp">Não</label>
                </div>

                <label for="marca">Marca do automóvel: *</label>
                <input type="text" name="marca" placeholder="Fiat" required >

                <label for="modelo">Modelo do automóvel: *</label>
                <input type="text" name="modelo" placeholder="Uno" required>

                <label for="ano">Ano do automóvel:</label>
                <input type="text" name="ano" id="ano" placeholder="2010">

                <label for="placa">Placa do automóvel: *</label>
                <input type="text" name="placa" maxlength="7" placeholder="QTP5F71" required/>

                <label for="dataAgendamento">Data do agendamento: *</label>
                <input type="date" id="dataAgentamento" name="dataAgendamento" required/>

                <label for="horario">Horário da lavagem: *</label>
                <input type="time" name="horario" min="8:00" max="18:00" step="1800" required>
                <p>Aberto de segunda a sexta das 08:00 às 18:00</p>

                <p><strong>Campos marcados com * são obrigatórios</strong></p>

                <button type="submit" class="button btn-success">Enviar</button>
                <button type="reset" class="button btn-danger">Limpar</button>
            </form>
        </div>
    </div>
    <?php
    function preprocessa($entrada) {
        $entrada = trim($entrada);
        $entrada = stripslashes($entrada);
        $entrada = htmlspecialchars($entrada);
        return $entrada;
    }
    
    $nome = "";
    $telefone = "";
    $whatsapp = "";
    $marca = "";
    $modelo = "";
    $placa = "";
    $dataAgendamento = "";
    $horario = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = preprocessa($_POST["nome"]);
        $telefone = preprocessa($_POST["telefone"]);
        $whatsapp = preprocessa($_POST["whatsapp"]);
        $marca = preprocessa($_POST["marca"]);
        $modelo = preprocessa($_POST["modelo"]);
        $ano = preprocessa($_POST["ano"]);
        $placa = preprocessa($_POST["placa"]);
        $dataAgendamento = preprocessa($_POST["dataAgendamento"]);
        $horario = preprocessa($_POST["horario"]);

        $error = "";

        $timestamp = strtotime($dataAgendamento);
        $weekday= date("l", $timestamp );
        $normalized_weekday = strtolower($weekday);
        if (($normalized_weekday == "saturday") || ($normalized_weekday == "sunday")) {
           $error = "Data de agendamento deve ser de segunda a sexta.";
        }
        if (empty($error)) {
            echo "<script>
                alert(`
                    ------- Agendamento concluido -------
                    Nome: {$nome}\n
                    Telefone: {$telefone}\n
                    WhatsApp: {$whatsapp}\n
                    Marca: {$marca}\n
                    Modelo: {$modelo}\n 
                    Ano: {$ano}\n
                    Placa: {$placa}\n
                    Data de agendamento: {$dataAgendamento}\n
                    Horario de agendamento: {$horario}`);
              </script>";
        } else {
            echo "<script>
            alert(`
                {$error}
            `);
            </script>";
        }

  
    }
?>
</body>
</html>