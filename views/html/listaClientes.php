<head>
    <link rel="stylesheet" href="views/css/listaClientes.css" />
</head>

<div class="contenido-listaClientes">
    <div class="titulo">
        <h1>Gestion Clientes</h1>
    </div>

    <div class="buscar">
        <p>
            Buscar cliente:
            <span><input type="text" name="buscar" placeholder="Documento, Nombre..." /></span>
        </p>
        <button onclick="location.href = 'formCliente.php'">
            Agregar Producto
        </button>
    </div>
    <table class="tabla-clientes">
        <tr>
            <th>Nombre</th>
            <th>Documento</th>
            <th>T Documento</th>
            <th>Dirección</th>
            <th>Departamento</th>
            <th>Ciudad</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th colspan="2">Opciones</th>
        </tr>
        <tr>
            <td>CARLOS MARIO MURIEL</td>
            <td>1053812639</td>
            <td>CC</td>
            <td>MZ D CS 8</td>
            <td>RISARDA</td>
            <td>D/QUEBRADAS</td>
            <td>3117766871</td>
            <td>cmmurielo@gmail.com</td>
            <td><button>Editar</button></td>
            <td><button>Borrar</button></td>
        </tr>
        <tr>
            <td>CARLOS MARIO MURIEL</td>
            <td>1053812639</td>
            <td>CC</td>
            <td>MZ D CS 8</td>
            <td>RISARDA</td>
            <td>D/QUEBRADAS</td>
            <td>3117766871</td>
            <td>cmmurielo@gmail.com</td>
            <td><button>Editar</button></td>
            <td><button>Borrar</button></td>
        </tr>
    </table>

</div>