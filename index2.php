
<?=include_once 'modelo/ColeccionDocentes.php'?>
<?= $Docente = new Docente();?> 

<html>
<?php foreach ($Docentes->getDocentes() as $RolSistema) {
                            ?>
                            <td><?= $RolSistema->getId(); ?></td>
                        <?php } ?>
</html>