<?php

?>

<!DOCTYPE html>
<html lang='en'>
<head>
  <title>Início | Inventário</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <!-- Bootstrap CSS CDN -->
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css' integrity='sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4' crossorigin='anonymous'>
  <!-- Our Custom CSS -->
  <link rel='stylesheet' href='styles.css'>
  <!-- Link Google Icons -->
  <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
  <!-- Font Awesome JS -->
  <script defer src='https://use.fontawesome.com/releases/v5.0.13/js/solid.js' integrity='sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ' crossorigin='anonymous'></script>
  <script defer src='https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js' integrity='sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY' crossorigin='anonymous'></script>
</head>
<body>

    <nav class='navbar navbar-light bg-redeph'>
        <div class='navbar-container'>
          <button class='navbar-toggler bg-redeph-dark' id='sidebarCollapse' type='button' data-bs-toggle='collapse' data-bs-target='#navbarToggleExternalContent' aria-controls='navbarToggleExternalContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='material-icons color-white'>reorder</span>
          </button>
          <form class='d-flex' id='searchbar'>
            <input class='form-control me-2' type='search' placeholder='Procurar' aria-label='Search'>
            <button class='btn btn-redeph-search busca-btn' type='submit'>
                <!-- Icone do Google Icons -->
                <span class='material-icons'>search</span>
            </form>
          </button>
        </div>
      </nav>
    <div class='wrapper'>
        <!-- Sidebar -->
        <nav id='sidebar' class=''>
            <div class='sidebar-header'>
                <img src='./images/logo.png' alt='Logo' width='200px' height='auto' />
            </div>
    
            <ul class='list-unstyled components'>
                
            </ul>
                
            <ul class='list-unstyled components' id='sidebar-links'>
                <li>
                    <a data-toggle='modal' data-target='#myModal'>Sair</a>
                </li>
                <li>
                    <a href='index.php'>Início</a>
                </li>
                <li>
                    <a href='cadastro.php'>Cadastro</a>
                </li>
                <li>
                    <a href='print.php'>Imprimir</a>
                </li>
                <li>
                    <a href='#'>Leitor</a>
                </li>
                <li>
                    <a href='log.php'>Log de alterações</a>
                </li>
                <br>
            </ul>>
        </nav>

<div class='content' style='flex: auto;'>
  <div class='tabela-inventario'>
    <table id='customers'>
      <tbody>
        <tr>
          <th>Alterações</th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
        <tr>
          <td>Id do item: </td>
          <td>Usuario: </td>
          <td>Descrição: </td>
          <td>Data: </td>
          <td><button>Butao</button></td>
        </tr>
        <tr>
          <td>exemplo</td>
          <td>exemplo</td>
          <td>exemplo</td>
          <td></td>
          <td><button>Butao</button></td>
        </tr>
        <tr>
          <td>exemplo</td>
          <td>exemplo</td>
          <td>exemplo</td>
          <td></td>
          <td><button>Butao</button></td>
        </tr>
        <tr>
          <td>exemplo</td>
          <td>exemplo</td>
          <td>exemplo</td>
          <td></td>
          <td><button>Butao</button></td>
        </tr>
        <tr>
          <td>exemplo</td>
          <td>exemplo</td>
          <td>exemplo</td>
          <td></td>
          <td><button>Butao</button></td>
        </tr>
        <tr>
          <td>exemplo</td>
          <td>exemplo</td>
          <td>exemplo</td>
          <td></td>
          <td><button>Butao</button></td>
        </tr>


      </tbody>
    </table>
    <div class='footer'>
      <!-- Footer -->
      <footer class='text-center ' style='background-color: #f39822'>
        <!-- Grid container -->
        <div class='container p-4'>   
          <!-- Section: Text -->
          
          <!-- Section: Links -->
      
        </div>
        <!-- Grid container -->
      
        <!-- Copyright -->
        <div class='text-center p-3' style='background-color: #f38022'>
          © 2021 Redepharma - 
          <a class='text-dark' href='https://github.com/eliabeguerreiro'>Eliabe Paz</a> & <a class='text-dark' href='https://github.com/kcaiosouza'>Caio Souza</a>
        </div>
        <!-- Copyright -->
      
      </footer>
      <!-- Footer -->
    </div>
  </div>
</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
<!-- Popper.JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js' integrity='sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ' crossorigin='anonymous'></script>
<!-- Bootstrap JS -->
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js' integrity='sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm' crossorigin='anonymous'></script>
<script type='text/javascript'>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        });
    });
</script>
</body>


</html>
