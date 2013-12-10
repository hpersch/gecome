<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Departamentos
                </header>
                <table class="table table-striped border-top" id="departamentos">
                    <thead>
                        <tr>                              
                            <th>#</th>
                            <th>Nome</th>
                            <th>Sub-departamentos</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach ($deptos as $depto) { ?>
                            <tr>
                                <td><?php echo $depto['Departamento']['id']; ?></td>
                                <td><?php echo $depto['Departamento']['nome']; ?></td>
                                <td><?php echo count($depto['SubDepartamento']) ?></td>
                                <td><a href="<? echo $this->base?>/admin/departamentos/editar/<?php echo $depto['Departamento']['id']; ?>">Editar</a> | <a href="<? echo $this->base?>/admin/departamentos/excluir/<?php echo $depto['Departamento']['id']; ?>">Excluir</a></td>
                            </tr>
                        <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div> 
    </div>
</div>
