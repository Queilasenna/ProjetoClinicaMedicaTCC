<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Exemplo de janela modal com Bootstrap 5</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">

  <!-- jQuery e Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="container">
    <h1>Exemplo de janela modal com Bootstrap 5</h1>
    <p>Clique no botão abaixo para abrir a janela modal:</p>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-var="valor-da-variavel">Abrir janela modal</button>
  </div>

  <!-- Janela Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Minha janela modal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <form id="meu-form" method="post" action="pagina-de-destino.php">
            <input type="hidden" name="minha-var" id="minha-var" value="">
            <div class="mb-3">
              <label for="nome" class="form-label">Nome:</label>
              <input type="text" class="form-control" id="nome" name="nome">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">E-mail:</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary" onclick="submitForm()">Enviar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Script para enviar o formulário -->
  <script>
    function submitForm() {
      var minhaVar = $('#exampleModal').data('var');
      $('#minha-var').val(minhaVar);
      $('#meu-form').submit();
    }

    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));

    myModal.addEventListener('hide.bs.modal', function (event) {
      var form = document.getElementById('meu-form');
      form.submit();
    })
  </script>

</body>
</html>