<table id="tabela_dados" class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">Nome da especialidade</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($res = $queryEspecialidade->fetch_array()) { ?>
            <tr>
                <td>
                    <?php echo $res['nomeEspecialidade']; ?>
                </td>
                    <td>
                        <a href="" class="excluir" title="<?php echo $res['codMedicoEspecialidade'];?>">
                            <button type="button" name="submitEspecialidade" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </a>
                    </td>
            </tr>
        <?php
            }
        ?>
    </tbody>
</table>