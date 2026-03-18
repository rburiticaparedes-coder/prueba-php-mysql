<h1>Listado Bibliográfico</h1>
<p>Bienvenido: <?php echo $_SESSION['user']; ?> | <a href="index.php?action=salir">CERRAR SESIÓN</a></p>

<table border="1">
    <tr>
        <th>ID</th>
        <th>TÍTULO</th>
        <th>TEMA</th>
        <th>LINK</th>
    </tr>
    <?php foreach ($datos as $item): ?>
    <tr>
        <td><?php echo $item['ID']; ?></td>
        <td><?php echo $item['TITULO']; ?></td>
        <td><?php echo $item['TEMA']; ?></td>
        <td><a href="<?php echo $item['LINK']; ?>" target="_blank"><?php echo $item['LINK']; ?></a></td>
    </tr>
    <?php endforeach; ?>
</table>

<h3>AGREGAR NUEVO ENLACE</h3>
<form action="index.php?action=agregar" method="POST">
    Título: <input type="text" name="titulo" required><br>
    Tema: <input type="text" name="tema" required><br>
    Link: <input type="url" name="link" required><br>
    <button type="submit">Guardar</button>
</form>
