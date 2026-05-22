<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
}

include("conexao.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Painel</title>
</head>
<body>

<h2>Bem-vindo ao sistema</h2>

<a href="logout.php">Sair</a>

<hr>

<h2>Cadastrar Usuário</h2>

<form method="POST" action="cadastrar.php">
    Nome:
    <input type="text" name="nome"><br><br>

    Email:
    <input type="email" name="email"><br><br>

    Senha:
    <input type="password" name="senha"><br><br>

    <button type="submit">Cadastrar</button>
</form>

<hr>

<h2>Lista de Usuários</h2>

<table border="1">

<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Ações</th>
</tr>

<?php
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['nome']; ?></td>
    <td><?php echo $row['email']; ?></td>

    <td>
        <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>

        |

        <a href="excluir.php?id=<?php echo $row['id']; ?>">
            Excluir
        </a>
    </td>
</tr>

<?php } ?>

</table>

</body>
</html>